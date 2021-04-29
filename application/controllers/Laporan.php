<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // load 
        
        }

        public function index(){

            // data jenis_pelanggan (get all)
          
            
            $data = array(

                'folder'    => "report",
                'view'      => "V_laporan.php",

               
            );
            $this->load->view('template/template_backend', $data);
        }

    

    
    }
    
    /* End of file Dashboard.php */
    