<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * exibe uma mensagem de erro nos padroes do painel adm
 */
if ( ! function_exists('exibir_notificacao'))
{
	function exibir_notificacao($msg, $tipo = 'attention', $fechar = TRUE)
	{
		$html = "<div class=\"notification {$tipo} png_bg\">\n";
		if($fechar)
			$html .= '<a href="#" class="close"><img src="painel/images/icons/cross_grey_small.png" alt="fechar" /></a>' . "\n";
			
		$html .= "<div>{$msg}</div>\n";
		$html .= "</div>";
		
		return $html;
	}
}

/**
 * Exibe o status por extenso
 */
if ( ! function_exists('exibir_situacao'))
{
	function exibir_situacao($situacao)
	{
		switch($situacao) {
			case 'I' :
				return 'Inativo';
				break;
			case 'A' :
				return 'Ativo';
				break;
		}
	}
}

/**
 * Excluir imagem
 * @param string
 * @param string/array
 */
if ( ! function_exists('exluir_imagens'))
{
	function exluir_imagens($arquivos, $diretorio = FALSE)
	{
		if(is_array($arquivos) ) {
			foreach($arquivos as $res) {
				$full_path = $diretorio . $res;
				unlink($full_path);
			}
		} else
			unlink($arquivos);
	}
}

/**
 * prepara o status para inserir no banco
 * @param string
 * @return string
 */
if ( ! function_exists('prep_situacao'))
{
	function prep_situacao($situacao)
	{
		if($situacao == 'A')
		   return 'A';
		else
			return 'I';
	}
}

/**
 * exibe icone das pemissões
 * @param string
 * @param string
 */
if ( ! function_exists('icon_acesso'))
{
	function icon_acesso($chave, $valor)
	{		
		if($valor == 'A')
			return '<a href="painel/usuarios/listar/todos" class="tooltip" title="' . $chave . '">
						<img style="margin: 5px;" src="' . base_url() . 'painel/images/icons/' . $chave . '.png"
							alt="' . $chave . '" />
					</a>';
		else
			return FALSE;
	}
}

/**
 * alert($msg, $redirect = FALSE)
 * Generete an js alert
 * you must provide the message.
 * If you'd like to redirect after the alert, pass the new link in the second parameter 
 * (use site_url() function for internal redirections
 * For a simple history,.back() pass 'back' in your second parameter
 */
if ( ! function_exists('alert'))
{
	function alert($msg, $redirect = FALSE)
	{
		$html = '<script type="text/Javascript"> ';
		$html .= 'alert("'.$msg.'"); ';
		
		if($redirect) {
			if($redirect == "back")
				$html .= 'history.back(); ';
			else
				$html .= 'window.location = "'.$redirect.'" ';
		}
		
		$html .= '</script>';
		
		return $html;
	}
}

/**
 * get_thumb($source_image)
 * return the thumbnail name of an image
 * When you save a new entry this script upload an image and create a thumbnail.
 * the thumbnail name is something like myimage_thumb.jpg. In db we just sava myimage.jpg.
 * You can use this helper to add _thumb in the image name.
 */
if ( ! function_exists('get_thumb'))
{
	function get_thumb($source_image)
	{
		$ext = substr($source_image, -4, 4);
		$image_name = substr($source_image, 0, -4);
		$thumb = $image_name . '_thumb' . $ext;
		return $thumb;
	}
}

if ( ! function_exists('data_modal'))
{
	function data_modal($result, $gallery_name)
	{
		$html = '';
		$count_photos = 1;
		if($result) {
			foreach($result as $res) {
				if($count_photos == 1) {
					$cover = '<a href="' .  base_url() . 'uploads/gallery/' . $res->galleries_id . '/' . 
					$cover .= $res->image . '" title="' . $res->title . '" rel="prettyPhoto[' . $res->galleries_id . ']" ';
					$cover .= 'title="' . $res->title . '" >';
					$cover .= $gallery_name;
					$cover .= '</a>';
				} else {
					$html .= '<a class="link_modal "href="' . base_url() . 'uploads/gallery/';
					$html .= $res->galleries_id .'/' .  $res->image .'" ';
					$html .= 'title="'. $res->description .'" ';
					$html .= 'rel="prettyPhoto[' . $res->galleries_id . ']">';
					
					$html .= '<img src="' . base_url() . '/uploads/gallery/';
					$html .=  $res->galleries_id .'/' . get_thumb($res->image) . '" ';
					$html .= 'alt="'. $res->title .'" />';
					$html .= "</a>\n";
				}
				$count_photos++;
			}
		}
		$return['html'] = $html;
		$return['cover'] = $cover;
		return $return;
	}
}

/**
 * muda a data de dd/mm/aaaa para aaa-mm-dd, conforme o padrao sql
 *
 * Se $time = true, transforma para o padrao datetime
 * @access	public
 * @param	string	data
 * @return	string
 */
if ( ! function_exists('para_banco'))
{
	function para_banco($data, $time = false)
	{
		return implode("-", array_reverse(explode("/", $data)));
	}
}



/**
 * muda a data de dd-mm-aaaa para aaa/mm/dd, conforme o padrao brasileiro
 *
 * Se $time = true, transforma para o padrao datetime
 * @access	public
 * @param	string	data
 * @return	string
 */
