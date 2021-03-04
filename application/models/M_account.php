<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_account extends CI_Model {
    
        
        function getDataOfficer() {
            
    
            $sql = "SELECT 
                        user_login.id_login, user_login.username, user_login.level,
                        user_officer.id_officer, user_officer.name, user_officer.jabatan
                    FROM user_login
                    JOIN user_officer ON user_officer.id_login = user_login.id_login";
            
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

            $dataOfficer = array(

                'id_login'  => $last_id_login,
                'name'      => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'telp'      => $this->input->post('notelp'),
                'jenis_kelamin' => $this->input->post('gender'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'tempat_lahir'  => $this->input->post('tempatlahir'),
                'foto'      => "",
                'jabatan'   => "kantor",
                'wilayah_penugasan' => $this->input->post('wilayah'),
            );
            $this->db->insert('user_officer', $dataOfficer);

            redirect('account');
        }
    
    }
    
    /* End of file M_account.php */
    