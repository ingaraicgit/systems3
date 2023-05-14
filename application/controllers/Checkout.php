<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        $this->controller = 'checkout';
    }
    
    function index(){
        // Redirect if the cart is empty
        if($this->cart->total_items() <= 0){
            redirect('posts');
        }
        
        $user_data = $data = array();
        
        // If order request is submitted
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            
            // Prepare customer data
            $user_data = array(
                'name'     => strip_tags($this->input->post('name')),
                'email'     => strip_tags($this->input->post('email')),
                'phone'     => strip_tags($this->input->post('phone')),
                'address'=> strip_tags($this->input->post('address'))
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert customer data
                $insert = $this->post->insertCustomer($user_data);
                
                // Check customer data insert status
                if($insert){
                    // Insert order
                    $order = $this->placeOrder($insert);
                    
                    // If the order submission is successful
                    if($order){
                        $this->session->set_userdata('order_success', 'Order placed successfully.');
                        redirect('posts');
                    }else{
                       $this->session->set_userdata('order_fail', 'Order failed. Please try again');
                    }
                }else{
                    show_404();
                }
            }
        }
        
        // Customer data
        $data['user_data'] = $user_data;
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Pass post data to the view
        $this->load->view('posts/view', $data);
    }
    
    function placeOrder($user_id){
        // Insert order data
        $order_data = array(
            'customer_id' => $user_id,
            'grand_total' => $this->cart->total()
        );
        $insertOrder = $this->product->insertOrder($order_data);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['order_id']     = $insertOrder;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['price_total']     = $item["subtotal"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->product->insertOrderItems($ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }
    
   /* function orderSuccess($ordID){
        // Fetch order data from the database
        $data['order'] = $this->product->getOrder($ordID);
        
        // Load order details view
        $this->load->view($this->controller.'/order-success', $data);
    }*/
    
}