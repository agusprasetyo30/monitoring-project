<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_account extends CI_Model {
    
        
        function getDataOfficer( $jabatan, $id_login = null ) {
            
            if ( $id_login ) { // ada idnya / isinya


                $sql = "SELECT 
                        user_login.id_login, user_login.username, user_login.level,
                        user_officer.*
                    FROM user_login
                    JOIN user_officer ON user_officer.id_login = user_login.id_login 
                    WHERE user_officer.jabatan = '$jabatan' AND user_officer.id_login = '$id_login'";
            } else { 

                $sql = "SELECT 
                            user_login.id_login, user_login.username, user_login.level,
                            user_officer.id_officer, user_officer.name, user_officer.jabatan, user_officer.email, user_officer.telp
                        FROM user_login
                        JOIN user_officer ON user_officer.id_login = user_login.id_login 
                        WHERE user_officer.jabatan = '$jabatan'";
            }
            
            $query = $this->db->query($sql);

            return $query;
            // opsi 2 
            // $this->db->select('user_login.id_login, user_login.username, user_login.level,
            // user_officer.id_officer, user_officer.name, user_officer.jabatan');
            // $this->db->from('user_login');
            // $this->db->join('user_officer', 'user_officer.id_login = user_login.id_login');

            // $query = $this->db->get();
        }



        // fungsi insert
        function insertDataOfficer() {
            

            $dataLogin = array( 

                'username'  => $this->input->post('username'),
                'password'  => password_hash( $this->input->post('password'), PASSWORD_DEFAULT ),
                'level'     => "employee",
                'status_account'    => "active"
            );

            $this->db->insert('user_login', $dataLogin);
            $last_id_login = $this->db->insert_id();

            $jabatan = $this->input->post('jabatan');
            $dataOfficer = array(

                'id_login'  => $last_id_login,
                'name'      => $this->input->post('nama'),
                'address'   => $this->input->post('alamat'),
                'email'     => $this->input->post('email'),
                'telp'      => $this->input->post('notelp'),
                'jenis_kelamin' => $this->input->post('gender'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'tempat_lahir'  => $this->input->post('tempatlahir'),
                'foto'      => $this->input->post('foto'),
                'jabatan'   => $jabatan,
                'wilayah_penugasan' => $this->input->post('wilayah'),
            );
            $this->db->insert('user_officer', $dataOfficer);


            if ( $jabatan == "pegawai_kantor" ) {

                $text = "Pegawai Kantor";
                $link = base_url('account/viewPegawaiKantor');

            } else if ( $jabatan == "petugas_lapangan" ) {

                $text = "Petugas Lapangan";
                $link = base_url('account/viewPetugasLapangan');
            }  


            // msg 
            $msg = '<div class="alert alert-success"><b>Tambah data '.$text.' berhasil</b> <br>
                Menambahkan pada tanggal '.date('d F Y H.i A').'
            </div>';
            $this->session->set_flashdata('msg', $msg);

            redirect( $link );
        }


        // update
        function updateDataOfficer() {

          
            $id_login = $this->input->post('id');
            $where = ['id_login' => $id_login];
            $getDataOfficer = $this->db->get_where('user_officer', $where)->row_array();
          
            $dataOfficer = array(

                'name'      => $this->input->post('nama'),
                'address'   => $this->input->post('alamat'),
                'email'     => $this->input->post('email'),
                'telp'      => $this->input->post('notelp'),
                'jenis_kelamin' => $this->input->post('gender'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'tempat_lahir'  => $this->input->post('tempatlahir'),
                'foto'      => $this->input->post('foto'),
                'wilayah_penugasan' => $this->input->post('wilayah'),
            );

            $this->db->where('id_login', $id_login);
            $this->db->update('user_officer', $dataOfficer);


            if ( $getDataOfficer['jabatan'] == "pegawai_kantor" ) {

                $text = "Pegawai Kantor";
                $link = base_url('account/viewPegawaiKantor');

            } else if ( $getDataOfficer['jabatan'] == "petugas_lapangan" ) {

                $text = "Petugas Lapangan";
                $link = base_url('account/viewPetugasLapangan');
            }  


            // msg 
            $msg = '<div class="alert alert-success"><b>Pengubahan data '.$text.' berhasil</b> <br>
                Diubah pada tanggal '.date('d F Y H.i A').'
            </div>';
            $this->session->set_flashdata('msg', $msg);

            redirect( $link );
        }
    
    }
    
    /* End of file M_account.php */
    