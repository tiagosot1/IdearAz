<?php
/** 
 * 
 * @author Eduardo Cattonar
 * @link http://www.emctech.com.br
 * @email educatto@gmail.com
 */ 
class Sobremodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_sobre($condicao=array())
	{
		
		
				
		$this->db->select('id, pagina, titulo, texto1, texto2, img_banner, video, situacao');
		$this->db->where('id = 1');
		$this->db->from('paginas');
		
		
		return $this->db->get();
		
	}

	 
}

/* end of the file bannersmodel.php */
/* Location: ./system/application/models/bannersmodel.php */