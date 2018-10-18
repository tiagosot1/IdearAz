<?php
/** 
 * Páginas Class
 * Grenciador de páginas
 */ 
class Portfolio extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
//		$this->load->helper('ckeditor');
		
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('portfolioModel', 'portfolio');
		$this->load->model('supermodel', 's');

		$this->load->library('session');
		if ($this->session->userdata('id')!=TRUE) {
			redirect('painel/login');
		}
//		$this->load->model('paginasmodel', 'paginas');

	//	$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Lista as páginas
 	 * @access public
	 */
	public function index()
	{
		$dados['listando'] = "portfolio";
		$dados['p_tour'] = 'active';
//			echo "listando: ".$dados['listando']."<br>";
		$dados['portfolio'] = $this->portfolio->get_portfolio();
//			echo "Q portfolio: ".$dados['portfolio']->num_rows()."<br>";
//			foreach($dados['portfolio']->result() as $res) {
//				echo "r: ".$res->nome."<br>";
//			}
//			exit;
		$this->template->load('painel/template', 'painel/portfolio/listagem', $dados);
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
		$dados['p_tour'] = 'active';
		$this->template->load('painel/template', 'painel/portfolio/editar', $dados);
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
		$dados['p_tour'] = 'active';
//		$dados['paginas'] = $this->paginas->get_paginas(FALSE, FALSE, FALSE);
//		$dados['pagina'] = $this->paginas->get_paginas(FALSE, FALSE, $id, FALSE);
		$dados['portfolio'] = $this->portfolio->get_portfolio(FALSE, FALSE, $id);
		$dados['ckeditor_texto1'] = array
        (
            //id da textarea a ser substituída pelo CKEditor
            'id'   => 'tratamento',
 
            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
            'path' => 'painel/scripts/ckeditor',
 
            // configurações opcionais
            'config' => array
            (
                'toolbar' => "Full",
                'width'   => "100%",
                'height'  => "300px",
'filebrowserBrowseUrl'      => base_url().'painel/scripts/ckfinder/ckfinder.html',
'filebrowserImageBrowseUrl' => base_url().'painel/scripts/ckfinder/ckfinder.html?Type=Images',
'filebrowserFlashBrowseUrl' => base_url().'painel/scripts/ckfinder/ckfinder.html?Type=Flash',
'filebrowserUploadUrl'      => base_url().'painel/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
'filebrowserImageUploadUrl' => base_url().'painel/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
'filebrowserFlashUploadUrl' => base_url().'painel/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );

//			echo "dados['pagina']->subgrupo_id: ".$dados['pagina']->subgrupo_id;
//		$grupo_id = $this->subgrupos->get_subgrupos('1', FALSE, $dados['pagina']->subgrupo_id, FALSE)->grupo_id;
//		echo "Grupo: ".$grupo_id;

//		$where_s = array('grupo_id' => $grupo_id);
//		$dados['subgrupos'] = $this->subgrupos->get_subgrupos(FALSE, $where_s, FALSE, FALSE);
//	public function get_subgrupos($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
		
		$this->template->load('painel/template', 'painel/portfolio/editar', $dados);
	}


	public function listar($tipo = 'todos', $pagina_atual = 0)
	{
		$dados['filtro'] = $tipo;
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_tour'] = 'active';

		
		$dados['paginas'] = $this->paginas->get_paginas(FALSE, FALSE);

		$this->template->load('painel/template', 'painel/portfolio/listagem', $dados);
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

									
					//dados postados titulo, resumo, dica, img, situacao
				$colunas['titulo']			= $this->input->post('nome');			
				$colunas['resumo']			= $this->input->post('resumo');
				$colunas['descricao']		= $this->input->post('descricao');			
				$colunas['situacao']  =   'A';

			if ($id) {
				if( !$this->supermodel->salvar('portfolio', $colunas, $id) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			} else {
				if( ! $id =  $this->supermodel->salvar('portfolio', $colunas) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			}
			


//		$img =  $this->input->xss_clean($_FILES['userfile']);
		$arqName = $_FILES['userfile']['name']; 
//			echo "_FILES['img'] ".$_FILES['img']."<br>";	
//			echo "img ".$img."<br>";	
			if($arqName) {
				$config['upload_path'] = './uploads/portfolio/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '5000';
//				$config['max_width']  = '500';
//				$config['max_height']  = '375';
				$config["overwrite"] = TRUE;
//				$config["overwrite"] = TRUE;
//				$config['max_size'] = '2048';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if( ! $this->upload->do_upload('userfile') )
						$uploaded['erro'] = $this->upload->display_errors();
					else
						$uploaded['ok'] = $this->upload->data();

//				echo "arqName ".$arqName."<br>";
//				echo "uploaded['ok'] ".$uploaded['ok']."<br>";
//				print_r($uploaded);
//				exit;	
					if( ! isset($uploaded['ok']) )
						$erro = $uploaded['erro'];
					else {
					}
				}
			
//				echo "uploaded['is_image'] ".$uploaded['ok']['is_image']."<br>";
//				exit;	
			if ($uploaded['ok']['is_image'] == '1') { 
						
				$config['width'] 		= 1351;
				$config['height'] 		= 1351;
				$config['master_dim'] = ($uploaded['ok']['image_width'] > $config['height']) ? 'width' : 'height';
				$redimensionada = $this->supermodel->redimensiona_imagem($uploaded['ok'], $config);
				
//				print_r($redimensionada)."<br>";
//				exit;	

				if($redimensionada['ok']) {
						$file_ext = $uploaded['ok']['file_ext'];
						$img_renomeada = $id.$file_ext;
				//$colunas['img']	= $img_renomeada;
						rename($uploaded['ok']['full_path'], $uploaded['ok']['file_path'].$img_renomeada);
						$img	= $img_renomeada;

//				echo "img ".$img."<br>";
//				exit;	
						$coluna_imag['img'] = $img;
							if( !$this->supermodel->salvar('portfolio', $coluna_imag, $id) ) {
								$erro = 'Não foi possível salvar a imagem no banco de dados!';
								}
				} else
						$erro = $redimensionada['erro'];
			
			
			}

		
		$pag_retorno = "painel/portfolio/editar/".$id;
		//exibe o resultado
		if($erro) {
			$res = exibir_notificacao($erro, 'error', FALSE);
		} else {
			$res = exibir_notificacao('Dados atualizados com sucesso!', 'success', FALSE);
		}
		
		$this->session->set_flashdata('form_result', $res);
//			echo "Erro  ".$erro;
//			exit;
		redirect($pag_retorno);
	}


	/**
	 * Excluir a página selecionada
	 * 
 	 * @access public
	 * @param integer
	*/
	public function excluir($id=false, $pag_retorno1=false, $pag_retorno2=false, $pag_retorno3=false)
	{
			$pag_retorno = $pag_retorno1."/".$pag_retorno2."/".$pag_retorno3;
			// $mess = 'Dados atualizados com sucesso!';
			// $this->load->view($pag_retorno, $mess);
			// exit;
		if( $this->supermodel->deletar('portfolio', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		redirect('painel/portfolio');
	}

	/**
	 * Form para editar página principal
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function pagina($id = '3')
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_tour'] = 'active';
		$dados['pagina'] = $this->paginas->get_paginas(FALSE, FALSE, $id, FALSE);
		$this->template->load('painel/template', 'painel/portfolio/pagina', $dados);
	}


	public function salvar_pagina($id = '3')
	{
		
//		echo "ll";
//		exit;
		
		//Verifica erros
		if($this->form_validation->run('salvar_principal') == FALSE)
			$erro = validation_errors();
		else {
				$colunas['texto2']			= $this->input->post('texto2');			
			
			if( ! $this->supermodel->salvar('paginas', $colunas, $id) ) {
				$erro = 'Não foi possível salvar no banco de dados!';
//				echo "Erro  ".$erro;
				}
		}

		//exibe o resultado
		if($erro) {
			$res = exibir_notificacao($erro, 'error', FALSE);
		} else {
			$res = exibir_notificacao('Dados atualizados com sucesso!', 'success', FALSE);
		}
			$this->session->set_flashdata('form_result', $res);
			$pag_retorno = 'painel/portfolio/pagina';
			redirect($pag_retorno);
	}

	
	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/videos.php */