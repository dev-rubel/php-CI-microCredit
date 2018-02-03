<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Module: Dashboard Module Section
	Author: Nihal IT
	Project: Micro-Credit
	Start: August 2017
	Last Update: 27-Aug
*/

class Savings extends MX_Controller
{
    protected $uType;

    public function __construct()
    {
        $this->checkSession();
        $this->uType = returnUserType($_SESSION['userInfo']['userType']);

        $this->load->model('SavingsModel');
    }

    public function index()
    {
        $this->activeMenu('Savings');
        $data = ['Savings','userList','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
	      $this->loadAllContent($data);
    }

    public function userList()
    {
        $data2['userList'] = $this->SavingsModel->userList();
        $this->activeMenu('Savings');
        $data = ['Savings','userList',$data2]; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
        $this->loadAllContent($data);
    }
    public function savingsFormAjax($memId)
    {
        $data = $this->SavingsModel->userInfoById($memId);
        //pde($data);
        $this->load->view('admin/savingsFormAjax', $data);
    }

    public function savingsData()
    {
        $postData = $this->input->post(NULL, FALSE);
        $this->SavingsModel->savingsData($postData);
    }

    public function userOverView($memId)
    {
        $data['userOverView'] = $this->SavingsModel->userOverView($memId);
        $data['dpAmountSum'] = $this->db->select_sum('dpAmount')->get_where('savings', ['memberId' => $memId])->row();
        $this->load->view('admin/userOverView', $data);
    }

    public function userProfile($memId)
    {
        $data = $this->SavingsModel->userInfoById($memId);
        $this->load->view('admin/userProfile', $data);
    }

    public function deleteSaving($savingId)
    {
        $this->SavingsModel->deleteSaving($savingId);
    }

    public function updateSavingsData()
    {
        $postData = $this->input->post(NULL, FALSE);
        $id = $postData['id'];
        unset($postData['id']);
        $this->SavingsModel->updateSavingsData($id, $postData);

    }

    public function slctSum()
    {
        /*$this->db->select_sum('dpAmount');
        $this->db->from('savings');
        $this->db->where('(memberId = 3) ');
        $query = $this->db->get()->row();*/

        $query = $this->db->select_sum('dpAmount')->get_where('savings', ['memberId' => 3])->row();

        pde($query);
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
