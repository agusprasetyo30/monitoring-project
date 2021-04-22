<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {
        
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
            $this->load->model('M_dashboard');
        }

        public function index(){
            
            $sess_level = $this->session->userdata('sess_level');

            // super_admin | admin | employee

            
            // pengecekan hak akses
            if ( $sess_level != "employee" ) {

                // view :: pegawai kantor
                $data = array(

                    'folder'    => "dashboard",
                    'view'      => "V_dashboard",
                    
                    'calPenagihan' => $this->M_dashboard->calculatePenagihanByMonth()->row(),
                    'calAccount' => $this->M_dashboard->calculateAccount()->row()
                  
                   
                );
                $this->load->view('template/template_backend', $data);


            } else {

                // view pegawai
                $data = array(

                    'folder'    => "dashboard",
                    'view'      => "V_dashboard_lapangan",

                    'riwayat'   => $this->M_dashboard->getRiwayatTransaksiPelangganByIdLogin()
                );
                $this->load->view('template/template_backend', $data);
            }

            
            
        }
    
    }
    
    /* End of file Dashboard.php */
    