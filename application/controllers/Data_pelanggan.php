<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Data_pelanggan extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here

            
            // load 
            $this->load->model('M_data_pelanggan');
            $this->load->model('M_jenis_pelanggan');
            $this->load->model('M_domisili');
         
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

        function tambahPelanggan(){
            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_add_pelanggan"
            );
           
            $data['master_jenis_pelanggan'] = $this->M_jenis_pelanggan->getDataTable(null, 'master_jenis_pelanggan')->result_array();
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $data['master_subdomisili'] = $this->M_domisili->getDataTable(null, 'master_subdomisili')->result_array();
            // var_dump($data);
            // die();
            $this->load->view('template/template_backend', $data);
        }
        
        // proses tambah pelanggan
        function prosesTambahPelanggan() {
       
            $this->M_data_pelanggan->insertDataPelanggan();
        }

        function editPelanggan($id_pelanggan){

            $data = array(

                'folder'    => "data_pelanggan",
                'view'      => "V_edit_pelanggan"
            );

           
            $data['hasil'] = $this->M_data_pelanggan->getDataTable( $id_pelanggan, 'data_pelanggan' )->result_array()[0];
            $data['master_jenis_pelanggan'] = $this->M_jenis_pelanggan->getDataTable(null, 'master_jenis_pelanggan')->result_array();
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $data['master_subdomisili'] = $this->M_domisili->getDataTable(null, 'master_subdomisili')->result_array();
            // var_dump($data);
            // die();
            $this->load->view('template/template_backend', $data);


        }

        function prosesEditPelanggan($id_pelanggan) {
       
            $this->M_data_pelanggan->editDataPelanggan($id_pelanggan);
        }

        function prosesHapusPelanggan( $id_pelanggan)  {
            // var_dump($this->M_data_pelanggan);
            // die();
            $this->M_data_pelanggan->deleteDataPelanggan( $id_pelanggan );
        }

        function importData(){
            $data = array(

                'folder'    => "data_piutang",
                'view'      => "V_import_excel",

                // variable data
            );
            $data['master_domisili'] = $this->M_domisili->getDataTable(null, 'master_domisili')->result_array();
            $this->load->view('template/template_backend', $data);
        }

    }
    
    /* End of file Data_pelanggan.php */
    

?>