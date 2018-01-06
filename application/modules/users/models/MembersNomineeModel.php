<?php

class MembersNomineeModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }

    protected $table = 'members_nominee';
    protected $info;
    protected $insertID;

    public function add($data,$memberId) 
    {
        $filterData = $this->filterData($data,true,true); // Post Data | Create Date | Modified Date
        foreach($filterData as $k=>$each){
            $each['memberId'] = $memberId;
            $this->db->insert($this->table, $each);
            $this->insertID[] = $this->db->insert_id();
        }
        return $this->insertID;
    }

    public function filterData($data,$cDate='',$mDate='') // Post Data | Create Date | Modified Date
    {
        foreach($data as $k=>$each) {
            $k = explode('*',$k);
            if($k[0] == $this->table) {
                $k = explode('/',$k[1]);
                // $this->info[$k[0]] = $each;

                if(is_array($each)){ // sorting multidimantion array data
                    foreach($each as $k2=>$each2){ 
                            if(!empty($each2[$k2])){ // check if this was single dimantions
                                $this->info[$k2][$k[0]] = $each[$k2];
                            if($cDate){
                                $this->info[$k2]['createDate'] = strtotime(date('d-m-Y'));
                            }
                            if($mDate){
                                $this->info[$k2]['modifiedDate'] = strtotime(date('d-m-Y'));
                            }
                        }                        
                    } 
                }
            }
        }        
        
        return $this->info;
    }

    
}