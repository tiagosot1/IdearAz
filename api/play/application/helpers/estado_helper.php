<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('sigla_estado')){

	function sigla_estado(){
		$this->load->model('municipios');

		$estados = $this->municipios->retorna_estados();

		$option = "<option value=''></option>";
		foreach($estados->result() as $linha) {
			$option .= "<option value='$linha->cod_estado'</option>"; 
		}

		$opcoes_estado['siglas'] = $option;

		return $opcoes_estado;
	}
	

}

?>