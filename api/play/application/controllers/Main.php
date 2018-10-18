<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		
		$this->load->model("usuarios");
		$this->load->model("mensagensChat");
		$data = array('mensagensChat' => $this->mensagensChat->retornaMensagens() );
		if($this->session->id_usuario){
			$this->load->view('adm/adm',$data);
		}else{
			redirect('Home');
		}
		
	}
}
?>