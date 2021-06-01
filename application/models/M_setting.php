<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_setting extends CI_Model {


        // get data user login by id_profile 
        function getDataUserLogin() {


            $id_login = $this->session->userdata('sess_idlogin');

            $query = "SELECT * FROM `user_login` WHERE id_login = '$id_login'";
            return $this->db->query( $query )->row_array();
            
        }


        // update account
         function onUpdateAccount() {

            $where = array('id_login' => $this->session->userdata('sess_idlogin'));
            
            
            // init
            $old_password = $this->input->post('old-password');
           
            $dataLogin = $this->getDataUserLogin();
            $new_password = $dataLogin['password'];

            // var_dump($dataLogin);
            // die;
            if ( password_verify( $old_password, $new_password ) ) {
               

                $data  = array(

                    'password'  => password_hash($this->input->post('new-password'), PASSWORD_BCRYPT)
                );
                // var_dump($data);
                // die;
    
                $this->db->where($where);
                $this->db->update('user_login', $data);
                $msg = '<div class="alert alert-success"><small>Kata sandi berhasil diubah</small></div>';
                $this->session->set_flashdata( 'refresh', $msg );

            
            } else{
                $msg = '<div class="alert alert-danger"><small>Kata sandi lama salah</small></div>';
                $this->session->set_flashdata( 'refresh', $msg );
        }
    }
        
    
    }
    
    /* End of file M_Setting.php */
    

?>