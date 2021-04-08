<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_setting extends CI_Model {


            // menampilkan data akun login
        function getDataTable( $where = null, $table ) {

            if ( $where ) {
                return $this->db->get_where($table, $where);    
            } else {
              return $this->db->get($table);
            }
        }


        // update account
        function onUpdateAccount( $where, $data ){
            return $this->db->where( $where )->update('user_login', $data);
        }
    
        
    
    }
    
    /* End of file M_Setting.php */
    

?>