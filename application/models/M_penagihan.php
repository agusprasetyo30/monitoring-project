<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penagihan extends CI_Model {
                
        // query insert
        
    
        function processInsertDataPembayaran() {


            $id_login = $this->session->userdata('sess_idlogin');
            $no_ref = $this->input->post('no_ref');
            $tanggal = $this->input->post('tanggal');
            $catatan = $this->input->post('keterangan');
          

            $data = array(

                'no_ref'    => $no_ref,
                'id_login'  => $id_login,
                'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
                'pembayaran'        => $this->input->post('pembayaran'),
                'bukti_pembayaran'  => "",
                'tanggal_penagihan' => $tanggal,
                'catatan'   => $catatan
            );

            $this->db->insert('penagihan', $data);
            $this->session->set_flashdata('msg', 'tambah');
            $query = $this->db->insert_id();
            // $query = $query->row_array();


            // var_dump($query);
            // die;

            // activity 
            $notes = "Menambahkan pembayaran sebesar ". $data['pembayaran'];
            $this->rekap_transaksi( $query, $data['no_ref'], "tambah", $notes );
            
            // redirect
            redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);
            
        }



        function processEditDataPembayaran() {

            $id_login = $this->session->userdata('sess_idlogin');
            $id = $this->input->post('id');

            $data = array(

                'id_penagihan' =>$id,
                'no_ref'    => $this->input->post('no_ref'),
                'id_login'  => $id_login,
                'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
                'pembayaran'        => $this->input->post('pembayaran'),
                'bukti_pembayaran'  => "",
                'tanggal_penagihan' => $this->input->post('tanggal'),
                'catatan'   => $this->input->post('keterangan'),
            );
            // var_dump($_POST);
            // die;


            $this->db->where('id_penagihan', $id);
            $this->db->update('penagihan', $data);
            $this->session->set_flashdata('msg', 'ubah');

            // activity 
            $notes = "Mengubah pembayaran sebesar ". $data['pembayaran'];
            $this->rekap_transaksi_sunting( $id, "sunting", $notes );
            
            // redirect
            redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);
            
        }


        function processDeleteDataPembayaran( $id_penagihan, $no_ref ) {

            $data = array(

                'no_ref'    => $no_ref,
                'pembayaran'        => $this->input->post('pembayaran'),
            );
            // var_dump($data);
            // die;

            // hapus data master_domisili
            $where = ['id_penagihan' => $id_penagihan];
            $this->db->where( $where )->delete('penagihan');
                // flashdata
                $this->session->set_flashdata('msg', 'hapus');


                $notes = "Menghapus pembayaran sebesar ". $data['pembayaran'];
                $this->rekap_transaksi_hapus( $id_penagihan, $data['no_ref'], "hapus", $notes );
                
                // kembali ke halaman
                redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);
        }

        
        //TAMBAH
        function rekap_transaksi( $id_penagihan=0, $no_ref, $activity, $notes ) {

            $id_login = $this->session->userdata('sess_idlogin');
            $dataActivity = array(

                'id_penagihan' => $id_penagihan,
                'id_login'  => $id_login,
                'no_ref'    => $this->input->post('no_ref'),
                'activity'  => "tambah",
                'notes'     => "Menambahkan pembayaran sebesar ". $this->input->post('pembayaran')
            );
            $this->db->insert( 'riwayat_transaksi', $dataActivity );
        }

       
      //SUNTING
        function rekap_transaksi_sunting( $id_penagihan, $activity, $notes ) {
        

            $id_login = $this->session->userdata('sess_idlogin');
            $dataActivity = array(

                'id_penagihan' => $id_penagihan,
                'id_login'  => $id_login,
                'no_ref'    => $this->input->post('no_ref'),
                'activity'  => 'ubah',
                'notes'     => "Mengubah pembayaran sebesar ". $this->input->post('pembayaran')
            );
            // var_dump($dataActivity, $where);
            // die;

            $this->db->insert('riwayat_transaksi', $dataActivity);

        }


        //HAPUS
        function rekap_transaksi_hapus ($id_penagihan, $no_ref, $activity, $notes ) {

            $id_login = $this->session->userdata('sess_idlogin');
            $dataActivity = array(

                'id_penagihan' => $id_penagihan,
                'id_login'  => $id_login,
                'no_ref'    => $no_ref,
                'activity'  => "hapus",
                'notes'     => "Menghapus pembayaran sebesar ". $this->input->post('pembayaran')
            );
            $this->db->insert( 'riwayat_transaksi', $dataActivity );
        }



    
    }
    
    /* End of file M_penagihan.php */
    