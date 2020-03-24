<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_db extends CI_Model{

        private $tbl_beli;
        private $tbl_jual;

        public function __construct(){
            parent::__construct();
            $this->set_tbl('beli','jual'); 
        }

        public function set_tbl($val1,$val2){
            $this->tbl_beli = $val1;
            $this->tbl_jual = $val2;
        }

        /*public function set_tbl_jual($val){
            $this->tbl_jual = $val;
        }*/

        public function add_brg(){
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('name_pada_input_file'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    //$this->load->view('v_admin', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    //$this->load->view('v_admin', $data);
            }

            print_r($_POST);
            //echo $this->tbl_jual;
        }
        
    }

?>