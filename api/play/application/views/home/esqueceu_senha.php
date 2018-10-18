<?php //include('../../includes/head.php'); 
$this->load->view('includes/head'); ?>
<body>
<?php //include('../../includes/header.php'); 
$this->load->view('includes/header'); ?>

 <div class="content_middle">
   	  <div class="container">
   	    <div class="content_middle_box">
          <!-- <div class="top_grid"> -->

          	<form id="loginForm" style="float:right; margin-right:25%;" action="<?php echo base_url('Login/email_senha');?>" method="post">
          		<?php if(isset($alerta) != null) { ?>
  	  	  	<div class="alert alert-<?php echo $alerta["class"]?>">
  	  	  	<?php echo $alerta["mensagem"]; ?>
  	  	  	</div>
  	  	    <?php } ?>
              <input type="hidden" name='captcha'>
                <fieldset id="body">
                  <p>Informe o email cadastrado no site</p>
                	<fieldset>
                          <input type="text" name="email" id="email" placeholder="Email" required>
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