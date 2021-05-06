<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_laporan extends CI_Model {
    
                
        function getAlldataPelanggan( $kondisi = null, $tahun ) {


            // session id_prof

            if ( $kondisi ) {

                $sql = "SELECT
                            COUNT(piutang.bulan) AS total_bulan, 
                            SUM(piutang.nominal) AS sub_total, 
                            data_pelanggan.*, master_domisili.*, master_subdomisili.* 
                        FROM data_pelanggan 
                        LEFT JOIN piutang ON piutang.no_ref = data_pelanggan.no_ref
                        JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                        JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili

                        WHERE $kondisi                        
                        
                        GROUP BY data_pelanggan.no_ref";

            } else {

                $sql = "SELECT
                            COUNT(piutang.bulan) AS total_bulan, 
                            SUM(piutang.nominal) AS sub_total, 
                            data_pelanggan.*, master_domisili.*, master_subdomisili.* 
                        FROM data_pelanggan 
                        LEFT JOIN piutang ON piutang.no_ref = data_pelanggan.no_ref
                        JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                        JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili
                                                
                        
                        GROUP BY data_pelanggan.no_ref";
            }

            $dataAllPelanggan = $this->db->query($sql);
            
            $dataPelanggan = array();


            // cek apakah memiliki data piutang
            if ( $dataAllPelanggan->num_rows() > 0 ) {

                foreach ( $dataAllPelanggan->result_array() AS $rowPelanggan ) {


                    // ambil data piutang | no_ref
                    $where = array(

                        'no_ref'    => $rowPelanggan['no_ref']
                    );

                    // ambil data piutang
                    $wherePiutang = [
                                        'no_ref' => $rowPelanggan['no_ref'],
                                        'tahun' => $tahun
                                    ];
                    $getDataPiutang = $this->db->get_where('piutang', $wherePiutang);
                    $dataPiutang = array();

                    if ( $getDataPiutang->num_rows() > 0 ) {

                        foreach ( $getDataPiutang->result_array() AS $rowPiutang ) {

                            array_push( $dataPiutang, $rowPiutang );
                        }
                    }





                    // ambil data penagihan
                    $getDataPenagihan = $this->db->get_where( 'penagihan', $where );

                    $totalTagihan   = $rowPelanggan['sub_total']; 
                    $totalPelunasan = 0;

                    $dataTagihan = array();

                    if ( $getDataPenagihan->num_rows() > 0 ) {

                        foreach ( $getDataPenagihan->result_array() AS $rowPenagihan ) {

                            $totalPelunasan += $rowPenagihan['pembayaran'];
                            array_push( $dataTagihan, $rowPenagihan );
                        }
                    }




                    // data activity 
                    $dataRiwayatTransaksi = array();
                    $getDataRiwayat = $this->db->get_where('riwayat_transaksi', $where);

                    if ( $getDataRiwayat->num_rows() > 0 ) {

                        foreach ( $getDataRiwayat->result_array() AS $rowRiwayat ) {
                            array_push( $dataRiwayatTransaksi, $rowRiwayat );
                        }
                    }





                    // keputusan | lunas, segel (belum lunas), cabut
                    $status = "";
                    if ( $rowPelanggan['pencabutan'] == "tidak" ) {

                        // cek lunas or segel
                        if ( $totalTagihan == $totalPelunasan ) {

                            $status = "lunas";
                        } else {

                            if ( $totalPelunasan > 0 ) {

                                $status = "cicil"; // belum lunas

                            } else {

                                $status = "belumbayar";
                            }
                        }
                        
                    } else {

                        $status = "cabut";
                    }


                    array_push( $dataPelanggan, array(


                        'informasi_detail'      => $rowPelanggan,
                        'informasi_piutang'     => $dataPiutang,
                        'informasi_penagihan'   => $dataTagihan,
                        'informasi_riwayat_tr'  => $dataRiwayatTransaksi,
                        'status_piutang'    => $status,
                        'total_pelunasan'   => $totalPelunasan,
                        'total_tagihan'     => $totalTagihan

                    ) );
                }
            }


            return $dataPelanggan;

        }


        function getAllPengguna() {

            $sql = "SELECT 
            user_login.id_login, user_login.username, user_login.level,
            user_officer.*
        FROM user_login
        JOIN user_officer ON user_officer.id_login = user_login.id_login WHERE user_login.level != 'superadmin'";

            return $this->db->query( $sql );
        }

        function getAllPelangganCabut() {

            $sql = "SELECT * FROM `data_pelanggan` WHERE pencabutan = 'iya'";

            return $this->db->query( $sql );
        }
        
    }
    
    /* End of file M_laporan.php */
    