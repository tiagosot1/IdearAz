<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//echo base_url('resources/css/bootstrap.min.css');
		 $this->load->model('municipios');
		// //$this->load->model('municipios');

		// $estados = $this->municipios->retorna_estados();
		// //echo $this->db;
		// $option = "<option value=''></option>";
		// foreach($estados->result() as $linha) {
		// 	$option .= "<option value='$linha->cod_estado'>$linha->cod_estado</option>"; 
		// }
		// $options=  array('sigla_estados' => $option );
		$this->load->view('welcome');
	}

	public function busca_municipio(){
		$this->load->model('municipios');
		$id_muncipio = $this->input->post("id_muncipio");
		$municipios = $this->municipios->retorna_municipios();
		//echo $this->db;
		$option = "<option value=''></option>";
		foreach($municipios->result() as $linha) {

				$option .= "<option value='$linha->id'>$linha->nome</option>"; 
			
		}

		echo $option;

	}


}
