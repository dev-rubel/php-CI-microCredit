<?php 

class SdfModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }

    protected $table = 'sdf';
    protected $info;
    protected $insertID;

    public function add($data)
    {
        $filterData = $this->filterData($data,true,true); // Post Data | Create Date | Modified Date
        $this->db->insert($this->table, $filterData);
        $this->insertID = $this->db->insert_id();
        return $this->insertID;
    }
    
    public function getMemberSdf($memberId) 
    {
        $this->db->where('memberId', $memberId);
        $this->db->order_by("sdfDate", "asc");
        $result = $this->db->get($this->table)->result_array();
        return $result;    
    }

    public function filterData($data,$cDate='',$mDate='') // Post Data | Create Date | Modified Date
    {
        foreach($data as $k=>$each) {            
            $k = explode('/',$k);
            $this->info[$k[0]] = $each;            
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