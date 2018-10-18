<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('servicosModel', 'servicos');
		$this->load->model('portfolioModel', 'portfolio');
		$this->load->model('blogModel', 'blog');
		$this->load->model('paginasmodel', 'paginas');

	}

	public function index()
	{

		$dados['p_home'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
		
		$where = array('situacao'=>'A');
		$dados['listar_banner'] = $this->paginas->get_banner(FALSE, FALSE, FALSE, FALSE)->result();
		$dados['qtd_banner'] = $this->supermodel->nr_registros('banners',$where);

		$where = array('pagina'=>'sobre');
		$limit = array('1');
		$dados['sobre'] = $this->paginas->get_paginas($limit,$where);

		$limit = array('3');
		$dados['blog'] = $this->blog->get_blog($limit, FALSE, FALSE, FALSE)->result();
	
		

//		exit;
		$limit = array('20','0');
		$where = array('situacao'=>'A');
		$order_by = 'RAND';

		
		$dados['portfolio'] = $this->portfolio->get_portfolio($limit, $where, FALSE, $order_by);
		
		

			
		$limit = array('3','0');
		$where = array('situacao'=>'A');
		$order_by = 'RAND';
		$dados['noticias'] = $this->blog->get_blog($limit, $where, FALSE, $order_by);
		
		

		$this->load->view('site/index', $dados);


	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */