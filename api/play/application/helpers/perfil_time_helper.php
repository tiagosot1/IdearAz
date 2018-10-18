<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('atualiza_time_perfil')){
	function atualiza_time_perfil($id_usuario){
		$ci =& get_instance();
		$ci->load->model('usuarios');
		return $ci->usuarios->atualizaUsuarioOnline($id_usuario);
	}
}
?>