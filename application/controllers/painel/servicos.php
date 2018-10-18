<?php
/** 
 * Páginas Class
 * Grenciador de páginas
 */ 
class Servicos extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
//		$this->load->helper('ckeditor');
		$this->loginmodel->verifica_se_logado(FALSE, $this->session->userdata('id') );
		
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('servicosModel', 'servicos');
		$this->load->model('supermodel', 's');
		$this->load->model('menusitemodel', 'areas_infra');

		$this->load->library('session');
		if ($this->session->userdata('id')!=TRUE) {
			redirect('painel/login');
		}

	//	$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Lista as páginas
 	 * @access public
	 */
	public function index()
	{
		$dados['listando'] = "Infrestrutura";
		$dados['p_exp'] = 'active';
//			echo "listando: ".$dados['listando']."<br>";
		$order_by = array('categoriaServicosId', 'ASC');
		$dados['infra'] = $this->servicos->getServicos(FALSE, FALSE, FALSE, $order_by);
//		$dados['infra'] = $this->infra->getServicos();
//			echo "Q especialidades: ".$dados['especialidades']->num_rows()."<br>";
//			foreach($dados['especialidades']->result() as $res) {
//				echo "r: ".$res->nome."<br>";
//			}
//			exit;
		$this->template->load('painel/template', 'painel/servicos/listagem', $dados);
	}

	public function categoria()
	{
		$dados['listando'] = "Infrestrutura";
		$dados['p_exp'] = 'active';
//			echo "listando: ".$dados['listando']."<br>";
		$order_by = array('categoria', 'ASC');
		$dados['infra'] = $this->servicos->getServicoInf(FALSE, FALSE, FALSE, $order_by);
//		$dados['infra'] = $this->infra->getServicos();
//			echo "Q especialidades: ".$dados['especialidades']->num_rows()."<br>";
//			foreach($dados['especialidades']->result() as $res) {
//				echo "r: ".$res->nome."<br>";
//			}
//			exit;
		$this->template->load('painel/template', 'painel/servicos/listagem_categoria', $dados);
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
		$dados['p_exp'] = 'active';
		$dados['areas_inf'] = $this->servicos->getServicoInf();
		$this->template->load('painel/template', 'painel/servicos/editar', $dados);
	}

	public function adicionar_categoria()
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_exp'] = 'active';
		$dados['areas_inf'] = $this->servicos->getServicoInf();
		$this->template->load('painel/template', 'painel/servicos/editar_categoria', $dados);
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
		$dados['p_exp'] = 'active';

		$dados['infraestrutura'] = $this->servicos->getServicos(FALSE, FALSE, $id);
		$area_id = $dados['infra']->categoriaServicosId;
		$dados['areas_inf'] = $this->servicos->getServicoInf();

		$this->template->load('painel/template', 'painel/servicos/editar', $dados);
	}
public function editar_categoria($id = FALSE)
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_exp'] = 'active';

		$dados['editarCategoria'] = $this->servicos->getServicosCategoria1($id)->result();
		$this->template->load('painel/template', 'painel/servicos/editar_categoria', $dados);
	}

	public function listar($tipo = 'todos', $pagina_atual = 0)
	{
		$dados['filtro'] = $tipo;
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_exp'] = 'active';

		
		$dados['paginas'] = $this->paginas->get_paginas(FALSE, FALSE);

		$this->template->load('painel/template', 'painel/servicos/listagem', $dados);
	/*
	echo "Aqui3";
	exit;
		*/
	}

