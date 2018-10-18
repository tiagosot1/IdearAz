<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('data_br')){

	function data_br($data){
		return substr($data, 8, 2).'/'.substr($data, 5, -3).'/'.substr($data, 0, -6);
	}
}

if(!function_exists('data_us')){
	function data_us($data){
		return substr($data, 6, 4).'-'.substr($data, 3, 2).'-'.substr($data, 0, 2);
	}
}

?>