<?php
/** 
 * Supermodel Class
 * CI_Model com principais funções
 */ 

class Menusitemodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Pega links primeira coluna do menu especialidades
	 * 
	*/

	public function get_areas_especialidade($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, area_especialidade, situacao');
		$this->db->from('areas_especialidade');
//		$this->db->where('id1', $limit[1]);
//		$this->db->where('id0', $limit[0]);
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
			$this->db->limit($limit[1], $limit[0]);
			if($limit[1] == '1') {
					return $this->db->get()->row();
				} else {
					return $this->db->get();
				}
		}
		return $this->db->get();
	}

	public function get_grupos_corpo_clinico($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, grupo, situacao');
		$this->db->from('grupos_corpo_clinico');
//		$this->db->where('id1', $limit[1]);
//		$this->db->where('id0', $limit[0]);
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
			$this->db->limit($limit[1], $limit[0]);
			if($limit[1] == '1') {
					return $this->db->get()->row();
				} else {
					return $this->db->get();
				}
		}
		return $this->db->get();
	}

	public function get_infraestrutura($where = FALSE)
	{
		$this->db->select('id, pagina, titulo');
		$this->db->from('infraestrutura');
		if($where)
			$this->db->where($where);
		$this->db->order_by('titulo', 'ASC');
		return $this->db->get();
	}

	public function get_areas_infraestrutura($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, area_infraestrutura, situacao');
		$this->db->from('areas_infraestrutura');
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
			$this->db->limit($limit[1], $limit[0]);
			if($limit[1] == '1') {
					return $this->db->get()->row();
				} else {
					return $this->db->get();
				}
		}
		return $this->db->get();
	}

	/**
	 * Pega links primeirao grupo do menu corpo clinico
	 * 
	*/
	public function get_corpo_clinico($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, grupo_corpo_clinico_id, nome, nome_reduzido, img, experiencia, dias, curriculum, situacao');
		$this->db->from('corpo_clinico');
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
			$this->db->order_by('nome', 'ASC');
		
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

	public function especialidades()
	{
//		$where = array('situacao'=>'A', 'area_id'=>'1');
		
		$this->db->select('id, nome');
		$this->db->from('especialidades');
		$this->db->order_by('nome', 'ASC');
		
		return $this->db->get();
	}

	/**
	 * Pega links primeira coluna do menu especialidades
	 * 
	*/
	public function especialidades1()
	{
		$where = array('situacao'=>'A', 'area_id'=>'1');
		
		$this->db->select('id, nome');
		$this->db->from('especialidades');
		$this->db->where($where);
		$this->db->order_by('nome', 'ASC');
		
		return $this->db->get();
	}
	/**
	 * Pega links primeira coluna do menu especialidades
	 * 
	*/
	public function especialidades2()
	{
		$where = array('situacao'=>'A', 'area_id'=>'2');
		
		$this->db->select('id, nome');
		$this->db->from('especialidades');
		$this->db->where($where);
		$this->db->order_by('nome', 'ASC');
		
		return $this->db->get();
	}
	/**
	 * Pega links primeira coluna do menu especialidades
	 * 
	*/
	public function especialidades3()
	{
		$where = array('situacao'=>'A', 'area_id'=>'3');
		
		$this->db->select('id, nome');
		$this->db->from('especialidades');
		$this->db->where($where);
		$this->db->order_by('nome', 'ASC');
		
		return $this->db->get();
	}
	
	
}
/* end of the file supermodel.php */
/* Location: ./system/application/models/supermodel.php */