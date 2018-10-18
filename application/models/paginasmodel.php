<?php
/** 
 * Bannersmodel Class
 * Gerenciamento de Paginas
 * 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class Paginasmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_paginas($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, pagina, titulo, texto1, texto2, img_banner, video, situacao');
		$this->db->from('paginas');
		if($id) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		if($order_by)
			$this->db->order_by($order_by[0], $order_by[1]);
		else
			$this->db->order_by('id', 'ASC');
			
		$this->db->limit($limit[0], $limit[1]);
		if($limit[0] == '1') {
				return $this->db->get()->row();
			} else {
				return $this->db->get();
			}
		return $this->db->get();
	}

		public function get_banner($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		
		$this->db->select('id, titulo, link, descricao, nome_botao, img');
		$this->db->from('banners');
		if($id) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		if($order_by)
			$this->db->order_by($order_by[0], $order_by[1]);
		else
			$this->db->order_by('id', 'ASC');
		
		if($limit) {
			if($limit[0] == '1') {
					return $this->db->get()->row();
				} else {
					$this->db->limit($limit[0], $limit[1]);
					return $this->db->get();
				}
		}
		return $this->db->get();
	}

	 
}


/* end of the file bannersmodel.php */
/* Location: ./system/application/models/bannersmodel.php */