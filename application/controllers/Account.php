<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_account');
    
    }
    

    function index(){

        $dataOfficer = $this->M_account->getDataOfficer();
        $data = array(

            'folder'    => "account",
            'view'      => "V_account",

            // data
            'dataOfficer'   => $dataOfficer
        );
        $this->load->view('template/template_backend', $data);
    }

    public function tambahAkun(){
        $data = array(

            'folder'    => "account",
            'view'      => "V_add_account"
        );
        $this->load->view('template/template_backend', $data);
    }


    function prosesTambahAkun() {

        $this->M_account->insertDataOfficer();
    }

    public function editAkun(){
        $data = array(

            'folder'    => "account",
            'view'      => "V_edit_account"
        );
        $this->load->view('template/template_backend', $data);
    }
}

/* End of file Account.php */



?>