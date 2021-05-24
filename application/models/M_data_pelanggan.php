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

            $status_pencabutan = $this->input->post('cabut');
            $tanggal_pencabutan = null;


            // cek aksi pencabutan
            if ( $status_pencabutan == "iya" ) {

                $tanggal_pencabutan = date('Y-m-d H:i:s');
            }




            $data = array(

                'no_ref' => $this->input->post('no_ref') ,
                'nama'=> $this->input->post('nama_pelanggan'),
                'alamat'   => $this->input->post('alamat'),
                'id_domisili'   => $this->input->post('domisili'),
                'id_subdomisili'   => $this->input->post('subdomisili'),
                'pencabutan'   => $status_pencabutan,
                'tanggal_pencabutan' => $tanggal_pencabutan
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
    
    
    // upload file excel 
    function prosesInsertDataExcel() {

        $config['upload_path']          = './assets/excel/';
        $config['allowed_types']        = 'xlsx';
        $config['max_size']             = 20000; // 20 mb max

        $this->load->library('upload', $config);

        $file_excel = "";
        if ( $this->upload->do_upload('userfile')) {

            $file_excel = $this->upload->data('file_name');
        } else {

            $html = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
            $this->session->set_flashdata('pesan', $html);

            redirect('data_pelanggan/importData');
        }

        
        return $file_excel;
    }
    
    



    // proses import excel 
    function importExcelDataPelanggan( $dataPelanggan, $dataPiutang, $tahun ) {

        if ( count( $dataPelanggan ) > 0 ) {

            $newDataPelanggan = array();

            $data = $this->db->get('data_pelanggan');
            $jumlah_data = $data->num_rows();


            if ( $jumlah_data > 0 ) {
                
                $data = $data->result_array();

                // sorting data
                usort($data, array($this, 'getSortingKodePelanggan'));

                foreach ( $dataPelanggan AS $pelanggan ) {

                    $pencarian = intval($pelanggan['no_ref']); // bulat

                    $kiri = 0;
                    $kanan = $jumlah_data - 1;
                    $ditemukan = false;

                    
                    while ( $kiri <= $kanan ) {
            
                        $tengah = ceil( ($kiri + $kanan) / 2); // konversi bilangan desimal ke bulat
                        $prediksi = intval($data[$tengah]["no_ref"]);
                        
                        if ( $pencarian == $prediksi) {
                            
                            $ditemukan = true;
                            break;
                            
                        } else if ( $pencarian < $prediksi ) {
                            
                            $kanan = $tengah - 1;
                        } else {
                            
                        $kiri = $tengah + 1; 
                        }
                    }


                    if ( $ditemukan == false ) {

                        array_push( $newDataPelanggan, $pelanggan );
                    }
                }
                

                // insert batch with algoritm binary searching
                // print_r( $newDataPelanggan );
                if ( count( $newDataPelanggan ) > 0 ) {

                    $this->db->insert_batch( "data_pelanggan", $newDataPelanggan );
                }
            } else {

                // do insert without search with algorithm binary because table is empty
                $this->db->insert_batch( "data_pelanggan", $dataPelanggan );
            }
        }


        if ( count( $dataPiutang ) > 0 ) {

            
            $newPiutang = array();
            // sequential 
            foreach ( $dataPiutang AS $piutang ) {

                $where = array(

                    'no_ref'=> $piutang['no_ref'],
                    'tahun' => $tahun,
                    'bulan' => $piutang['bulan']
                );
                $query = $this->db->get_where('piutang', $where);


                if ( $query->num_rows() == 0 ) {
                    // setujui insert data
                    array_push( $newPiutang, $piutang );
                }
            }

            if ( count( $newPiutang ) > 0 ) {

                $this->db->insert_batch( "piutang", $dataPiutang );
            }
        }
    }





    // sorting data
    function getSortingKodePelanggan( $a, $b ){

        return strcmp( intval($a["no_ref"]), intval($b["no_ref"]) );
    }
    
    
    
    
    
    
    
    
    
    } // end file

?>