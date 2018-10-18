			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> <?php 

                        foreach ($editarCategoria as $infra) {
                            $id =  $infra->id;
                          $titulo =  $infra->categoria;
                            # code...
                        }

				if ($infraestrutura->$id ) echo "Editando - ". $titulo; 
				
				?></h2></div></div>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//				id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
						<?php echo form_open_multipart('painel/servicos/salvar_categoria/' .   $id , array('class' => 'ajax_form') ); ?>


            <fieldset>	
                <p>
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo $titulo; ?>" />
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
                    

				</div>
			</div>

