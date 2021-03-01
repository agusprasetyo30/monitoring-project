<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Domisili extends CI_Controller {
        
        function __construct() {

            parent::__construct();
        }

        public function index(){
            
            $data = array(

                'folder'    => "domisili",
                'view'      => "V_domisili"
            );

       
            $this->load->view('template/template_backend', $data);
        }
    
    }
    
    /* End of file Dashboard.php */
    