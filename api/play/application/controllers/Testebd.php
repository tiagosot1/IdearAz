<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** 
 * Páginas Class
 * Grenciador de páginas
 */ 
class Testebd extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
//		$this->load->helper('ckeditor');
		

	//	$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Lista as páginas
 	 * @access public
	 */
	public function index()
	{
		$this->load->view('adm/editar');
		
		//$this->load->model('supermodel', 's');
		//$colunas['nome']			= 'b';
		//$this->s->salvar('cash', $colunas, 1); 
		
	}


	/**
	 * Form para editar página
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function adicionar()
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['departamentos'] = $this->departamento->get_departamentos();
		$this->template->load('painel/template', 'painel/departamentos/editar', $dados);
	}

	/**
	 * Form para editar página
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function editar($id = FALSE)
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['departamento'] = $this->departamento->get_departamentos(FALSE, FALSE, $id);

		
		$this->template->load('painel/template', 'painel/departamentos/editar', $dados);
	}


	public function listar($tipo = 'todos', $pagina_atual = 0)
	{
		$dados['filtro'] = $tipo;
		$dados['cliente'] = $this->s->get_confg();

		
		$dados['paginas'] = $this->paginas->get_paginas(FALSE, FALSE);

		$this->template->load('painel/template', 'painel/departamentos/listagem', $dados);
	/*
	echo "Aqui3";
	exit;
		*/
	}



	/**
	 * Salva a página
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function salvar($id = FALSE)
	{
			$this->load->model('supermodel');
			
			// definimos um nome aleatório para o diretório
		$folder = random_string('alpha');
		// definimos o path onde o arquivo será gravado
		$path = "./uploads/user";

		// verificamos se o diretório existe
		// se não existe criamos com permissão de leitura e escrita
		if ( ! is_dir($path)) {
        mkdir($path, 777, $recursive = true);
    }

		// definimos as configurações para o upload
		// determinamos o path para gravar o arquivo
		$configUpload['upload_path']   = $path;
		// definimos - através da extensão -
		// os tipos de arquivos suportados
		$configUpload['allowed_types'] = 'jpg|png|gif|pdf|zip|rar|doc|xls';
		// definimos que o nome do arquivo
		// será alterado para um nome criptografado
		$configUpload['encrypt_name']  = TRUE;

		// passamos as configurações para a library upload
		$this->upload->initialize($configUpload);
		

		// verificamos se o upload foi processado com sucesso
		if ( ! $this->upload->do_upload('arquivo'))
		{
			// em caso de erro retornamos os mesmos para uma variável
			// e enviamos para a home
			 $data= array('error' => $this->upload->display_errors());
			
		if($this->session->id_usuario){
				
		} else{
				
				
				}
		}
		else
		{
			
			
			//se correu tudo bem, recuperamos os dados do arquivo
			$data['dadosArquivo'] = $this->upload->data();
			//inserir no banco de dados
		
			
			$colunas['nome'] = $this->input->post('nome');
			$colunas['img'] = 'uploads/user/'.$data['dadosArquivo']['file_name'];
			
			$this->supermodel->salvar('cash', $colunas);

			 
		}
		
		
	}

	/**
	 * Excluir a página selecionada
	 * 
 	 * @access public
	 * @param integer
	*/
	public function excluir($id, $pag_retorno1, $pag_retorno2, $pag_retorno3)
	{
			$pag_retorno = $pag_retorno1."/".$pag_retorno2."/".$pag_retorno3;
			// $mess = 'Dados atualizados com sucesso!';
			// $this->load->view($pag_retorno, $mess);
			// exit;
		if( $this->supermodel->deletar('departamentos', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		redirect('painel/departamentos');
	}

	


	
	
	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/videos.php */