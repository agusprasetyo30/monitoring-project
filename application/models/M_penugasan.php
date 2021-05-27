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

    }
    
    /* End of file M_dashboard.php */
    