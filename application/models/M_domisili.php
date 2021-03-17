<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_domisili extends CI_Model {
        


        // menampilkan data domisili
        function getDataTable( $where = null, $table ) {

            if ( $where ) {
                // SELECT  * FROM master_domisili WHERE id = 'x'
                return $this->db->get_where($table, $where);

            } else {

                // tidak menampilkan data secara spesifik
                // SELECT * FROM master_domisili
                return $this->db->get($table);
            }
        }

        

        // proses insert ke db
        function insertDataDomisili() {


            $data = array(

                'kota'      => $this->input->post('nama_domisili'),
                'wilayah'   => $this->input->post('wilayah'),
            );


            // query insert
            $this->db->insert('master_domisili', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('domisili');
        }




        // update
        function updateDataDomisili() {


            // element input type hidden
            $id = $this->input->post('id');

            $data = array(

                'kota'      => $this->input->post('nama_domisili'),
                'wilayah'   => $this->input->post('wilayah'),
            );

            $this->db->where('id_domisili', $id);
            $this->db->update('master_domisili', $data);


            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('domisili');
        }




        // delete
        function deleteDataDomisili( $id_domisili ) {

            // hapus data master_domisili
            $where = ['id_domisili' => $id_domisili];
            $this->db->where( $where )->delete('master_domisili');


            // flashdata
            $this->session->set_flashdata('msg', 'hapus');

            // kembali ke halaman
            redirect('domisili');
        }

        // UPDATE master_domisili SET ..... WHERE id = x









    
    }
    
    /* End of file M_domisili.php */
    