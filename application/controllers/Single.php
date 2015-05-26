<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('item_model','',TRUE);	
	}
	public function view($page = 'single')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function show($category, $number)
	{
		//echo $category;
		//echo $number;
		$items[] = $this->item_model->getAllFromCategory($category);
		$arraySize = count($items[0]);
		if($number >= $arraySize) {
			show_404();
		}
		
		$data = $items[0][$number];
		
		
		/**
		?><pre><?php
		$data['title'] = ucfirst('single');
		print_r($data);
		?></pre><?php
		**/
		
		$page = 'single';
		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('templates/banners', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
		
		
	}
	
	
}