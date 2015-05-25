<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
	$this->load->helper(array('form'));
	if($this->session->logged_in_user || $this->session->logged_in_admin) {
		redirect('/', 'refresh');
	}
	else {
		$page = 'login';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

 }
 
}
 
?>