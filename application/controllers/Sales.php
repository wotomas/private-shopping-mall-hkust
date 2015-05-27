<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function index()
	{
		$page = 'sales';
		$this->load->model('cart_model','',TRUE);
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
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
	
	public function view($category = 'food')
	{
		//echo $category;
		//check category
		//call from item_model
		//thumbnail, price, detail, name
		$this->load->model('item_model','',TRUE);
		$this->load->model('cart_model','',TRUE);
		$page = 'sales';
		$data['category'] = $category;
		$data['items'] = $this->item_model->getAllFromCategory($category);
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
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
		/**
		?><pre><?php
		print_r($data);
		?></pre><?php
		**/
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
	}
	
	
}