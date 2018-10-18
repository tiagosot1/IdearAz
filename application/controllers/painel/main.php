<?php
/** 
 * Main Class
 * CI_Controller com principais funções do painel adm
 *
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@hotmail.com
 */ 
class Main extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		//verifica login  
//		echo "id: ".$this->session->userdata('id').'<br>';
		$this->loginmodel->verifica_se_logado(FALSE, $this->session->userdata('id') );
//		exit;
		$this->load->model('supermodel', 's');
		$this->load->model('paginasmodel', 'paginas');
		
		
//		$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Altera o status de vários itens item 
	 * 
 	 * @access public
	*/
	public function atualiza_status_multiplo()
	{
		//novo status
		$acao = $this->input->post('acao');
		
		//para onde redirecionar
		$redirect = $this->input->post('redirect');
		
		//nome da tabela
		$tabela = $this->input->post('tabela');
		
		if( ! empty($_POST['ids']) ) {
			$ids = implode(", ", $_POST['ids']);
			
			if( $this->supermodel->atualiza_status($tabela, $acao, $ids) )
				$res = exibir_notificacao('Dados atualizados com sucesso!', 'success');
			else
				$res = exibir_notificacao('Não foi possível atualizar a página. Entre em contato com o suporte.', 'error');
		} else 
			$res = exibir_notificacao('Nada selecionado', 'error');
			
		$this->session->set_flashdata('form_result', $res );
		
		redirect($redirect);
	}
	
	/**
	 * Altera o status de um único elemento
	 * 
 	 * @access public
	*/
	public function atualiza_status($tabela, $situacao, $id, $pag_ret)
	{
//		echo "id: ".$id.'<br>';
//		exit;
		//novo status
		$acao = $this->input->post('acao');
		//para onde redirecionar
		$redirect = $this->input->post('redirect');
		
		//atualiza o banco
		if( $this->supermodel->atualiza_status($tabela, $situacao, $id) )
			$res = exibir_notificacao('Dados atualizados com sucesso!', 'success');
		else
			$res = exibir_notificacao('Não foi possível atualizar a página. Entre em contato com o suporte.', 'error');
		
		// echo "pag_ret: ".$pag_ret.'<br>';
		// echo "id: ".$id.'<br>';
		// exit;
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		
		//redireciona
		switch($pag_ret) {
			case 'corpo_clinico' :
				$redirect = 'painel/corpo_clinico';
				break;
			case 'especialidades' :
				$redirect = 'painel/especialidades';
				break;
			case 'infra' :
				$redirect = 'painel/infraestrutura';
				break;
			case 'videos' :
				$redirect = 'painel/videos';
				break;
			case 'convenios' :
				$redirect = 'painel/convenios';
				break;
			case 'imagens' :
				$redirect = 'painel/imagens';
				break;
			case 'noticias' :
				$redirect = 'painel/noticias';
				break;
			case 'dicas' :
				$redirect = 'painel/dicas';
				break;
			case 'opinioes' :
				$redirect = 'painel/opinioes';
				break;
			default:
				$redirect = 'painel/inicio/';
			//	$redirect = 'painel/' . $tabela;
				break;
		}
		
		redirect($redirect);
	}


	/**
	 * Altera o status de um coluna de único elemento
	 * 
 	 * @access public
	*/
	public function atualiza_coluna($tabela, $coluna, $situacao, $id,  $pag_retorno1, $pag_retorno2)
	{
		//novo status
		$redirect = 'painel/'.$pag_retorno1.'/listar/'.$pag_retorno2;
		/*
		echo "acao: ".$acao.'<br>';
		echo "redirect: ".$redirect.'<br>';
		echo "tabela: ".$tabela.'<br>';
		echo "coluna: ".$coluna.'<br>';
		echo "situacao: ".$situacao.'<br>';
		echo "id: ".$id.'<br>';
		echo "pag_retorno1: ".$pag_retorno1.'<br>';
		echo "pag_retorno2: ".$pag_retorno2.'<br>';
		exit;
		*/
		//atualiza o banco
		if( $this->supermodel->atualiza_status_coluna($tabela, $coluna, $situacao, $id) )
			$res = exibir_notificacao('Dados atualizados com sucesso!', 'success');
		else
			$res = exibir_notificacao('Não foi possível atualizar a página. Entre em contato com o suporte.', 'error');
		
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		
		
		redirect($redirect);
	}

	
	/**
	 * Exclui um elemento do banco
	 * 
 	 * @access public
	*/
	public function excluir($tabela, $id, $imagem = FALSE)
	{		
		//novo status
		$acao = $this->input->post('acao');
		//para onde redirecionar
		$redirect = $this->input->post('redirect');
		
		//atualiza o banco
		if( $this->supermodel->atualiza_status($tabela, $situacao, $id) )
			$res = exibir_notificacao('Dados atualizados com sucesso!', 'success');
		else
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		
		//redireciona
		switch($tabela) {
			case 'cat_guia' :
				$redirect = 'painel/guia/principal';
				break;
		}
		
		redirect($redirect);
	}

}

/* End of file main.php */
/* Location: ./system/application/CI_Controllers/painel/main.php */