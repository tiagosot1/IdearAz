<?php
/** 
 * Páginas Class
 * Grenciador de páginas
 */ 
class Sobre extends CI_Controller {
		
	function __construct()
	{
		parent::__construct();
		
//		$this->load->helper('ckeditor');
		
		
		$this->load->model('sobremodel', 'sobre');
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
		

	}


	/**
	 * Form para editar página
	 * 
 	 * @access public
 	 * @param integer
	*/
	public function salvar($id=false)
	{
		$this->load->model('supermodel');
		$colunas['texto2']  =   $this->input->post('texto');
		$this->supermodel->salvar('paginas', $colunas, $id);
		$dados[sobre] = $this->sobre->get_sobre()->result();
		
	
		$this->template->load('painel/template', 'painel/sobre/editar', $dados);
		
	}

	
	public function editar()
	{
		
		$dados[sobre] = $this->sobre->get_sobre()->result();
		
	
		$this->template->load('painel/template', 'painel/sobre/editar', $dados);
		
	
		
		//$this->template->load('painel/template', 'painel/sobre/editar', $dados);
	}


	
	

	
	
}

/* End of file admin.php */
/* Location: ./system/application/CI_Controllers/painel/videos.php */