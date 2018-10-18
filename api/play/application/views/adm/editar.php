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
               
					<!-- Dados pessoais -->
					<div class="tab-content default-tab" id="tab1">    
<?php echo form_open_multipart('user/perfil/salvar/', array('class' => 'ajax_form') ); ?>


<fieldset>	
<p>
<label>Nome</label>
<input class="text-input large-input" type="text" name="nome" value="" />
</p>
<p>
<label>Cargo</label>
<input class="text-input large-input" type="text" name="cargo" value="" />
</p>
 <p>
<label>Área</label>

  <select class="selectpicker" id="tipo_id" name="tipo_id">
  <option value="1">Diretores</option>
  <option value="2">Administrativo</option>
  
</select>

</p>
<p>
<label>Foto</label>

<input class="form-control" type="file" name="arquivo"/> <br  />
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

