<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');


class Usuarios extends CI_Model
{
	
	function __construct()
	{
		
	}

	public function insertUsuario($data){
		if($data){
			$alerta = null;
			$this->db->where('email',$data["email"]);
			$dadosUsuario = $this->db->get("tab_usuarios");
			
			if($dadosUsuario->result()){
				$alerta = array(
						"success" => false,
						"class" => "danger",
						"mensagem" => "Ja existe um usuário cadastro com esse email: <br>".$data["email"]
				);
			}else{
				$this->load->helper('formata_data');
				$this->load->library('encryption');
				$dadosInsert = array(
					'nome' => $data["nome"],
					'apelido' => $data["apelido"],
					'email' => $data["email"],
					'senha' => $this->encryption->encrypt($data["senha"]),
					'cidade_id' => $data["municipio"],
					'data_nascimento' => data_us($data["data_nascimento"]),
					'ativado' => '1'

				);
				$this->db->insert('tab_usuarios',$dadosInsert);
				if($this->db->affected_rows()){

					
					$id_usuario = $this->db->insert_id();
				
					$link = base_url("Usuario/ativar").'?&id='.$this->encryption->encode_url($id_usuario);
					$mensagem_email = "Seja Bem Vindo ao Play Cash
					Para ativar sua conta clique no link abaixo ".$link."  Jogue Video Game e ganhe Dinheiro!!!";
					$erroEmail = "";
					$this->load->library('email');	
					if(!$this->email->envia_email($data['email'],$mensagem_email)){
						$erroEmail = "Email não enviado, contate a equipe de suporte!";
					}

					$alerta = array(
						"success" => true,
						"class" => "success",
						"mensagem" => "Cadastro realizado com sucesso, acesse seu e-mail para ativa-lo!".$erroEmail
					);
				}else{
					$alerta = array(
						"success" => false,
						"class" => "danger",
						"mensagem" => "Não foi possivel realizar o cadastro"
					);
				}
			}
			
			
			//var_dump($dadosUsuario);
			
			return $alerta;
		}
	}

	public function ativaUsuario($id){
		$alerta = null;
		if($id){
			$this->load->library('encryption');
			$id_usuario = $this->encryption->decode_url($id);
		
			$this->db->where('id',$id_usuario);
			$this->db->where('ativado','2');
			$dadosUsuario = $this->db->get("tab_usuarios");

			if($dadosUsuario->result()){
				$alerta = array(
						"success" => false,
						"class" => "danger",
						"mensagem" => "O usuario ja esta ativado ".$id_usuario
				);
			}else{
				$updateUsuario = array('ativado' => '2');
				$this->db->where('id',$id_usuario);
				$this->db->update('tab_usuarios',$updateUsuario);

				if($this->db->affected_rows()){
					$alerta = array(
						"success" => true,
						"class" => "success",
						"mensagem" => "Usuário ativado com sucesso! entre com seu login e senha para logar."
					);
				}else{
					$alerta = array(
						"success" => false,
						"class" => "danger",
						"mensagem" => "O usuário não foi encontrado, contate a equipe de suporte. ".$id_usuario
					);
				}
			}
		}else{
			$alerta = array(
				"success" => false,
				"class" => "danger",
				"mensagem" => "Não foi possivel ativar o usuario, o id nao foi carregado"
			);
		}

		return $alerta;
	}

	public function logar($data){
		if ($data) {
			$alerta = null;
			$this->db->where('email',$data["email"]);
			$dadosUsuario = $this->db->get("tab_usuarios");
			
			if($dadosUsuario->result()){
				foreach($dadosUsuario->result() as $dados) {
					//var_dump($dados->senha);
					$this->load->library('encryption');
					$senhaBd = $this->encryption->decrypt($dados->senha);
					
					//var_dump($senhaBd);
					if( $senhaBd == $data['senha']){
						$this->load->library('session');
						$this->session->id_usuario = $dados->id;
						$this->session->email = $dados->email;
						$this->session->apelido = $dados->apelido;
						$this->load->helper('perfil_time');
						atualiza_time_perfil($dados->id);
						redirect('Main');
					}else{
						$alerta = array(
								"success" => false,
								"class" => "danger",
								"mensagem" => "A senha esta incorreta ".$senhaBd
						);
					}
				}
			}else{
				$alerta = array(
						"success" => false,
						"class" => "danger",
						"mensagem" => "Esse usuário não foi encontrado em nossa base de dados: <br>".$data["email"]
				);
			}

			return $alerta;
		}
	}

