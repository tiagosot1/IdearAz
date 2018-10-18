<?php
$config = array(
			'salvar_categoria' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome da Categoria',
										'rules' => 'required'
									 ),
								),
			'salvar_subcategoria' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome da Sub Categoria',
										'rules' => 'required'
									 ),
								),
								
								
			'departamentos' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required'
									 ),
								array(
										'field' => 'cargo',
										'label' => 'Cargo que ocupa',
										'rules' => 'required'
									 )
								),
								
			'corpo_clinico' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required'
									 ),
								array(
										'field' => 'nome_reduzido',
										'label' => 'Nome para Menu',
										'rules' => 'required'
									 ),
								array(
										'field' => 'crm',
										'label' => 'Nº CRM',
										'rules' => 'required'
									 ),
								array(
										'field' => 'especialidade_id',
										'label' => 'Especialidade',
										'rules' => 'required'
									 )
								),
			'salvar_especialidade' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required'
									 )
								),
			'salvar_principal' => array(
								array(
										'field' => 'texto2',
										'label' => 'Texto',
										'rules' => 'required'
									 )
								),
			'salvar_infraestrutura' => array(
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'texto',
										'label' => 'Texto',
										'rules' => 'required'
									 )
								),
			'salvar_dicas' => array( 
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'resumo',
										'label' => 'Resumo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'dica',
										'label' => 'Dica',
										'rules' => 'required'
									 )
								),
			'salvar_opinioes' => array( 
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required'
									 ),
								array(
										'field' => 'ocupacao',
										'label' => 'Ocupação',
										'rules' => 'required'
									 ),
								array(
										'field' => 'opiniao',
										'label' => 'Opinião',
										'rules' => 'required'
									 )
								),
			'salvar_noticias' => array( 
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'resumo',
										'label' => 'Resumo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'noticia',
										'label' => 'Noticias',
										'rules' => 'required'
									 )
								),
			'editar_video' => array(
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'descricao',
										'label' => 'Descrição',
										'rules' => 'required'
									 ),
								array(
										'field' => 'video',
										'label' => 'Iframe do Vídeo',
										'rules' => 'required'
									 )
								),
			'editar_convenio' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome do Convênio',
										'rules' => 'required'
									 )
								),
			'editar_imagem' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome da Imagem',
										'rules' => 'required'
									 )
								),
			'videos' => array(
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 ),
								array(
										'field' => 'video',
										'label' => 'Vídeo',
										'rules' => 'required'
									 )
								),
			'salvar_cat_dicas' => array(
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 )
								),
			'salvar_pagina' => array(
								array(
										'field' => 'titulo',
										'label' => 'Títiulo',
										'rules' => 'required'
									 )
								),
			 'salvar_banner' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required'
									 ),/*,
								array(
										'field' => 'link',
										'label' => 'Link',
										'rules' => 'required|min_length[12]'
									 )*/
								array(
										'field' => 'localizacao',
										'label' => 'Localização do banner',
										'rules' => 'required'
									 )								
								),
			'salvar_usuario' => array(
						array(
								'field' => 'nome',
								'label' => 'Nome',
								'rules' => 'required|min_length[4]'
							 ),
						array(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_email'
							 ),
						array(
								'field' => 'fone1',
								'label' => 'Telefone',
								'rules' => 'trim|required'
							 ),
  
						array(
								'field' => 'id_tipo_usuario',
								'label' => 'Tipo de Usuário',
								'rules' => 'required'
							 )


								),
			'salvar_cliente' => array(
								array(
										'field' => 'inicio_contrato',
										'label' => 'Início do contrato',
										'rules' => 'required|exact_length[10]'
									 ),
								array(
										'field' => 'duracao_contrato',
										'label' => 'Duração do contrato',
										'rules' => 'required|is_natural_no_zero'
									 ),
								array(
										'field' => 'razao_social',
										'label' => 'Razão Social',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'nome_fantasia',
										'label' => 'Nome de fantasia',
										'rules' => 'required|min_length[4]'
									 )
								),
			'salvar_cliente_lojinha' => array(
								array(
										'field' => 'subdominio',
										'label' => 'Subdomínio',
										'rules' => 'trim|required|alpha_dash'
									 ),
								array(
										'field' => 'posicionamento_anuncio',
										'label' => 'Posicionamento do anúncio',
										'rules' => 'required|is_natural'
									 )
								),
			'editar_usuario' => array(
						array(
								'field' => 'nome',
								'label' => 'Nome',
								'rules' => 'required|min_length[4]'
							 ),
						array(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_email'
							 )
								),

			'editar_autor' => array(
						array(
								'field' => 'nome',
								'label' => 'Nome',
								'rules' => 'required|min_length[3]'
							 ),
						array(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'required|valid_emails'
							 ),
						array(
								'field' => 'fone1',
								'label' => 'Telefone',
								'rules' => 'required'
							 )
								),

			'editar_cliente' => array(
						array(
								'field' => 'nome',
								'label' => 'Nome',
								'rules' => 'required|min_length[3]'
							 )
								),


			'alterar_senha_admin' => array(
								array(
										'field' => 'senha',
										'label' => 'Senha',
										'rules' => 'required|min_length[4]|max_length[20]'
									 )
								),
			'enviar_mensagem' => array(
								array(
										'field' => 'para',
										'label' => 'Para',
										'rules' => 'required|valid_emails'
									 ),
								array(
										'field' => 'assunto',
										'label' => 'Assunto',
										'rules' => 'required'
									 )
								),
			'salvar_categoria_classi' => array(
								array(
										'field' => 'categoria',
										'label' => 'Nome da categoria',
										'rules' => 'required|min_length[2]'
									 )
								),
			'novo_anuncio_classificados' => array(
								array(
										'field' => 'titulo',
										'label' => 'Título',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'anuncio',
										'label' => 'Anúncio',
										'rules' => 'required|min_length[4]|max_length[300]'
									 )
								),
			'salvar_oferta' => array(
								array(
										'field' => 'nome',
										'label' => 'Titulo do produto',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'descricao',
										'label' => 'Descricao',
										'rules' => 'required|min_length[10]'
									 ),
								array(
										'field' => 'id_categoria',
										'label' => 'id_categoria',
										'rules' => 'required'
									 ),
								array(
										'field' => 'id_subcategoria',
										'label' => 'Subcategoria',
										'rules' => 'required'
									 )
								),
			'salvar_anuncio' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome da Empresa',
										'rules' => 'required'
									 ),
