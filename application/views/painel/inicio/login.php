        
      <div class="login-box">
  <div class="login-logo">
   <b>Área</b> Administrativa
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    

   <?php echo form_open('painel/login/entrar'); ?>
                <?php echo $msg; ?>
                <?php echo $this->session->flashdata('mensagem'); ?>
      <div class="form-group has-feedback">
       <input class="form-control" type="text" name="login" value="<?php echo $this->session->flashdata('post_login');?>" />
        
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input class="form-control" type="password" name="senha" />
       
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
         <input class="btn btn-primary btn-block btn-flat" type="submit" value="Entrar" />
         
        </div>
        <!-- /.col -->
      </div>
    </form>


    
    

  </div>
  <!-- /.login-box-body -->
</div>