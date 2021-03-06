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

    /* ========== START {SAVING} SECTION AREA =========== */
    /*  */
    public function index()
	{
        $this->activeMenu('Savings');
        $data = ['Deposit','type/savings','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function ajaxGetMemberInfo()
    {
        $this->loadModel(['users/MembersModel','users/MembersAccountInfoModel']);
        $page_data['memberAcID'] = $this->uri->segment(3);
        $page_data['memberInformation'] = $this->MembersModel->getMemberByAcID($page_data['memberAcID']);

        $accType = $this->uri->segment(4);
        if($accType) {
            $memberId = $this->MembersModel->getMemberId($page_data['memberAcID']);
            $account = $this->MembersAccountInfoModel->getMemberAcInfo($memberId,$accType);
            if($account) {
                $htmlData['account'] = $account;
            }            
        }
        
        $htmlData['page'] = $this->load->view($this->uType.'/ajaxGetMemberInfo', $page_data, true);
        $this->jsonMsgReturn(true,'Found',$htmlData);
    }

    public function addSaving()
    {
        $this->loadModel(['SavingsModel','users/MembersModel']);
        $post = $this->input->post();
        $checkValidation = $this->validationCheck($post);
        if($checkValidation) { // check validation
            $memberInformation = $this->MembersModel->getMemberByAcID($post['memberId']); // member account id (not memberId)
            if(!empty($memberInformation)){ // check valid member id
                $post['memberId'] = $memberInformation[0]['memberId'];
                $post['dr_cr'] = 'CR'; // CR for credit(saving) | DR for debit(withdrow)
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
        $data['columns'] = [null,'savingsId','memberId','savingAmount','savingLaserNo','savingFildOfficerID','dr_cr','source','savingDate'];
        $data['search']  = ['savingsId','memberId','dr_cr','savingAmount','savingLaserNo','source','savingFildOfficerID','savingDate'];
        $data['order']   = ['savingsId'=>'desc'];
        $data['func']    = ['memberId'=>'get_member_name'];
        $method = 'get_saving_list';
        $action = 'actionButtonSaving';
        $this->ajaxList($data,$method,$action);
    }

    public function actionButtonSaving($savingId)
    {
        $button = '<div class="btn-group">
        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders" aria-hidden="true"></i>
            <i class="fa fa-angle-down"></i>
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
    }

    public function searchMemberSaving()
    {
        $this->loadModel(['SavingsModel','users/MembersModel']);
        $post = $this->input->post();
        $memberId = $this->MembersModel->getMemberId($post['memberId']); // member account id (not memberId)

        if($memberId) {
            $checkValidation = $this->validationCheck($post);
            if($checkValidation) { // check validation
                $page_data['formData'] = $post;
                $page_data['singleMemberSavings'] = $this->SavingsModel->getMemberSavings($memberId);
                $page_data['singleMemberInfo'] = $this->MembersModel->get($memberId);
                $htmlData = $this->load->view($this->uType.'/searchMemberSavingTable', $page_data, true);
                $this->jsonMsgReturn(true, 'Found.',$htmlData);
            } else {
                $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
            }
        } else {
           $this->jsonMsgReturn(false, 'No Member Found.');
        }

    }
    /*  */
    /* ========== END {SAVING} SECTION AREA =========== */

    /* ========== START {TDR} SECTION AREA =========== */
    /*  */

    public function deposit_tdr()
    {
        $this->activeMenu('TDR');
        $data = ['Deposit TDR','type/tdr','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function createTdrForm() 
    {
        $this->loadModel(['users/MembersAccountInfoModel']);
        $memberAcInfo = $this->MembersAccountInfoModel->getMemberByMemberAcID($_POST['memberAcID'],'TDR');
        if(is_array($memberAcInfo)){
            $page_data['memberAcInfo'] = $memberAcInfo;
            $page_data['memberId'] = $memberAcInfo[0]['memberId'];
            $html = $this->load->view($this->uType.'/ajaxTdrMemberInfo', $page_data, true);
            $this->jsonMsgReturn(true, 'This member already registerd TDR Account.',$html);
        } elseif($memberAcInfo > 0) { // return memberId
            $page_data['memberId'] = $memberAcInfo;
            $html = $this->load->view($this->uType.'/ajaxTdrMemberInfo', $page_data, true);
            $this->jsonMsgReturn(true, 'Member Found! But TDR not registerd.',$html);
        } else {
            $this->jsonMsgReturn(false, 'Member Not Found');
        }
    }

    public function createTdrAccount()
    {
        unset($_POST[0]); // remove unexpected 0 index
        $this->loadModel(['users/MembersAccountInfoModel','users/MembersIntroducerModel']);        
        $memberId = $this->uri->segment(3);
        $post = $this->input->post();
        $post['members_account_info*accTypeID'] = 'TDR'; // account type
        $result = $this->MembersIntroducerModel->addSingle($post,$memberId,'TDR');     
                
        if($result) {
            $this->MembersAccountInfoModel->add($post,$memberId);
            $this->jsonMsgReturn(true, 'TDR registerd');
        } else {
            $this->jsonMsgReturn(false, 'Error!! TDR not registerd.');
        }
    }

    /*  */
    /* ========== END {TDR} SECTION AREA =========== */

    /* ========== START {DPS} SECTION AREA =========== */
    /*  */
    public function deposit_dps()
    {
        $this->activeMenu('DPS');
        $data = ['Deposit DPS','type/dps','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function createDpsForm()
    {
        $this->loadModel(['users/MembersAccountInfoModel']);
        $memberAcInfo = $this->MembersAccountInfoModel->getMemberByMemberAcID($_POST['memberAcID'],'DPS');
        if(is_array($memberAcInfo)){
            $page_data['memberAcInfo'] = $memberAcInfo;
            $page_data['memberId'] = $memberAcInfo[0]['memberId'];
            $html = $this->load->view($this->uType.'/ajaxDpsMemberInfo', $page_data, true);
            $this->jsonMsgReturn(true, 'This member already registerd DPS Account.',$html);
        } elseif($memberAcInfo > 0) { // return memberId
            $page_data['memberId'] = $memberAcInfo;
            $html = $this->load->view($this->uType.'/ajaxDpsMemberInfo', $page_data, true);
            $this->jsonMsgReturn(true, 'Member Found! But DPS not registerd.',$html);
        } else {
            $this->jsonMsgReturn(false, 'Member Not Found');
        }
    }

    public function createDpsAccount()
    {
        unset($_POST[0]); // remove unexpected 0 index
        $this->loadModel(['users/MembersAccountInfoModel','users/MembersIntroducerModel']);        
        $memberId = $this->uri->segment(3);
        $post = $this->input->post();
        $post['members_account_info*accTypeID'] = 'DPS'; // account type
        $result = $this->MembersIntroducerModel->addSingle($post,$memberId,'DPS');     
                
        if($result) {
            $this->MembersAccountInfoModel->add($post,$memberId);
            $this->jsonMsgReturn(true, 'DPS registerd');
        } else {
            $this->jsonMsgReturn(false, 'Error!! DPS not registerd.');
        }
    }

    public function addMonthlyDps()
    {
        $this->loadModel(['users/MembersModel','users/MembersAccountInfoModel','DpsModel']);
        $post = $this->input->post();
        $checkValidation = $this->validationCheck($post);
        if($checkValidation) { // check validation           
            $memberInformation = $this->MembersModel->getMemberByAcID($post['memberId']); // member account id (not memberId)
            if(!empty($memberInformation)) { // check valid member id
                $exist = $this->MembersAccountInfoModel->checkAccountExist($memberInformation[0]['memberId'],'DPS'); // check dps account exist
                if($exist) {
                    $post['memberId'] = $memberInformation[0]['memberId'];
                    $post['dr_cr'] = 'CR'; // CR for credit(dps) | DR for debit(withdrow)
                    $transactionID = $this->DpsModel->add($post);
                    $this->jsonMsgReturn(true, "<b>Success!</b> Transaction ID: $transactionID");
                } else {
                    $this->jsonMsgReturn(false, 'Doesn\'t found DPS account. Pleaser register first.');
                }
            } else {
                $this->jsonMsgReturn(false, 'Invaid Member ID.');
            }
        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
    }

    public function searchMemberDps()
    {
        $this->loadModel(['users/MembersModel','DpsModel']);
        $post = $this->input->post();
        $memberId = $this->MembersModel->getMemberId($post['memberId']); // member account id (not memberId)

        if($memberId) {
            $checkValidation = $this->validationCheck($post);
            if($checkValidation) { // check validation
                $page_data['formData'] = $post;
                $page_data['singleMemberDps'] = $this->DpsModel->getMemberDps($memberId);
                $page_data['singleMemberInfo'] = $this->MembersModel->get($memberId);
                $htmlData = $this->load->view($this->uType.'/searchMemberDpsTable', $page_data, true);
                $this->jsonMsgReturn(true, 'Found.',$htmlData);
            } else {
                $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
            }
        } else {
           $this->jsonMsgReturn(false, 'No Member Found.');
        }
    }

    public function ajaxDpsList()
    {
        $data['table']   = 'dps';
        $data['columns'] = [null,'dpsId','memberId','dpsAmount','dpsLaserNo','dpsFildOfficerID','dr_cr','dpsDate'];
        $data['search']  = ['dpsId','memberId','dr_cr','dpsAmount','dpsLaserNo','dpsFildOfficerID','dpsDate'];
        $data['order']   = ['dpsId'=>'desc'];
        $data['func']    = [];
        $method = 'get_dps_list';
        $action = 'actionButtonDps';
        $this->ajaxList($data,$method,$action);
    }

    public function actionButtonDps($dpsId)
    {
        $button = '
            <a href="#" class="btn btn-info btn-xs">Edit</a>
            <a href="#" class="btn btn-danger btn-xs">Delete</a>
        ';
        return $button;
    }


    /*  */
    /* ========== END {DPS} SECTION AREA =========== */

    public function deposit_msavings()
    {
        $this->activeMenu('My Savings');
        $data = ['Deposit My Savings','type/msavings','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    /* ========== START {SDF} SECTION AREA =========== */
    /*  */

    public function deposit_sdf()
    {
        $this->activeMenu('SDF');
        $data = ['Deposit SDF','type/sdf','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function createSdfForm() 
    {
        $this->loadModel(['users/MembersAccountInfoModel']);
        $memberAcInfo = $this->MembersAccountInfoModel->getMemberByMemberAcID($_POST['memberAcID'],'SDF');
        if(is_array($memberAcInfo)) {
            $this->jsonMsgReturn(true, 'This member already registerd SDF Account.');
        } elseif($memberAcInfo > 0) { // return memberId
            $page_data['memberId'] = $memberAcInfo;
            $html = $this->load->view($this->uType.'/ajaxSdfMemberInfo', $page_data, true);
            $this->jsonMsgReturn(true, 'Member Found! But SDF not registerd.',$html);
        } else {
            $this->jsonMsgReturn(false, 'Member Not Found');
        }
    }

    public function createSdfAccount() 
    {
        unset($_POST[0]); // remove unexpected 0 index
        $this->loadModel(['users/MembersAccountInfoModel','users/MembersIntroducerModel']);        
        $memberId = $this->uri->segment(3);
        $post = $this->input->post();
        $post['members_account_info*accTypeID'] = 'SDF'; // account type
        $result = $this->MembersIntroducerModel->addSingle($post,$memberId,'SDF');     
                
        if($result) {
            $this->MembersAccountInfoModel->add($post,$memberId);
            $this->jsonMsgReturn(true, 'SDF registerd');
        } else {
            $this->jsonMsgReturn(false, 'Error!! SDF not registerd.');
        }
    }

    public function addSdf() 
    {
        $this->loadModel(['users/MembersModel','users/MembersAccountInfoModel','SdfModel']);
        $post = $this->input->post();
        $checkValidation = $this->validationCheck($post);
        if($checkValidation) { // check validation           
            $memberInformation = $this->MembersModel->getMemberByAcID($post['memberId']); // member account id (not memberId)
            if(!empty($memberInformation)) { // check valid member id
                $exist = $this->MembersAccountInfoModel->checkAccountExist($memberInformation[0]['memberId'],'SDF'); // check sdf account exist
                if($exist) {
                    $post['memberId'] = $memberInformation[0]['memberId'];
                    $post['dr_cr'] = 'CR'; // CR for credit(sdf) | DR for debit(withdrow)
                    $transactionID = $this->SdfModel->add($post);
                    $this->jsonMsgReturn(true, "<b>Success!</b> Transaction ID: $transactionID");
                } else {
                    $this->jsonMsgReturn(false, 'Doesn\'t found SDF account. Pleaser register first.');
                }
            } else {
                $this->jsonMsgReturn(false, 'Invaid Member ID.');
            }
        } else {
            $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
        }
    }

    public function ajaxSdfList() 
    {
        $data['table']   = 'sdf';
        $data['columns'] = [null,'sdfId','memberId','sdfAmount','sdfLaserNo','sdfFildOfficerID','dr_cr','sdfDate'];
        $data['search']  = ['sdfId','memberId','dr_cr','sdfAmount','sdfLaserNo','sdfFildOfficerID','sdfDate'];
        $data['order']   = ['sdfId'=>'desc'];
        $data['func']    = ['memberId'=>'get_member_name'];
        $method = 'get_sdf_list';
        $action = 'actionButtonSdf';
        $this->ajaxList($data,$method,$action);
    }

    public function actionButtonSdf($sdfId)
    {
        $button = '
            <a href="#" class="btn btn-info btn-xs">Edit</a>
            <a href="#" class="btn btn-danger btn-xs">Delete</a>
        ';
        return $button;
    }

    public function searchMemberSdf() 
    {
        $this->loadModel(['SdfModel','users/MembersModel']);
        $post = $this->input->post();
        $memberId = $this->MembersModel->getMemberId($post['memberId']); // member account id (not memberId)

        if($memberId) {
            $checkValidation = $this->validationCheck($post);
            if($checkValidation) { // check validation
                $page_data['formData'] = $post;
                $page_data['singleMemberSdf'] = $this->SdfModel->getMemberSdf($memberId);
                $page_data['singleMemberInfo'] = $this->MembersModel->get($memberId);
                $htmlData = $this->load->view($this->uType.'/searchMemberSdfTable', $page_data, true);
                $this->jsonMsgReturn(true, 'Found.',$htmlData);
            } else {
                $this->jsonMsgReturn(false, 'Please fillup all mendatory field.');
            }
        } else {
           $this->jsonMsgReturn(false, 'No Member Found.');
        }
    }

    /*  */
    /* ========== END {SDF} SECTION AREA =========== */

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
    public function ajaxList($array,$method,$action = '')
    {
        $this->load->model('DatatableModel','datatable');
        $this->load->model('AjaxDatatableFunctionModel','ajaxModel');

        $list = $this->datatable->$method($array);
        $data = array();
        $no = $_POST['start'];

        /* If data found */
        if(!empty($list)) {
            foreach ($list as $k=>$each) {
                $no++;
                $row = array();
                $row[] = $no;
    
                foreach($array['search'] as $k2=>$each2) {
                    if($each2 == 'createDate' || $each2 == 'modifiedDate') {
                        $row[] = date('d-m-y',$each[$each2]);
                    } else {
                        /* if function found */
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
    public function loadModel($models = [])
    {
        // $models = ['SavingsModel','users/MembersModel','users/MembersAccountInfoModel','users/MembersIntroducerModel','DpsModel','SdfModel'];
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
        if(empty($_SESSION['userInfo'])) {
            $this->session->set_flashdata('error', 'Please input email & password.');
			redirect(base_url());
        }
    }


}
