<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('blogModel', 'blog');
//		$this->output->enable_profiler(TRUE);
//		$this->load->model('usuariosmodel', 'u');
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        $subdomain_name = $subdomain_arr[0];
	}

	public function index()
	{
		
		$dados['p_blog'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;
		$qtd_registro = $this->blog->CountAll();
		$this->load->library('pagination');
$config = array(
			"base_url" =>  base_url('blog/page/'),
			"per_page" => 10,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $qtd_registro,
			"full_tag_open" => "<div><ul class='pagination' id='paginator_pages'>",
			"full_tag_close" => "</ul></div>",
			"first_link" => 'Início',
			"last_link" => 'Fim',
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "<i class='fa fa-chevron-right' aria-hidden='true'></i>",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"
		);
		$qtd_pagina = $config['per_page'];
		$this->pagination->initialize($config);

		$dados['pagination'] = $this->pagination->create_links();
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$dados['blog'] = $this->blog->GetAll('id','DESC',$qtd_pagina,$offset);
		
		
			

			$dados['noticia'] = $this->blog->get_blog(FALSE, FALSE, $id);
		
			$this->load->view('site/blog/blog', $dados);
		
		
	}
	
	public function info($url , $id)
	{
		$dados['p_blog'] = 'active';
		$dados['portal'] = $this->supermodel->site_config;

		
			$limit = array('6','0');
			$where = array('situacao'=>'A');
			$order_by = 'RAND';
			$dados['blog'] = $this->blog->get_blog($limit, $where, FALSE, $order_by);

			$dados['blogPost'] = $this->blog->get_blog(FALSE, FALSE, $id);
			$this->load->view('site/blog/pagina', $dados);
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */