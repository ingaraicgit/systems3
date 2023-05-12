<?php
	class Categories extends CI_Controller{

		public function index(){
			$data['title'] = 'Filter by category:';

			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');


		}

		public function create(){
			
			$data['title'] = 'Create Category';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/categories_create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();

				redirect('categories');
			}
		}

	
	public function posts($id){
		$data['title'] = $this->category_model->get_category($id)->name;

		$data['posts'] = $this->post_model->get_post_by_cat($id);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

}