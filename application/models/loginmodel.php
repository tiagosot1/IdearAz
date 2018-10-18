<?php
/** 
 * LoginCI_Model Class
 * CI_Model com as funções de login
 *
 * 
 * 
 * 
 */ 

class Loginmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * verifica dados postados e seta as sessoes
	 * 
 	 * @access public
	 * @param string
	 * @param string
	 * @return boolean
	*/
	public function faz_login($login, $senha, $where = FALSE)
	{
		if( ! $where) {
			$where = array(
					'login' => $login,
					'senha' => md5($senha) 
					);
		}
		//verifica dados no bd
		$this->db->select('id, login, nome, email, tipo_usuario, situacao, COUNT(*) as total');
		$this->db->from('usuarios');
		$this->db->where($where);
		$this->db->limit(1);
		$res = $this->db->get()->row();
		
		//seta as sessões
		if($res->total < 1)
			return FALSE;
		else {
			if($res->situacao != 'I')
				$array = array(
							'id' => $res->id,
							'login' => $res->login,
							'email' => $res->email,
							'nome_usuario' => $res->nome,
							'tipo_usuario' => $res->tipo_usuario,
							'situacao' => $res->situacao,
							'logged_in' => TRUE
						);
			else
				$array['logged_in'] = FALSE;
				
			$this->session->set_userdata($array);
			
			//permissões
			
			$permissoes = $this->db->select('*')
				 		->from('permissoes_usuario')->where('usuarios_id', $res->id)
				 		->limit(1)->get()->row();
			
			$array_permissoes = array(
								'ofertas' => $permissoes->ofertas,
								'admin' => $permissoes->admin
							);
			$this->session->set_userdata($array_permissoes);
			
			return TRUE;
		}
	}
	
	public function primeiro_login($login = FALSE)
	{
		if( ! $where) {
			$where = array(
					'login' => $login 
					);
		}
		//verifica dados no bd
		$this->db->select('id, login, nome, email, tipo_usuario, situacao, COUNT(*) as total');
		$this->db->from('usuarios');
		$this->db->where($where);
		$this->db->limit(1);
		$res = $this->db->get()->row();
		
		//seta as sessões
		if($res->total < 1)
			return FALSE;
		else {
				$array = array(
							'id' => $res->id,
							'login' => $res->login,
							'tipo_usuario' => $res->tipo_usuario,
							'email' => $res->email,
							'situacao' => $res->situacao,
							'logged_in' => TRUE
						);
				
			$this->session->set_userdata($array);
			
			//permissões
			
			$permissoes = $this->db->select('*')
				 		->from('permissoes_usuario')->where('usuarios_id', $res->id)
				 		->limit(1)->get()->row();
			
			$array_permissoes = array(
								'ofertas' => $permissoes->ofertas,
								'admin' => $permissoes->admin
							);
			$this->session->set_userdata($array_permissoes);
			
			return TRUE;
		}
	}
	
	/**
	 * encerra a sessão
	 * 
 	 * @access public
	*/
	public function sair()
	{
		$this->session->sess_destroy();
	}



	/**
	 * verifica se existe usuário com email cadastrado
	 * 
 	 * @access public
	 * @param string
	*/
	public function verifica_cadastro($email)
	{
		//verifica dados no bd
		
		$this->db->select('id, email');
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$res = $this->db->get()->row();
		
		if( ! $res->id)
			return FALSE;
		else
			return $res;
	}
	
	
	
	/**
	 * Recupera/Valida chave
	 * 
 	 * @access public
	 * @param string
	*/
	public function valida_chave($chave)
	{
		//verifica dados no bd
		$this->db->select('user_hash.id, usuarios_id, email');
		$this->db->from('user_hash, usuarios');
		$this->db->where('chave', $chave);
		$this->db->where('validade >=', time() );
		$this->db->limit(1);
		$res = $this->db->get()->row();
		
		if( ! $res->usuarios_id)
			return FALSE;
		else
			return $res;
	}
	
	
	public function ver_se_logado()
	{
			if( ! $this->session->userdata('logged_in')) {
				
				$this->sair();				
				$this->session->set_flashdata('mensagem', 
											  exibir_notificacao('Você precisa esta logado para acessar esta página', 
																 'error') );
				
				redirect('painel/login/');
				return;
			}
	}
	/**
	 * Verifica se o usuário está logado
	 * Verificação é feita em todas as páginas
	 * 
 	 * @access public
	*/
	public function verifica_se_logado($tipo = FALSE, $id_logado = FALSE)
	{
/*
echo $this->uri->segment(1)."<br>";
echo $this->uri->segment(2)."<br>";
echo $this->session->userdata('logged_in')."<br>";
echo "this->session->userdata('admin'): ".$this->session->userdata('admin').'<br>';
exit;
*/
		if($this->uri->segment(1) == 'painel' AND $this->uri->segment(2) != 'login') {
			
//		echo "tipo: ".$tipo.'<br>';
//		echo "id_logado: ".$id_logado.'<br>';
			//verifica se está logado
//		echo "this->session->userdata('logged_in'): ".$this->session->userdata('logged_in').'<br>';
			if( ! $this->session->userdata('logged_in')) {
				
				$this->sair();				
				$this->session->set_flashdata('mensagem', 
											  exibir_notificacao('Você precisa esta logado para acessar esta página', 
																 'error') );
				
				redirect('painel/login/');
				return;
			}

			if($this->session->userdata('admin') != 'A') {
				//verifica pelo tipo
				if($tipo) {
					if($this->session->userdata($tipo) != 'A') {
						$this->session->set_flashdata('mensagem', 
													  exibir_notificacao('Você não tem permissão para acessar esta página', 
																		 'error') );
						redirect('painel/inicio/index');
						return;
					}
				}
			
				//verifica pelo id do usuário
				if($id_logado) {
					if($this->session->userdata('id') != $id_logado) {
						$this->session->set_flashdata('mensagem', 
													  exibir_notificacao('Você não tem permissão para acessar esta página', 
																		 'error') );
						redirect('painel/inicio/index');
						return;
					}
				}
			}
		}
	}

}
/* end of the file gallery.php */
/* Location: ./system/application/models/loginmodel.php */