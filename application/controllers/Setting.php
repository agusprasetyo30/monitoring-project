<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Setting extends CI_Controller {
        

        function __construct() {

            parent::__construct();

            $this->load->model('M_setting');

       
        }
        
        public function index(){
            
            $data = array(

                'folder'    => "account",
                'view'  => "V_setting_acount",
                
                // 'dataUser'  => $dataUser 
                'account'   => $this->M_setting->getDataUserLogin()
            );
            $this->load->view( 'template/template_backend', $data );
        }   

        function prosesUbahPassword(){
            // var_dump($_POST);
            // die;
            $this->M_setting->onUpdateAccount();
            
            redirect('setting','refresh');
            
        }
    
    }



    /* End of file Setting.php */
    