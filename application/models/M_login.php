<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_login extends CI_Model {

        // check login username + password
        function checkAccount() {

            // ambil nilai
            $username = $this->input->post('username');
            $ambilPassword = $this->input->post('password');

            // ambil username dari tabel user_login (database)

            // SELECT * FROM `user_login` WHERE username = ''
            $where = array('username' => $username);
            $dataLogin = $this->db->get_where('user_login', $where);

            if ( $dataLogin->num_rows() > 0 ) {

                // pencocokan password
                $kolom = $dataLogin->row_array();

                if ( password_verify( $ambilPassword, $kolom['password'] ) ) {

                    // session 
                    $memasangSession = array(

                        'sess_idlogin'  => $kolom['id_login'],
                        'sess_username' => $kolom['username'],
                        'sess_level'    => $kolom['level']
                    );

                    $this->session->set_userdata($memasangSession);
                    redirect('dashboard');

                } else {
                    $msg = '<div class="alert alert-danger">Login Gagal <br> <small>Kata sandi yang anda masukkan salah</small></div>';
                    $this->session->set_flashdata( 'pesan', $msg );

                    // kembali ke halaamn login
                    redirect('login');
                }

            } else {

                // akun tidak terdaftar (not found)
                $msg = '<div class="alert alert-danger">Login Gagal <br> <small>Akun @'.$username.' belum terdaftar</small></div>';
                $this->session->set_flashdata( 'pesan', $msg );

                // kembali ke halaamn login
                redirect('login');
            }
        }
    }
    
    /* End of file M_login.php */
    