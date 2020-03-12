<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_login extends CI_Model{

        public function cek_user(){
            //return $_POST;
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = $this->db->get_where('tbl_user', array('username' => $username, 'password' => MD5($password)));
            
            return $query;  
        }
        
    }

?>