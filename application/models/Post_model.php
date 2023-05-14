<?php
	class Post_model extends CI_Model{

		public function __construct(){
			$this->load->database();

	        $this->posts = 'posts';
	        $this->users = 'users';
	        $this->orders = 'orders';
	        $this->order_items = 'order_items';
		}

		public function get_posts($slug = FALSE){
			
			if($slug == FALSE){
				$this->db->order_by('posts.id', 'DESC');
				$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post($post_image){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'price' => $this->input->post('price'),
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'post_image' => $post_image
				

			);

			return $this->db->insert('posts', $data);
		}

		public function delete_post($id){
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'price' => $this->input->post('price'),
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id')
				//'post_image' => $post_image

			);		
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);

		}

		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function get_post_by_cat($category_id){
			$this->db->order_by('posts.id');
			$this->db->join('categories', 'categories.id = posts.category_id ');

			$query = $this->db->get_where('posts', array('category_id' => $category_id));

			if(empty($query->result_array())){
				echo "No products in this category yet!";
				return $query->result_array();	

			}
			return $query->result_array();	
			
		}

		public function getRows($id = ''){
	        $this->db->select('*');
	        $this->db->from($this->posts);
	        $this->db->where('status', '1');
	        if($id){
	            $this->db->where('id', $id);
	            $query = $this->db->get();
	            $result = $query->row_array();
	        }else{
	            $this->db->order_by('title', 'asc');
	            $query = $this->db->get();
	            $result = $query->result_array();
	        }
	        
	        // Return fetched data
	        return !empty($result)?$result:false;
    	}
    
    public function getOrder($id){
        $this->db->select('orders.*, users.name, users.email, users.phone, users.address');
        $this->db->from($this->orders);
        $this->db->join($this->users, 'users.id = orders.user_id', 'left');
        $this->db->where('orders.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        $this->db->select('order_items.*, posts.post_image, posts.title, posts.price');
        $this->db->from($this->order_items);
        $this->db->join($this->posts, 'posts.id = order_items.product_id', 'left');
        $this->db->where('order_items.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
       return !empty($result)?$result:false;
    }
    
    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }

        $insert = $this->db->insert($this->users, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        
        $insert = $this->db->insert($this->orders, $data);

        return $insert?$this->db->insert_id():false;
    }
    

    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->order_items, $data);

        // Return the status
        return $insert?true:false;
    }
    
}

