<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Data_pelanggan extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here

            
            // load 
            $this->load->model('M_data_pelanggan');
        }
        
    
        public function index()
        {

              // data pelanggan (get all)
              $dataPelanggan = $this->M_data_pelanggan->getDataTable( null, 'data_pelanggan' );

            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_data_pelanggan",

                // variable data
                'data_pelanggan'  => $dataPelanggan,
            );
            $this->load->view('template/template_backend', $data);
        }
        
        // proses tambah pelanggan
        function prosesTambahPelanggan() {
            $this->M_data_pelanggan->insertDataPelanggan();
        }
    
    }
    
    /* End of file Data_pelanggan.php */
    

?>