/*								array(
										'field' => 'fone',
										'label' => 'Telefone Principal',
										'rules' => 'required'
									 ),*/
								array(
										'field' => 'endereco',
										'label' => 'Endereço',
										'rules' => 'required'
									 )
								),
			'salvar_config_lojinha' => array(
								array(
										'field' => 'tipo',
										'label' => 'Tipo de Loja',
										'rules' => 'required'
									 ),
								array(
										'field' => 'contato',
										'label' => 'Informação sobre contato',
										'rules' => 'required'
									 ),
								array(
										'field' => 'apresentacao',
										'label' => 'Apresentação',
										'rules' => 'required'
									 )
								),
			'salvar_produto_lojinha' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome',
										'rules' => 'trim|required'
									 )
								),
			'salvar_produto_top' => array(
								array(
										'field' => 'titulo',
										'label' => 'Nome',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'link',
										'label' => 'Link',
										'rules' => 'required|min_length[4]'
									 )
								),
			'contato_lojinha' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'trim|required'
									 ),
								array(
										'field' => 'email',
										'label' => 'Email',
										'rules' => 'required|valid_email'
									 ),
								array(
										'field' => 'assunto',
										'label' => 'Assunto',
										'rules' => 'trim|required'
									 ),
								array(
										'field' => 'mensagem',
										'label' => 'Mensagem',
										'rules' => 'trim|required'
									 )

								),
			'registrar_site' => array(
								array(
										'field' => 'login',
										'label' => 'Login',
										'rules' => 'required|alpha_dash'
									 ),
								array(
										'field' => 'senha',
										'label' => 'Senha',
										'rules' => 'required|min_length[4]|max_length[20]'
									 ),
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'email',
										'label' => 'Email',
										'rules' => 'required|valid_email'
									 ),
								array(
										'field' => 'termos',
										'label' => 'Termos de uso',
										'rules' => 'required'
									 )
								),
			'contato' => array(
								array(
										'field' => 'nome',
										'label' => 'Nome',
										'rules' => 'required|min_length[4]'
									 ),
								array(
										'field' => 'email',
										'label' => 'Email',
										'rules' => 'required|valid_email'
									 ),
								array(
										'field' => 'assunto',
										'label' => 'Assunto',
										'rules' => 'required'
									 ),
								array(
										'field' => 'mensagem',
										'label' => 'Mensagem',
										'rules' => 'required'
									 )
								)
			);