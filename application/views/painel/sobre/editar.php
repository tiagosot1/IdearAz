
  			<div class="clear"></div>
            <div class="spacer"></div>
			<div class="content-box"><!-- Start Content Box -->
  				<div class="content-box-header">
                <div style="width:100%; line-height:40px;">
                <div style="margin-left:15px;"><h2> </h2></div></div>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
                
				<div class="content-box-content">
                 <?php echo $this->session->flashdata('form_result'); 
//				id, titulo, pos_pag_princ, pag_princ, texto, situacao ?>

<?php 

foreach($sobre as $res): 

  $texto = $res->texto2;
  $id = $res->id;
  endforeach
  ?>
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
<?php echo form_open_multipart('painel/sobre/salvar/'.$id , array('class' => 'ajax_form') ); ?>


<fieldset>	

<p>
<label>Sobre</label>
<textarea name="texto" class="form-control" style="">
<?php echo $texto;  ?>
</textarea>
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

