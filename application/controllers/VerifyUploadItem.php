<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyUploadItem extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('item_model','',TRUE);	   
		$userID = $this->session->logged_in_admin;
		$itemName = $this->input->post('itemName');
		 //upload config settings
	   	$config['upload_path'] = 'assets/images/' . $userID['username'] . '/' . $itemName;
		if(!is_dir($config['upload_path']))
		{
		  mkdir($config['upload_path'],0755,TRUE);
		} 
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
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
   $this->form_validation->set_rules('fileupload', 'fileupload', 'callback_handle_upload');
 
   if($this->form_validation->run() == FALSE)
   {
		//Field validation failed.  User redirected to login page
		
		$page = 'admin';
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['username'] = $this->session->username;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/adminbanners', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
   }
   else
   {
		$userID = $this->session->logged_in_admin;
		$upload_data = $this->upload->data();
		$filename = $upload_data['file_name'];
		
	    //Field validation succeeded.  
		$itemName = $this->input->post('itemName');
		$originalPrice = $this->input->post('originalPrice');
		$price = $this->input->post('price');
		$details = $this->input->post('details');
		$category = $this->input->post('category');
		//$fileupload = './assets/images/' . $userID['username'] . '/' . $itemName;
		$fileupload = '/assets/images/' . $userID['username'] . '/' . $itemName . '/' . $filename;
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
		if($this->item_model->insert($upload_array))
		{
			redirect('admin', 'refresh');
		}
		else
		{
			echo 'too bad!';
		}
			
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
		
   }
 
  }
  function handle_upload()
  {
		/**
	  	$this->form_validation->set_message('handle_upload', "testing!");	
		return false;
		**/
		if (isset($_FILES['fileupload']) && !empty($_FILES['fileupload']['name']))
		{
			$files = $_FILES;
			$cpt = count($_FILES['fileupload']['name']);
			$userID = $this->session->logged_in_admin;
			$itemName = $this->input->post('itemName');
			
			for($i=0; $i<$cpt; $i++)
			{
				$_FILES['fileupload']['name']= $files['fileupload']['name'][$i];
				$_FILES['fileupload']['type']= $files['fileupload']['type'][$i];
				$_FILES['fileupload']['tmp_name']= $files['fileupload']['tmp_name'][$i];
				$_FILES['fileupload']['error']= $files['fileupload']['error'][$i];
				$_FILES['fileupload']['size']= $files['fileupload']['size'][$i];   
								
				$this->upload->initialize($this->set_upload_options());
				if ( !$this->upload->do_upload('fileupload'))
				{
					// possibly do some clean up ... then throw an error
					$this->form_validation->set_message('handle_upload', $this->upload->display_errors());
					return false;
					
				}
			}
			$upload_data = $this->upload->data();
			$filename = $upload_data['file_name'];
			return true;
		}
		else
		{
		  // throw an error because nothing was uploaded
		  $this->form_validation->set_message('handle_upload', "You must upload an image!");
		  return false;
		}
		if ( ! $this->upload->do_upload('fileupload', FALSE))
		{
			//$error = array('error' => $this->upload->display_errors());
				$page = 'admin';
				$data['title'] = ucfirst($page); // Capitalize the first letter
				$data['username'] = $this->session->username;
				
				$this->load->view('templates/header', $data);
				$this->load->view('templates/adminbanners', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer', $data);		
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			//query the database Upload the items to database
			
		}
  }
  private function set_upload_options()
  {   
//  upload an image options
    $config = array();
    $userID = $this->session->logged_in_admin;
	$itemName = $this->input->post('itemName');
		 
		 //upload config settings
	   	$config['upload_path'] = './assets/images/' . $userID['username'] . '/' . $itemName;
		if(!is_dir($config['upload_path']))
		{
		  mkdir($config['upload_path'],0755,TRUE);
		} 
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite'] = TRUE;
		


    return $config;
  }
 
}
?>