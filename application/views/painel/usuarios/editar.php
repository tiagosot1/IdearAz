			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                
           
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                
	
                    
                    
					<!-- Senha -->
					<div class="tab-content" id="tab2">
						<?php echo form_open('painel/usuarios/salvar_editar/pessoal/' . $usuario->id, array('class' => 'ajax_form') ); ?>


							<fieldset>	
								<p>
									<label>Login</label>
									<input class="form-control" type="text" name="login" value="<?php echo $usuario->login; ?>" />
								</p>
								<p>
									<label>Nome</label>
									<input class="form-control" type="text" name="nome" value="<?php echo $usuario->nome; ?>" /> 
								</p>
								



								<p>
									<input class="button" type="submit" value="Enviar" />
								</p>
							</fieldset>

						<?php echo form_open('painel/usuarios/salvar_editar/senha/' . $usuario->id, array('class' => 'ajax_form') ); ?>
							<fieldset>
								<p>
									<label>Senha</label>
									<input class="form-control" type="text" id="senha" name="senha" /> 
                                    <small>entre 4 e 20 caracteres</small>
								</p>
								<p>
									<input class="button" type="submit" value="Enviar" />
								</p>
							</fieldset>
							<div class="clear"></div>
                             <div id="resultado"></div>
						</form>
                        <div class="spacer"></div>
					</div>
                    
					<!-- SEO -->
					<div class="tab-content" id="tab8">
						<?php echo form_open('painel/usuarios/salvar_editar/seo/' . $usuario->id, array('class' => 'ajax_form') ); ?>
                        <fieldset>
                        <p>
									<label>Email</label>
									<input class="form-control" type="text" name="email" value="<?php echo $configuracao->email; ?>" /> 
								</p>
								<p>
									<label>Website</label>
									<input class="form-control" type="text" name="website" value="<?php echo $configuracao->site; ?>" /> 
								</p>
								<p>
									<label>Título</label>
									<input class="form-control" type="text" name="titulowebsite" value="<?php echo $configuracao->titulo_site; ?>" /> 
								</p>

								<p>
									<label>Endereço</label>
									<input class="form-control" type="text" name="estado" value="<?php echo $configuracao->endereco; ?>" /> 
								</p>
								
								<p>
									<label>Telefones</label>
									<input class="form-control" type="text" name="fones3" value="<?php echo $configuracao->telefone; ?>" /> 
                                    <small>Ex: xx xxxx-xxxx</small>
                                    <small>Ex: yy yyyy-yyyy</small>
								</p>
								<p>
									<label>CEP </label>
                         <input class="text-input small-input cep" type="text" name="cep" value="<?php echo $configuracao->cep; ?>" />
                         <br /><small>Ex: xx.xxx-xxx</small>
								</p>
                                
                                
								<p>
									<label>Facebook</label>
									<input class="form-control" type="text" name="facebook" value="<?php echo $configuracao->facebook; ?>" /> 
								</p>
								<p>
									<label>Twitter</label>
									<input class="form-control" type="text" name="twitter" value="<?php echo $configuracao->twitter; ?>" /> 
								</p>
								<p>
									<label>Youtube</label>
									<input class="form-control" type="text" name="youtube" value="<?php echo $configuracao->gplus; ?>" /> 
								</p>
                                <p>
                                    <label>Keywords</label>
                                    <textarea name="keywords" class="form-control"><?php echo $configuracao->keywords; ?></textarea>
                                    <small>Palavras chave separadas por vírgula</small>
                                </p>
                                <p>
                                    <label>Descrição</label>
                                    <textarea name="description" class="form-control"><?php echo $configuracao->description; ?></textarea>
                                </p>
                                <p>
                                    <label>Google Site Verification</label>
                                    <textarea name="site_verification" class="form-control"><?php echo $configuracao->site_verification; ?></textarea>
                                </p>
                                <p>
                                    <label>Google Analitics</label>
                                    <textarea name="analitics" class="form-control"><?php echo $configuracao->analitics; ?></textarea>
                                </p>
								<p>
									<input class="button" class="form-control" type="submit" value="Enviar" />
								</p>
							</fieldset>
                            <div class="clear"></div>
                            <div id="resultado"></div>
						</form>
					</div>
                    
                    
                    

				</div>
			</div>
<?php if ($mensaje) {
echo"<script>alert('".$mensaje."');</script>";
$mensaje = "";
} ?>
