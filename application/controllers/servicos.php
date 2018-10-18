<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('servicosModel', 'servicos');
		
		
//		$this->output->enable_profiler(TRUE);
//		$this->load->model('usuariosmodel', 'u');
	}

	public function index($id=false)
	{
		$dados['p_videos'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
// echo "id: ".$id."<br>";
// exit;
//		$where = "infra = '1'";
		$dados['pagina'] = $this->servicos->getServicos(FALSE, FALSE, $id);
		$dados['servicosInf'] = $this->servicos->getServicoInf();
//			echo "G: ".$dados['especialidade']."<br>";
//			exit;
			$this->load->view('site/servicos/lista', $dados);
	}

	public function em($url=false , $id=false)
	{
		$dados['p_servicos'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
		$dados['pagina'] = $this->servicos->getServicosCategoria($id);
		//echo "</pre>";
		//print_r($dados['pagina']);
		$dados['servicosInf'] = $this->servicos->getServicoInf();
		
		$this->load->view('site/servicos/pagina', $dados);
	
	}

	public function listar($url=false , $id=false)
	{
		//echo $id;
		$dados['p_videos'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
		$dados['pagina'] = $this->servicos->getServicosCategoria($id);
		$dados['servicosInf'] = $this->servicos->getServicoInf();
		
		
		$this->load->view('site/servicos/pagina', $dados);
	}

	/*public function pronto_socorro()
	{
		$dados['p_servicos'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
		$this->load->view('site/servicos/pronto_socorro', $dados);
	}*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */