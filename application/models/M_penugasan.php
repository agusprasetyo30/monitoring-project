<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penugasan extends CI_Model {



        // notifikasi
        function getDataTable($id_penugasan = null) {

            if($id_penugasan){

            $sql="SELECT penugasan.id_penugasan, penugasan.id_pelanggan, penugasan.id_officer, data_pelanggan.no_ref, data_pelanggan.nama, 
            data_pelanggan.alamat, user_officer.id_officer, user_officer.name 
            FROM penugasan 
            JOIN user_officer ON penugasan.id_officer = user_officer.id_officer
            JOIN data_pelanggan ON penugasan.id_pelanggan = data_pelanggan.id_pelanggan 
            WHERE penugasan.id_penugasan = '$id_penugasan'";
            } else{
                $sql="SELECT penugasan.id_penugasan, penugasan.id_pelanggan, penugasan.id_officer, data_pelanggan.no_ref, data_pelanggan.nama, 
                data_pelanggan.alamat, user_officer.id_officer, user_officer.name 
                FROM penugasan 
                JOIN user_officer ON penugasan.id_officer = user_officer.id_officer
                JOIN data_pelanggan ON penugasan.id_pelanggan = data_pelanggan.id_pelanggan";

            }

            $query = $this->db->query( $sql );

            return $query;

            }


             // proses insert ke db
            function insertDataPenugasan() {



                $data = array(

                    'id_officer' => $this->input->post('officer') ,
                    'id_pelanggan'=> $this->input->post('pelanggan'),

                );

                // query insert
                $this->db->insert('penugasan', $data);
                
                
                // flashdata
                $this->session->set_flashdata('msg', 'tambah');

                // kembali ke halaman
                redirect('penugasan');
        }

        function editDataPenugasan() {

            $id = $this->input->post('id');

            $data = array(

                'id_officer' => $this->input->post('officer') ,
                'id_pelanggan'=> $this->input->post('pelanggan'),

            );

            // query insert
            $this->db->where('id_penugasan', $id);
            $this->db->update('penugasan', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('penugasan');
        }

        function deleteDataPenugasan($id_penugasan) {

            $where = ['id_penugasan' => $id_penugasan];
            $this->db->where( $where )->delete('penugasan');
                // flashdata
                $this->session->set_flashdata('msg', 'hapus');
                // kembali ke halaman
                redirect('penugasan');
    }


    }
    
    /* End of file M_dashboard.php */
    