			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> <?php 
				if ($especialidades->id) echo "Editando - ".$especialidades->nome; 
				else echo "Nova Especialidade";
				?></h2></div></div>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//				id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
						<?php echo form_open_multipart('painel/especialidades/salvar_pagina/' . $pagina->id, array('class' => 'ajax_form') ); ?>


            <fieldset>	
<p>
<label>Imagem</label>
<?php if($pagina->img_banner) : 
$img_at = '<img src="uploads/paginas/'.$pagina->img_banner.'" border="0" width="250" style="border:1px solid #333333;" />';
//$img_at = base_url() . 'uploads/paginas/' . $pagina->img;
?>
<div style="margin-bottom:10px;"><?php echo $img_at;?></div>
<?php endif; ?>
<input class="text-input" type="file" id="userfile" name="userfile"/> <br  />
</p>

<p>
<label>Texto</label>
<textarea name="texto2" class="mceAdvanced" style="height:300px;"><?php echo $pagina->texto2; ?></textarea>
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

