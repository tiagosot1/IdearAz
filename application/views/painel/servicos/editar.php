			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> <?php 
				if ($infraestrutura->infra_id) echo "Editando - ".$infraestrutura->titulo; 
			
				?></h2></div></div>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//				id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
						<?php echo form_open_multipart('painel/servicos/salvar/' . $infraestrutura->infra_id, array('class' => 'ajax_form') ); ?>


            <fieldset>	
                <p>
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo" value="<?php echo $infraestrutura->titulo; ?>" />
                </p>

 <p>
<label>Categoria</label>

    <?php
    $options_artigos = array ('' => '');
    foreach($areas_inf->result() as $res):
        $options_artigos[$res->id] = $res->categoria;
    endforeach;
    echo form_dropdown('area_id', $options_artigos, $infraestrutura->area_id, 'class=form-control id=area_id');
    ?>


</p>


 


<p>
    <label>Descrição</label>
    <textarea name="texto1" class="form-control" style="height:300px;"><?php echo $infraestrutura->texto1; ?></textarea>
</p>
<p>
<label>Imagem Banner</label>
<?php if($infraestrutura->img_banner) : 
$img_at = '<img src="uploads/infraestrutura/'.$infraestrutura->img_banner.'" border="0" width="250" style="border:1px solid #333333;" />';
$img_at = base_url() . 'uploads/servicos' . $pagina->img_banner;
?>
<div style="margin-bottom:10px;"><img src="<?php echo base_url() . 'uploads/servicos/' . $infraestrutura->img_banner; ?>"></div>
<?php endif; ?>
<input class="text-input form-control" type="file" id="userfile" name="userfile"/> <br  />
</p>

 
<p>
    <label>Texto</label>
    <textarea name="texto" class="form-control" style="height:300px;"><?php echo $infraestrutura->texto2; ?></textarea>
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

