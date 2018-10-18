<?php
/** 
 * Convenios Class
 * Grenciador de vídoes
 *
 * @package CodeIgniter
 * @subpackage Portal ClikOfertas.com
 */ 
class Email extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
		//verifica login
//		$this->loginmodel->verifica_se_logado('admin');
//		$this->loginmodel->verifica_se_logado('painel', $this->session->userdata('id'));
		
		$this->load->model('contato');
		
		
		$this->load->library('session');
		if ($this->session->userdata('id')!=TRUE) {
			redirect('painel/login');
		}
		
//		$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Exibe dashboard
	 * 
 	 * @access public
	*/
	public function curriculo($email_enviado=FALSE)
	{
		
				
		
		if($email_enviado=='email_enviado')
		{
			$tabela_bd = 'curriculo';
				$where = array('enviado'=>'B');
				$dados['curriculo'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/curriculo_enviado', $dados);

		}else{
				$tabela_bd = 'curriculo';
				$where = array('enviado'=>'A');
				$dados['curriculo'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/curriculo', $dados);
				//print_r($dados['curriculo']);
	}
	
	}
	public function contato($email_enviado=FALSE)
	{
		
		if($email_enviado=='email_enviado')
		{
				$tabela_bd = 'contato';
				$where = array('enviado'=>'B');
				$dados['contato'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/contato_enviado', $dados);

		}else{
				$tabela_bd = 'contato';
				$where = array('enviado'=>'A');
				$dados['contato'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/contato', $dados);
		}
				//print_r($dados['contato']);

		
	}

	public function cotacao($email_enviado=FALSE)
	{
		if($email_enviado=='email_enviado')
		{
			$tabela_bd = 'cotacao';
				$where = array('enviado'=>'B');
				$dados['cotacao'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/cotacao_enviado', $dados);

		}else{
				$tabela_bd = 'cotacao';
				$where = array('enviado'=>'A');
				$dados['cotacao'] = $this->contato->get_contato_curriculo_cotacao(FALSE, $where, FALSE, FALSE, $tabela_bd)->result();

				$dados['p_mensagem'] = 'active';
				$this->template->load('painel/template', 'painel/email/cotacao', $dados);
				//print_r($dados['cotacao']);
		}
		
	}
	public function enviar($acao = FALSE, $id = FALSE)
	{

		$email  = $this->input->post('email');
		$nome = $this->input->post('nome');
		$mensagem_enviada = $this->input->post('mensagem_enviada');	
		$mensagem_enviada_assunto = $this->input->post('mensagem_enviada_assunto');	
			
		

		//====================================================
		
		
		
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 
		$email_remetente = "gpax@gpaxseg.com.br"; // deve ser uma conta de email do seu dominio 
		//====================================================
		
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = $email; // pode ser qualquer email que receberá as mensagens
		$email_reply = "gpaxseg@gmail.com"; 
		//Email associado ao Google GPAX
		//gpaxseg@gmail.com
		//senha: gp159753
		$email_assunto = $mensagem_enviada_assunto; // Este será o assunto da mensagem
		//====================================================
		
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "Nome: $nome \n"; 
		$email_conteudo .= "Email: $email \n";

		$email_conteudo .= "$mensagem_enviada \n"; 
		
		
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Cc: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
		
		//Enviando o email 
		//==================================================== 
		
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
				echo 1;
			} else {
				echo 0;
			}
			


		$this->load->model('supermodel');
		date_default_timezone_set('America/Sao_Paulo');
		$data_envio = date("d-m-Y H:i:s"); 
		$colunas['data']	= $data_envio;
		$colunas['enviado']	= 'B';
		$colunas['email']	   = $email;
		$colunas['nome']  =   $nome;
		$colunas['mensagem_enviada'] = $mensagem_enviada;
		$colunas['mensagem_enviada_assunto'] = $mensagem_enviada_assunto;
		



		if($acao=='cotacao'){
		
		
		$this->supermodel->salvar('cotacao', $colunas); 
		redirect(base_url().'painel/email/cotacao/email_enviado');

		}
		if($acao=='curriculo'){
			$this->supermodel->salvar('curriculo', $colunas); 
			redirect(base_url().'painel/email/curriculo/email_enviado');
		}
		if($acao=='contato'){
				$this->supermodel->salvar('contato', $colunas); 
				redirect(base_url().'painel/email/contato/email_enviado');
		}	

		
		
	}


	
}

/* End of file admin.php */
/* Location: ./system/application/controllers/painel/convenios.php */