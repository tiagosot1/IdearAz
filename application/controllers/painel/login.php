<?php
/** 
 * Login Class
 * Login do painel de controle
 */ 
class Login extends CI_Controller {	
		
	function __construct()
	{
		parent::__construct();
//		$this->output->enable_profiler(TRUE);
		$this->load->model('supermodel', 's');
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('usuariosmodel', 'u');
	}
	
	/**
	 * Exibe o formulário de login ou redireciona se já estiver logado
	 * 
 	 * @access public
	*/
	public function index()
	{
		if ($this->session->userdata('id')) 
			redirect('painel/inicio/index');
$dados['endereco'] = $this->u->get_usuarios(FALSE, FALSE, '1')->endereco;			
		$dados['msg'] = exibir_notificacao('Informe seu nome de usuário e senha.', 'information', FALSE);
		$dados['cliente'] = $this->s->get_confg();
		$this->template->load('painel/inicio/template_login', 'painel/inicio/login', $dados);
	}
	
	/**
	 * Verifica os dados e faz o login
	 * 
 	 * @access public
	*/
	public function entrar()
	{
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		
		//caso os dados não sejam encontrados
		if( ! $this->loginmodel->faz_login($login, $senha) ) {
			$erro = TRUE;
			$msg = 'Dados não conferem';
			$this->session->set_flashdata('post_login', $login);
			
		} else {
			//cadastro inativo
			if($this->session->userdata('logged_in') != TRUE) {
				$erro = TRUE;
				$msg = 'Encontramos seu login/senha, mas seu cadastro está inativo. 
				Por favor entre em contato com o departamento técnico.';
			//cadastro ok
			} else {
				/*
echo "this->session->userdata('id'): ".$this->session->userdata('id').'<br>';
echo "this->session->userdata('login'): ".$this->session->userdata('login').'<br>';
echo "this->session->userdata('email'): ".$this->session->userdata('email').'<br>';
echo "this->session->userdata('nome_usuario'): ".$this->session->userdata('nome_usuario').'<br>';
echo "this->session->userdata('tipo_usuario'): ".$this->session->userdata('tipo_usuario').'<br>';
echo "this->session->userdata('situacao'): ".$this->session->userdata('situacao').'<br>';
echo "this->session->userdata('logged_in'): ".$this->session->userdata('logged_in').'<br>';
*/
				redirect('painel/inicio/index');
			}
		}
		$this->session->set_flashdata('mensagem', exibir_notificacao($msg) );
		redirect('painel/login');
//		$this->template->load('painel/inicio/template_login', 'painel/inicio/login', $dados);
	}
	
	
	
	/**
	 * encerra a sessão
	 * 
 	 * @access public
	*/
	public function sair()
	{
		$this->loginmodel->sair();
		redirect('');
	}
	
	
	
	/**
	 * Formulário para gerar nova senha
	 * 
 	 * @access public
	*/
	public function lembrar_senha()
	{
//		$this->template->load('painel/inicio/template_login', 'painel/inicio/lembrar_senha', $dados);
	}
	
