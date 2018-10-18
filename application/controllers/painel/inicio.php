<?php
/** 
 * Mensagens Class
 * Gerencia as mensagens
 *
 * @package Blog EMCTECH
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@hotmail.com
 */ 
class Inicio extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
//		$this->load->model('Visitasmodel', 'v');
		$this->load->model('supermodel', 's');
		$this->load->model('paginasmodel', 'paginas');

		$this->load->library('session');
		if ($this->session->userdata('id')!=TRUE) {
			redirect('painel/login');
		}
		
	/*	
		foreach($paginas_menu->result() as $res_menu) :
			echo $res_menu->titulo."<br>";
		endforeach;
		echo "fim";
		exit;
	*/
	}
	
	/**
	 * Exibe as visitas do blog
	 * 
 	 * @access public
	*/
	public function index()
	{
		//verifica login
		$this->loginmodel->verifica_se_logado(FALSE, $this->session->userdata('id') );
		
		/*
echo $this->uri->segment(1)."<br>";
echo $this->uri->segment(2)."<br>";
echo "this->session->userdata('id'): ".$this->session->userdata('id').'<br>';
echo "this->session->userdata('login'): ".$this->session->userdata('login').'<br>';
echo "this->session->userdata('email'): ".$this->session->userdata('email').'<br>';
echo "this->session->userdata('nome_usuario'): ".$this->session->userdata('nome_usuario').'<br>';
echo "this->session->userdata('tipo_usuario'): ".$this->session->userdata('tipo_usuario').'<br>';
echo "this->session->userdata('situacao'): ".$this->session->userdata('situacao').'<br>';
echo "this->session->userdata('logged_in'): ".$this->session->userdata('logged_in').'<br>';
		exit;
*/
//		$dados['qtde'] = $this->v->contagem('qtde');
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_home'] = 'active';
		
		$this->template->load('painel/template', 'painel/inicio/menu', $dados);
	}
	

	public function adicionar()
	{
		$dados['cliente'] = $this->s->get_confg();
		$dados['p_home'] = 'active';
		$this->template->load('painel/template', 'painel/home/editar', $dados);
	}
	public function listar()
	{
		$this->load->model('home');
		
		$dados['p_home'] = 'active';
		$dados['listar_banner'] = $this->home->get_banner(FALSE, FALSE, FALSE, FALSE)->result();
		//print_r($dados['dicas']);
		$this->template->load('painel/template', 'painel/home/listagem', $dados);
	}
	/**
	 * Salva o convenio
	 * 
 	 * @access public
	*/
	public function salvar($id = FALSE)
	{
$this->load->model('supermodel');
			
									
					//dados postados titulo, resumo, dica, img, situacao
					$colunas['titulo']	   = $this->input->post('titulo');
					$colunas['descricao']	   = $this->input->post('descricao');
					$colunas['link']	   = $this->input->post('link');
					$colunas['nome_botao']	   = $this->input->post('nome_botao');
					$colunas['situacao']  =   'A';

			if ($id) {
				if( !$this->supermodel->salvar('banners', $colunas, $id) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			} else {
				if( ! $id =  $this->supermodel->salvar('banners', $colunas) ) {
					$erro = 'Não foi possível salvar no banco de dados!';
					}
			}
		


//		$img =  $this->input->xss_clean($_FILES['userfile']);
		$arqName = $_FILES['userfile']['name']; 
//			echo "_FILES['img'] ".$_FILES['img']."<br>";	
//			echo "img ".$img."<br>";	
			if($arqName) {
				$config['upload_path'] = './uploads/banners/';
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
						
				$config['width'] 		= 2000;
				$config['height'] 		= 2000;
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
							if( !$this->supermodel->salvar('banners', $coluna_imag, $id) ) {
								$erro = 'Não foi possível salvar a imagem no banco de dados!';
								}
				} else
						$erro = $redimensionada['erro'];
			
			
			}

		
		$pag_retorno = "painel/inicio/editar/".$id;
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
		
		$this->load->model('home');
		
		$dados['p_home'] = 'active';
		$dados['listar_banner'] = $this->home->get_banner(FALSE, FALSE, $id, FALSE);
		$this->template->load('painel/template', 'painel/home/editar', $dados);
	}
	
	/**
	 * Excluir o convenio selecionada
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
		if( $this->supermodel->deletar('banners', $id) ) {
			$res = exibir_notificacao('Dados excluidos com sucesso!', 'success');
		} else {
			$res = exibir_notificacao('Não foi possível atualizar os dados. Entre em contato com o suporte.', 'error');
		}
		//mensagem
		$this->session->set_flashdata('form_result', $res);
		redirect('painel/inicio/listar');
	}
}
