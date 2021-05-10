<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_dashboard extends CI_Model {



        // notifikasi
        function cekDataNotifikasi() {

            $this->db->select('user_login.username, penagihan.*')->from('penagihan');
            $this->db->join('user_login', 'user_login.id_login = penagihan.id_login');

            $ambilDataPenagihan = $this->db->get();

            $data_notif = array();

            if ( $ambilDataPenagihan->num_rows() > 0 ) {

                foreach ( $ambilDataPenagihan->result_array() AS $notifikasi ) {

                    echo '<h4>Notifikasi <small>'.$notifikasi['tanggal_penagihan'].'</small></h4>';
                    echo 'Atas nama '. $notifikasi['username'].' telah melakukan penagihan kepada no_ref '. $notifikasi['no_ref'].'<br>';
                    echo '<h2 style="margin: 0px">'.number_format($notifikasi['pembayaran']).'</h2>';
                    echo 'Status tagihan : '. $notifikasi['status_penagihan'];
                    echo '<hr>';


                }
            }
        }







        // menghitung keseluruhan dari pencabutan dan piutang
        function totalPencabutan_dan_piutang() {

            $tahun = date('Y');

            $sqlPencabutan = "SELECT YEAR(tanggal_pencabutan) FROM data_pelanggan WHERE pencabutan = 'iya' AND YEAR(tanggal_pencabutan) = '$tahun'";
            $totalPencabutan = $this->db->query( $sqlPencabutan )->num_rows();

            $sqlPiutang = "SELECT * FROM piutang WHERE tahun = '$tahun' ";
            $totalPiutang = $this->db->query( $sqlPiutang )->num_rows();

            return array($totalPencabutan, $totalPiutang);
        }




        /***
         * 
         *  Dashboard Admin
         */

        function totalPenagihan() {

            $month = date('F');
            $year  = date('Y');

            $sql = "SELECT MONTHNAME(tanggal_penagihan) AS bulan, 
                        YEAR(tanggal_penagihan) AS tahun, 
                        SUM(pembayaran) AS bayar 
                    FROM penagihan 
                    WHERE MONTHNAME(tanggal_penagihan) = '$month' AND YEAR(tanggal_penagihan) = '$year'";

            return $this->db->query( $sql )->row_array();
        }





        function percentagePiutang() {

            $sqlTotalPiutang = "SELECT no_ref FROM piutang GROUP BY no_ref";
            $totalPiutang    = $this->db->query( $sqlTotalPiutang )->num_rows();

            $totalPelanggan = $this->db->get('data_pelanggan')->num_rows();

            $persentase = 0;
            if ( $totalPelanggan > 0 ) {

                $persentase = $totalPiutang / $totalPelanggan * 100;
            }

            

            return array($totalPiutang, $persentase);
        }


        function percentagePencabutan() {

            $sqlTotalPencabutan = "SELECT * FROM data_pelanggan WHERE pencabutan = 'iya'";
            $totalPencabutan = $this->db->query( $sqlTotalPencabutan )->num_rows();

            $totalPelanggan = $this->db->get('data_pelanggan')->num_rows();


            $persentase = 0;

            if ( $totalPelanggan > 0 ) {

                $persentase = $totalPencabutan / $totalPelanggan * 100;
            }

            return array($totalPencabutan, $persentase);
        }











        // chart morris
        function dataGrafik() {

            $dataChart = array();

            $tahun = date('Y');

            $startMonth = strtotime($tahun.'-'.(01)); // 2021-04
            $endMonth   = strtotime($tahun.'-'.(12)); // ...

            while ( $startMonth <= $endMonth ) {

                $bulan = date('F', $startMonth); // nama bulan

                // ambil data piutang berdasarkan tahun dan bulan
                $sqlPiutang = "SELECT tahun, bulan, COUNT(*) AS total FROM `piutang` 
                               WHERE tahun = '$tahun' AND bulan = '$bulan' GROUP BY bulan";

                $queryPiutang = $this->db->query($sqlPiutang);
                $totalPiutang = 0;

                if ( $queryPiutang->num_rows() == 1 ) {

                    $totalPiutang  = $queryPiutang->row_array()['total'];
                }


                // end piutang -----------------------------------------------
                
                $totalPencabutan = 0;
                $sqlPencabutan = "SELECT YEAR(tanggal_pencabutan) AS tahun, MONTHNAME(tanggal_pencabutan) AS bulan, 
                                        COUNT(pencabutan) AS total 
                                        
                                    FROM data_pelanggan 
                                    WHERE pencabutan = 'iya' AND YEAR(tanggal_pencabutan) = '$tahun' AND MONTHNAME(tanggal_pencabutan) = '$bulan'";

                $queryPencabutan = $this->db->query( $sqlPencabutan );
                if ( $queryPencabutan->num_rows() == 1 ) {

                    $totalPencabutan = $queryPencabutan->row_array()['total'];
                }
                









                array_push( $dataChart, array(

                    'x' => $bulan,          // nama bulan
                    'a'=> intval($totalPiutang),   // piutang
                    'b'=> intval($totalPencabutan) // pencabutan
                ) );


                // increment 
                $startMonth = strtotime(date('Y-m', strtotime("+1 month", $startMonth)));
            }



            return $dataChart;
            
        }



        


















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
    