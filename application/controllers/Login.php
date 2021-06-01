<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // cek sesi login
            // pemanggilan model
            $this->load->model('M_login');
        }

        public function index(){
            
            $data = array(

                // view
                'folder'    => "login",
                'view'      => "V_login"

                // variable 
                // ...
            );
            $this->load->view('template/template_starter', $data);
        }

        // proses login
        function processLogin() {

            $this->M_login->checkAccount();
        }

        // proses logout
        function processLogout() {

            $this->session->sess_destroy();
            redirect('login');
        }
    
    }
    
    /* End of file Login.php */
    