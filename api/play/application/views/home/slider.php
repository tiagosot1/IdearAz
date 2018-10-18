<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$nome = "";
$apelido = "";
$email = "";
$email2 = "";
$estado = "";
$municipio = "";
$data_nascimento= "";
if(isset($data)){
	//echo $data["nome"];
	$nome = $data["nome"];
	$apelido = $data["apelido"];
	$email = $data["email"];
	$email2 = $data["email2"];
	$estado = $data["estado"];
	$municipio = $data["municipio"];
	$data_nascimento = $data["data_nascimento"];
}
		 //$this->load->model('municipios');
		// //$this->load->model('municipios');

		$estados = $this->municipios->retorna_estados();
		//echo $this->db;
		$option = "<option value=''>Estado</option>";
		foreach($estados->result() as $linha) {
			
				$option .= "<option value='$linha->cod_estado'>$linha->cod_estado</option>"; 
			
		}
		//echo $option;
?>
<script>
		
		var base_url = '<?php echo base_url() ?>';
		
		function busca_municipio(cod_estado){
			
			$.post(base_url+"Home/busca_municipio", {
				cod_estado : cod_estado,
				
			}, function(data){
				$('#municipio').html(data);
			});
		}
		
	</script>
 <div class="banner">
  <div class="col-sm-8 header-left">
  
  </div>
   	  <div class= "col-md-4" style="float:right; margin-top:-50px;">
      <div class= "col-md-22">
   		<form action="<?php echo base_url('Usuario/registrar');?>" method="post">
            	<input type="hidden" name='captcha'>
	      	  	  <?php if(isset($alerta) != null) { ?>
	      	  	  	<div class="alert alert-<?php echo $alerta["class"]?>">
	      	  	  		<?php echo $alerta["mensagem"]; ?>
	      	  	  	</div>
	      	  	  <?php } ?>
  <div class="form-group">
   
   <input style="width:100%" class="form-control" type="text" name="nome" value="<?php echo $nome?>" id="nome" placeholder="Nome" required>
  </div>
  <div class="form-group">
    
   <input style="width:100%"  class="form-control" type="text" name="apelido" value="<?php echo $apelido?>" id="apelido" placeholder="Apelido" required>
  </div>
  
  <div class="form-group">
    
   <input style="width:100%"  class="form-control" type="text" name="email" value="<?php echo $email?>" id="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <input style="width:100%"  class="form-control" type="text" name="email2" value="<?php echo $email2?>" id="email2" placeholder="Digite seu email novamente" required>
  </div>
  
  <div class="form-group">
    <input style="width:100%"  class="form-control" type="text" name="senha" id="senha" placeholder="Senha" required style="-webkit-text-security: disc !important;">
  </div>
  <div class="form-group">
    <input style="width:100%"  class="form-control" type="text" name="data_nascimento" value="<?php echo $data_nascimento?>" id="data_nascimento" placeholder="Data de nascimento" required>
  </div>
   <div class="form-group">
    <select style="width:100%" class="form-control formulario" id="estado" name="estado" onchange="busca_municipio($(this).val())" required>
						
							
							<?php echo $option ?>
						
						
						  
						</select>
  </div>
  
     <div class="form-group">
   <select  style="width:100%"  class="form-control formulario"  id="municipio" name="municipio" required>
            			<option value="" class="label">Município</option>
            			
					  </select>
  </div>
  <div class="checkbox">
  
     <input type="checkbox" required><span style="font-size:10px;"> Declaro que tenho 18 anos, e aceito os termos de licença</span></div>
  </div>
   <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Registrar"></label>
</form>
   	      
			      		
   		    <div class="clearfix"></div>
         </div></div>
   </div>
  <script>
$(document).ready(function() {
        $('#data_nascimento')
        	.datepicker({
            	format: 'dd/mm/yyyy',
            	language:'pt-BR'
        	});
        

   
});
</script>