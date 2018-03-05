<?php

class AjaxDatatableFunctionModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_member_name($memberId) 
    {
        $this->db->where('memberAcID',$memberId);
        $query = $this->db->get('members');
        if($query->num_rows() > 0){
            return $query->row()->memberName;
        }
    }
}


