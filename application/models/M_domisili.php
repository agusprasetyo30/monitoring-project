<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_domisili extends CI_Model {
        


        function getDataDomisiliWithSubDomisili() {

            // data all domisili with subdomisili
            $dataDomisili = array();

            $getDataDomisili = $this->db->get('master_domisili');

            // apakah tabel master_domisili ada isinya ?
            if ( $getDataDomisili->num_rows() > 0 ) {

                $totalSubDomisili = 0;
                foreach ( $getDataDomisili->result_array() as $rowDomisili ) {


                    // ambil data kecamatan 
                    $id_domisili = $rowDomisili['id_domisili'];
                    $this->db->where('id_domisili', $id_domisili);
                    $getDataKecamatanById_domisili = $this->db->get('master_subdomisili');


                    // hitung jumlah
                    $totalSubDomisili = $getDataKecamatanById_domisili->num_rows();


                    // memasukkan data diatas ke dalam variabel array 
                    array_push( $dataDomisili, array(

                        'info_domisili' => $rowDomisili,
                        'info_totalsub' => $totalSubDomisili
                    ));
                }
            }


            return $dataDomisili;
        }



        // menampilkan data domisili
        function getDataTable( $where = null, $table ) {

            if ( $where ) {
                // SELECT  * FROM master_domisili WHERE id = 'x'
                return $this->db->get_where($table, $where);

            } else {

                // tidak menampilkan data secara spesifik
                // SELECT * FROM master_domisili
                return $this->db->get($table);
            }
        }

        

        // proses insert ke db
        function insertDataDomisili() {


            $data = array(

                'kota'      => $this->input->post('nama_domisili'),
                'wilayah'   => $this->input->post('wilayah'),
            );


            // query insert
            $this->db->insert('master_domisili', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('domisili');
        }


        // proses insert ke db
        function insertDataSubDomisili() {

            $id_domisili =  $this->input->post('id_domisili');


            $data = array(

                'id_domisili' => $id_domisili,
                'kode_wilayah'=> $this->input->post('kode_wilayah'),
                'kelurahan'   => $this->input->post('nama_kelurahan'),
                'kecamatan'   => $this->input->post('nama_kecamatan'),
            );


            // query insert
            $this->db->insert('master_subdomisili', $data);
            
            
            // flashdata
            $this->session->set_flashdata('msg', 'tambah');

            // kembali ke halaman
            redirect('domisili/subdomisili/'.$id_domisili);
        }




        // update
        function updateDataDomisili() {


            // element input type hidden
            $id = $this->input->post('id');

            $data = array(

                'kota'      => $this->input->post('nama_domisili'),
                'wilayah'   => $this->input->post('wilayah'),
            );

            $this->db->where('id_domisili', $id);
            $this->db->update('master_domisili', $data);


            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('domisili');
        }


        
        // update
        function updateDataSubDomisili() {


            // element input type hidden
            $id_sub = $this->input->post('id_sub');
            $id_domisili = $this->input->post('id_domisili');

            $data = array(

                'kode_wilayah'=> $this->input->post('kode_wilayah'),
                'kelurahan'   => $this->input->post('nama_kelurahan'),
                'kecamatan'   => $this->input->post('nama_kecamatan'),
            );

            $this->db->where('id_subdomisili', $id_sub);
            $this->db->update('master_subdomisili', $data);


            // flashdata
            $this->session->set_flashdata('msg', 'ubah');

            // kembali ke halaman
            redirect('domisili/subdomisili/'.$id_domisili);
        }




        // delete
        function deleteDataDomisili( $id_domisili ) {

            // hapus data master_domisili
            $where = ['id_domisili' => $id_domisili];
            $this->db->where( $where )->delete('master_domisili');
            $this->db->where( $where )->delete('master_subdomisili');

            // flashdata
            $this->session->set_flashdata('msg', 'hapus');

            // kembali ke halaman
            redirect('domisili');
        }

        // UPDATE master_domisili SET ..... WHERE id = x

        function deleteDataSubDomisili( $id_subdomisili, $id_domisili ) {


            // hapus data master_domisili
            $where = ['id_subdomisili' => $id_subdomisili];
            $this->db->where( $where )->delete('master_subdomisili');


            // flashdata
            $this->session->set_flashdata('msg', 'hapus');

            // kembali ke halaman
            redirect('domisili/subdomisili/'.$id_domisili);
        }









    
    }
    
    /* End of file M_domisili.php */
    