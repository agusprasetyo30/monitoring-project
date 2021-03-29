<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_data_piutang extends CI_Model {

        //menampilkan data pelanggan
        function getDataTable( $id_piutang = null ) {

         
            if ( $id_piutang ) { // ada idnya / isinya


                $sql = "SELECT 
                    piutang.id_piutang, piutang.no_ref, piutang.tahun, piutang.bulan, piutang.nominal,piutang.keterangan, piutang.alasan, 
                    data_pelanggan.id_pelanggan, data_pelanggan.nama, data_pelanggan.no_ref
                    FROM piutang
                    JOIN data_pelanggan ON piutang.no_ref = data_pelanggan.no_ref 
                    WHERE piutang.id_piutang = '$id_piutang'";
            } else { 
                $sql = "SELECT 
                    piutang.id_piutang, piutang.no_ref, piutang.tahun, piutang.bulan, piutang.nominal,piutang.keterangan, piutang.alasan, 
                    data_pelanggan.id_pelanggan, data_pelanggan.nama, data_pelanggan.no_ref
                    FROM piutang
                    JOIN data_pelanggan ON piutang.no_ref = data_pelanggan.no_ref";
            }
            
            $query = $this->db->query($sql);

            return $query;
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
        function updateDataPiutang($id_piutang) {


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