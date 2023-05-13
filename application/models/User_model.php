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

			public function login($username, $pass_encrypt2){
				$this->db->where('username', $username);
				$this->db->where('password', $pass_encrypt2);

				$result = $this->db->get('users');

				if($result->num_rows() == 1){
					return $result->row(0)->id; //we need the user id, row index 0 at db
				}else{
					return false;
				}

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