<?php

class MembersAccountInfoModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }

    protected $table = 'members_account_info';
    protected $info;
    protected $insertID;

    public function add($data,$memberId) 
    {
        $filterData = $this->filterData($data,true,true); // Post Data | Create Date | Modified Date
        $filterData['memberId'] = $memberId;
        $this->db->insert($this->table, $filterData);
        $this->insertID = $this->db->insert_id();
        return $this->insertID;
    }

    public function get($memberId) 
    {
        $this->db->where('memberId', $memberId);
        $result = $this->db->get($this->table)->result_array();
        return $result;        
    }

    public function checkAccountExist($memberId,$acType) 
    {
        $this->db->where('memberId',$memberId);
        $this->db->where('accTypeID',$acType);
        $result = $this->db->get($this->table)->result_array();
        if(!empty($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function getMemberByMemberAcID($memberAcID,$accType)
    {
        $this->db->where('memberAcID',$memberAcID);
        $memberId = $this->db->get('members')->result_array();
        //return $memberIds;
        if(!empty($memberId)){
            $this->db->where('memberId', $memberId[0]['memberId']);
            $this->db->where('accTypeID', $accType);
            $result = $this->db->get($this->table)->result_array();
            if(!empty($result)) {
                return $result;
            } else {
                return $memberId[0]['memberId'];
            }
        } else {
            return false;
        }        
    }

    public function filterData($data,$cDate='',$mDate='') // Post Data | Create Date | Modified Date
    {
        foreach($data as $k=>$each) {
            $k = explode('*',$k);
            if($k[0] == $this->table) {
                $k = explode('/',$k[1]);
                $this->info[$k[0]] = $each;
            }
        }
        if($cDate){
            $this->info['createDate'] = strtotime(date('d-m-Y'));
        }
        if($mDate){
            $this->info['modifiedDate'] = strtotime(date('d-m-Y'));
        }
        
        return $this->info;
    }

}