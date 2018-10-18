
<!DOCTYPE html>
<!--
Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
  <meta charset="utf-8">
  <title>CKEditor Sample</title>
  <script src="http://www.gpaxseg.com.br/web/new_site/admin_new/ckeditor/ckeditor.js"></script>
  <script src="http://www.gpaxseg.com.br/web/new_site/admin_new/ckeditor/samples/js/sample.js"></script>
  
  <link rel="stylesheet" href="http://www.gpaxseg.com.br/web/new_site/admin_new/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
</head>

  

 



      <div class="clear"></div>
            <div class="spacer"></div>
      <div class="content-box"><!-- Start Content Box -->
          <div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> <?php 
        if ($listar_banner->id) echo "Editando - ".$listar_banner->titulo; 
        else echo "Novo Banner";
        ?></h2></div></div>
          <div class="clear"></div>
        </div> <!-- End .content-box-header -->
                
        <div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//        id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>
               
          <!-- Dados pessoais -->
          <div class="tab-content default-tab" id="tab1">     

<?php echo form_open_multipart('painel/inicio/salvar/' . $listar_banner->id, array('class' => 'ajax_form') ); ?>


<fieldset>	
<p>
<label>Titulo</label>

<textarea class="form-control" type="text" id="editor" name="titulo"><?php echo  $listar_banner->titulo; ?></textarea>
<script>
  initSample();
</script>
</p>

<p>
<label>Descrição</label>

<textarea class="form-control" type="text" id="editor2" name="descricao"><?php echo  $listar_banner->descricao; ?></textarea>

<script type="text/javascript">
      CKEDITOR.replace( 'editor2' );
      CKEDITOR.add            
   </script>
</p>

<p>
<label>link</label>
<input class="form-control" type="text" name="link" value="<?php echo  $listar_banner->link; ?>" />
</p>
<p>
<label>Nome Botão</label>
<input class="form-control" type="text" name="nome_botao" value="<?php echo  $listar_banner->nome_botao; ?>" />
</p>
 <p>

<p>
<label>Banner</label>
<?php if( $listar_banner->img) : 
$img_at = '<img src="uploads/banners/'.$listar_banner->img.'" border="0" width="250" style="border:1px solid #333333;" />';
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

