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


        // get data piutang, data pelanggan, domisili, master domisili, mastersubdomisili
        function getAllDataPiutang( $kondisi = null ) {


            // session id_prof

            if ( $kondisi ) {

                $sql = "SELECT
                            COUNT(piutang.bulan) AS total_bulan, 
                            SUM(piutang.nominal) AS sub_total, 
                            data_pelanggan.*, piutang.*, master_domisili.*, master_subdomisili.* 
                        FROM piutang 
                        JOIN data_pelanggan ON data_pelanggan.no_ref = piutang.no_ref
                        JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                        JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili
                        
                        WHERE data_pelanggan.no_ref = '$kondisi'


                        GROUP BY piutang.no_ref
                        ";

            } else {

                $sql = "SELECT
                            COUNT(piutang.bulan) AS total_bulan, 
                            SUM(piutang.nominal) AS sub_total, 
                            data_pelanggan.*, piutang.*, master_domisili.*, master_subdomisili.* 
                        FROM piutang 
                        JOIN data_pelanggan ON data_pelanggan.no_ref = piutang.no_ref
                        JOIN master_domisili ON data_pelanggan.id_domisili = master_domisili.id_domisili
                        JOIN master_subdomisili ON data_pelanggan.id_subdomisili = master_subdomisili.id_subdomisili
                        
                        
                        GROUP BY piutang.no_ref
                        ";
            }

            $dataAllPiutang = $this->db->query($sql);
            
            $dataPiutang = array();


            // cek apakah memiliki data piutang
            if ( $dataAllPiutang->num_rows() > 0 ) {

                foreach ( $dataAllPiutang->result_array() AS $rowPiutang ) {


                    // ambil data piutang | no_ref
                    $where = array(

                        'no_ref'    => $rowPiutang['no_ref']
                    );
                    $getDataPenagihan = $this->db->get_where( 'penagihan', $where );

                    $totalTagihan   = $rowPiutang['sub_total']; 
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
                    if ( $rowPiutang['pencabutan'] == "tidak" ) {

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


                    array_push( $dataPiutang, array(


                        'informasi_detail'      => $rowPiutang,
                        'informasi_penagihan'   => $dataTagihan,
                        'informasi_riwayat_tr'  => $dataRiwayatTransaksi,
                        'status_piutang'    => $status,
                        'total_pelunasan'   => $totalPelunasan,
                        'total_tagihan'     => $totalTagihan

                    ) );
                }
            }


            return $dataPiutang;

        }



        // $total += $bayar 
        // $total = $total + $bayar


        // // total tagihan 60.000
        // // jumlah_dibayar = 0
        // // bayar 20.000 | 30.000 (2x perulangan)

        // perulangan 1
        // $jumlah_dibayar = $jumlah_dibayar + $bayar 
        // $jumlah_dibayar =  0 + 20.000 
        
        // $jumlah_dibayar = 20.000 

        // perulangan 2 
        // $jumlah_dibayar = $jumlah_dibayar + $bayar 
        // $jumlah_dibayar = 20.000 + 30.000

        // $jumlah_dibayar = 50.000

        // apakah total_tagihan == jumlah bayar ? 
        //     tidak (belum lunas)

    


















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




        // relasi antara piutang dan pelanggan
        function getDataPiutangPelanggan() {

            $this->db->select('piutang.*, data_pelanggan.*')->from('piutang')
                    ->join('data_pelanggan', 'data_pelanggan.no_ref = piutang.no_ref');
            $query = $this->db->get();

            return $query;

        }


       
    }

?>