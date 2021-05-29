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

            $dataPenugasan = $this->M_penugasan->getDataTable(null, 'penugasan');
            
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
            $dataPenugasan = $this->M_penugasan->getDataTable(null, 'penugasan');
            
            $data = array(

                'folder'    => "penugasan",
                'view'      => "V_add_penugasan",

                'penugasan' => $dataPenugasan,
            );
            
            $data['user_officer'] = $this->M_account->getDataOfficerByJabatan(null, 'user_officer')->result_array();
            $data['data_pelanggan'] = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan')->result_array();
            $this->load->view('template/template_backend', $data);
        }

          // proses tambah pelanggan
          function prosesTambahPenugasan() {
       
            $this->M_penugasan->insertDataPenugasan();
        }

        
        function suntingPenugasan($id_penugasan){

            $dataPenugasan = $this->M_penugasan->getDataTable(null, 'penugasan');
          
            $data = array(

                'folder'    => "penugasan",
                'view'      => "V_edit_penugasan",

                'penugasan' => $dataPenugasan,
            );
            
            $data['hasil'] = $this->M_penugasan->getDataTable( $id_penugasan, 'penugasan' )->result_array()[0];
            $data['user_officer'] = $this->M_account->getDataOfficerByJabatan(null, 'user_officer')->result_array();
            $data['data_pelanggan'] = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan')->result_array();
            $this->load->view('template/template_backend', $data);
        }

          // proses tambah pelanggan
          function prosesSuntingPenugasan($id_penugasan) {
       
            $this->M_penugasan->editDataPenugasan($id_penugasan);
        }


        // function getPelanggan(){
        //     $petugas =$this->input->post('id_officer');
        //     $data=$this->M_penugasan->getPelanggan($petugas)->result();
        //     foreach ($data as $result) {
        //         $value[] = (float) $result->id_pelanggan;
        //     }
        //     echo json_encode($value);
        // }

        function prosesHapusPenugasan( $id_penugasan )  {
            $this->M_penugasan->deleteDataPenugasan( $id_penugasan );
        }

    }
    
    /* End of file Dashboard.php */
     