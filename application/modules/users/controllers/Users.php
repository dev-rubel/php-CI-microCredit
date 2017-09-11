<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
	Module: Dashboard Module Section
	Author: Nihal IT
	Project: Micro-Credit
	Start: August 2017 
	Last Update: 27-Aug
*/

class Users extends MX_Controller  
{
    protected $uType;
    
    public function __construct()
    {	
        		
        $this->checkSession();
        $this->uType = returnUserType($_SESSION['userInfo']['userType']);
        $this->load->model('UsersModel');        
    }    

    public function index() 
	{
        $this->activeMenu('Add Members');
        $data = ['Add Member','content','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);	
    }

    public function addMember() 
    {
        $post = $this->input->post();
        $fileInfoult = $this->validationCheck($post);
        if($fileInfoult){
            /* LOAD FILE UPLOAD LIBRARY */
            $data = ['folder'=>'members','size'=>100,'width'=>300,'height'=>300];
            $config = $this->fileConfig($data);    
            $this->load->library('upload', $config);
            /* CHECK FILE ERROR WITH GIVEN CONFIG */    
            if ( ! $this->upload->do_upload('memImg')) {
                $error = array('error' => $this->upload->display_errors());
                $this->jsonMsgReturn(false,'File must below 100KB and Size: W132 X H170.And Only JPG Format.');

            } else {                
                $fileInfo = $this->upload->data();                
                $insertId = $this->UsersModel->addMember($post);
                if($fileInfo){
                    $this->renameFile($fileInfo, 'member'.$insertId); 
                    $this->jsonMsgReturn(true,'Data inserted success.');                  
                } else {;
                    $this->jsonMsgReturn(false,'Image insert error.');
                }                           
            }        

        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
        
    }

    public function viewMember() 
    {
        $memberId = $this->uri->segment(3);
        $data['memberInformation'] = $this->UsersModel->getMemberInfo($memberId);
        $this->load->view($this->uType.'/'.'viewMember', $data);
    }
    
    public function memberList() 
    {
        $this->activeMenu('Member List');
        $data2['memberList'] = $this->UsersModel->memberList();
        $data = ['Member List','memberList',$data2]; 
        $this->loadAllContent($data);	
    }

    public function editMember() 
    {
        $this->activeMenu('Member List');
        $memId = $this->uri->segment(3);
        $data2['memberInfo'] = $this->UsersModel->getMemberInfo($memId);
        $data = ['Edit Member Information','editMember',$data2]; 
        $this->loadAllContent($data);	
        
    }

    public function updateMember() 
    {       
        $post = $this->input->post();
        $memId = $post['memId'];
        unset($post['memId']);
        //dbugd($_FILES);

        if(!empty($_FILES['memImg']['name'])) {     
            $fileInfoult = $this->validationCheck($post);
            if($fileInfoult){
                /* LOAD FILE UPLOAD LIBRARY */
            
                $data = ['folder'=>'members','size'=>100,'width'=>300,'height'=>300];
                $config = $this->fileConfig($data);    
                $this->load->library('upload', $config);
                /* CHECK FILE ERROR WITH GIVEN CONFIG */    
                if ( ! $this->upload->do_upload('memImg')) {
                    $error = array('error' => $this->upload->display_errors());
                    $_SESSION['error'] = 'File must below 100KB and Size: W132 X H170.And Only JPG Format.';
                    redirect(base_url('users/memberList/'.$memId),'refresh');
                    //$this->jsonMsgReturn(false,'File must below 100KB and Size: W132 X H170.And Only JPG Format.');

                } else {                
                    $fileInfo = $this->upload->data();                
                    $insertId = $this->UsersModel->updateMember($memId, $post);
                    if($fileInfo){
                        $this->renameFile($fileInfo, 'member'.$memId); 
                        $this->session->set_flashdata('success', 'Data Update with Image Success.');
                        redirect(base_url('users/memberList'),'refresh');
                        //$this->jsonMsgReturn(true,'Data inserted success.');                  
                    } else {
                        $this->session->set_flashdata('error', 'Image insert error.');
                        redirect(base_url('users/memberList/'.$memId),'refresh');
                        //$this->jsonMsgReturn(false,'Image insert error.');
                    }                           
                }
                                

            } else {
                $this->session->set_flashdata('error', 'Please fillup all mendatory field.');
                redirect(base_url('users/memberList/'.$memId),'refresh');
                //$this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
            }

        } else {
            $insertId = $this->UsersModel->updateMember($memId, $post);             
            $this->session->set_flashdata('success', 'Data Update Success.');
            redirect(base_url('users/memberList'),'refresh');
            //$this->jsonMsgReturn(true,'Data inserted success.');             
        } 
    }

    public function deleteMember() 
    {
        $memId = $this->uri->segment(3);
        $data = $this->UsersModel->deleteMember($memId);        
        echo $data;
    }


    public function validationCheck($postData) 
    {
        $this->load->helper('form');        
        $this->load->library('form_validation');

        foreach($postData as $k => $each) {
            $this->form_validation->set_rules($k, 'Field', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
                return false;
        } else {
                return true;
        }        
    }

    public function renameFile($fileInfo,$insertId) 
    {
        $file_path     = $fileInfo['file_path'];
        $file          = $fileInfo['full_path'];
        $file_ext      = $fileInfo['file_ext'];            
        $final_file_name = $insertId.$file_ext;   
        
        // here is the renaming functon
        rename($file, $file_path . $final_file_name);
    }


    public function fileConfig($data) 
    {
        $config['upload_path']          = './uploads/'.$data['folder'];
        $config['allowed_types']        = 'jpg';
        $config['overwrite']            = TRUE;
        $config['max_size']             = $data['size'];
        $config['max_width']            = $data['width'];
        $config['max_height']           = $data['height'];
        return $config;
    }

    public function jsonMsgReturn($type, $msg) 
    {
        echo json_encode(['type'=>$type,'msg'=>$msg]);
    }
    

    


    






















    /* MENDATORY FUNCTOINS MUST NEED EVERY MODULES CONTROLLER */

    public function loadAllContent($dynamicContent)
    {
        /* LOAD DYNAMIC CONTENT */
        $data['title'] = $dynamicContent[0];
        $data['contents'] = $this->load->view($this->uType.'/'.$dynamicContent[1],$dynamicContent[2],true);
        /* LOAD TEMPLATE MAIN CONTENT */
        $data2['userType']      = $this->uType;
        $data['adminHeaderSrc'] = $this->load->view('templeteSrc/headerSrc',$data2,true);
		$data['adminHeader']    = $this->load->view('templeteSrc/header',$data2,true);
		$data['adminSidebar']   = $this->load->view('templeteSrc/sidebar',$data2,true);             
		$data['adminFooter']    = $this->load->view('templeteSrc/footer',$data2,true);
        $data['adminFooterSrc'] = $this->load->view('templeteSrc/footerSrc',$data2,true);
        $this->load->view('templeteSrc/master',$data);
    }

    public function activeMenu($data)
    {
        $_SESSION['menuOpen']   = $this->router->fetch_module();
        $_SESSION['menuActive'] = $data;
    }

    public function checkSession()
    {
        if(empty($_SESSION['userInfo']))
		{
            $this->session->set_flashdata('error', 'Please input email & password.');
			redirect(base_url());
        }	
    }

}