<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_data_pelanggan extends CI_Model {

        //menampilkan data pelanggan
        function getDataTable( $id_pelanggan = null) {

            if ( $id_pelanggan ) { // ada idnya / isinya

                $sql = "SELECT * FROM data_pelanggan";
            }
            
            $query = $this->db->query($sql);

            return $query;
        }


        // proses insert ke db
        function insertDataPelanggan() {

            $id_pelanggan =  $this->input->post('id_domisili');


            $data = array(

                'no_ref' => $this->input->post('no_ref') ,
                'nama'=> $this->input->post('nama_pelanggan'),
                'alamat'   => $this->input->post('alamat'),
                'id_jenis_pelanggan'   => $this->input->post('jenis'),
                'id_domisili'   => $this->input->post('domisili'),
                'id_subdomisili'   => $this->input->post('subdomisili'),

            );

            // query insert
            $this->db->insert('data_pelanggan', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('data_pelanggan');
        }


    }
    
    /* End of file M_data_pelanggan.php */
    


?>