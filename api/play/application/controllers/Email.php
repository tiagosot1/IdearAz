<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
		$this->load->library('email');
		// $config['protocol'] = 's';
		// $config['mailpath'] = '/usr/sbin/sendmail';
		// $config['charset'] = 'iso-8859-1';
		// $config['wordwrap'] = TRUE;

		// $this->email->initialize($config);
		//$this->email->initialize();
		$this->email->from('joselucas_nb@hotmail.com', 'Play Cash');
		$this->email->to('joselucas.cdc@gmail.com');
		
		$this->email->subject('Ative sua conta');
		$this->email->message('Teste email');

		// if($this->email->send()){
		// 	$erroEmail = "Email não enviado, contate a equipe de suporte!";
		// }else{
		// 	$erroEmail = "Email enviado!";
		// }
		echo $this->email->send();

		echo $this->email->print_debugger();

		//echo $erroEmail;
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
