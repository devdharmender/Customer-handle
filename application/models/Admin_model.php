<?php
    class Admin_model extends CI_Model{

        public function getByUserName($email,$password)
        {
            $this->db->where('email',$email);
            $this->db->where('password',$password);
            $a = $this->db->get('admin')->row();
            // print_r($admin);exit;
            return $a;
        }
    }

?>