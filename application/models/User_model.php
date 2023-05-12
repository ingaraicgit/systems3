<?php
	class User_model extends CI_Model{
		
		public function register($pass_encrypt2){

				$data = array(
					'full_name' => $this->input->post('full_name'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $pass_encrypt2,
					'phone' => $this->input->post('phone')
				);

				return $this->db->insert('users', $data);
			}


			public function unique_username($username){
				$query = $this->db->get_where('users', array('username' => $username));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}

	
			public function unique_email($email){
				$query = $this->db->get_where('users', array('email' => $email));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}
	}