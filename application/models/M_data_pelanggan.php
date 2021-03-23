<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_data_pelanggan extends CI_Model {

        //menampilkan data pelanggan
        function getDataTable( $where = null, $table ) {

            if ( $where ) {
                // SELECT  * FROM data_pelanggan WHERE id = 'x'
                return $this->db->get_where($table, $where);

            } else {

                // tidak menampilkan data secara spesifik
                // SELECT * FROM data_pelanggan
                return $this->db->get($table);
            }
        }
    }
    
    /* End of file M_data_pelanggan.php */
    


?>