<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_admin extends CI_Controller{

        public function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != true){
            redirect(base_url());
        }

        $this->load->model('M_db');

    }

        public function index(){

            $get_produsen = $this->M_db->get_produsen();
            $get_barang = $this->M_db->data_barang();
            $get_konsumen = $this->M_db->get_konsumen();

            $data = array(
                'data_produsen' => $get_produsen,
                'data_konsumen' => $get_konsumen,
                'data_barang' => $get_barang
            );

            $this->load->view('include/include');
            $this->load->view('v_admin', $data);
        }

        public function logout(){

            $this->session->sess_destroy();
            redirect(base_url());

        }

        public function add_brg(){
            
            $this->M_db->add_brg();
        }

        public function get_brg(){
            $data_brg = $this->M_db->data_barang();
            $array = array();
            $i=0;
            foreach($data_brg->result() as $dtbrg){
                //print_r($dtbrg);
                $array[$i]['kd_barang'] = $dtbrg->kd_barang;
                $array[$i]['stok'] = $dtbrg->jumlah;
                $array[$i]['nama_barang'] = $dtbrg->nama_barang;
                $array[$i]['id_produsen'] = $dtbrg->id_produsen;
                $array[$i]['image'] = $dtbrg->image;
                //echo json_encode();
                $i++;
            }

            header('Content-Type: application/json');  // <-- header declaration
            echo json_encode($array, true);
            //print_r($data_brg);
        }

        public function add_Stok(){
            $this->M_db->add_stok();
            //echo "<pre>";
            //print_r($_POST);
        }

    }
?>