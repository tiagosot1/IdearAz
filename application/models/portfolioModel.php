<?php
/** 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class PortfolioModel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	public function get_portfolio($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
	
		$this->db->from('portfolio');
		if($id) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		if($order_by) {
			if($order_by == 'RAND')
				$this->db->order_by('id','random');
			else
				$this->db->order_by($order_by[0], $order_by[1]);
				$this->db->order_by('id', 'DESC');
		} else {
			$this->db->order_by('id', 'DESC');
		}

		
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