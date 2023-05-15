<?php
	class Users extends CI_Controller{
		
		public function register(){

			$data['title'] = 'Sign up';

			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('username','Username','required|callback_unique_username');
			$this->form_validation->set_rules('email','Email','required|callback_unique_email');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','matches[password]');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('phone','Phone','required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register',$data);
				$this->load->view('templates/footer');
			}else{
				
				$pass_encrypt2 = md5($this->input->post('password'));
				$this->user_model->register($pass_encrypt2);

				$this->session->set_flashdata('user_account', 'Congratulations! Your account has been created.');
				redirect('users/login');
			}
		}

		public function login(){

			$data['title'] = 'Log in';

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				
				$username = $this->input->post('username');
				$pass_encrypt2 = md5($this->input->post('password'));
				$account = "user";

				$user_id = $this->user_model->login($username, $pass_encrypt2);

				if($user_id){
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'account' => $account,
						'logged_in' => true
					);
					//The Session class permits you to maintain a user’s “state” and track their activity while they browse your site.
					$this->session->set_userdata($user_data);

					redirect('posts');

				}else{

					$this->session->set_flashdata('login_fail', 'Login is invalid. Please check your username and password.');
					redirect('users/login');	
				}
			}
		}

		public function logout(){
			//kill session user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			
			$this->session->set_flashdata('logout', 'You are logged out.');

			redirect('users/login');
		}

		public function unique_username($username){

			$this->form_validation->set_message('unique_username', 'That username is already taken.');
			if($this->user_model->unique_username($username)){
				return true;
			} else {
				return false;
			}
		}

		public function unique_email($email){

			$this->form_validation->set_message('unique_email', 'That email is already taken.');
			if($this->user_model->unique_email($email)){
				return true;
			} else {
				return false;
			}
		}

	}