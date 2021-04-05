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
            $this->load->model('M_data_piutang');


            
        }

        public function index(){
            
            $getDataDomisili = $this->M_domisili->getDataTable(null, 'master_domisili');
            $getDataAllPiutang = $this->M_data_piutang->getAllDataPiutang();


            $rekapAllPiutang = array();
            $filter_wilayah = $this->input->get('wilayah');
            $filter_bulan   = $this->input->get('month');

            

                if ( count($getDataAllPiutang) > 0 ) {


                    foreach ( $getDataAllPiutang AS $rowPiutang ) {


                        // menggunakan filter wilayah
                        if ( !empty( $filter_wilayah ) ) {

                            $dataWilayah = $rowPiutang['informasi_detail']['wilayah'].'-'.$rowPiutang['informasi_detail']['kota'];
                            // [informasi_detail][wilayah] = kota | [informasi_detail][kota] = probolinggo 
                            // $dataWilayah = kota-Probolinggo

                            // filter wilayah
                            if ( $filter_wilayah == $dataWilayah ) {


                                if ( !empty($filter_bulan) && ($rowPiutang['informasi_detail']['total_bulan'] >= 3) ){


                                    // push 
                                    array_push( $rekapAllPiutang, $rowPiutang );



                                // filter bulan kosong
                                } else if ( empty($filter_bulan) ) {

                                    // push 
                                    array_push( $rekapAllPiutang, $rowPiutang );
                                }
                            }


                        // menampilkan seluruh wilayah
                        } else if ( empty( $filter_wilayah ) ) {


                            if ( !empty($filter_bulan) && ($rowPiutang['informasi_detail'] >= 3) ){


                                // push 
                                array_push( $rekapAllPiutang, $rowPiutang );


                            // filter bulan kosong
                            } else if ( empty($filter_bulan) ) {

                                // push 
                                array_push( $rekapAllPiutang, $rowPiutang );
                            }
                        }
                    }
            } else {

                $rekapAllPiutang = $getDataAllPiutang;
            }







            $data = array(

                'folder'    => "penagihan",
                'view'      => "V_penagihan",

                'dataDomisili'  => $getDataDomisili,
                'dataPiutang'   => $rekapAllPiutang
            );
            $this->load->view('template/template_backend', $data);
        }





        function detail( $id = null) {

            
        }



    
    }
    
    /* End of file Penagihan.php */
    