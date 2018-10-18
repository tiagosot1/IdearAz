<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');


class MensagensChat extends CI_Model
{
	
	function __construct()
	{
		
	}

	public function insertMensagem($data){
		if($data){
			$this->load->library('session');
			$hoje = date('Y-m-d');
			$hora = date('H:i');
			$dadosInsert = array(
				'usuario_id' => $this->session->id_usuario,
				'descricao' => $data["descricao"],
				'data' => $hoje,
				'hora' => $hora

			);
			$this->db->insert('tab_mensagens_chat',$dadosInsert);
			if(!$this->db->affected_rows()){

				$alerta = array(
					"success" => false,
					"class" => "danger",
					"mensagem" => "Não foi possivel adicionar a mensagem!!!"
				);
			}else{
				//$dados = MensagensChat::retornaMensagens();
				$id_mensagem = $this->db->insert_id();
				$sql = "SELECT mensagem.id,usuario_id,usuario.nome as nome_usuario,foto_perfil,descricao,data as data_mensagem,hora from 
						tab_mensagens_chat as mensagem INNER JOIN tab_usuarios as usuario on mensagem.usuario_id = usuario.id
						Where mensagem.id = '".$id_mensagem."'";
				$mensagensChat = $this->db->query($sql);
				$dados = null;
				foreach($mensagensChat->result() as $row){
					$dados['nome_usuario'] = $row->nome_usuario;
					$dados['foto_perfil'] = $row->foto_perfil;
					$dados['descricao'] = $row->descricao;
					$dados['data_mensagem'] = $row->data_mensagem;
					$dados['hora'] = $row->hora;
					$dados['usuario_id']= $row->usuario_id;
					$dados['usuario_sessao'] = $this->session->id_usuario;
				}
				$alerta = array(
					"success" => true,
					"dados" => $dados
					
				);
			}
			
			
			
			//var_dump($dadosUsuario);
			
			return $alerta;
		}
	}

	

	public function retornaMensagens(){
			$hoje = date('Y-m-d');
			// $this->db->join('tab_usuarios','tab_mensagens_chat.usuario_id = tab_usuarios.id');
			// $this->db->where('data',$hoje);
			$sql = "SELECT mensagem.id,usuario_id,usuario.nome as nome_usuario,foto_perfil,descricao,data as data_mensagem,hora from 
			tab_mensagens_chat as mensagem INNER JOIN tab_usuarios as usuario on mensagem.usuario_id = usuario.id
			Where data = '".$hoje."' order by mensagem.id asc";
			$dados = $this->db->query($sql);

			return $dados;
	}
}
?>
