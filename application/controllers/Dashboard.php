<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {
        
        function __construct() {

            parent::__construct();
        }

        public function index(){
            
            $data = array(

                'folder'    => "dashboard",
                'view'      => "V_dashboard"
            );
            $this->load->view('template/template_backend', $data);
        }
    
    }
    
    /* End of file Dashboard.php */
    