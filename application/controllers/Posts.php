<?php
	class Posts extends CI_Controller{

		function  __construct(){

        	parent::__construct();
        	$this->load->library('cart');
        	$this->load->model('post_model');
    	}
		
		public function index(){

			$data = array();

			$data['posts'] = $this->post_model->getRows();

			$data['title'] = 'Latest Products';

			$data['posts'] = $this->post_model->get_posts();
			$data['categories'] = $this ->post_model-> get_categories();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this -> post_model -> get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}

		public function create(){

			$data['title'] = 'Add Product';
			$data['categories'] = $this -> post_model -> get_categories();

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('body','Body','required');
			$this->form_validation->set_rules('price','Price','required|decimal');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				//image upload
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);
				$this->session->set_flashdata('product_added', 'A new product has been added.');

				redirect('posts');

			}
		}

		public function delete($id){
			$this->post_model->delete_post($id);
			redirect('posts');
		}

		public function edit($slug){
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this ->post_model-> get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Product';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');

		}

		public function update(){

			$this->post_model->update_post();

			redirect('posts');
		}

		function addToCart($post_id){

			//$post = $this->post_model->get_posts($post_id);
	        $post = $this->post_model->getRows($post_id);
	        
	        // Add product to the cart
	        $data = array(
	            'id'    => $post['id'],
	            'qty'    => 1,
	            'price'    => $post['price'],
	            'name'    => $post['title'],
	            'post_image' => $post['post_image']
	        );
	        
	        //cart object
	        $this->cart->insert($data);
	        
	        // Redirect to the cart page
	        redirect('cart/index');
    	}

	}