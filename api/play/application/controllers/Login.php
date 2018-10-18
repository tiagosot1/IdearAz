<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function logar()
	{
		$data = $this->input->post();
		$alerta = null;
		if($this->input->post('captcha')) redirect();
		$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
		$this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[8]');

		if($this->form_validation->run() === TRUE){
			$this->load->model('usuarios');
			$usuarioLoagado = $this->usuarios->logar($data);

			if($usuarioLoagado["success"]){
				$alerta = array(

					"class" => $usuarioLoagado["class"],
					"mensagem" => $usuarioLoagado["mensagem"] 
				);
			}else{
				$alerta = array(

					"class" => $usuarioLoagado["class"],
					"mensagem" => $usuarioLoagado["mensagem"] 
				);
			}
		}else{
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! Falha ao realizar o login! <br>".validation_errors() 
			);
		}
		$dados = array(
			"alerta" => $alerta
	    );

	    $this->load->view('login',$dados);
	}

	public function sair(){
		//echo 'deslogado';
		$this->load->library('session');
		if($this->session->id_usuario > 0){
			$this->session->sess_destroy();
			redirect('Home');
			
		}
	}

	public function index(){
		$this->load->view('login');
	}

	public function esqueceu_senha(){
		$this->load->view('home/esqueceu_senha');
	}

	public function email_senha()
	{
		$data = $this->input->post();
		$alerta = null;
		if($this->input->post('captcha')) redirect();
		$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
		if($this->form_validation->run() === TRUE){
			$this->load->model('usuarios');
			$verificaEmail = $this->usuarios->verifica_email($data);

			if($verificaEmail["success"]){
				$alerta = array(

					"class" => $verificaEmail["class"],
					"mensagem" => $verificaEmail["mensagem"] 
				);
			}else{
				$alerta = array(

					"class" => $verificaEmail["class"],
					"mensagem" => $verificaEmail["mensagem"] 
				);
			}
		}else{
			$alerta = array(
				"class" => "danger",
				"mensagem" => "O e-mail informado não é valido.".validation_errors() 
			);
		}

		$dados = array(
			"alerta" => $alerta
	    );

	    $this->load->view('home/esqueceu_senha',$dados);
	}
}
