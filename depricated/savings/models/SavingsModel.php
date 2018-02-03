<?php

class SavingsModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }

    public function userList()
    {
        return $this->db->get('members')->result();
    }

    public function userInfoById($memId)
    {
        return $this->db->get_where('members', array('memId' => $memId))->row();
    }

    public function savingsData($postData)
    {
        $this->db->insert('savings', $postData);
    }

    public function userOverView($memId)
    {
        return $this->db->get_where('savings', array('memberId' => $memId))->result();
    }

    public function deleteSaving($savingId)
    {
        $this->db->delete('savings', array('id' => $savingId));
    }

    public function updateSavingsData($id, $postData)
    {
        $this->db->update('savings', $postData, array('id' => $id));
    }

    
}