<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
	Module: Dashboard Module Section
	Author: Nihal IT
	Project: Micro-Credit
	Start: August 2017 
	Last Update: 27-Aug
*/

class Deposit extends MX_Controller  
{
    protected $uType;
    
    public function __construct()
    {			
        $this->checkSession();
        $this->uType = returnUserType($_SESSION['userInfo']['userType']);              
    }    

    public function index() 
	{
        $this->activeMenu('Savings');
        $data = ['Deposit','type/savings','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }      

    public function ajaxGetMemberInfo() 
    {   
        $this->loadModel();    
        $page_data['memberAcID'] = $this->uri->segment(3);
        $page_data['memberInformation'] = $this->MembersModel->getTwo($page_data['memberAcID']);

        $htmlData = $this->load->view($this->uType.'/ajaxGetMemberInfo', $page_data, true);
        $this->jsonMsgReturn(true,'Found',$htmlData);
    }

    public function addSaving() 
    {
        $this->loadModel();        
        $post = $this->input->post(); 
        $memberInformation = $this->MembersModel->getTwo($post['memberId']); // member account id (not memberId)
        $checkValidation = $this->validationCheck($post);
        if($checkValidation) { // check validation
            if(!empty($memberInformation)){ // check valid member id
                $post['memberId'] = $memberInformation[0]['memberId'];
                $transactionID = $this->SavingsModel->add($post);
                $this->jsonMsgReturn(true, "<b>Success!</b> Transaction ID: $transactionID");
            } else {
                $this->jsonMsgReturn(false, 'Invaid Member ID.');
            }            
        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
    }

    public function ajaxSavingList() 
    {
        $data['table']   = 'savings';
        $data['columns'] = [null,'savingsId','memberId','savingAmount','savingLaserNo','savingFildOfficerID','createDate'];
        $data['search']  = ['savingsId','memberId','savingAmount','savingLaserNo','savingFildOfficerID','createDate'];
        $data['order']   = ['savingsId'=>'desc'];
        $this->ajaxList($data);
    }

    public function actionButton($savingId) 
    {
        $button = '<div class="btn-group">
        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders fa-2x" aria-hidden="true"></i>
            <i class="fa fa-angle-down fa-2x"></i>
        </button>
        <ul class="dropdown-menu" role="menu">            
            <li>
                <a href="#" id="collapsSide"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
            </li>
            <li>
                <a href="#" class="confirmation_but" data-popout="true" data-singleton="true" data-placement="left" data-func="deleteMember" data-id="'.$savingId.'"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
            </li>
        </ul> </div>';
        return $button;

        //'.base_url("users/editMember/").$savingId.'
    }

    public function deposit_tdr() 
    {
        $this->activeMenu('TDR');
        $data = ['Deposit TDR','type/tdr','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_dps() 
    {
        $this->activeMenu('DPS');
        $data = ['Deposit DPS','type/dps','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_msavings() 
    {
        $this->activeMenu('My Savings');
        $data = ['Deposit My Savings','type/msavings','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_sdf() 
    {
        $this->activeMenu('SDF');
        $data = ['Deposit SDF','type/sdf','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_ssf() 
    {
        $this->activeMenu('SSF');
        $data = ['Deposit SSF','type/ssf','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_msf() 
    {
        $this->activeMenu('MSF');
        $data = ['Deposit MSF','type/msf','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_lpsc() 
    {
        $this->activeMenu('LPSC');
        $data = ['Deposit LPSC','type/lpsc','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }











    /* REUSERABLE FUNCTIONS */

    public function imageResize($w,$h,$folder,$file,$name='') 
    {
        if(!empty($file['name'])) {
            if(!is_dir('./uploads/'.$folder)){ // create folder if not exists
                mkdir('./uploads/'.$folder);
            }

            list($fileName, $extention) = explode('.', $file['name']);
            if(!empty($name)){ // if file name not set, then rename file in default name
                $fileName = $name;
            }
            $fileData = $file['tmp_name'];
            $config['image_library']  = 'gd2';
            $config['source_image']   = $fileData;
            $config['new_image']      = "./uploads/$folder/$fileName.$extention";
            $config['maintain_ratio'] = TRUE;
            $config['width']          = $w;
            $config['height']         = $h;
            $this->load->library('image_lib');
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            /* resets all of the values */
            $this->image_lib->clear();
        }
    }

    public function validationCheck($postData) 
    {
        $this->load->helper('form');        
        $this->load->library('form_validation');

        $found = false;
        foreach($postData as $k => $each) {
            if(strpos($k, '/')){ // validation with input name like: fieldName|required       
                list($fieldName, $validation) = explode('/', $k);
                $info[] = $validation;
                $this->form_validation->set_rules($k, $fieldName, $validation); // need to set fullname for set_rules
                $found = true;
            }
        }
        if($found){ // validation with input name like: fieldName|required 
            if ($this->form_validation->run() == FALSE) {
                    return false;
            } else {
                    return true;
            }
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

    public function jsonMsgReturn($type, $msg, $html='') 
    {
        echo json_encode(['type'=>$type,'msg'=>$msg,'html'=>$html]);
    }




    /* DATATABLE AJAX FUNCTION */
    public function ajaxList($array)
    {
        $this->load->model('DatatableModel','datatable');
        $list = $this->datatable->get_datatables($array);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $k=>$each) {
            $no++;
            $row = array();
            $row[] = $no;
            
            foreach($array['search'] as $k2=>$each2) {
                if($each2 == 'createDate' || $each2 == 'modifiedDate') {
                    $row[] = date('d-m-y',$each[$each2]);                    
                } else {
                    $row[] = $each[$each2];                    
                }                
            }
            
            $row[] = $this->actionButton($each[key($array['order'])]);
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all($array),
            "recordsFiltered" => $this->datatable->count_filtered($array),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



    /* LOAD DATABASE MODEL  */
    public function loadModel() 
    {
        $models = ['SavingsModel','users/MembersModel'];
        $this->load->model($models);
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