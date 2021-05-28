<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penugasan extends CI_Controller {
        
        function __construct() {

            parent::__construct();


            
            $this->load->model('M_penugasan');
            $this->load->model('M_account');
            $this->load->model('M_data_pelanggan');
        }

        public function index(){

            $dataPenugasan = $this->M_penugasan->getDataTable(null, 'penugasan')->result_array();
            
            $data = array(

                'folder'    => "penugasan",
                'view'      => "V_penugasan_utama",

                'penugasan' => $dataPenugasan,

              
            );

            $data['user_officer'] = $this->M_account->getDataOfficerByJabatan(null, 'user_officer')->result_array();
            $data['data_pelanggan'] = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan')->result_array();
            $this->load->view('template/template_backend', $data);
        }


        function tambahPenugasan(){
            $dataPenugasan = $this->M_penugasan->getDataTable(null, 'penugasan')->result_array();
            $data = array(

                'folder'    => "penugasan",
                'view'      => "V_add_penugasan"
            );
            
            $data['user_officer'] = $this->M_account->getDataOfficerByJabatan(null, 'user_officer')->result_array();
            $data['data_pelanggan'] = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan')->result_array();
            $this->load->view('template/template_backend', $data);
        }

          // proses tambah pelanggan
          function prosesTambahPenugasan() {
       
            $this->M_penugasan->insertDataPenugasan();
        }


        // public function pilihPenugasan(){

        //     $data['data_pelanggan'] = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan')->result_array();
        //     $data = array(

        //         'folder'    => "penugasan",
        //         'view'      => "V_penugasan_pelanggan",

        //     );

        //     $this->load->view('template/template_backend', $data);
        // }

      

    }
    
    /* End of file Dashboard.php */
     