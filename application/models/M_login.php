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
                    $this->tambahSession( $kolom );


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








        // pemasangan session
        function tambahSession( $kolom ) {

            $id_login = $kolom['id_login'];

            // query
            $where = ['id_login' => $id_login];
            $getDataOfficer = $this->db->get_where('user_officer', $where);


            // login sebagai admin
            if ( $getDataOfficer->num_rows() == 0 ) {
                
                $name       = "Admin PGN";
                $username   = $kolom['username'];
                $level      = $kolom['level'];
                $foto       = 'PicsArt_08-15-01_09_26.jpg';
                $jabatan    = "Pemilik Kantor Jargas PGN";
                $gender     = "";
            
            } else { // sebagai employee | petugas lapangan | kantor | manager 


                $kolomOfficer = $getDataOfficer->row_array();

                $name = $kolomOfficer['name'];
                $username = $kolom['username'];
                $level    = $kolom['level'];
                $jabatan  = $kolomOfficer['jabatan'];
                $foto     = "";


                if ( empty( $kolomOfficer['foto'] ) ) {

                    // gender
                    if ( $kolomOfficer['jenis_kelamin'] == "L" ) {

                        $foto = "4.png";
                    } else $foto = "6.png";
                } else {

                    $foto = $kolomOfficer['foto'];
                }
            } 



            $memasangSession = array(

                'sess_idlogin'  => $id_login,
                'sess_name'     => $name,
                'sess_username' => $username,
                'sess_level'    => $level,
                'sess_jabatan'  => $jabatan,
                'sess_foto'     => $foto
            );

            $this->session->set_userdata($memasangSession);
        }
    }
    
    /* End of file M_login.php */
    