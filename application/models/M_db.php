<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_db extends CI_Model{

        /*private $tbl_beli;
        private $tbl_jual;

        public function __construct(){
            parent::__construct();
            $this->set_tbl('beli','jual'); 
        }

        public function set_tbl($val1,$val2){
            $this->tbl_beli = $val1;
            $this->tbl_jual = $val2;
        }*/

        public function get_produsen(){
            $query = $this->db->get('produsen');
            return $query;
        }

        public function get_konsumen(){
            $query = $this->db->get('konsumen');
            return $query;
        }

        public function data_barang(){

            if(isset($_POST['kd_brg'])){
                $kode_brg = $_POST['kd_brg'];
                $query = $this->db->query("
                    SELECT a.kd_barang, a.jumlah, b.nama_barang, a.jumlah, b.id_produsen, b.image FROM stok a 
                    left join beli b on a.kd_barang = b.kd_barang
                    WHERE a.kd_barang = '$kode_brg'
                    GROUP BY a.kd_barang;
                ");
            }else{
                $query = $this->db->query('
                    SELECT a.kd_barang, a.jumlah, b.nama_barang, a.jumlah, b.id_produsen, b.image FROM stok a 
                    left join beli b on a.kd_barang = b.kd_barang
                    GROUP BY a.kd_barang;
                ');
            }

            return $query;

        }
        /*public function set_tbl_jual($val){
            $this->tbl_jual = $val;
        }*/

        public function add_brg(){
            
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = '*';
            $config['max_width']            = '*';
            $config['max_height']           = '*';
            //$config['encrypt_name']         = true;
            $config['overwrite']            = true;



            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('img-brgb'))
            {
                    echo $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    //$this->load->view('v_admin', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    //$this->load->view('v_admin', $data);
                    //echo json_encode($_POST);
                    $filename = base_url().'uploads/'.$this->upload->data('file_name');
                    $nama_brg = $this->input->post('nm_brg');
                    $stok = $this->input->post('stokbrgb');
                    $produsen = $this->input->post('id_produsen');
                    $harga_beli = str_replace("Rp. ", "", $this->input->post('harga_beli'));
                    $pengeluaran = str_replace(".","",$harga_beli);

                    $cek = $this->db->query("SELECT nama_barang FROM beli WHERE nama_barang = '$nama_brg'");
                    
                    if($cek->num_rows() < 1){

                        $this->db->query("
                            INSERT INTO beli(kd_barang, nama_barang, jumlah, id_produsen, image, tgl_masuk, pengeluaran) 
                            VALUES(CONCAT('BRG-', 
                            (SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'beli' 
                            and table_schema = 'db_inv')
                            ), '$nama_brg', $stok, $produsen, '$filename', NOW(), $pengeluaran);
                        ");

                        redirect('C_admin');

                    }else{
                        $this->session->set_flashdata('warning', 'Data Sudah Ada Silakan Tambah Stok');
                        redirect('C_admin');
                    }

            }
            //echo $this->tbl_jual;
        }

        public function add_stok(){

            $id_brg = $this->input->post('nm_brg2');
            $stok = $this->input->post('stokbrg');
            $produsen = $this->input->post('id_produsen2');
            $nama_barang = $this->input->post('nama_barang');
            $image = $this->input->post('img_stok');

            $query = $this->db->query("
                INSERT INTO beli(kd_barang, nama_barang, jumlah, id_produsen, image, tgl_masuk) 
                VALUES('$id_brg', '$nama_barang', $stok, $produsen, '$image', NOW());
            ");

            if($query){
                $this->session->set_flashdata('warning2', 'Berhasil Menambahkan Stok');
            }else{

            }
            
            redirect('C_admin');

        }
        
    }

?>