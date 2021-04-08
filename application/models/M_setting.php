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
        function onUpdateAccount( $where, $data ){
            return $this->db->where( $where )->update('user_login', $data);
        }
    
        
    
    }
    
    /* End of file M_Setting.php */
    

?>