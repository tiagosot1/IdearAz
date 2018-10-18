<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('portfolioModel', 'portfolio');
//		$this->output->enable_profiler(TRUE);
//		$this->load->model('usuariosmodel', 'u');
	}

	public function index()
	{
		$dados['p_portfolio'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;

		
			$where = array('situacao'=>'A');
			$order_by = 'RAND';
			$dados['portfolio'] = $this->portfolio->get_portfolio($limit, $where, FALSE, $order_by);

			$dados['pagina'] = $this->portfolio->get_portfolio(FALSE, FALSE, $id);
			$this->load->view('site/portfolio/listagem', $dados);
	
	}
	public function em($url , $id)
	{
		
		$dados['p_portfolio'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;

		if($id) {
			$limit = array('4','0');
			$where = array('situacao'=>'A');
			$order_by = 'RAND';
			$dados['portfolio'] = $this->portfolio->get_portfolio($limit, $where, FALSE, FALSE);

			$dados['pagina'] = $this->portfolio->get_portfolio(FALSE, FALSE, $id);
			$this->load->view('site/portfolio/pagina', $dados);
		} else {
			
			redirect(base_url().'portfolio');
		}
	}
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */