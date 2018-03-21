<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Interest {

    protected $ci;
    public function __construct() 
    {        
        $this->ci =& get_instance();
        $this->ci->load->database();
        $this->tdrInterest();
    }

    public function tdrInterest() 
    {
        $date = '21';
        $interestAddDate = date('Y-m-'.$date);
        $currentDate = date('Y-m-d');

        if($interestAddDate == $currentDate) {
            $trdAccounts = $this->ci->db->get_where('members_account_info',['accTypeID'=>'TDR','accStatus'=>1]);
            $exist = $this->ci->db->get_where('savings',['savingDate'=>$interestAddDate,'source'=>'TDR'])->num_rows();

            if($trdAccounts->num_rows() > 0 && $exist == 0) {
                $accounts = $trdAccounts->result_array();
                foreach($accounts as $k => $each) {
                    $data['memberId'] = $each['memberId']; 
                    $data['savingAmount'] = ($each['accProfitRate'] / 100) * $each['accAmount']; 
                    $data['savingLaserNo'] = ''; 
                    $data['savingFildOfficerID'] = ''; 
                    $data['dr_cr'] =  'CR'; 
                    $data['source'] = 'TDR'; 
                    $data['savingDate'] = date('Y-m-'.$date); 
                    $data['createDate'] = strtotime($currentDate); 
                    $data['modifiedDate'] = strtotime($currentDate); 
                    $this->ci->db->insert('savings',$data);
                }
            }
        }
    }





}


