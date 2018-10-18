<?php
/** 
 * Usuariossmodel Class
 * Gerenciamento dos usuarios e anúncios
 */ 
class Usuariosmodel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	
	public function get_usuarios($limit = array(), $where = FALSE, $id = FALSE, $oder_by = FALSE)
	{
		$this->db->select('usuarios.id, usuarios.login, usuarios.senha, usuarios.nome, usuarios.email, 
						usuarios.website, usuarios.razao_social, usuarios.endereco, usuarios.cep, 
						usuarios.fone1, usuarios.fone2, usuarios.fones3, usuarios.facebook, 
						usuarios.twitter, usuarios.situacao , usuarios.visualizacoes, 
						usuarios.keywords, usuarios.description, usuarios.logo, usuarios.login_id, 
						usuarios.data, usuarios.hora, usuarios.estado, usuarios.cidade, usuarios.bairro, 
						usuarios.logradouro, usuarios.tipo_usuario,    
						  permissoes_usuario.admin');
		$this->db->from('usuarios');
		$this->db->join('permissoes_usuario', 'usuarios.id = permissoes_usuario.usuarios_id');
//		$this->db->join('permissoes_usuario', 'permissoes_usuario.usuarios_id = usuarios.id');
//		$this->db->join('tipo_usuarios', 'usuarios.tipo_usuario = tipo_usuarios.id');
		$this->db->group_by('usuarios.id');
		
		if($id) {
			$this->db->where('usuarios.id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		if($order_by)
			$this->db->order_by($order_by[0], $order_by[1]);
		else
			$this->db->order_by('nome', 'ASC');
			
		if($limit) {
			$this->db->limit($limit[0], $limit[1]);
			if($limit == '1') {
					return $this->db->get()->row();
				} else {
					return $this->db->get();
				}
		}
		
		return $this->db->get();
	}
	
	public function tipo_usuarios()
	{
		
		return $this->db->get('tipo_usuarios')->result();
		
	}
	
	
	public function permissoes($usuarios_id)
	{
		return $this->db->select('id, usuarios_id, classificados, lojinha, ecommerce, produto_top, admin, produto_top')
				 		->from('permissoes_usuario')
				 		->where('usuarios_id', $usuarios_id)
				 		->limit(1)
				 		->get()
				 		->row();
	}
	
	public function fones($usuarios_id)
	{
		return $this->db->select('id, usuarios_id, numero')
				 		->from('telefones')
				 		->where('usuarios_id', $usuarios_id)
				 		->get();
	}
	
	public function fones_grupo($where = FALSE)
	{
		return $this->db->select('id, usuarios_id, numero')
				 		->from('telefones')
				 		->where($where)
				 		->get();
	}	
	public function total($where = FALSE)
	{
		$query = "SELECT COUNT(usuarios.id) as total 
					FROM usuarios, permissoes_usuario  ";
		if($where)
			$query .= 'WHERE ' . $where;
		
		$query .= " GROUP BY usuarios.id";
		
		return $this->db->query($query)->row()->total;
/*					
		$this->db->select('COUNT(usuarios.*) as total');
		$this->db->from('usuarios, permissoes_usuario');
		$this->db->where('permissoes_usuario.usuarios_id', 'usuarios.id');
		
		if($where)
			$this->db->where($where);
			
		$this->db->group_by('usuarios.id');
		
		return $this->db->get()->row()->total;*/
	}
	
	
	public function get_banner_atual($id)
	{
		$this->db->select('id, nome, img, link, ordem, situacao, tipo, localizacao');
		$this->db->from('banners');
		$this->db->where('id', $id);
		$this->db->limit(1);
			
		return $this->db->get()->row();
	}

	public function get_anuncios($limit = array(), $where = FALSE, $id = FALSE)
	{
		$this->db->select('anuncios.id, anuncios.usuarios_id, anuncios.imagem, anuncios.titulo, anuncios.resumo, anuncios.completo, 
						  anuncios.fone, anuncios.endereco, usuarios.website, 
						  usuarios.subdominio, usuarios.posicionamento_anuncio, usuarios.situacao, usuarios.situacao_anuncio, 
						  permissoes_usuario.lojinha, permissoes_usuario.ecommerce, permissoes_usuario.produto_top, permissoes_usuario.admin, 
						  permissoes_usuario.anuncio, permissoes_usuario.comprar_agora');
		$this->db->from('anuncios');
		$this->db->join('usuarios', 'anuncios.usuarios_id = usuarios.id');
		$this->db->join('permissoes_usuario', 'permissoes_usuario.usuarios_id = usuarios.id');
		$this->db->group_by('anuncios.id');
		
		if($id) {
			$this->db->where('anuncios.id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		$this->db->order_by('anuncios.completo', 'DESC');
		$this->db->order_by('usuarios.posicionamento_anuncio', 'DESC');
		$this->db->order_by('anuncios.titulo', 'ASC');
		
		$this->db->limit($limit[0], $limit[1]);
		
		return $this->db->get();
	}


	public function get_anuncios2($limit = array(), $where = FALSE, $id = FALSE)
	{
		$this->db->select('anuncios.id, anuncios.usuarios_id, anuncios.imagem, anuncios.titulo, 
		anuncios.resumo, anuncios.completo, anuncios.fone, anuncios.endereco, usuarios.website, 
		usuarios.subdominio, usuarios.posicionamento_anuncio, usuarios.situacao, usuarios.situacao_anuncio, 
		permissoes_usuario.lojinha, permissoes_usuario.ecommerce, permissoes_usuario.produto_top, 
		permissoes_usuario.admin, permissoes_usuario.anuncio, permissoes_usuario.comprar_agora');
		$this->db->from('usuarios');
		$this->db->join('anuncios', 'usuarios.id = anuncios.usuarios_id');
		$this->db->join('empresas_guia', 'usuarios.id = empresas_guia.usuarios_id');
		$this->db->join('cat_guia', 'empresas_guia.guias_id = cat_guia.id');
		$this->db->join('guias', 'cat_guia.id = guias.cat_guia_id');
		$this->db->join('permissoes_usuario', 'permissoes_usuario.usuarios_id = usuarios.id');
		$this->db->group_by('usuarios.id');
		
		if($where)
			$this->db->where($where);
			
		$this->db->order_by('anuncios.completo', 'DESC');
		$this->db->order_by('usuarios.posicionamento_anuncio', 'DESC');
		$this->db->order_by('anuncios.titulo', 'ASC');
		
		$this->db->limit($limit[0], $limit[1]);
		
		return $this->db->get();
	}
	
	public function total_anuncios($where = FALSE)
	{
		$this->db->select('COUNT(anuncios.id) as total');
		$this->db->from('anuncios');
		$this->db->join('usuarios', 'anuncios.usuarios_id = usuarios.id');
		$this->db->join('permissoes_usuario', 'permissoes_usuario.usuarios_id = usuarios.id');
		$this->db->where($where);
		return $this->db->get()->row()->total;

	}
	
	/*
	public function anuncios_site($limit = array())
	{
		$this->db->select('anuncios.id, anuncios.usuarios_id, anuncios.imagem, anuncios.titulo, anuncios.resumo, anuncios.completo, 
						  anuncios.fone, anuncios.endereco, 
						  usuarios.subdominio, usuarios.posicionamento_anuncio, usuarios.situacao, usuarios.situacao_anuncio, 
						  permissoes_usuario.lojinha, permissoes_usuario.ecommerce, permissoes_usuario.produto_top, permissoes_usuario.admin, 
						  permissoes_usuario.anuncio');
		$this->db->from('anuncios, usuarios, permissoes_usuario');
		$this->db->where("usuarios.id = ");
		$this->db->join('usuarios', 'anuncios.usuarios_id = usuarios.id OR anuncios.usuarios_id IS NULL');
		$this->db->join('permissoes_usuario', 'permissoes_usuario.usuarios_id = usuarios.id OR anuncios.usuarios_id IS NULL');
		$this->db->group_by('anuncios.id');
		
		if($id) {
			$this->db->where('anuncios.id', $id);
			$this->db->limit(1);
			return $this->db->get()->row();
		}

		if($where)
			$this->db->where($where);
			
		$this->db->order_by('anuncios.completo', 'DESC');
		$this->db->order_by('usuarios.posicionamento_anuncio', 'DESC');
		$this->db->order_by('anuncios.titulo', 'ASC');
		
		$this->db->limit($limit[0], $limit[1]);
		
		return $this->db->get();
	}*/
	
	public function dados_anuncio($usuarios_id)
	{
		$this->db->select('anuncios.id, anuncios.usuarios_id, anuncios.imagem, anuncios.titulo, anuncios.resumo, anuncios.completo, 
						  anuncios.fone, anuncios.endereco');
		$this->db->from('anuncios');
		$this->db->where('usuarios_id', $usuarios_id);
		$this->db->limit(1);
			
		return $this->db->get()->row();
	}
	
	/*
		Cartoes Aceitos
	*/
	public function cartoes($id = FALSE)
	{
		if( ! $id )
			return $this->db->select('*')->from('cartoes')->order_by('nome', 'DESC')->get();
		else {
			$this->db->select('cartoes.id as card_id, cartoes.nome, cartoes.imagem, 
							  cartoes_usuarios.id, cartoes_usuarios.usuarios_id, cartoes_usuarios.cartoes_id');
			$this->db->from('cartoes_usuarios');
			$this->db->join('cartoes', 'cartoes.id = cartoes_usuarios.cartoes_id');
			$this->db->group_by('cartoes.id');
			$this->db->where('cartoes_usuarios.usuarios_id', $id);
			return $this->db->get();
		}
	}
	
	/*
		Id dos cartões aceitos pelo usuário
	*/
	public function id_cartoes_user($usuarios_id)
	{
		$retorno = array();
		
		$cartoes = $this->db->select('*')
				 ->from('cartoes_usuarios')
				 ->where('usuarios_id', $usuarios_id)
				 ->group_by('id')
				 ->get();

		if($cartoes->num_rows() > 0) {
			foreach($cartoes->result() as $res) {
				$retorno[] = $res->cartoes_id;
			}
		}
		return $retorno;
	}
}

/* end of the file bannersmodel.php */
/* Location: ./system/application/models/bannersmodel.php */