<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penagihan extends CI_Controller {
        

        function __construct() {

            parent::__construct();


            // keamanan 
            if ( empty( $this->session->userdata('sess_idlogin') ) ) {

                // akun tidak terdaftar (not found)
                $msg = '<div class="alert alert-danger">Akses tidak diizinkan <br> <small>Anda harus login terlebih dahulu</small></div>';
                $this->session->set_flashdata( 'pesan', $msg );

                redirect('login','refresh');
            }





            // load model 
            $this->load->model('M_domisili');


            
        }

        public function index(){
            
            $getDataDomisili = $this->M_domisili->getDataTable(null, 'master_domisili');

            $data = array(

                'folder'    => "penagihan",
                'view'      => "V_penagihan",

                'dataDomisili'  => $getDataDomisili
            );
            $this->load->view('template/template_backend', $data);

        }




        function test() {


            $data = [];

            for ( $i = 0; $i < 18000; $i++ ) {

                array_push( $data, $i );
            }


            echo json_encode( $data );
        }
    
    }
    
    /* End of file Penagihan.php */
    