<?php
/** 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class blogModel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	
	public function get_blog($limit = array(), $where = FALSE, $id = FALSE, $order_by = FALSE)
	{
		
		$this->db->from('blog');
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
	
	  function GetAll($sort = 'id', $order = 'asc', $limit = null, $offset = null) {
    $this->db->order_by($sort, $order);

    if($limit)
      $this->db->limit($limit,$offset);

    $query = $this->db->get('blog');

    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return null;
    }

	 }
  function CountAll(){
    return $this->db->count_all('blog');
  }

}

/* end of the file bannersmodel.php */
/* Location: ./system/application/models/bannersmodel.php */