<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('envia_email')){

	function envia_email($data){
		$this->load->library('email');
		$this->email->from('playcash@playcash.com.br', 'Play Cash');
		$this->email->to($data['email']);
		
		$this->email->subject('Ative sua conta');
		$this->email->message($mensagem_email);

		if(!$this->email->send()){
			$erroEmail = "Email não enviado, contate a equipe de suporte!";
		}
	}
}


?>