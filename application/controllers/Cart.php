<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//https://codeigniter.com/userguide3/libraries/cart.html

class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();      
    
        $this->load->library('cart');
        $this->load->model('post_model');
    }
    
    function index(){

        $data = array();
        
        $data['order_items'] = $this->cart->contents();
     
        $this->load->view('templates/header', $data);
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //not working properly maybe rowid?
    function updateItemQty(){

        $update;

        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        $remove = $this->cart->remove($rowid);

        redirect('cart/index');
    }
    
}