<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   if($this->session->logged_in)
   {
		$session_data = $this->session->logged_in;
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
     redirect('login', 'refresh');
   }
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('/', 'refresh');
 }
 
 function manageItems()
 {
   if($this->session->logged_in)
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
 
  function addAdmin()
 {
   if($this->session->logged_in)
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