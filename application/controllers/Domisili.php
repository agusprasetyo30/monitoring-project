<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Domisili extends CI_Controller {
        
        function __construct() {

            parent::__construct();


            // load 
            $this->load->model('M_domisili');
        }

        public function index(){
            
            // data domisili (get all)
            $dataDomisili = $this->M_domisili->getDataTable( null, 'master_domisili' );

            // tampil spesifik
            // $dataDomisili = $this->M_domisili->getDataTable( $where, 'master_domisili' );

            $data = array(

                'folder'    => "domisili",
                'view'      => "V_domisili",

                // variable data
                'domisili'  => $dataDomisili,
            );
            $this->load->view('template/template_backend', $data);
        }



        // proses tambah domisili
        function prosesTambahDomisili() {

            $this->M_domisili->insertDataDomisili();
        }

        // proses tambah domisili
        function prosesTambahSubDomisili() {

            $this->M_domisili->insertDataSubDomisili();
        }



        // proses ubah domisili
        function prosesUbahDomisili() {

            $this->M_domisili->updateDataDomisili();
        }
    


        // proses hapus
        function prosesHapusDomisili( $id_domisili )  {

            $this->M_domisili->deleteDataDomisili( $id_domisili );

        }

        


























        // subdomisili
        function subdomisili( $id_domisili ) {

            $where = ['id_domisili' => $id_domisili];


            // data domisili by id_domisili
            $dataDomisili = $this->M_domisili->getDataTable( $where , 'master_domisili');


            // data subdomisili by id_domisili
            $dataSubDomisili = $this->M_domisili->getDataTable( $where , 'master_subdomisili');

            $data = array(

                'folder'    => "domisili",
                'view'      => "V_subdomisili",

                // variable data
                'subdomisili'  => $dataSubDomisili,
                'domisili'     => $dataDomisili->row_array()
            );
            $this->load->view('template/template_backend', $data);
        }

        // proses ubah domisili
        function prosesUbahSubDomisili() {
 
            $this->M_domisili->updateDataSubDomisili();
        }

        function prosesHapusSubDomisili( $id_subdomisili, $id_domisili )  {

            $this->M_domisili->deleteDataSubDomisili( $id_subdomisili, $id_domisili );

        }

    }
    
    /* End of file Dashboard.php */
     