<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Play_Email extends CI_Email
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function envia_email($remetente,$mensagem_email){
		//$this->load->library('email');
		$this->from('playcash@playcash.com.br', 'Play Cash');
		$this->to($remetente);
		
		$this->subject('Ative sua conta');
		$this->message($mensagem_email);

		// if(!$this->email->send()){
		// 	$erroEmail = "Email não enviado, contate a equipe de suporte!";
		// }
		return $this->send();
	}

	public function reseta_senha_email($remetente,$mensagem_email){
		//$this->load->library('email');
		$this->from('playcash@playcash.com.br', 'Play Cash');
		$this->to($remetente);
		
		$this->subject('Resete sua senha');
		$this->message($mensagem_email);

		// if(!$this->email->send()){
		// 	$erroEmail = "Email não enviado, contate a equipe de suporte!";
		// }
		return $this->send();
	}
}

?>