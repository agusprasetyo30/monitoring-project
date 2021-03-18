<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Jenis_pelanggan extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // load 
            $this->load->model('M_jenis_pelanggan');
        }

        public function index(){
            
            $data = array(

                'folder'    => "jenis_pelanggan",
                'view'      => "V_jenis_pelanggan"
            );
            $this->load->view('template/template_backend', $data);
        }

        // proses tambah domisili
        function prosesTambahJP() {

            $this->M_domisili->insertDataDomisili( $data );
        }


    
    }
    
    /* End of file Dashboard.php */
    