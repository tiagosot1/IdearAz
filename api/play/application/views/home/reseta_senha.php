<?php //include('../../includes/head.php'); 
$this->load->view('includes/head'); ?>
<body>
<?php //include('../../includes/header.php'); 
$this->load->view('includes/header'); ?>

 <div class="content_middle">
   	  <div class="container">
   	    <div class="content_middle_box">
          <!-- <div class="top_grid"> -->

          	<form id="loginForm" style="float:right; margin-right:25%;" action="<?php echo base_url('Usuario/registrar_senha');?>" method="post">
          		<?php if(isset($alerta) != null) { ?>
  	  	  	<div class="alert alert-<?php echo $alerta["class"]?>">
  	  	  	<?php echo $alerta["mensagem"]; ?>
  	  	  	</div>
  	  	    <?php } ?>
              <input type="hidden" name='captcha'>
              <input type="hidden" name='id_usuario' value = "<?php echo $id_usuario ?>">
                <fieldset id="body">
                	  <fieldset>

                      <label for="password">Digite sua nova senha</label>
                      <input type="password" name="senha" id="senha" required>                    
                    </fieldset>
                    <fieldset>

                      <label for="password">Digite a nova senha novamente</label>
                      <input type="password" name="senha2" id="senha2" required>                    
                    </fieldset>
                    <input type="submit" id="login" value="Enviar">
                	<!-- <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label> -->
            	</fieldset>
	      </form>
        <!--   </div> -->
        </div>
       </div>	
 </div>
<?php $this->load->view('/includes/footer'); ?>