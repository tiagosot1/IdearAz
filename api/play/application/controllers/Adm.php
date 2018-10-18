<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adm extends CI_Controller {

	public function index()
	{
				$this->load->library('session');
		$this->load->model("usuarios");
		$this->load->view('adm/adm');
	}
	
	}
