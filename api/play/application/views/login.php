<?php include('includes/head.php'); ?>
<body>
<?php include('includes/header.php'); ?>

 <div class="content_middle">
   	  <div class="container">
   	    <div class="content_middle_box">
          <!-- <div class="top_grid"> -->

          	<form id="loginForm" style="float:right; margin-right:25%;" action="<?php echo base_url('Login/logar');?>" method="post">
          		<?php if(isset($alerta) != null) { ?>
  	  	  	<div class="alert alert-<?php echo $alerta["class"]?>">
  	  	  		<?php echo $alerta["mensagem"]; ?>
  	  	  	</div>
  	  	  <?php } ?>
              <input type="hidden" name='captcha'>
                <fieldset id="body">
                	<fieldset>
                          <label for="email">Email</label>
                          <input type="text" name="email" id="email">
                    </fieldset>
                    <fieldset>
                            <label for="password">Senha</label>
                            <input type="password" name="senha" id="senha">
                     </fieldset>
                    <input type="submit" id="login" value="Entrar">
                	<!-- <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label> -->
            	</fieldset>
                 <span><a href="<?php echo base_url('Login/esqueceu_senha');?>">Esqueceu sua senha?</a></span>
	      </form>
        <!--   </div> -->
        </div>
       </div>	
 </div>
<?php include('includes/footer.php'); ?>