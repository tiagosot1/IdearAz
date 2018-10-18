<?php
/** 
 * Convenios Class
 *
 * @package CodeIgniter
 * @subpackage Portal ClikOfertas.com
 */ 
class Blog extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
		//verifica login
//		$this->loginmodel->verifica_se_logado('admin');
//		$this->loginmodel->verifica_se_logado('painel', $this->session->userdata('id'));
		
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('blogModel', 'blog');
		$this->load->model('supermodel', 's');

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
	public function index()
	{
		$dados['listando'] = "blog";
		$dados['p_blog'] = 'active';
		$dados['cliente'] = $this->s->get_confg();
//		$situacao = array('situacao' => 'A');
		$dados['blog'] = $this->blog->get_blog(FALSE, FALSE, FALSE, FALSE);
		$this->template->load('painel/template', 'painel/blog/listagem', $dados);
	}

	public function adicionar()
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_blog'] = 'active';
		$this->template->load('painel/template', 'painel/blog/editar', $dados);
	}
	
	/**
	 * Salva o convenio
	 * 
 	 * @access public
	*/
	public function salvar($id = FALSE)
	{

									
					//dados postados titulo, resumo, dica, img, situacao
					$colunas['titulo']	   = $this->input->post('titulo');
					$colunas['resumo']	   = $this->input->post('resumo');
					$colunas['descricao']	   = $this->input->post('descricao');
					$colunas['situacao']  =   'A';

			if ($id) {
					$colunas['modificado']	   = date("Y-m-d");
				if( !$this->supermodel->salvar('blog', $colunas, $id) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			} else {

					$colunas['data']	   = date("Y-m-d");
				if( ! $id =  $this->supermodel->salvar('blog', $colunas) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			}
			
	


//		$img =  $this->input->xss_clean($_FILES['userfile']);
		$arqName = $_FILES['userfile']['name']; 
//			echo "_FILES['img'] ".$_FILES['img']."<br>";	
//			echo "img ".$img."<br>";	
			if($arqName) {
				$config['upload_path'] = './uploads/blog/';
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
						$coluna_imag['img'] = $img;
							if( !$this->supermodel->salvar('blog', $coluna_imag, $id) ) {
								$erro = 'Não foi possível salvar a imagem no banco de dados!';
								}
				} else
						$erro = $redimensionada['erro'];
			
			
			}

		
		$pag_retorno = "painel/blog/editar/".$id;
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
	 * Exibe dashboard
	 * 
 	 * @access public
	*/
	public function editar($id)
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_blog'] = 'active';
		$dados['blog'] = $this->blog->get_blog(FALSE, FALSE, $id);
		
		$this->template->load('painel/template', 'painel/blog/editar', $dados);
	}
	
	/**
	 * Excluir o convenio selecionada
	 * 
 	 * @access public
	 * @param integer
	*/
	public function excluir($id=FALSE, $pag_retorno1=FALSE, $pag_retorno2=FALSE, $pag_retorno3=FALSE)
	{
			$pag_retorno = $pag_retorno1."/".$pag_retorno2."/".$pag_retorno3;
			// $mess = 'Dados atualizados com sucesso!';
			// $this->load->view($pag_retorno, $mess);
			// exit;
		if( $this->supermodel->deletar('blog', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		$this->index();
		//redirect('painel/blog');
	}
}

/* End of file admin.php */
/* Location: ./system/application/controllers/painel/blog.php */