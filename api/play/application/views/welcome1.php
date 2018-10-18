<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$nome = "";
$apelido = "";
$email = "";
$email2 = "";
$estado = "";
$municipio = "";
if(isset($data)){
	//echo $data["nome"];
	$nome = $data["nome"];
	$apelido = $data["apelido"];
	$email = $data["email"];
	$email2 = $data["email2"];
	$estado = $data["estado"];
	$municipio = $data["municipio"];
}
		 //$this->load->model('municipios');
		// //$this->load->model('municipios');

		$estados = $this->municipios->retorna_estados();
		//echo $this->db;
		$option = "<option value=''></option>";
		foreach($estados->result() as $linha) {
			
				$option .= "<option value='$linha->cod_estado'>$linha->cod_estado</option>"; 
			
		}
		echo base_url("Welcome/");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Play Cash</title>

    
    <link href="<?php echo base_url('resources/css/bootstrap.min.css');?>" rel="stylesheet">

    
  </head>
  <script>
		
		var base_url = '<?php echo base_url("Welcome") ?>';
		
		function busca_municipio(cod_estado){
			
			$.post(base_url+"/busca_municipio", {
				cod_estado : cod_estado,
				
			}, function(data){
				$('#municipio').html(data);
			});
		}
		
	</script>
  <body>
    <form action="<?php echo base_url('Usuario/registrar');?>" method="post">

      <div class="container">
      	<div class="row">
      	  <div class= "col-md-4 col-md-offset-9">
      	  	  <input type="hidden" name='captcha'>
      	  	  <?php if(isset($alerta) != null) { ?>
      	  	  	<div class="alert alert-<?php echo $alerta["class"]?>">
      	  	  		<?php echo $alerta["mensagem"]; ?>
      	  	  	</div>
      	  	  <?php } ?>
	      	  <div class="form-group">
			    <label for="nome">Nome*</label>
			    <input type="input" name="nome" value="<?php echo $nome?>"  class="form-control" id="nome" placeholder="Nome" required>
			  </div>
			  <div class="form-group">
			    <label for="apelido">Apelido</label>
			    <input type="input" name="apelido" value="<?php echo $apelido?>" class="form-control" id="apelido" placeholder="Apelido">
			  </div>
			 <div class="form-group">
			    <label for="email">Email*</label>
			    <input type="email" name="email" value="<?php echo $email?>" class="form-control" id="email" placeholder="Email" required>
			  </div>
			  <div class="form-group">
			    <label for="email2">Digite o Email novamente*</label>
			    <input type="email" name="email2" value="<?php echo $email2?>" class="form-control" id="email2" placeholder="Digite o Email novamente" required>
			  </div>
			  <div class="form-group">
			    <label for="senha">Password*</label>
			    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
			  </div>
			  <div class="form-inline">
			  		<div class="form-group">
			  			<label for="estado">Estado</label>
			  			<select class="form-control" placeholder="Estado" id="estado" name="estado" onchange="busca_municipio($(this).val())" required>
						<?php echo $option ?>
						  
						</select>
						<label for="municipio">Município</label>
						<select class="form-control" placeholder="Município" id="municipio" name="municipio" required>
						
						  
						</select>
			  		</div>
			  </div>
			  <div class="checkbox">
			    <label>
			      <input type="checkbox" required> Declaro que tenho 18 anos, e aceito os termos de licença
			    </label>
			  </div>
			  <button type="submit" name="registrar" value="registrar" class="btn btn-success">Registrar</button>
			</div>
		</div>
	</div>
</form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('resources/js/jquery.min.js');?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
  </body>
</html>