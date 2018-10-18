<?php
/** 
 * MenuCI_Model Class
 *
 * @package CodeIgniter
 * @subpackage Chaves Mudanças e Transportes
 * 
 * 
 * 
 */ 

class Menumodel extends CI_Model {
	
	var $nav_top;
	var $nav_sub;
	
	function __construct()
	{
		parent::__construct();
		
		$this->nav_top = array('' => 'início');
		
		
		
	}
	
	public function show_subnav($array, $pai = FALSE, $pai_atual = FALSE)
	{}


	public function show_nav()
	{

		$saida = '';
		$classe = 'nav-top-item';
		
		foreach($this->nav_top as $k=>$v) {
			$sub = $this->show_subnav($this->nav_sub[$k], $k, $this->top_menu);
			if( ! $sub)
				$classe .= ' no-submenu';
			if($this->top_menu == $k)
				$classe .= ' current';

			$saida .= '<li>' . anchor('painel/' . $k, $v, array('class' => $classe) );
			$saida .= $sub;
			$saida .= "</li>\n";

			$classe = 'nav-top-item';
		}
		
		return $saida;
	}



}
/* end of the file menumodel.php */
/* Location: ./system/application/models/menumodel.php */