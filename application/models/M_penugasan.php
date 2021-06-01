<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penugasan extends CI_Model {

        function __construct() {


            
        }



        function getDataPenugasan(){

            return $this->db->get('penugasan');
        }


        function getPenugasanByIdOfficer() {

            $id_login = $this->session->userdata('sess_idlogin');
            $dataOfficer = $this->db->get_where('user_officer', ['id_login' => $id_login])->row_array();


            $id_officer = $dataOfficer['id_officer'];
            $sql = "SELECT data_pelanggan.*, penugasan.* FROM penugasan 
                    JOIN data_pelanggan ON data_pelanggan.id_pelanggan = penugasan.id_pelanggan
                    
                    
                    WHERE penugasan.id_officer = '$id_officer'";
            
            $dataPenugasan = $this->db->query( $sql );
            return $dataPenugasan;
        }


        
        function getDataTable($id_officer = null) {

            if($id_officer){

            $sql="SELECT penugasan.id_penugasan, penugasan.id_pelanggan, penugasan.id_officer, data_pelanggan.no_ref, data_pelanggan.nama, 
            data_pelanggan.alamat, user_officer.id_officer, user_officer.name, user_officer.wilayah_penugasan 
            FROM penugasan 
            JOIN user_officer ON penugasan.id_officer = user_officer.id_officer
            JOIN data_pelanggan ON penugasan.id_pelanggan = data_pelanggan.id_pelanggan 
            WHERE penugasan.id_officer = '$id_officer'";
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


                $data = array();
                $id_pelanggan = $this->input->post('pelanggan');
                foreach ( $id_pelanggan AS $pelanggan ) {

                    array_push( $data, array(

                        'id_officer' => $this->input->post('officer') ,
                        'id_pelanggan'=> $pelanggan,
                    ) );
                }


                // query insert
                // $this->db->insert('penugasan', $data);
                $this->db->insert_batch( 'penugasan', $data );
                
                
                // flashdata
                $this->session->set_flashdata('msg', 'tambah');

                // kembali ke halaman
                redirect('penugasan');
        }

        function editDataPenugasan() {

            $id = $this->input->post('id'); // id officer

            // hapus data lama
            $this->db->where('id_officer', $id)->delete('penugasan');


            // set data baru
            $data = array();
                $id_pelanggan = $this->input->post('pelanggan');
                foreach ( $id_pelanggan AS $pelanggan ) {

                    array_push( $data, array(

                        'id_officer' => $id,
                        'id_pelanggan'=> $pelanggan,
                    ) );
                }
            
            // query insert
            $this->db->insert_batch( 'penugasan', $data );
                
                            
            // // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // // kembali ke halaman
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
    