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