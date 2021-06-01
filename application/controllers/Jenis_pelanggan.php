<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Jenis_pelanggan extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // load 
            $this->load->model('M_jenis_pelanggan');
        }

        public function index(){

            // data jenis_pelanggan (get all)
            $datajenispelanggan = $this->M_jenis_pelanggan->getDataTable( null, 'master_jenis_pelanggan' );
            
            $data = array(

                'folder'    => "jenis_pelanggan",
                'view'      => "V_jenis_pelanggan",

                 // variable data
                 'jenis_pelanggan'  => $datajenispelanggan
            );
            $this->load->view('template/template_backend', $data);
        }

        // proses tambah domisili
        function prosesTambahJP() {

            $this->M_jenis_pelanggan->insertDataJP( $data );
        }

        // proses hapus
        function prosesHapusJP( $id_jenis_pelanggan )  {
            $this->M_jenis_pelanggan->deleteDataJP( $id_jenis_pelanggan );
        }

        // proses ubah domisili
        function prosesUbahJP() {
            $this->M_jenis_pelanggan->updateDataJP();
        }


    
    }
    
    /* End of file Dashboard.php */
    