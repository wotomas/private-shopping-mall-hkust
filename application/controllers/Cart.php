<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('cart_model','',TRUE);
   $this->load->model('item_model','',TRUE);
 }
 
 function index()
 {
	echo 'test';
 }
 
 function checkout()
 {
	//when pressed checkout
	if($this->session->logged_in_user) {
		
	} else {
		$page = 'login';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
 }
 
 
 function remove($number)
 {
	//when pressed remove
	if($this->session->logged_in_user) {
		$session_data = $this->session->logged_in_user;
		$userID = $session_data['username'];
		if($this->cart_model->remove($userID, $number)) {
			echo 'remove was successful';
		} else {
			echo 'remove was unsuccessful';
		}
		
	} else {
		$page = 'login';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
 }
 
 function add($number)
 {
	if($this->session->logged_in_user) {
		$session_data = $this->session->logged_in_user;
		
		//echo 'add to cart item: '. $number;
		$item = $this->item_model->getFromCode($number);
		
		
		$data = array(
		'cart_user' => $session_data['username'],
		'cart_item_code' => $item[0]['item_code'],
		'quantity' => '1',
		'cart_date' => date('Y-m-d')
		);
		
		if($this->cart_model->insert($data)) {
			//insert was successful
			//move to sales page
			echo 'Success to add to cart item: '. $number;
		}
		else {
			echo 'Failed to add to cart item: '. $number;
		}
		/**
		?><pre><?php
		print_r($item);
		?></pre><?php
		**/
	
	} else {
		
		$page = 'login';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
	
	
	
 }
 
}
 
?>