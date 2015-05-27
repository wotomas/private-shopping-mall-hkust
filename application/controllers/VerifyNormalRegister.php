<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyNormalRegister extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user_model','',TRUE);
   $this->load->model('admin_model','',TRUE);
   
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
   $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
   $this->form_validation->set_rules('username', 'User ID', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
		//Field validation failed.  User redirected to login page
		$page = 'register';
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
   else
   {
     //Register successful move to main page
		redirect('/', 'refresh');
     
   }
 
 }
 
 function check_database($password)
 {
   $passwordCheck = $this->input->post('passwordCheck');
   if(strcmp($password, $passwordCheck) != 0) {
		$this->form_validation->set_message('check_database', 'Two passwords are not equal! Please try again!');
		return false;
   }
   
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $first_name = $this->input->post('first_name');
   $last_name = $this->input->post('last_name');
 
   //query the database
   $result = $this->user_model->checkID($username);
 
   if($result)
   {
     $this->form_validation->set_message('check_database', 'Username is currently used by a different ID. Please try some different username!');
	 return false;
   }
   else
   {
	 $username = $this->input->post('username');  
	 $result = $this->admin_model->checkID($username);
	 if($result)
	 {
		$this->form_validation->set_message('check_database', 'Username is currently used by a different ID. Please try some different username!');
		return false;
	 }
	 else
	 {
		 $data = array(
			'id' => $username,
			'password' => $password,
			'first_name' => $first_name,
			'last_name' => $last_name
			);
		 $this->user_model->register($data);
		return true;
	 }
     
   }
 }
}
?>