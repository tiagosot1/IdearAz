			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> <?php 
				if ($blog->id) echo "Editando - ".$blog->titulo; 
				else echo "Nova Notícia";
				?></h2></div></div>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//				id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
<?php echo form_open_multipart('painel/blog/salvar/' . $blog->id, array('class' => 'ajax_form') ); ?>


<fieldset>	
<p>
<label>Título</label>
<input class="form-control" maxlength="50" type="text" name="titulo" value="<?php echo $blog->titulo; ?>" />
</p>
<p>
<label>Resumo</label>
<input class="form-control" maxlength="200" type="text" name="resumo" value="<?php echo $blog->resumo; ?>" />


</p>
<p>
<label>Dica</label>
<textarea name="descricao" class="form-control mceAdvanced" style="height:350px;"><?php echo $blog->descricao; ?></textarea>
</p>

<p>
<label>Imagem</label>
<?php if($blog->img) : 
$img_at = '<img src="uploads/blog/'.$blog->img.'" border="0" width="100" style="border:1px solid #333333;" />';
//$img_at = base_url() . 'uploads/paginas/' . $pagina->img;
?>
<div style="margin-bottom:10px;"><?php echo $img_at;?></div>
<?php endif; ?>
<input class="text-input" type="file" id="userfile" name="userfile"/> <br  />
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

