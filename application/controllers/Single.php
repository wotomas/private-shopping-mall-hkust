<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('item_model','',TRUE);	
	   $this->load->model('cart_model','',TRUE);
	}
	public function index()
	{
		echo 'test';
	}
	public function view($page = 'single')
	{
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
	
	public function show($category, $number)
	{
		//echo $category;
		//echo $number;

		
		/**
		?><pre><?php
		$data['title'] = ucfirst('single');
		print_r($data);
		?></pre><?php
		**/
		
		$items[] = $this->item_model->getAllFromCategory($category);
		$arraySize = count($items[0]);
		if($number >= $arraySize) {
			show_404();
		}
		
		$data = $items[0][$number];
				
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
		$page = 'single';
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
		
	}
	
	
}