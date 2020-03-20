<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_db extends CI_Model{

        private $tbl;

        public function __construct(){
            parent::__construct();
            $this->setval('ahay');   
        }

        public function setval($val){
            $this->tbl = $val;
        }

        public function printval(){
            echo $this->tbl;
        }
        
    }

?>