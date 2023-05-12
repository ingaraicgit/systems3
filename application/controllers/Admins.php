
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