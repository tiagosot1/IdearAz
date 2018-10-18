<?php
/** 
 * 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class Imagensmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_imagens($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		$this->db->select('id, titulo, img, situacao');
		$this->db->from('imagens');
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