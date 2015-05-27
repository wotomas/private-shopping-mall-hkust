<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
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
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
		//Field validation failed.  User redirected to login page
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
   else
   {
     //Go to private area if admin_model
	 //go to main page when normal user
	 if($this->session->logged_in_admin) {
		  redirect('admin', 'refresh');
	 } else {
		redirect('/', 'refresh');
	 }
     
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->user_model->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->id,
		 'first_name' => $row->first_name,
		 'last_name' => $row->last_name		 
       );
       $this->session->set_userdata('logged_in_user', $sess_array);
     }
     return TRUE;
   }
   else
   {
	 $username = $this->input->post('username');  
	 $result = $this->admin_model->login($username, $password);
	 if($result)
	 {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'username' => $row->id,
			 'join_date' => $row->join_date
		   );
		   $this->session->set_userdata('logged_in_admin', $sess_array);
		 }
		 return TRUE; 
	 }
	 else
	 {
		$this->form_validation->set_message('check_database', 'Invalid username or password');
		return false;
	 }
     
   }
 }
}
?>