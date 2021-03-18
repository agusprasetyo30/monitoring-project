<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_pelanggan extends CI_Model {


        //menampilkan data jenis pelanggan
        function getDataTable( $where = null, $table ) {

            if ( $where ) {
                // SELECT  * FROM master_jenis_pelanggan WHERE id = 'x'
                return $this->db->get_where($table, $where);

            } else {

                // tidak menampilkan data secara spesifik
                // SELECT * FROM master_jenispelanggan
                return $this->db->get($table);
            }
        }


        
        // proses insert ke db
        function insertDataJP() {

            $data = array(

                'nama_jenis'      => $this->input->post('nama_jenis_pelanggan')
            );


            // query insert
            $this->db->insert('master_jenis_pelanggan', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('jenis_pelanggan');
        }


    

    

}

/* End of file M_jenis_pelanggan.php */





?>