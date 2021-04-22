<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_data_pelanggan extends CI_Model {

        //menampilkan data pelanggan
        function getDataTable( $id_pelanggan = null) {


            if ( $id_pelanggan ) { // ada idnya / isinya


                $sql = "SELECT 
                    data_pelanggan.pencabutan, data_pelanggan.id_pelanggan, data_pelanggan.no_ref, data_pelanggan.nama, data_pelanggan.alamat,
                    master_domisili.id_domisili, master_subdomisili.id_subdomisili, master_domisili.kota, master_domisili.wilayah, master_subdomisili.kelurahan, master_subdomisili.kecamatan
                    FROM data_pelanggan
                    JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                    JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili
                    WHERE data_pelanggan.id_pelanggan = '$id_pelanggan'";
            } else { 
                $sql = "SELECT 
                    data_pelanggan.pencabutan, data_pelanggan.id_pelanggan, data_pelanggan.no_ref, data_pelanggan.nama, data_pelanggan.alamat,
                    master_domisili.id_domisili, master_subdomisili.id_subdomisili, master_domisili.kota, master_domisili.wilayah, master_subdomisili.kelurahan, master_subdomisili.kecamatan
                    FROM data_pelanggan
                    JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                    JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili";
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
                'pencabutan'   => $this->input->post('pencabutan'),

            );

            // query insert
            $this->db->insert('data_pelanggan', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('data_pelanggan');
        }

        function EditDataPelanggan($id_pelanggan) {
            
            $data = array(

                'no_ref' => $this->input->post('no_ref') ,
                'nama'=> $this->input->post('nama_pelanggan'),
                'alamat'   => $this->input->post('alamat'),
                'id_jenis_pelanggan'   => $this->input->post('jenis'),
                'id_domisili'   => $this->input->post('domisili'),
                'id_subdomisili'   => $this->input->post('subdomisili'),
                'pencabutan'   => $this->input->post('cabut'),
            );

            $this->db->where('id_pelanggan', $id_pelanggan);
            $this->db->update('data_pelanggan', $data);


            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('data_pelanggan');
        }

    
    /* End of file M_data_pelanggan.php */
    
    function deleteDataPelanggan( $id_pelanggan ) {
        // hapus data pelanggan
        // var_dump($id_pelanggan);
        // die();
        $where = ['id_pelanggan' => $id_pelanggan];
        $this->db->where( $where )->delete('data_pelanggan');
            // flashdata
            $this->session->set_flashdata('msg', 'hapus');
            // kembali ke halaman
            redirect('data_pelanggan');
        }
    }

?>