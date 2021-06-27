<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lok_Model');
		// $this->load->model('Cir_Model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot');
	}
	public function map2()
	{
		$data['data'] = $this->Lok_Model-> getloc();
		$this->load->view('template/head');
		$this->load->view('index');
		$this->load->view('template/foot2', $data);
	}
	public function form()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('cord','cord','required');
		
		if($this->form_validation->run() == false){
			$this->load->view('template/head');
			$this->load->view('form');
			$this->load->view('template/foot');	
		}else{
			$this->Lok_Model->tambahDatalokasi();
			redirect('Tamp/form');
		}
		
		
	}
}
