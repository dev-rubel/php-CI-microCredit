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

        $this->load->library('grocery_CRUD');
    }

    public function index()
	{
        $this->activeMenu('Add Members');
        $data = ['Add Member','content','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
	      $this->loadAllContent($data);
    }

    public function addMember()
    {
        unset($_POST[0]); // remove unexpected 0 index
        $post = $this->input->post();
        // Validaton
        $checkValidation = $this->validationCheck($post);
        if($checkValidation) {
            $this->loadModel();
            // insert data into different table
            $memberId = $this->MembersModel->add($post);
            $this->MembersNomineeModel->add($post,$memberId);
            $this->MembersIntroducerModel->add($post,$memberId);
            $this->MembersApplicantModel->add($post,$memberId);
            $this->MembersShareModel->add($post,$memberId);
            $this->MembersAccountInfoModel->add($post,$memberId);

            // this also chcek !empty()
            if (!empty($_FILES['memberImage']['name'])) {
              $this->imageResize(300,300,'members/profile',$_FILES['memberImage'],$memberId); // width | height | folder | file | name(optional)
            }
            if (!empty($_FILES['memberCardImage']['name'])) {
              $this->imageResize(180,180,'members/card',$_FILES['memberCardImage'],$memberId); // width | height | folder | file | name(optional)
            }

            $this->jsonMsgReturn(true,'Data inserted success.');
        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
    }

    public function ajaxMemberList()
    {
        $data['table']   = 'members';
        $data['columns'] = [null,'memberId','memberAcID','memberName','memberPEaddrrs','memberDOB','createDate'];
        $data['search']  = ['memberId','memberAcID','memberName','memberPEaddrrs','memberDOB','createDate'];
        $data['order']   = ['memberId'=>'asc'];
        $data['func']    = [];
        $method = 'get_datatables';
        $action = 'actionButton';
        $this->ajaxList($data,$method,$action);
    }

    public function actionButton($memId)
    {
        $button = '<div class="btn-group">
        <button class="btn btn-info btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders" aria-hidden="true"></i>
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="#" href="'.base_url("users/viewMember/").$memId.'" data-target="#ajax" data-toggle="modal"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
            </li>
            <li>
                <a href="#" id="collapsSide"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            </li>
            <li>
                <a href="#" class="confirmation_but" data-popout="true" data-singleton="true" data-placement="left" data-func="deleteMember" data-id="'.$memId.'"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
            </li>
        </ul> </div>';
        return $button;

        //'.base_url("users/editMember/").$memId.'
    }

    public function viewMember()
    {
        $memberId = $this->uri->segment(3);
        $this->loadModel();
        $data['memberInformation'] = $this->MembersModel->get($memberId);
        $this->load->view($this->uType.'/'.'viewMember', $data);
    }

    public function memberList($data2 = null)
    {
        if($data2 != null) {
            $data2 = json_decode(json_encode($data2),true);
        }
        $this->activeMenu('Member List');
        $data2['memberList'] = $this->UsersModel->memberList();
        $data = ['Member List','memberList',$data2];
        $this->loadAllContent($data);
    }

    public function offices_management()
	{
        // https://www.grocerycrud.com/
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('login');

			$output = $crud->render();

			$this->memberList($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
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



    /* USER SECTION */

    public function addUserPage()
    {
        $this->activeMenu('Add User');
        $data = ['Add User','addUser','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
        $this->loadAllContent($data);
    }

    public function addUser()
    {
        $post = $this->input->post();
        $validation = $this->validationCheck($post);
        if($validation){
            $insertId = $this->UsersModel->addUser($post);
            $this->jsonMsgReturn(true, 'Data inserted success.');
        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
    }

    public function userList()
    {
        $this->activeMenu('User List');
        $data2['userList'] = $this->UsersModel->userList();
        $data = ['User List','userList',$data2];
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

    public function jsonMsgReturn($type, $msg, $html = '')
    {
        echo json_encode(['type'=>$type,'msg'=>$msg,'html'=>$html]);
    }


    /* DATATABLE AJAX FUNCTION */
    public function ajaxList($array,$method,$action = '')
    {
        $this->load->model('DatatableModel','datatable');
        $this->load->model('AjaxDatatableFunctionModel','ajaxModel');

        $list = $this->datatable->$method($array);
        $data = array();
        $no = $_POST['start'];

        // If data found
        if(!empty($list)) {
            foreach ($list as $k=>$each) {
                $no++;
                $row = array();
                $row[] = $no;
    
                foreach($array['search'] as $k2=>$each2) {
                    if($each2 == 'createDate' || $each2 == 'modifiedDate') {
                        $row[] = date('d-m-y',$each[$each2]);
                    } else {
                        // if function found
                        if (array_key_exists($each2, $array['func'])) {
                            $row[] = $this->ajaxModel->$array['func'][$each2]($each[$each2]);
                        } else {
                            $row[] = $each[$each2];
                        }                        
                    }
                }
                /* If Action Button Assign */
                if(!empty($action)) {
                    $row[] = $this->$action($each[key($array['order'])]);
                }
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
        } else {        // If no data found     
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->datatable->count_all($array),
                "recordsFiltered" => $this->datatable->count_filtered($array),
                "data" => [],
            );
            //output to json format
            echo json_encode($output);
        }
    }


    /* LOAD DATABASE MODEL  */
    public function loadModel()
    {
        $models = ['MembersModel','MembersIntroducerModel','MembersApplicantModel','MembersAccountInfoModel','MembersNomineeModel','MembersShareModel'];
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
