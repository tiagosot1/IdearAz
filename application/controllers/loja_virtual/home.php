<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('conveniosmodel', 'convenios');
		$this->load->model('paginasmodel', 'paginas');
		$this->load->model('especialidadesmodel', 'especialidades');
		$this->load->model('supermodel');
		$this->load->library('session');
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
        $subdomain_name = $subdomain_arr[0];

		
//		$this->output->enable_profiler(TRUE);
//		$this->load->model('usuariosmodel', 'u');
	}

	public function verifica($subdominio= FALSE)
	{
		//echo $loja;
		$novosdados = array(
                  'subdominio' => $subdominio
               );

		$this->session->set_userdata($novosdados);
		$session_id = $this->session->userdata('subdominio');

		if($subdominio=='blog')
		{
			$this->blog();
		}else{
			$this->loja_virtual($subdominio);
		}

		
		
		

	}

	public function blog(){
		redirect('https://'.base_url().'blog');
	}

	public function loja_virtual($subdominio=false){
		redirect('http://'.base_url().$subdominio);
	}


	public function save(){
		
		$dados = $_POST;
		
		$colunas['subdominio'] = $dados['subdominio'][0];
		$colunas['email'] = $dados['email'][0];
		$colunas['senha'] =$dados['senha'];
		$this->supermodel->salvar('usuario_loja_virtual', $colunas);
	
	}

	public function verifica_se_cadastrado(){
		
		
		$result = $this->supermodel->get_table_full('usuario_loja_virtual', 'subdominio', $_POST);

		foreach ($result as $key => $value) {
			if ($value->subdominio =="") {
				echo 0;
			}else{
				echo 1;
			}
		}

		if($result == true){
			
		}else{
			
		}
		
		exit;
		//$colunas['subdominio'] = 'subdominio';
		//$this->supermodel->salvar('usuario_loja_virtual', $colunas);
		/*
		if($verifica_se_cadastrado !=true){
			$this->load->model( 'Campeonatos' );
			$result = $this->Campeonatos->CampeonatosInsert( $_POST );
			if ( $result ) {
				echo 1;
			} else {
				echo 0;
			}
		} else {
				echo 0;
			}
		
		exit;
		*/
	}

	public function usuario(){

		$dados = $_POST;


		$dados['erros'] = null;
		$dados['sucesso'] = null;
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[2]|trim');
		$this->form_validation->set_rules('idade', 'Idade', 'numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('emailconfirmar', 'Confirme seu email', 'required|valid_email|matches[email]|trim');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required|max_length[10]|trim');
		$this->form_validation->set_rules('conhecimento', 'Conhecimento', 'required',array('required' => 'Informe qual o seu nível de conhecimento em programação.'));
		//$this->form_validation->set_rules('cpf', 'CPF', 'required|callback_valida_cpf');
		if ($this->form_validation->run() == FALSE)
		{
			$dados['erros'] = validation_errors('<li>','</li>');
		}
		else
		{
			$dados['sucesso'] = "Formulário validado com sucesso!".$dados['nome'];;
		}
		
		$this->load->view('loja_virtual/cadastrar',$dados);
	}

	public function valida_cpf($cpf) {
		// Verifica se um número foi informado
		if(empty($cpf)) {
			$this->form_validation->set_message('valida_cpf', 'O campo {field} não foi informado.');
			return false;
		}
		// Elimina possível máscara
		$cpf = preg_replace('[^0-9]', '', $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		// Verifica se o número de dígitos informados é igual a 11
		if (strlen($cpf) != 11) {
			$this->form_validation->set_message('valida_cpf', 'O campo {field} é inválido.');
			return false;
		}
		// Verifica se nenhuma das sequências inválidas abaixo
		// foi digitada. Caso afirmativo, retorna false.
		else if ($cpf == '00000000000' ||
		$cpf == '11111111111' ||
		$cpf == '22222222222' ||
		$cpf == '33333333333' ||
		$cpf == '44444444444' ||
		$cpf == '55555555555' ||
		$cpf == '66666666666' ||
		$cpf == '77777777777' ||
		$cpf == '88888888888' ||
		$cpf == '99999999999') {
			$this->form_validation->set_message('valida_cpf', 'O campo {field} é inválido.');
			return false;
			// Calcula os digitos verificadores para verificar se o
			// CPF é válido
		} else {
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					$this->form_validation->set_message('valida_cpf', 'O campo {field} é inválido.');
					return false;
				}
			}
			return true;
		}
	}

}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */