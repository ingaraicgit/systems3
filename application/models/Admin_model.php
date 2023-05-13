<?php
	class Admin_model extends CI_Model{
		
		public function register($pass_encrypt){

				$data = array(
					'store_name' => $this->input->post('store_name'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $pass_encrypt,
					'phone' => $this->input->post('phone')
				);

				return $this->db->insert('admins', $data);
			}

			public function login($username, $pass_encrypt){
				$this->db->where('username', $username);
				$this->db->where('password', $pass_encrypt);

				$result = $this->db->get('admins');

				if($result->num_rows() == 1){
					return $result->row(0)->id; //we need the user id, row index 0 at db
				}else{
					return false;
				}

			}
	
			public function unique_username($username){
				$query = $this->db->get_where('admins', array('username' => $username));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}

	
			public function unique_email($email){
				$query = $this->db->get_where('admins', array('email' => $email));
				if(empty($query->row_array())){
					return true;
				} else {
					return false;
				}
			}
	}