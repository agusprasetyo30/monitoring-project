<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Data_piutang extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here

            
            // load 
            $this->load->model('M_data_piutang'); 
            $this->load->model('M_data_pelanggan');
         
        }
        
    
        public function index()
        {

            // data jenis_pelanggan (get all)
            $datapiutang = $this->M_data_piutang->getDataTable( null, 'piutang' );
            $dataPelanggan = $this->M_data_pelanggan->getDataTable(null, 'data_pelanggan');


            $data = array(
 
                'folder'    => "data_piutang",
                'view'      => "V_data_piutang",
 
                // variable data
                'data_piutang'  => $datapiutang,
                'data_pelanggan'=> $dataPelanggan
             );
             $this->load->view('template/template_backend', $data);
        }

        function prosesTambahPiutang() {

            $this->M_data_piutang->insertDataPiutang();
        }

        function prosesHapusPiutang( $id_piutang )  {
            $this->M_data_piutang->deleteDataPiutang( $id_piutang );
        }

        // proses ubah domisili
        function prosesUbahPiutang() {
            $this->M_data_piutang->updateDataPiutang();
        }






    
       



    
    }
    
    /* End of file Data_pelanggan.php */
    

?>