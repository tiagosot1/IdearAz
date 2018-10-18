<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');


class Municipios extends CI_Model
{
	
	function __construct()
	{
		
	}

	public function retorna_estados(){
		$this->db->group_by("cod_estado");

		$dados = $this->db->get("tab_municipios");


		return $dados;

		// if($this->load->database())
		// {
		// 	echo 'carregou o banco';
		// 	$dados = $this->db->get("tab_municipios");
		// }else{
		// 	echo 'nao carregou';
		// }
	}

	public function retorna_municipios(){
		$cod_estado = $this->input->post("cod_estado");
		$this->db->where("cod_estado",$cod_estado);
		$this->db->order_by("nome","asc");

		$dados = $this->db->get("tab_municipios");

		return $dados;
	}
}
?>
