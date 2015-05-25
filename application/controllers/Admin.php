<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   if($this->session->logged_in_admin)
   {
		$session_data = $this->session->logged_in_admin;
		$this->load->model('item_model','',TRUE);	   
		
		$data['username'] = $session_data['username'];
		$data['join_date'] = $session_data['join_date'];
     	$page = 'admin';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/adminbanners', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('/', 'refresh');
   }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in_admin');
   $this->session->unset_userdata('logged_in_user');
   session_destroy();
   redirect('/', 'refresh');
 }
 
 function manageItems()
 {
   if($this->session->logged_in_admin)
   {
		$session_data = $this->session->logged_in;
		
		$data['username'] = $session_data['username'];
		$data['join_date'] = $session_data['join_date'];
		$this->load->model('item_model','',TRUE);	
		$temp = $this->item_model->getAll();
		
		?><pre><?php
		print_r($temp);
		?></pre><?php
		
     	$page = 'manageItems';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/adminbanners', $data);
		$this->load->view('pages/'.$page, $temp);
		$this->load->view('templates/footer', $data);
		
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function removeitem($id)
 {
   if($this->session->logged_in_admin)
   {		
		//call item model
		//remove from model(database)
		//remove image from disk
		$this->load->model('item_model','',TRUE);	
		if($this -> item_model -> remove($id)) {
			redirect('manageItems', 'refresh');
		} else {
			echo 'item delete was not successful';
		}
		
		
		
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
 function edititem($id)
 {
   if($this->session->logged_in_admin)
   {
	   
		echo 'not yet implemented editing item<br>';
		echo 'editing item number: ' . $id;
		//redirect to editing mode
		//not implement in phase 1
		
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
  function addAdmin()
 {
   if($this->session->logged_in_admin)
   {
		$session_data = $this->session->logged_in;
		
		$data['username'] = $session_data['username'];
		$data['join_date'] = $session_data['join_date'];
     	$page = 'addAdmin';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/adminbanners', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
 
}
 
?>