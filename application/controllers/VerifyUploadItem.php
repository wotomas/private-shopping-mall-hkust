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
   $this->form_validation->set_rules('category', 'category', 'trim|required');
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
	    //Field validation succeeded.  
		$itemName = $this->input->post('itemName');
		$originalPrice = $this->input->post('originalPrice');
		$price = $this->input->post('price');
		$details = $this->input->post('details');
		$category = $this->input->post('category');
		$fileupload = 'admin/'. $this->input->post('fileupload');
		$currentDate = date('Y-m-d');
		$show = 'show';
		
		$upload_array = array();
		$upload_array = array(
         'item_name' => $itemName,
		 'originalprice' => $originalPrice,
		 'price' => $price,
		 'detail' => $details,
		 'category' => $category,
		 'thumbnail' => $fileupload,
		 'upload_date' => $currentDate,
		 'exposure' => $show
       );
	   
		// *************** //
		//  Check Results  //
		// *************** //
		/**
		echo $upload_array['itemName'];
		echo $upload_array['originalPrice'];
		echo $upload_array['price'];
		echo $upload_array['details'];
		echo $upload_array['category'];
		echo $upload_array['fileupload'];
		**/
		
		//query the database Upload the items to database
		if($this->item_model->insert($upload_array))
		{
			redirect('admin', 'refresh');
		}
		else
		{
			echo 'too bad!';
		}
		
		
   }
 
  }
 
}
?>