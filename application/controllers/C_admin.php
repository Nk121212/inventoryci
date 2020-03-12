<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_admin extends CI_Controller{

        public function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != true){
            redirect('../../../..');
        }
    }

        public function index(){

            //echo $this->session->userdata('username');
            $this->load->view('v_admin');
        }

    }
?>