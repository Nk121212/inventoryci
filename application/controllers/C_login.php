<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class C_login extends CI_Controller{

        public function index(){
            $this->load->model("M_login");
            $cek_user = $this->M_login->cek_user();
            
            if($cek_user->num_rows() < 1){
                header("Location: ../");
                //echo 'back to home';
            }else{
                //header("Locaion : ../index.php/C_admin");
                echo 'go to admin';
                $this->session->set_userdata(
                    array(
                        'username' => $_POST['username'],
                        'login' => true
                    )
                );
                redirect('C_admin');
            }
        }

    }
?>