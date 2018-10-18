<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Supermodel extends CI_Model {

	public $site_config;

	function __construct()
	{
		parent::__construct();
		
		//$this->site_config = $this->get_confg();
	}

	/**
	 * Pega configuração do site
	 * 
 	 * @access public
	 * @return object
	*/
	public function get_confg()
	{
		return $this->db->select('titulo_site, email, cidade, logo, keywords, description, 
				site_verification, analitics, facebook, twitter, gplus, site, telefone, endereco')
						->from('configuracao')
						->where('id', 1)
						->limit(1)
						->get()
						->row();
	}

	/**
	 * check if login and pass are correct
	 * 
 	 * @access public
	 * @return boolean
	*/
	public function check_login($login, $pass)
	{
		$where = array(
				'login' => $login,
				'pass' => $pass
		);
		
		$this->db->select('COUNT(*) as total');
		$this->db->from('configuration');
		$this->db->where($where);
		
		return (bool) $this->db->get()->row()->total;
	}



	/**
	 * A generic function to delete data from a selected table
	 * You just need to provide the table name and the item id
	 * 
 	 * @access public
	 * @param string
	 * @param integer
	 * @return boolean
	*/	
	public function deletar($table, $id)
	{
		if( $this->db->delete($table, array('id' => $id) ) )
			return TRUE;
		else
			return FALSE;
	}
	
	
	/**
	 * this is a generic function to save data in db
	 * the 1st parameter is the table name
	 * the 2nd is an array with the data that will be saved
	 * the 3dt is optional. If you give an id the function will update the current id. 
	 * Without id a new entry will add into db
	 * 
 	 * @access public
	 * @param string
	 * @param array
	 * @param integer
	 * @return integer/boolean
	 */
	public function salvar($table, $columns = array(), $id = NULL)
	{
	//$table = "configuracaoo";
		if($id) {
			$this->db->where('id', $id);
			$result = $this->db->update($table, $columns);
		} else
			$result = $this->db->insert($table, $columns);
		
		if($result) {
			if( ! $id ) 
				return $this->db->insert_id();
			else
				return TRUE;
		} else
			return FALSE;
	}
	
	/**
	 * this is a generic function to save data exclude in db
	 * the 1st parameter is the table name
	 * the 2nd is an array with the data that will be saved
	 * Without id a new entry will add into db
	 * 
 	 * @access public
	 * @param string
	 * @param array
	 * @param integer
	 * @return integer/boolean
	 */
	public function salvar_excluido($table, $columns = array())
	{

		$result = $this->db->insert($table, $columns);
		
		if($result) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function atualiza_campo($table, $campo, $where, $valor_antigo, $valor_novo)
	{
	// $table = 'categoria';
		$set = array($campo => $valor_novo);
		$this->db->where($where, $valor_antigo);
		$result = $this->db->update($table, $set);
		
		if($result) 
			return TRUE;
		else
			return FALSE;
	}
	
	
	/**
	 * update_status($table, $situation, $id)
	 * this is a generic function that update the status of an item
	 * the 1st parameter is the table name
	 * the 2nd is the new situantio. For examplo, to make inactive you must use 'I'
	 * the 3dt is id of the item that will be updated
	 * 
 	 * @access public
	 * @param string
	 * @param string
	 * @param integer
	 * @return boolean
	 */
	public function atualiza_status($table, $situation, $id)
	{
		$set = array('situacao' => $situation);

		if( is_int($id) ) {
			$this->db->where('id', $id);
			$this->db->limit(1);
		} else 
			$this->db->where("id IN ({$id})");
		
		if($this->db->update($table, $set))
			return TRUE;
		else
			return FALSE;
	}
	
	public function atualiza_status_coluna($table, $coluna, $situation, $id)
	{
		$set = array($coluna => $situation);

		if( is_int($id) ) {
			$this->db->where('id', $id);
			$this->db->limit(1);
		} else 
			$this->db->where("id IN ({$id})");
		
		if($this->db->update($table, $set))
			return TRUE;
		else
			return FALSE;
	}
	
	/**
 	 * @access public
	 * @param string
	 * @param string
	 * @param integer
	 * @return boolean
	 */
	public function moderacao_status($table, $moderacao, $id)
	{
		$set = array('moderacao' => $moderacao);

		if( is_int($id) ) {
			$this->db->where('id', $id);
			$this->db->limit(1);
		} else 
			$this->db->where("id IN ({$id})");
		
		if($this->db->update($table, $set))
			return TRUE;
		else
			return FALSE;
	}


	/**
	 * Faz upload de arquivos para o servidor
	 * O primeiro parâmetro é o nome do campo do formulário
	 * e o segundo é o array com as configurações do CI
	 * 
 	 * @access public
	 * @param string
	 * @param array
	 * @return array
	 */
	public function faz_upload($form_field, $config, $cript = FALSE )
	{
		//Carrega a biblioteca
		if (!$cript) // se quiser criar HASH do nome
			$config['encrypt_name'] = TRUE;
			
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		//faz o upload
		if( ! $this->upload->do_upload($form_field) )
			$result['erro'] = $this->upload->display_errors();
		else
			$result['ok'] = $this->upload->data();

		return $result;
	}
	
	
	/**
	 * Redimensiona a imagem original
	 * O primeiro parâmetro é o array gerado pela classe de upload
	 * e o segundo é o array com as configurações do CI
	 * neste segundo array são esperado ao menos a largura e altura da nova imagem
	 * 
 	 * @access public
	 * @param array
	 * @param array
	 * @return array
	 */
	public function redimensiona_imagem($info_arquivo, $config = array())
	{
		//Configuração da imagem
		$config['image_library'] = 'gd2';
		$config['source_image'] = $info_arquivo['full_path'];
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		
		//set image size
		$image_x = ($config['width'] * 100) / $info_arquivo['image_width'];
		$image_y = ($config['height'] * 100) / $info_arquivo['image_height'];
		
		if($config['master_dim'] == 'auto')
			$config['master_dim'] = ($image_x > $image_y) ? 'width' : 'height';
		
		if( $config['width'] >= $info_arquivo['image_width'] )
			$config['width'] = $info_arquivo['image_width'];
			
		if( $config['height'] >= $info_arquivo['image_height'] )
			$config['height'] = $info_arquivo['image_height'];

		//load the library
		$this->load->library('image_lib');
		$this->image_lib->initialize($config);
		
		//resize
		if( ! $this->image_lib->resize() ) {
			$result['erro'] = $this->image_lib->display_errors();
		} else
			$result['ok'] =  TRUE;
			
		//reseta a biblioteca
		$this->image_lib->clear();
		unset($config);
		
		return $result;
	}
	
	
	public function gerar_miniatura($info_arquivo, $config = array(), $ratio = FALSE)
	{
		$nova_img = $info_arquivo['file_path']
				  . $info_arquivo['raw_name'] 
				  . '_thumb' 
				  . $info_arquivo['file_ext'];
									
		$config['new_image'] = $nova_img;
		$redimensionada = $this->redimensiona_imagem($info_arquivo, $config);
		
		if($redimensionada['ok']) {	
			//cofig da imagem
			$config['image_library']	= 'gd2';
			$config['source_image'] 	= $nova_img;
			$config['create_thumb'] 	= FALSE;
			$config['maintain_ratio'] 	= $ratio;
			$config['new_image'] 		=  FALSE;
										
			//inicia a biblioteca
			$this->image_lib->initialize($config);		
	
			//crop
			if( ! $this->image_lib->crop() )
				$result['erro'] = $this->image_lib->display_errors();
			else 
				$result['ok'] = TRUE;
			
			//reseta a biblioteca
			$this->image_lib->clear();
			unset($config);
		} else
			$result['erro'] = $redimensionada['erro'];
		
		return $result;
	}

	/**
	 * Retorna o número total de itens da tabela selecionana
	 * 
 	 * @access public
 	 * @param tabela
 	 * @param array
	 * @return integer
	*/
	public function nr_registros($tabela, $where = FALSE)
	{
		$this->db->select('COUNT(*) as total');
		$this->db->from($tabela);
		if($where)
			$this->db->where($where);
			
		return $this->db->get()->row()->total;
	}
	
	/**
	 * Verifica se um dado já está salvo no banco
	 * por exemplo, se vc quiser verificar se o login "teste" já está cadastrado na tabela "usuários" use
	 * verifica_se_cadastrado('usuarios', 'login', 'teste')
	 * O último parâmetro ignora faz com que a busca exclua o id passado. Use isso caso queira atualizar dados
	 * Ex: Vai autalizar os dados e quer verificar o email. Passando o ID a função irá verificar apenas os cadastros com 
	 * id diferente do que foi passado:
	 * verifica_se_cadastrado('clientes', 'email', 'email@email.com', 50)
	 * 
 	 * @access public
	 * @param string
	 * @param string
	 * @param string
	 * @param boolena
	 * @return boolean
	 */
	public function verifica_se_cadastrado($tabela, $coluna, $valor, $id = 0)
	{
		
		if( empty($valor) )
			return FALSE;
		
		return (bool) $this->db->select('COUNT(*) as total')
				 				->from($tabela)
								->where($coluna, $valor)
								->where('id !=', $id)
								->get()
								->row()
								->total;
	}

	/**
	 * Idem anterior pesquisando 2 colunas
	 */
	public function verifica_se_cadastrado2($tabela, $coluna1, $valor1, $coluna2, $valor2, $id = 0)
	{
		
		if( empty($valor) )
			return FALSE;
		
		return (bool) $this->db->select('COUNT(*) as total')
				 				->from($tabela)
								->where($coluna1, $valor1)
								->where($coluna2, $valor2)
								->where('id !=', $id)
								->get()
								->row()
								->total;
	}
	
	/**
	 * Verifica se determinado valor está no array reservado
	 * 
 	 * @access public
	 * @param string
	 * @return boolean
	 */
	public function e_reservado($valor)
	{
		$reservado = array('Controller', 'CI_Base', '_ci_initialize', '_ci_scaffolding', 'index', 
						   'painel', 'admin', 'site', 'adm',  
						   'dicas', 'videos', 'p', 
						   'js', 'uploads', 'user_guide', 'atendimento', 'site', 'system', 'license');
		
		if($valor == '')
			return FALSE;
			
		if( is_numeric($valor) )
			return TRUE;
		
		if( in_array($valor, $reservado) )
			return TRUE;
	}
	
	/**
	 * Verifica se o diretorio existe
	 * 
 	 * @access public
	 * @param string
	 * @return boolean
	 */
	public function verifica_dir($dir)
	{
		if( ! is_dir($dir) ) {
			$lista_dir = explode('/', $dir);
			$path = '';
			foreach($lista_dir as $k => $v) {
				$path .= $v . '/';
				if( ! is_dir($path) ) {
					if( ! mkdir($path, 0777) )
						return FALSE;	
				}
			}
		}
		return TRUE;
			
	}
	
	
}
/* end of the file supermodel.php */
/* Location: ./system/application/models/supermodel.php */