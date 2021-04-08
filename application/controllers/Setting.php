<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Setting extends CI_Controller {
        

        function __construct() {

            parent::__construct();

            $this->load->model('M_setting');

       
        }

        // csrf
        function getCSRF() {
            $data = array(
        
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
                echo json_encode( $data );
        }
        

        public function index(){
            
            $id_userinfo = $this->session->userdata('sess_id_user_info');
            $dataUser = $this->account->getAccountByAdmin();

            if ( $this->session->userdata('sess_type') != "owner" ) {

                $dataUser = $this->account->getDataAccount(['id_user_info' => $id_userinfo]);
            }
            // $dataEmail  = $this->setting->getDataEmail( ['type' => $typeAccount] );
            $data = array(

                'folder'    => "account",
                'view'  => "V_setting_acount",

                // 'response'  => $dataEmail,
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                
                'dataUser'  => $dataUser
            );
            $this->load->view( 'template/backend_template', $data );
        }   



        function onUpdateAccount() {

            $where = array('id_login' => $this->session->userdata('sess_id'));
            
            // init
            $old_password = $this->input->get('old-password');
            $dataLogin = $this->account->getDataLogin( $where )->row()->password;

            if ( password_verify( $old_password, $dataLogin ) ) {

                $data  = array(

                    'password'  => password_hash($this->input->get('new-password'), PASSWORD_BCRYPT)
                );
    
                $this->setting->onUpdateAccount( $where, $data );
                echo json_encode( true );
            
            } else echo json_encode( false );



            
        }
        



        // // load view account setting
        // function onLoadViewAccount() {

        //     $id_userinfo = $this->session->userdata('sess_id_user_info');
        //     $dataUser = $this->account->getAccountByAdmin();

        //     if ( $this->session->userdata('sess_type') != "owner" ) {

        //         $dataUser = $this->account->getDataAccount(['id_user_info' => $id_userinfo]);
        //     }
        //     // $dataEmail  = $this->setting->getDataEmail( ['type' => $typeAccount] );
        //     $data = array(

        //         'folder'    => "account",
        //         'view'      => "V_setting_acount",

        //         // 'response'  => $dataEmail,
        //         'name' => $this->security->get_csrf_token_name(),
        //         'hash' => $this->security->get_csrf_hash(),
                
        //         'dataUser'  => $dataUser
        //     );
        //     $this->load->view( 'template/template_backend', $data );
        // }



        // function onUpdateAccount() {

        //     $where = array('id_login' => $this->session->userdata('sess_id'));
            
        //     // init
        //     $old_password = $this->input->get('old-password');
        //     $dataLogin = $this->account->getDataLogin( $where )->row()->password;

        //     if ( password_verify( $old_password, $dataLogin ) ) {

        //         $data  = array(

        //             'password'  => password_hash($this->input->get('new-password'), PASSWORD_BCRYPT)
        //         );
    
        //         $this->setting->onUpdateAccount( $where, $data );
        //         echo json_encode( true );
            
        //     } else echo json_encode( false );



            
        // }
    }



    /* End of file Setting.php */
    