	public function verifica_email($data){
		if($data){
			$alerta = null;
			$this->db->where('email',$data["email"]);
			$dadosUsuario = $this->db->get("tab_usuarios");

			if($dadosUsuario->result()){
				foreach($dadosUsuario->result() as $dados) {
					$this->load->library('encryption');

					$link = base_url("Usuario/resetar_senha").'?&id='.$this->encryption->encode_url($dados->id);
					$mensagem_email = "Play Cash,
					Para resetar sua senha clique no link abaixo ".$link."  Jogue Video Game e ganhe Dinheiro!!!";
					$erroEmail = "";
					$this->load->library('email');	
					if(!$this->email->reseta_senha_email($data['email'],$mensagem_email)){
						$erroEmail = "Email não enviado, contate a equipe de suporte!";
						$alerta = array(
							"success" => false,
							"class" => "danger",
							"mensagem" => $erroEmail
						);
					}else{
						$alerta = array(
							"success" => true,
							"class" => "success",
							"mensagem" => "Email enviado com sucesso, acesse seu email para resetar sua senha!"
						);
					}

					

				}
			}else{
				$alerta = array(
							"success" => false,
							"class" => "danger",
							"mensagem" => 'O email informado nāo foi encontrado em nossa base de dados'
						);
			}

			return $alerta;
		}
	}

	public function registraSenha($data){
		$alerta = null;
		if($data){
			$this->load->library('encryption');
			$id_usuario = $this->encryption->decode_url($data['id_usuario']);

			if($id_usuario){
				$this->db->where('id',$id_usuario);
				$this->db->where('ativado','2');
				$dadosUsuario = $this->db->get("tab_usuarios");
				if($dadosUsuario->result()){
					$updateUsuario = array('senha' => $this->encryption->encrypt($data['senha']));
					$this->db->where('id',$id_usuario);
					$this->db->update('tab_usuarios',$updateUsuario);
					if($this->db->affected_rows()){
						$alerta = array(
							"success" => true,
							"class" => "success",
							"mensagem" => "Senha alterada com sucesso! entre com seu login e senha para logar."
						);
					}else{
						$alerta = array(
							"success" => false,
							"class" => "danger",
							"mensagem" => "Erro ao alterar sua senha, contate a equipe de suporte. "
						);
					}
				}else{
					$alerta = array(
							"success" => false,
							"class" => "danger",
							"mensagem" => "O usuário nāo foi encotrado, ou nāo esta ativado "
					);
				}
			}else{
				$alerta = array(
					"success" => false,
					"class" => "danger",
					"mensagem" => "Não foi possivel resetar a senha, o id nao foi carregado"
				);
			}
			return $alerta;
		}
	}

	public function atualizaUsuarioOnline($id_usuario){
		$updateTime = array('time' => date('Y-m-d H:i:s'));
		$this->db->where('id',$id_usuario);
		$this->db->update('tab_usuarios',$updateTime);
		if(!$this->db->affected_rows()){
			return false;
		}else{
			return true;
		}
	}
	
	public function inserir_noticacaoes_pagseguro($dadosInsert)
	{
		
		 	return $this->db->insert('notification_pagseguro',$dadosInsert);
		
    }
	
	public function insert_transacao_pagseguro($dadosInsert)
	{
		
		 	return $this->db->insert('transaction_pagseguro',$dadosInsert);
		
    }
	
	public function get_transacao_pagseguro($dadosGet)
	{
		
			$this->db->select('id');	
			$this->db->where("codeTransaction",$dadosGet);
			$consulta=$this->db->get('transaction_pagseguro');
			
			return $consulta->result();
				
    }
    public function retornaUsuario($id_usuario){
		if($id_usuario){

			$this->db->where('id',$id_usuario);
			$dadosUsuario = $this->db->get("tab_usuarios");

			return $dadosUsuario;
		}
	}
}
?>
