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
        $this->activeMenu('DPS');
        $data = ['Deposit','type/dps','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }      

    public function deposit_lpsc() 
    {
        $this->activeMenu('LPSC');
        $data = ['Deposit LPSC','type/lpsc','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
		$this->loadAllContent($data);
    }

    public function deposit_fdr() 
    {
        $this->activeMenu('FDR');
        $data = ['Deposit FDR','type/fdr','']; /* P1=TITLE|P2=PAGENAME|P3=PARAMITER */
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