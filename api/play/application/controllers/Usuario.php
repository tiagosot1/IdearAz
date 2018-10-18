<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function registrar()
	{
		$data = $this->input->post();
		$alerta = null;
		if($this->input->post('captcha')) redirect();

		$this->form_validation->set_rules('nome', 'NOME','required');
		$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
		$this->form_validation->set_rules('email2', 'Conferencia Email', 'required|valid_email|matches[email]');
		$this->form_validation->set_rules('senha', 'SENHA', 'required|min_length[8]');
		$this->form_validation->set_rules('estado', 'ESTADO', 'required');
		$this->form_validation->set_rules('municipio', 'MUNICIPIO', 'required');
		$this->form_validation->set_rules('data_nascimento', 'Data de nascimento', 'callback_checkDateFormat');

		if($this->form_validation->run() === TRUE){

			$this->load->model("usuarios");
			$insert = $this->usuarios->insertUsuario($data);
			//echo $insertUsuario->alerta["success"];
			//var_dump($insert["success"]) ;	
			if($insert["success"]){
				$alerta = array(

					"class" => $insert["class"],
					"mensagem" => $insert["mensagem"] 
				);
			}else{
				$alerta = array(

					"class" => $insert["class"],
					"mensagem" => $insert["mensagem"] 
				);
			}
			
		}else{
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! Falha ao realizar o cadastro! <br>".validation_errors() 
			);
		}
		$dados = array(
			"alerta" => $alerta,
			"data" => $data
	    );
		$this->load->model("municipios");
		$this->load->view('home',$dados);
	}
	public function ativar(){
		$id_usuario = isset($_GET['id']) ? $_GET['id'] : 0;
		$this->load->model("usuarios");
		$ativado = $this->usuarios->ativaUsuario($id_usuario);
		$alerta = null;
		if($ativado["success"]){
			$alerta = array(

				"class" => $ativado["class"],
				"mensagem" => $ativado["mensagem"]
			);
		}else{
			$alerta = array(

				"class" => $ativado["class"],
				"mensagem" => $ativado["mensagem"]
			);
		}
		// if($ativado){
		// 	echo 'Ativado com sucesso!';
		// }else{
		// 	echo 'Nao foi possivel ativar';
		// }
		$dados = array(
			"alerta" => $alerta
	    );
		//var_dump($dados);
		$this->load->view('login',$dados);
	}
	function checkDateFormat($date) {
		
		$this->load->helper('formata_data');
		$hoje=date('Y-m-d');
		$date_diff=abs(strtotime($hoje) - strtotime(data_us($date)));
		$idade = floor(($date_diff)/(60*60*24*365));

		if($idade >= 18){
			return true;
		}else{
			$this->form_validation->set_message('checkDateFormat', 'Você não possui 18 anos, e sim '.$idade );
            return FALSE;
		}
		//echo " date difference in years => ".floor(($date_diff)/(60*60*24*365)) ." years <br>";

		return $date;
	}
	public function resetar_senha(){
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$id_usuario = $this->encryption->decode_url($id);
		if($id_usuario){
			$this->load->library('encryption');
			
			$dados = array(
				"id_usuario" => $id
		    );

			$this->load->view('home/reseta_senha',$dados);

		}else{
			$alerta = array(

				"class" => "danger",
				"mensagem" => "O id do usuário nāo foi carregado"
			);
			$dados = array(
				"alerta" => $alerta
		    );
			$this->load->view('home/esqueceu_senha',$dados);
		}
	}

	public function registrar_senha(){
		$data = $this->input->post();
		$alerta = null;
		if($this->input->post('captcha')) redirect();
		$this->form_validation->set_rules('id_usuario', 'Id do Usuario','required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		$this->form_validation->set_rules('senha2', 'Conferencia Senha', 'required|matches[senha]');

		if($this->form_validation->run() === TRUE){
			$this->load->model("usuarios");
			$reset = $this->usuarios->registraSenha($data);
			//echo $resetUsuario->alerta["success"];
			//var_dump($reset["success"]) ;	
			if($reset["success"]){
				$alerta = array(

					"class" => $reset["class"],
					"mensagem" => $reset["mensagem"] 
				);
				$dados = array(
					"alerta" => $alerta,
					"data" => $data,
					"id_usuario" => $data['id_usuario']
			    );
				$this->load->view('login',$dados);
			}else{
				$alerta = array(

					"class" => $reset["class"],
					"mensagem" => $reset["mensagem"] 
				);
				$dados = array(
					"alerta" => $alerta,
					"data" => $data,
					"id_usuario" => $data['id_usuario']
			    );
				$this->load->view('home/esqueceu_senha',$dados);
			}
		}else{
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! Falha ao resetar a senha! <br/>".validation_errors() 
			);
		}

	}


}
