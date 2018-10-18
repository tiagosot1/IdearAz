<?php
/** 
 * Usuarios class
 * Grenciador dos usuários
 */ 
class Usuarios extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
		//verifica login
//		$this->loginmodel->verifica_se_logado('admin');
		
//		$this->menumodel->top_menu = 'usuarios';
		$this->load->model('usuariosmodel', 'u');
		$this->load->model('paginasmodel', 'paginas');
		
		$this->load->model('supermodel', 's');

		$this->load->library('session');
		if ($this->session->userdata('id')!=TRUE) {
			redirect('painel/login');
		}
//		$this->output->enable_profiler(TRUE);
//		error_reporting(E_ALL);
	}
	
	/**
	 * Apernas redireciona para a listagem
	 * 
 	 * @access public
	*/
	public function index()
	{
		redirect('painel/usuarios/listar/todos');
	}

	/**
	 * Form para editar usuario
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function editar($id)
	{
		
		// traz dados do usuário (model usuariosmodel (alias u)   Tabela: usuarios)
		$dados['usuario'] = $this->u->get_usuarios(FALSE, FALSE, $id);
		$dados['p_adm'] = 'active';
		$dados['configuracao'] = $this->s->get_confg();
//		$dados['redes_sociais'] = $this->redes->get_redes(FALSE, FALSE, FALSE);
		$retorna = 'painel/usuarios/editar';
//		echo "fim";
//		exit;
		$this->template->load('painel/template', $retorna, $dados);
	}
	
	/**
	 * Salva dados de atualização
	 * 
 	 * @access public
 	 * @param string
 	 * @param integer
	*/
	public function salvar_editar($tipo,$id)
	{
		//valida dados de acordo com o tipo de dado postado
		switch($tipo) {
			case 'pessoal' :
				if( $this->form_validation->run('editar_usuario') == FALSE )
					$erro = validation_errors();
				else {						
					//dados postados
					$dados['login']		= $this->input->post('login');
					$dados['nome']		= $this->input->post('nome');
					
				}
				break;
				
			case 'senha' :
				if( $this->form_validation->run('alterar_senha_admin') == FALSE )
					$erro = validation_errors();
				else 
					$dados['senha'] = md5( 123456 );
				break;
							
			case 'seo' :
					$dados['keywords'] 		= $this->input->post('keywords');
					$dados['description'] 	= $this->input->post('description');
					$dados['site_verification'] 	= $this->input->post('site_verification');
					$dados['analitics'] 	= $this->input->post('analitics');
					$dados['email']		= $this->input->post('email');
					$dados['site']	= prep_url( $this->input->post('website') );
					$dados['endereco']	= $this->input->post('estado');
					$dados['telefone']	= $this->input->post('fones3');
					$dados['facebook']		= $this->input->post('facebook');
					$dados['twitter']		= $this->input->post('twitter');
					$dados['gplus']		= $this->input->post('youtube');
					$dados['titulo_site']		= $this->input->post('titulowebsite');
					
				break;

			default :
				$erro = 'Tipo inválido';
		}
		
		//salva
		if( ! $erro ) {
			if($tipo == 'permissoes') {
				if( ! $this->supermodel->salvar('permissoes_usuario', $dados, $permissoes->id) )
					$erro = 'Não foi possível salvar os dados no banco!';
					
				if( ! $this->supermodel->salvar('usuarios', $dados, $id) )
					$erro = 'Não foi possível salvar os dados no banco!';
					
			} elseif($tipo == 'seo') {
			
					if( ! $this->supermodel->salvar('configuracao', $dados, $id) )
						$erro = 'Não foi possível salvar o SEO ';
						
			//salva outros dados
			} else {
				if( ! $this->supermodel->salvar('usuarios', $dados, $id) )
					$erro = 'Não foi possível salvar os dados no banco!';
			}
		}
		
		//exibe mensagem
		if($erro) {
			echo exibir_notificacao($erro, 'error', FALSE);
		} else {
		
		$dados['usuario'] = $this->u->get_usuarios(FALSE, FALSE, $id);
		$dados['configuracao'] = $this->s->get_confg(FALSE, FALSE, $id);
		
		$dados['mensaje'] = 'Dados atualizados com sucesso! ';
		$retorna = 'painel/usuarios/editar';
		$this->template->load('painel/template', $retorna, $dados);

		}
	}
	
	/**
	 * Acessa a conta do usuário
	 * 
 	 * @access public
	 * @param integer
	*/
	public function login_usuario($id)
	{
//		print_r($_SESSION); die('---');
		//id do admin
		$id_admin = $this->session->userdata('id');
		
		//encerra sessão do admin
//		$this->loginmodel->sair(FALSE);
		$user = $this->u->get_usuarios(FALSE, FALSE, $id);
		$permissoes = $this->u->permissoes($user->id);
		
		if($user) {
			$this->session->set_userdata('id', $user->id);
			$this->session->set_userdata('login', $user->login);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('situacao', $user->situacao);		
			$this->session->set_userdata('admin_logged', TRUE);
			$this->session->set_userdata('id_admin', $id_admin);
			
			redirect('painel/mensagens');
			
		} else {
			$erro = TRUE;
			$msg = 'Dados não conferem';
			$this->session->set_flashdata('post_login', $login);
			
			$this->session->set_flashdata('mensagem', exibir_notificacao($msg) );
			redirect('painel/login');
		}

	}
	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/videos.php */