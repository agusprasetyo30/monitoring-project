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
            $sess_jabatan = $this->session->userdata('sess_jabatan');
            // super_admin | admin | employee

            
            // pengecekan hak akses
            if ( $sess_level != "employee" || $sess_jabatan == "pegawai_kantor" ) {

                // view :: pegawai kantor
                $data = array(

                    'folder'    => "dashboard",
                    'view'      => "V_dashboard",
                    
                    'calPenagihan' => $this->M_dashboard->calculatePenagihanByMonth()->row(),
                    'calAccount' => $this->M_dashboard->calculateAccount()->row(),

                    'totalPenagihan' => $this->M_dashboard->totalPenagihan(),
                    'persen_piutang'        => $this->M_dashboard->percentagePiutang(),
                    'persen_pencabutan'     => $this->M_dashboard->percentagePencabutan(),


                    // untuk tampilan bawah chart
                    'totalPiutangPencabutan'=> $this->M_dashboard->totalPencabutan_dan_piutang()
                  
                    
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






        // notifikasi
        function ambilNotifikasi() {

         

            $data = array(

                'folder'    => "dashboard",
                'view'      => "V_notifikasi",
                
                'notifikasi'   => $this->M_dashboard->cekDataNotifikasi()

               
            );
            $this->load->view('template/template_backend', $data);
        }







        function grafik() {

            $data = $this->M_dashboard->dataGrafik();

            echo json_encode( $data );
        }
    
    }
    
    /* End of file Dashboard.php */
    