<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penagihan extends CI_Model {
                
        // query insert
        function processInsertDataPembayaran() {

            $id_login = $this->session->userdata('sess_idlogin');

            $data = array(

                'no_ref'    => $this->input->post('no_ref'),
                'id_login'  => $id_login,
                'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
                'pembayaran'        => $this->input->post('pembayaran'),
                'bukti_pembayaran'  => "",
                'tanggal_penagihan' => $this->input->post('tanggal'),
                'catatan'   => $this->input->post('keterangan'),
            );

            $this->db->insert('penagihan', $data);

            
            
            
            
            // activity 
            $notes = "Menambahkan pembayaran sebesar ". $data['pembayaran'];
            $this->rekap_transaksi( $data['no_ref'], "tambah", $notes );
            

            
            // redirect
            redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);
            
        }














        function rekap_transaksi( $no_ref, $activity, $notes ) {

            $id_login = $this->session->userdata('sess_idlogin');
            $dataActivity = array(

                'id_login'  => $id_login,
                'no_ref'    => $this->input->post('no_ref'),
                'activity'  => "tambah",
                'notes'     => "Menambahkan pembayaran sebesar ". $this->input->post('pembayaran')
            );
            $this->db->insert( 'riwayat_transaksi', $dataActivity );
        }
    
    }
    
    /* End of file M_penagihan.php */
    