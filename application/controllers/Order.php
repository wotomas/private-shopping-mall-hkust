<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('item_model','',TRUE);	
	   $this->load->model('cart_model','',TRUE);
	}
	
	public function index()
	{
		$page = 'order';
		$data['title'] = ucfirst($page);
		if($this->session->logged_in_user) {
			$session_data = $this->session->logged_in_user;
			$userID = $session_data['username'];
			
			$cart = $this->cart_model->getAll($userID);
			
			$data['carts'] = $cart;
			$data['cartSize'] = count($cart);
		} else {
			$data['carts'] = array();
			$data['cartSize'] = 0;
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
	}
	
	public function confirm()
	{
		//check cart list and redirect to main page when empty
		//when not empty insert order through order_model
		//if insert was successful, remove cart with current userID
		//if all successful, redirect to main page
	}
	
	
}