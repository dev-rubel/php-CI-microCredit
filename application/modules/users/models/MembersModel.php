<?php

class MembersModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }

    protected $table = 'members';
    protected $info;
    protected $insertID;

    public function add($data)
    {
        $filterData = $this->filterData($data,true,true); // Post Data | Create Date | Modified Date
        $this->db->insert($this->table, $filterData);
        $this->insertID = $this->db->insert_id();
        return $this->insertID;
    }

    public function get($memId)
    {
        $this->db->where('memberId', $memId);
        $result = $this->db->get($this->table)->result_array();
        return $result;
    }

    public function getTwo($memberAcID)
    {
        $this->db->where('memberAcID', $memberAcID);
        $result = $this->db->get($this->table)->result_array();
        return $result;
    }

    public function getMemberId($memberAcID)
    {
        $this->db->select('memberId');
        $this->db->where('memberAcID', $memberAcID);
        $memberId = $this->db->get($this->table)->result_array();

        if(!empty($memberId)){
            return $memberId[0]['memberId'];
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
