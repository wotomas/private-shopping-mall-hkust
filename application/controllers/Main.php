<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
		
	
	
	public function view($page = 'index')
	{
		$this->load->model('cart_model','',TRUE);
		$this->load->model('item_model','',TRUE);
		
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
		$items = $this->item_model->getAll();
		if(count($items) < 2){
			$items = array(
					array(
					'item_name' => 'test',
					'thumbnail' => 'null',
					'price' => 0,
					'category' => 'food'
					), 
					array(
					'item_name' => 'test',
					'thumbnail' => 'null',
					'price' => 0,
					'category' => 'food'
					)
					);
		}
		$data['items'] = $items;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
	}
	
	
}