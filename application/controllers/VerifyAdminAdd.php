<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyAdminAdd extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('admin_model','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('adminUsername', 'adminUsername', 'trim|required');
   $this->form_validation->set_rules('password', 'password', 'trim|required');
   $this->form_validation->set_rules('passwordCheck', 'passwordCheck', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
		//Field validation failed.  User redirected to login page
		$page = 'addAdmin';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
   }
   else
   {
     //Go to private area
     redirect('admin', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   //check Two passwords are equal
   $password = $this->input->post('password');
   $passwordCheck = $this->input->post('passwordCheck');
   $joinDate = date('Y-m-d');
   
   if(strcmp($password, $passwordCheck) == 0)
   {
			//Field validation succeeded.  Validate against database
			$username = $this->input->post('adminUsername');
			$upload_array = array();
				$upload_array = array(
				 'id' => $username,
				 'password' => $password,
				 'join_date' => $joinDate
			   );
 
			//query the database
			$result = $this->admin_model->register($upload_array);
		 
			if($result)
			{
				 return TRUE;
			}
		    else
			{
				 $this->form_validation->set_message('check_database', 'Invalid Username or Password');
				 return false;
			}
	   
   }
   else
   {
		$this->form_validation->set_message('check_database', 'Two Passwords are not equal');
		return false;
   }
   
 }
}
?>