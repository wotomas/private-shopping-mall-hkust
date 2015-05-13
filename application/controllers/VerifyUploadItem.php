<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyUploadItem extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('item_model','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('itemName', 'itemName', 'trim|required');
   $this->form_validation->set_rules('originalPrice', 'originalPrice', 'trim|required');
   $this->form_validation->set_rules('price', 'price', 'trim|required');
   $this->form_validation->set_rules('details', 'details', 'trim|required');
   $this->form_validation->set_rules('fileupload', 'fileupload', 'trim|required');
 
   if($this->form_validation->run() == FALSE)
   {
		//Field validation failed.  User redirected to login page
		
		$page = 'admin';
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['username'] = $this->session->username;
		
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
 
}
?>