<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Login extends CI_Model {

        // public function _userCheck($username)
        // {
        //     $query=$this->db->query("
        //         select count(username) 
        //         from users 
        //         where username='$username'
		// 	");
		// 	return ($query->result() == 0) ? true : false;
        // }

        // public function _emailCheck($email)
        // {
        //     $query=$this->db->query("
        //         select count(email) 
        //         from users 
        //         where email='$email'
        //     ");
        // return ($query->result() == 0) ? true : false;
        // }

        public function login($username, $password)
        {
            $query=$this->db->query("
                select * 
                from users 
                where username='$username'
            ");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $key) {
                    if($key->is_verified == 1){
                        $password_decode = hex2bin($key->password);

                        if($password == $password_decode){
                            $this->session->set_userdata('username', $key->username);
                        } else{
                            return 'Wrong password!';
                        }

                    } else{
                        return 'Verify your email!';
                    }
                }
            } else{
                return 'Wrong username';
            }
        }

        public function add($data)
        {
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        public function verify($key)
        {
            $query=$this->db->query("
                update users 
                set is_verified = 1 
                where verification_key='$key'
            ");
            // return $query->result();
        }

	}

?>
