<?php
	class Users extends CI_Controller{
		
		public function register(){

			$data['title'] = 'Sign up';

			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('username','Username','required|callback_unique_username');
			$this->form_validation->set_rules('email','Email','required|callback_unique_email');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','matches[password]');
			$this->form_validation->set_rules('phone','Phone','required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register',$data);
				$this->load->view('templates/footer');
			}else{
				
				$pass_encrypt2 = md5($this->input->post('password'));

				$this->user_model->register($pass_encrypt2);

				$this->session->set_flashdata('user_account', 'Congratulations! Your account has been created.');

				redirect('posts');
			}
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