<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_data_piutang extends CI_Model {

        //menampilkan data pelanggan
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
        function insertDataPiutang() {

            $data = array(

                'no_ref'         => $this->input->post('no_ref'),
                'tahun'          => $this->input->post('tahun'),
                'bulan'          => $this->input->post('bulan'),
                'nominal'        => $this->input->post('nominal'),
                'keterangan'     => $this->input->post('keterangan'),
                'alasan'         => $this->input->post('alasan'),
            );


            // query insert
            $this->db->insert('piutang', $data);
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('data_piutang');
        }

        function deleteDataPiutang( $id_piutang ) {
            // hapus data master_domisili
            $where = ['id_piutang' => $id_piutang];
            $this->db->where( $where )->delete('piutang');
                // flashdata
                $this->session->set_flashdata('msg', 'hapus');
                // kembali ke halaman
                redirect('data_piutang');
        }


        // update
        function updateDataPiutang() {


            // element input type hidden
            $id = $this->input->post('id');

            $data = array(

                'no_ref'         => $this->input->post('no_ref'),
                'tahun'          => $this->input->post('tahun'),
                'bulan'          => $this->input->post('bulan'),
                'nominal'        => $this->input->post('nominal'),
                'keterangan'     => $this->input->post('keterangan'),
                'alasan'         => $this->input->post('alasan'),
            );

            $this->db->where('id_piutang', $id);
            $this->db->update('piutang', $data);


            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('data_piutang');
        }


       
    }

?>