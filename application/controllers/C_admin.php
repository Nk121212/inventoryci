<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_admin extends CI_Controller{

        public function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != true){
            redirect(base_url());
        }
    }

        public function index(){
            $this->load->Model('M_db');
           // echo $this->M_db->printval();
            //$this->session->userdata('username');
            $this->load->view('my_css/my_css');
            $this->load->view('v_admin');
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }

        public function add_brg(){
            $this->load->model('M_db');
            $this->M_db->add_brg();
        }

    }
?>