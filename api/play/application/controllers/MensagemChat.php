<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensagemChat extends CI_Controller {
	public function enviar(){
		$data = $this->input->post();

		$alerta = null;

		$this->form_validation->set_rules('descricao', 'DESCRICAO','required');
		if($this->form_validation->run() === TRUE){

			$this->load->model('mensagensChat');
			$insert = $this->mensagensChat->insertMensagem($data);

			if(!$insert['success']){
				//recarregar mensagem no chat
				$data = false;
				$alerta = array(

					"success" => false,
					"mensagem" => $insert["mensagem"] 
				);
				$success = false;
			}else{
				$success = true;
				$data = $insert["dados"] ;
			}

			
		}else{
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! Falha ao realizar o cadastro! <br>".validation_errors() 
			);
		}
		$dados = array(
					"success" => $success,
					"alerta" => $alerta,
					"data" => $data
		);
		echo json_encode($dados);
	}
	
}

?>