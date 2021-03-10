<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_account');
    
    }
    
    // menu utama
    function index(){

        // $dataOfficer = $this->M_account->getDataOfficer();
        // $data = array(

        //     'folder'    => "account",
        //     'view'      => "V_account",

        //     // data
        //     'dataOfficer'   => $dataOfficer
        // );
        // $this->load->view('template/template_backend', $data);

        $data = array(

            'folder'    => "account",
            'view'      => "V_account_menu"
        );
        $this->load->view('template/template_backend', $data);
    }



    /** Controller - Manager */

        function viewManager() {

            $data = array(

                'folder'    => "account/manager",
                'view'      => "V_manager"
            );

            $this->load->view('template/template_backend', $data);
        }

    /** End Controller - Manager */















    /** Controller - Pegawai Kantor */

        function viewPegawaiKantor() {

            $dataOfficer = $this->M_account->getDataOfficer("pegawai_kantor");
            $data = array(

                'folder'    => "account/pegawai_kantor",
                'view'      => "V_pegawai_kantor",

                'dataOfficer'   => $dataOfficer
            );
            $this->load->view('template/template_backend', $data);
        }
    /** End Controller - Pegawai Kantor */

















    /** Controller - Petugas Lapangan */

        function viewPetugasLapangan() {

            $dataOfficer = $this->M_account->getDataOfficer("petugas_lapangan");
            $data = array(

                'folder'    => "account/petugas_lapangan",
                'view'      => "V_petugas_lapangan",

                'dataOfficer'   => $dataOfficer
            );
            $this->load->view('template/template_backend', $data);
        }
    /** End Controller - Petugas Lapangan */














    // view tambah akun
    public function tambahAkun(){
        $data = array(

            'folder'    => "account",
            'view'      => "V_add_account"
        );
        $this->load->view('template/template_backend', $data);
    }


    // proses tambah akun
    function prosesTambahAkun() {

        $this->M_account->insertDataOfficer();
    }

    public function editAkun(){

        $id_login = $this->input->get('id');
        $jabatan  = $this->input->get('jabatan');

        $dataOfficer = $this->M_account->getDataOfficer($jabatan, $id_login);

        if ( $dataOfficer->num_rows() == 1 ) {

            $data = array(

                'folder'    => "account",
                'view'      => "V_edit_account",

                'dataOfficer' => $dataOfficer->row_array()
            );
            $this->load->view('template/template_backend', $data);

        } else {

            show_404();
        }
    }

    // proses ubah akun
    function prosesUbahAkun() {

        $this->M_account->updateDataOfficer();

        // echo "Oke";
    }

    function detailAkun(){
        $data = array(

            'folder'    => "account",
            'view'      => "V_detail_account",

        );
        $this->load->view('template/template_backend', $data);
    }
}

/* End of file Account.php */



?>