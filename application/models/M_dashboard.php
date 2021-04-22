<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_dashboard extends CI_Model {
        



        /***
         * 
         *  Dashboard Admin
         */
        function calculatePenagihanByMonth() {

            $dateNow = date('Y-m');
            $sql = "SELECT COUNT(*) AS jumlah FROM penagihan WHERE tanggal_penagihan LIKE '$dateNow%'";

            // execute
            $query = $this->db->query( $sql );
            return $query;
        }

        function calculateAccount(){
            $sql = "SELECT COUNT(*) AS jml FROM user_officer";
            $query = $this->db->query( $sql );
            return $query;
        }

        
        





        
        // get data riwayat transaksi + data pelanggan berdasarkan id_login
        function getRiwayatTransaksiPelangganByIdLogin() {

            $id_login = $this->session->userdata('sess_idlogin');
            $sql = "SELECT riwayat_transaksi.*, data_pelanggan.no_ref, data_pelanggan.nama 
                    FROM riwayat_transaksi 
                    JOIN data_pelanggan ON riwayat_transaksi.no_ref = data_pelanggan.no_ref 
                    
                    WHERE riwayat_transaksi.id_login = '$id_login'                    
                    ORDER BY created_at DESC LIMIT 5";

            // exec query builder 
            $query = $this->db->query( $sql );

            return $query;

        }
    }
    
    /* End of file M_dashboard.php */
    