public function salvar_categoria($id = FALSE)
	{
		
		//Verifica erros
	
				$colunas['categoria']			= $this->input->post('titulo');			
				$colunas['situacao']			= 'A';			
				
/*
					echo "id  ".$id;
					echo "titulo  ".$colunas['titulo'].'<br>';
					echo "pagina  ".$colunas['pagina'].'<br>';
					echo "area_id  ".$colunas['area_id'].'<br>';
					echo "texto1  ".$colunas['texto1'].'<br>';
					echo "texto2  ".$colunas['texto2'].'<br>';
 exit;
*/
			if ($id) {
				if( !$this->supermodel->salvar('categoriaservicos', $colunas, $id) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			} else {
				if( ! $id =  $this->supermodel->salvar('categoriaservicos', $colunas) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			}
		


//					echo "Erro  ".$erro;
//	exit;
		$pag_retorno = "painel/servicos/editar_categoria/".$id;
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
	 * Salva a página
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function salvar($id = FALSE)
	{
		
		//Verifica erros
		if($this->form_validation->run('salvar_infraestrutura') == FALSE)
			$erro = validation_errors();
		else {
				$colunas['titulo']			= $this->input->post('titulo');			
				$colunas['pagina']			= url_title($this->input->post('titulo'));			
				$colunas['categoriaServicosId']			= $this->input->post('area_id');
				$colunas['texto1']		= $this->input->post('texto1');			
				$colunas['texto2']		= $this->input->post('texto');	
				$colunas['img_banner']		= $this->input->post('youtube');
/*
					echo "id  ".$id;
					echo "titulo  ".$colunas['titulo'].'<br>';
					echo "pagina  ".$colunas['pagina'].'<br>';
					echo "area_id  ".$colunas['area_id'].'<br>';
					echo "texto1  ".$colunas['texto1'].'<br>';
					echo "texto2  ".$colunas['texto2'].'<br>';
 exit;
*/
			if ($id) {
				if( !$this->supermodel->salvar('servicos', $colunas, $id) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			} else {
				if( ! $id =  $this->supermodel->salvar('servicos', $colunas) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			}
		}

//		$img =  $this->input->xss_clean($_FILES['userfile']);
		$arqName = $_FILES['userfile']['name']; 
//			echo "_FILES['img'] ".$_FILES['img']."<br>";	
//			echo "img ".$img."<br>";	
			if($arqName) {
				$config['upload_path'] = './uploads/servicos/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
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
						
				$config['width'] 		= 500;
				$config['height'] 		= 375;
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
						$coluna_imag['img_banner'] = $img;
							if( !$this->supermodel->salvar('servicos', $coluna_imag, $id) ) {
								$erro = 'Não foi possível salvar a imagem no banco de dados!';
								}
				} else
						$erro = $redimensionada['erro'];
			
			
			}

//					echo "Erro  ".$erro;
//	exit;
		$pag_retorno = "painel/servicos/editar/".$id;
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
		if( $this->supermodel->deletar('servicos', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		redirect('painel/servicos');
	}
	public function excluir_categoria($id=false, $pag_retorno1=false, $pag_retorno2=false, $pag_retorno3=false)
	{
			$pag_retorno = $pag_retorno1."/".$pag_retorno2."/".$pag_retorno3;
			// $mess = 'Dados atualizados com sucesso!';
			// $this->load->view($pag_retorno, $mess);
			// exit;
		if( $this->supermodel->deletar('categoriaservicos', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		redirect('painel/servicos/categoria');
	}

	/**
	 * Form para editar página principal
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function principal($id = '2')
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_exp'] = 'active';
		$dados['pagina'] = $this->grupos->get_grupos(FALSE, FALSE, $id, FALSE);
		$this->template->load('painel/template', 'painel/especialidades/principal', $dados);
	}


	public function salvar_principal($id = '2')
	{
		
		//Verifica erros
		if($this->form_validation->run('salvar_principal') == FALSE)
			$erro = validation_errors();
		else {
				$colunas['titulo']			= $this->input->post('titulo');			
				$colunas['texto']			= $this->input->post('texto');
				$colunas['titulo_e']		= $this->input->post('titulo_e');			
				$colunas['texto_e']			= $this->input->post('texto_e');
			
			if( ! $this->supermodel->salvar('grupos', $colunas, $id) ) {
				$erro = 'Não foi possível salvar no banco de dados!';
				echo "Erro  ".$erro;
				}
		}

		//exibe o resultado
		if($erro) {
			$res = exibir_notificacao($erro, 'error', FALSE);
			echo "Erro  ".$erro;
			exit;
		} else {
			$dados['pagina'] = $this->grupos->get_grupos(FALSE, FALSE, $id, FALSE);
//			$dados['pagina'] = $this->db->get()->row();
			$dados['mensaje'] = 'Dados atualizados com sucesso! ';
		$res = exibir_notificacao('Dados atualizados com sucesso!', 'success', FALSE);
		$this->session->set_flashdata('form_result', $res);
			$pag_retorno = "painel/especialidades/principal";
			redirect($pag_retorno);
		}
			$retorna = 'painel/especialidades/principal';
			$this->template->load('painel/template', $retorna, $dados);
	}

	
	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/videos.php */