if ( ! function_exists('do_banco'))
{
	function do_banco($data, $time = false)
	{
		return implode("/", array_reverse(explode("-", $data)));
	}
}

/**
 * formata os valores em R$
 * @param numeric
 * @param string
 * @return float
 */
if ( ! function_exists('formatar_real'))
{
	function formatar_real($valor, $origem = 'form')
	{	
		
		//formara de acordo com a origem
		if($origem == 'form') {
			$formatado = str_replace('.', '', $valor);
			return str_replace(',', '.', $formatado);
			
		} elseif ($origem == 'db')
			return number_format($valor, 2, ',', '.');
	}
}

/**
 * Exibe o valor dos produtos
 * @param float
 * @return float/string
 */
if ( ! function_exists('vl_produto'))
{
	function vl_produto($valor, $cifrao = 'R$ ')
	{	
		if( $valor > 0 )
			return $cifrao . formatar_real($valor, 'db');
		else
			return $cifrao . 'consulte';
	}
}

/**
 * Verifica se o arquivo é imageem
 * @param strng
 * @return boolean
 */
if ( ! function_exists('e_imagem'))
{
	function e_imagem($imagem)
	{	
		if( preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem) )
			return TRUE;
	}
}

/**
 * Calcula data do prox vencimento
 * @param date - data do inicio do contrato
 * @param int - duraçao do contrato em dias
 * @return boolean
 */
if ( ! function_exists('prox_vencimento'))
{
	function prox_vencimento($inicio_contrato, $nr_dias)
	{
		$array_inicio = explode('-', $inicio_contrato);	
		$prox_vencimento = mktime(0, 0, 0, $array_inicio[1], $array_inicio[2]+$nr_dias, $array_inicio[0]);
		return date('Y-m-d', $prox_vencimento);
	}
}

/**
 * Calcula dias restantes
 * @param date - data do inicio do contrato
 * @param int - duraçao do contrato em dias
 * @return boolean
 */
if ( ! function_exists('dias_restantes'))
{
	function dias_restantes($fim_contrato)
	{
		$array_fim 	= explode('-', $fim_contrato);
		$array_hj	= explode('-', date('Y-m-d'));
		
		$timestamp1 = mktime(0,0,0,$array_hj[1],$array_hj[2],$array_hj[0]);
		$timestamp2 = mktime(0,0,0,$array_fim[1],$array_fim[2],$array_fim[0]);
		
		//diminuo a uma data a outra
		$segundos_diferenca = $timestamp2 - $timestamp1;
		
		//converto segundos em dias
		$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
		
		$dias_diferenca = floor($dias_diferenca);
		
		return $dias_diferenca; 		
	}
}

/**
 * 
 * Exibe vídeo do youtube/vimeo
 */
if ( ! function_exists('img_video'))
{
	function img_video($url)
	{
		if( strstr($url, 'youtube') ) {
			
			$path =  explode('watch?v=', $url );
			$id = $path[1];
			return 'http://img.youtube.com/vi/' . $id . '/2.jpg';
			
		} elseif( strstr($url, 'vimeo') ) {
			$id = str_replace('http://vimeo.com/', '', $url);
			$path = 'http://vimeo.com/api/v2/video/' . $id . '.php';
			$dados = file_get_contents($path);
			
			if( ! $dados )
				return FALSE;
				
			$array = unserialize($dados);
			
			return $array[0]['thumbnail_small'];
		}
		return FALSE;
	}
}


define( "UC_CHARS", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖŒØŠÙÚÛÜÝŽÞ" ); // If you need more, add
define( "LC_CHARS", "àáâãäåæçèéêëìíîïðñòóôõöœøšùúûüýžþ" ); // If you need more, add
define( "WORD_SEPARATORS", chr(9).chr(10).chr(11).chr(12).chr(13).chr(32) );

if ( ! function_exists('strtolower2'))
{
	function strtolower2($value) {
	  return (
	   strtolower(
		 strtr( $value, UC_CHARS, LC_CHARS )
	   )
	  );
	}
}
	
if ( ! function_exists('strtoupper2'))
{
	function strtoupper2($value) {
	  return (
	   strtoupper(
		 strtr( $value, LC_CHARS, UC_CHARS )
	   )
	  );
	}
}
	
if ( ! function_exists('ucfirst2'))
{
	function ucfirst2($value) {
	  return (
	   strtoupper2(
		 substr( $value, 0, 1 )
	   ).strtolower2(
		 substr( $value, 1, strlen( $value ) )
	   )
	  );
	}
}
	
if ( ! function_exists('ucwords2'))
{
	function ucwords2( $value ) {
	  $upper = strtoupper2( $value );
	  $value = ucfirst2( $value );
	  $word_separators = WORD_SEPARATORS;
	  $len = strlen( $value ) - 1;
	  for ( $i = 0; $i < strlen( $word_separators ); $i++ ) {
	   $separator = $word_separators[$i];
	   $pos = -1;
	   while ( $pos !== false ) {
		 $pos = strpos( $value, $separator, ( $pos + 1 ) );
		 if ( ( $pos !== false ) && ( $pos < $len ) ) {
		   $value[ ( $pos + 1 ) ] = $upper[ ( $pos + 1 ) ];
		 }
	   }
	  }
	  return ($value);
	}
}
	

/* End of file super_helper.php */
/* Location: ./system/application/helper/super_helper.php */