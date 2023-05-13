
<?php
	class Admins extends CI_Controller{
		
		public function register(){

			$data['title'] = 'Register a shop';

			$this->form_validation->set_rules('store_name','Store Name','required');
			$this->form_validation->set_rules('username','Username','required|callback_unique_username');
			$this->form_validation->set_rules('email','Email','required|callback_unique_email');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','matches[password]');
			$this->form_validation->set_rules('phone','Phone','required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('admins/register',$data);
				$this->load->view('templates/footer');
			}else{

				$pass_encrypt = md5($this->input->post('password'));

				$this->admin_model->register($pass_encrypt);

				$this->session->set_flashdata('admin_account', 'Congratulations! Your shop has been registered.');
		

				redirect('posts');
			}
		}

		public function login(){

			$data['title'] = 'Admin Log in';

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('admins/login',$data);
				$this->load->view('templates/footer');
			}else{
				
				$username = $this->input->post('username');
				$pass_encrypt = md5($this->input->post('password'));

				$admin_id = $this->admin_model->login($username, $pass_encrypt);

				if($admin_id){

					$admin_data = array(
						'admin_id' => $admin_id,
						'username' => $username,
						'logged_in' => true
					);
					//The Session class permits you to maintain a user’s “state” and track their activity while they browse your site.
					$this->session->set_userdata($admin_data);

					redirect('posts');

				}else{

					$this->session->set_flashdata('login_fail', 'Login is invalid. Please check your username and password.');
					redirect('admins/login');	
				}

			
			}
		}

		public function unique_username($username){

			$this->form_validation->set_message('unique_username', 'That username is already taken.');
			if($this->admin_model->unique_username($username)){
				return true;
			} else {
				return false;
			}
		}

		public function unique_email($email){

			$this->form_validation->set_message('unique_email', 'That email is already taken.');
			if($this->admin_model->unique_email($email)){
				return true;
			} else {
				return false;
			}
		}
	}