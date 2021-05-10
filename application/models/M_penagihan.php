<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penagihan extends CI_Model {
                
        // query insert
        
    
        function processInsertDataPembayaran() {
            // load model data piutang
            $this->load->model('M_data_piutang');
    


            $id_login = $this->session->userdata('sess_idlogin');
            $no_ref = $this->input->post('no_ref');
            $tanggal = $this->input->post('tanggal');
            $catatan = $this->input->post('keterangan');
            $pembayaran = $this->input->post('pembayaran');



            // ambil rekapan piutang berdasarkan no_ref
            $historiRekapanPiutang = $this->M_data_piutang->getAllDataPiutang( $no_ref )[0]; 

          

            $config['upload_path']          = './assets/img/bukti-pembayaran/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']    = $no_ref.'-'.uniqid();



            $this->load->library('upload', $config);

            $bukti_pembayaran = "";
            if ( $this->upload->do_upload('userfile')){

                // $this->load->view('upload_form', $error);
                $bukti_pembayaran = $this->upload->data('file_name');
            } else {
                
                redirect('penagihan/detailPenagihan?no_ref='. $no_ref);
            }



            
            $status = "cicil";
            $pelunasan = $historiRekapanPiutang['total_pelunasan'] + $pembayaran;
            if ( $pelunasan == $historiRekapanPiutang['total_tagihan'] ) {

                $status = "lunas";
            }


            $data = array(

                'no_ref'    => $no_ref,
                'id_login'  => $id_login,
                'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
                'pembayaran'        => $pembayaran,
                'bukti_pembayaran'  => $bukti_pembayaran,
                'tanggal_penagihan' => $tanggal,
                'status_penagihan'  => $status,
                'catatan'   => $catatan
            );

            $this->db->insert('penagihan', $data);
            $this->session->set_flashdata('msg', 'tambah');
        

            // var_dump($query);
            // die;

            
            // activity 
            $notes = "Menambahkan pembayaran sebesar ". $data['pembayaran'];
            $this->rekap_transaksi( $data['no_ref'], "tambah", $notes );
            
            // redirect
            redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);
            
        }



        function processEditDataPembayaran() {

            $id_login = $this->session->userdata('sess_idlogin');
            $id = $this->input->post('id');
            $no_ref = $this->input->post('no_ref');


            $where = ['id_penagihan' => $id];
            $getDataPenagihan = $this->db->get_where('penagihan', $where)->row_array();


            
            /** Upload */

            $config['upload_path']          = './assets/img/bukti-pembayaran/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']    = $no_ref.'-'.uniqid();



            $this->load->library('upload', $config);

            $bukti_pembayaran = "";
            
            // apakah user melakukan upload
            if ( !empty( $_FILES['userfile']['name'] ) ) {

                if ( $this->upload->do_upload('userfile')){

                    // $this->load->view('upload_form', $error);
                    $bukti_pembayaran = $this->upload->data('file_name');
                } else {
                    
                    redirect('penagihan/detailPenagihan?no_ref='. $no_ref);
                }
            } else {

                $bukti_pembayaran = $getDataPenagihan['bukti_pembayaran'];
            }
            


            /** End Upload */





            $data = array(

                'id_penagihan' =>$id,
                'no_ref'    => $no_ref,
                'id_login'  => $id_login,
                'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
                'pembayaran'        => $this->input->post('pembayaran'),
                'bukti_pembayaran'  => $bukti_pembayaran,
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
            $this->rekap_transaksi( $data['no_ref'], "ubah", $notes );
            
            // redirect
            redirect('penagihan/detailPenagihan?no_ref=' . $data['no_ref']);   
        }

        function processDeleteDataPembayaran( $id_penagihan, $no_ref, $pembayaran ) {

            $data = array(

                'no_ref'    => $no_ref,
                'pembayaran'=> $pembayaran,
            );
            

            // hapus data master_domisili
            $where = ['id_penagihan' => $id_penagihan];
            $this->db->where( $where )->delete('penagihan');
            // flashdata
            $this->session->set_flashdata('msg', 'hapus');


            $notes = "Menghapus pembayaran sebesar ". $data['pembayaran'];
            $this->rekap_transaksi( $no_ref, "hapus", $notes );
                
            // kembali ke halaman
            redirect('penagihan/detailPenagihan?no_ref=' . $no_ref);
        }

        
        
        function rekap_transaksi( $no_ref, $activity, $notes ) {

            $id_login = $this->session->userdata('sess_idlogin');
            $dataActivity = array(

                // 'id_penagihan' => $id_penagihan,
                'id_login'  => $id_login,
                'no_ref'    => $no_ref,
                'activity'  => $activity,
                'notes'     => $notes
            );
            $this->db->insert( 'riwayat_transaksi', $dataActivity );
        }



    
    }
    
    /* End of file M_penagihan.php */
    