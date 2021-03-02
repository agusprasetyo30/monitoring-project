<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    
    }
    

    public function index()
    {
        $data = array(

            'folder'    => "account",
            'view'      => "V_account"
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