	/**
	 * recebe o email para gerar nova senha e evia msg
	 * 
 	 * @access public
	*/
	public function gerar_hash()
	{
		$email = $this->input->post('email');
		$user = $this->loginmodel->verifica_cadastro($email);
//		$where = "`usuarios`.`email` = '".$email."'";
//		$user = $this->u->get_usuarios('1', $where);
		
		if( ! $user ) {	
			$msg = 'Email não encontrado';
			$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
			$this->session->set_flashdata('post_email', $email );
		} else {
			//email cadastrado. Gera hash
			$dados['chave'] 		= random_string('unique');
			$dados['validade'] 		= time() + (24 * 60 * 60);
			$dados['usuarios_id']	= $user->id;
			
			//salva os dados no banco
			if( $this->supermodel->salvar('user_hash', $dados) ) {

				$this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);


				//envia email
				$this->load->library('email');
				$this->email->from($this->supermodel->site_config->email, $this->supermodel->site_config->titulo_site);
				$this->email->to($user->email);
//				$this->email->bcc('educatto@hotmail.com'); 
				$this->email->subject('Recuperacao de senha do ObjetosAntigos.com');
//				$this->email->subject('Recuperar senha');
				
			$mensagem = "Olá, <br /><br />";
			$mensagem .= "Você está recebendo este email da ObjetosAntigos.com de acordo com uma solicitação de lembrança de senha </strong>  \n\n
			Para gerar uma nova senha clique no link abaixo ou \n\n
							copie e cole na barra de endereços: \n\n"
							. site_url('painel/login/gerar_senha/' . $dados['chave'])
							. "\n\n Este link tem validade de 24 horas";
						
				$this->email->message($mensagem);
				
				if( $this->email->send() ) {
					$msg = 'Instruções enviadas ao seu email.';
//					$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'success') );
				} else {
					$msg = 'Não foi possível enviar o email. Entre em contato com o suporte técnico. Email - '.$email.' - User: '.$user;
//					$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
				}
			} else {
				$msg = 'Não foi possível Processar sua soliticação. Entre em contato com o suporte técnico.';
//				$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
			}
		}


//		if( ! $erro ) {
//		echo "<div  class='alert alert-success'>Email enviado com sucesso.</div>";
//		} else {
		echo "<div  class='alert alert-success'>".$msg."</div>";
//		}
//		redirect('painel/login/lembrar_senha');
	}
	
	
	/**
	 * gera uma nova senha se a chave for válida
	 * 
 	 * @access public
 	 * @param string
	*/
	public function gerar_senha($chave)
	{
		$usuarios_id = $this->loginmodel->valida_chave($chave);
		
		if($usuarios_id) {
			
//			$where = "`usuarios`.`email` = '".$cadastro['email']."'";
			$usuarios = $this->u->get_usuarios(FALSE, FALSE, $usuarios_id->usuarios_id);
		
			//atualiza a senha
			$this->load->helper('string');
			$nova_senha = strtolower( random_string('alnum', 8) );
			$dados['senha'] = md5($nova_senha);
			
			if( ! $this->supermodel->salvar('usuarios', $dados, $usuarios_id->usuarios_id) ) {
				$msg = 'Não foi possível processar sua solicitação. Entre em contato com o suporte.';
				$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
				redirect('adm');
			} else {
				//envia email
				$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
				$this->email->from('recuperarsenha@objetosantigos.com', 'ObjetosAntigos.com');
				$this->email->to($usuarios->email);
//			$this->email->bcc('educatto@hotmail.com'); 
				$this->email->subject('Nova senha gerada!');
				
				$mensagem = "O ObjetosAntigos.com enviou nova senha ao seu email com a qual poderá acessar sua conta no ObjetosAntigos.com.<br /><br />";
				$mensagem .= "Você pode alterar sua mesma a qualquer momento acessando o painel de controle.<br /><br />";
				$mensagem .= "Sua nova senha é <span style='font-size:20px; font-weight:700;'>{$nova_senha}</span> <br /><br />";
				
				$mensagem .= "<a href=\"".base_url()."\">ObjetosAntigos.com</a>";

						
				$this->email->message($mensagem);
				
				if( $this->email->send() ) {
					$msg = 'Sua nova senha é <b>'.$nova_senha.'</b><br /> A mesma tambem foi enviada ao seu email.';
					$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'success') );
					//apaga hash do banco
					$this->supermodel->deletar('user_hash', $usuarios_id->id);
					
				} else {
					$msg = 'Não foi possível enviar o email. Entre em contato com o suporte técnico.';
					$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
				}
			}
		} else {
			$msg = 'Código inválido/expirado';
			$this->session->set_flashdata('mensagem', exibir_notificacao($msg, 'error') );
		}
				redirect('adm');
	}

	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/login.php */