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
	redirect('', 'refresh');
 }
   
 function remove($number)
 {
	 if ( isset($_GET['link']) ) {
			$link = $_GET['link'];
	 } else {
			$link = '';
	 }
	 
	//when pressed remove
	if($this->session->logged_in_user) {
		$session_data = $this->session->logged_in_user;
		$userID = $session_data['username'];
		if($this->cart_model->remove($userID, $number)) {
			redirect($link, 'refresh');
		} else {
			redirect($link, 'refresh');
		}
		
	} else {
		$page = 'login';
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
 }
 
 function add($number)
 {
	if($this->session->logged_in_user) {
		$session_data = $this->session->logged_in_user;
		
		//echo 'add to cart item: '. $number;
		$item = $this->item_model->getFromCode($number);
		$quantity = $this->input->post('quantity');
	
		$data = array(
				'cart_user' => $session_data['username'],
				'cart_item_code' => $item[0]['item_code'],
				'quantity' => $quantity,
				'cart_date' => date('Y-m-d'),
				'thumbnail' => $item[0]['thumbnail'],
				'price' => $item[0]['price']
				);
		if($this->cart_model->insert($data)) {
			//insert was successful
			//move to sales page
			redirect('/sales/'. $item[0]['category'], 'refresh');
		}
		else {
			//redirect to home
			redirect('', 'refresh');
		}
		
	
	} else {
		redirect('login','refresh');
	}
	
	
	
 }
 
}
 
?>