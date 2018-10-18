<?php
/** 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class ServicosModel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getServicos($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('servicos.id as infra_id, categoriaServicosId, pagina, titulo, texto1, texto2, img_banner, 
				video, servicos.situacao, home, posicao, img_home, categoriaServicos.categoria');
		$this->db->from('servicos');
		$this->db->join('categoriaServicos', 'servicos.categoriaServicosId = categoriaServicos.id', 'left');
		if($id) {
			$this->db->where('servicos.id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		if ($order_by) {
			$this->db->order_by($order_by[0], $order_by[1]);
			$this->db->order_by('servicos.titulo', 'ASC');
	} else
			$this->db->order_by('servicos.id', 'ASC');
			
		if($limit) {
			$this->db->limit($limit[0], $limit[1]);
			if($limit[0] == '1') {
					return $this->db->get()->row();
				} else {
					return $this->db->get();
				}
		}
		return $this->db->get();
	}


	public function getServicoInf($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, categoria, situacao');
		$this->db->from('categoriaServicos');
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
			$this->db->order_by('categoria', 'ASC');
		
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
	public function getServicosCategoria($id=false){
		
		
		$this->db->from('servicos');
		$this->db->where('categoriaServicosId',$id);
		$this->db->order_by('titulo', 'ASC');
		return $this->db->get();
	}

	public function getServicosCategoria1($id=false){
		
		
		$this->db->from('categoriaservicos');
		$this->db->where('id',$id);
		$this->db->order_by('categoria', 'ASC');
		return $this->db->get();
	}


	 
}


/* end of the file bannersmodel.php */
/* Location: ./system/application/models/bannersmodel.php */