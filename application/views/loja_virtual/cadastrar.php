<div class="container">
    <div class="page-header">
        <h1>Validando formulários com a library Form Validation</h1>
    </div>
    <div class="form-group row">
            <label class="col-md-4 control-label" for="sexo">Sexo</label>
            <div class="col-md-4">

    
        <?php if ($erros): ?>
            <div class="alert alert-danger">
                <ul>
                    <?= $erros; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="alert alert-success">
                    <?= $sucesso; ?>
            </div>
        <?php endif; ?>
   
     </div>
        </div>

    <form class="form-horizontal" action="<?=base_url()?>loja_virtual/home/usuario" method="POST">

        <div class="form-group">
            <label class="col-md-4 control-label" for="sexo">Sexo</label>
            <div class="col-md-4">
                <select id="sexo" name="sexo" class="form-control">
                    <option value="">Selecione...</option>
                    <option value="M" <?= set_select('sexo','M') ?>>Masculino</option>
                    <option value="F" <?= set_select('sexo','F') ?>>Feminimo</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome</label>
            <div class="col-md-4">
                <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text" value="<?=set_value('nome')?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="idade">Idade</label>
            <div class="col-md-4">
                <input id="idade" name="idade" placeholder="Idade" class="form-control input-md" type="text" value="<?=set_value('idade')?>">
                <span class="help-block">Somente número</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-4">
                <input id="email" name="email" placeholder="Email" class="form-control input-md" required="" type="text" value="<?=set_value('email')?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="emailconfirmar">Confirme seu Email</label>
            <div class="col-md-4">
                <input id="emailconfirmar" name="emailconfirmar" placeholder="Confirme seu Email" class="form-control input-md" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cidade">Cidade</label>
            <div class="col-md-4">
                <input id="cidade" name="cidade" placeholder="Cidade" class="form-control input-md" required="" type="text" value="<?=set_value('cidade')?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="conhecimento">Conhecimento em programação</label>
            <div class="col-md-4">
                <label class="radio-inline" for="conhecimento-0">
                    <input name="conhecimento" id="conhecimento-0" value="1" type="radio" <?= set_radio('conhecimento','1') ?>>
                    Iniciante
                </label>
                <label class="radio-inline" for="conhecimento-1">
                    <input name="conhecimento" id="conhecimento-1" value="2" type="radio" <?= set_radio('conhecimento','2') ?>>
                    Intermediário
                </label>
                <label class="radio-inline" for="conhecimento-2">
                    <input name="conhecimento" id="conhecimento-2" value="3" type="radio" <?= set_radio('conhecimento','3') ?>>
                    Avançado
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cpf">CPF</label>
            <div class="col-md-4">
                <input id="cpf" name="cpf" placeholder="CPF" class="form-control input-md" type="text" value="<?=set_value('cpf')?>">
                <span class="help-block">Clique <a href="javascript:void(0)" onclick="gerarCPF(document.getElementById('cpf'));">aqui</a> para gerar um CPF e não precisar usar o seu.</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <input type="submit" class="btn btn-success" value="Validar"/>
            </div>
        </div>

    </form>
</div>

***************

<!doctype html>
<html class="no-js" lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>(62) 3280-7289 - Idear Az - Desenvolvimento de Site em Goiânia e Agência de Marketing Digital em Goiânia</title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png">

<link rel="stylesheet" href="//www.idearaz.com.br/resources_idear/css/bootstrap.css">
<!-- 
 * parallax_login.html
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.

-->
 <script>
function validarSenha(){
	senha1 = document.frm_submit.senha.value;
	senha2 = document.frm_submit.senha2.value;

	if (senha1 == senha2){
		
	}
	else{
		$( ".alert-danger" ).show();
	}
}
</script>
<script type="text/javascript">
	/**
 * parallax.js
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
 */

$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
            	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        })
    })
})
</script>
<style type="text/css">
	
	/**
 * parallax.css
 * @Author Original @msurguy -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Reworked By @kaptenn_com 
 * @package PARALLAX LOGIN.
 */
    
    body {
        background-color: #444;
        background: url(<?php echo base_url();?>resources_template/img/cadastro/back_cadastro.jpg);
        background-repeat: repeat;
        background-attachment: scroll;
        background-clip: border-box;
        background-origin: padding-box;
        background-position-x: 0%;
        background-position-y: 0%;
        background-size: 100% 100%;
        background-size: 100%;
       
        height: 100%
        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
</style>
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>

    </head>
        <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="https://cdn4.iconfinder.com/data/icons/user-avatar-flat-icons/512/User_Avatar-31-128.png" class="img-responsive" alt="Conxole Admin" width="80px" />
                                </div>
                            </div>
                            <div class="panel-body">
                                
                                	<form accept-charset="UTF-8" role="form" class="form-signin" method="POST" action="https://idearaz.com.br/loja_virtual/home/save" id="frm_submit" name="frm_submit">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                       		
                                         <input type="text" required="" class="form-control input-sm datepicker" placeholder="E-mail" id="email" name="email[]" value="" onchange="validacaoEmail(frm_submit.email); verifica_subdominio()">

                                     
                                       		
                                         <input type="password" required="" class="form-control input-sm datepicker" placeholder="Senha" name="senha" value="" id="senha">
                                         
                                       		
                                         <input type="password" required="" class="form-control input-sm datepicker" placeholder="Confirme a senha" id="senha2" value="" onchange="validarSenha()">

                                       		
                                         <input type="text" required="" class="form-control input-sm datepicker" placeholder="Subdominio" name="subdominio[]" value="" onchange="verifica_subdominio()">
                                        </br>
                                       

<input style="width: 100%" class="btn btn-lg btn-danger btn-block" type="submit" value="Cadastrar" name="submit">
                                    </fieldset>
                                </form>
	                                <div class="row" style="margin-top: 50px">
												<div class="alert alert-dismissable alert-success" style="display: none">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>Disponível</strong>.
												</div>

												<div class="alert alert-dismissable alert-danger" style="display: none">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>Indisponível. já em uso.</strong>
												</div>
									</div>
	                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </body>
          


       








<script src="http://www.topchampionsleague.com/resources/top_adm/js/jquery.min.js"></script>
  <script src="http://www.topchampionsleague.com/resources/top_adm/js/tether.min.js"></script>
  <script src="http://www.topchampionsleague.com/resources/top_adm/js/bootstrap.min.js"></script>
  <script src="http://www.topchampionsleague.com/resources/top_adm/js/bootstrap-notify.js"></script>
  <script src="http://www.topchampionsleague.com/resources/top_adm/js/jquery.maskedinput.min.js"></script>
  <script>
  
      

    function verifica_subdominio(){
        $.ajax( {
          url: '<?php echo base_url() ?>loja_virtual/home/verifica_se_cadastrado',
          type: 'POST',
          data: $( "#frm_submit" ).serialize()
        } ).always( function ( response ) {
          var r = ( response.trim() );
          if ( r == 1 ) {
            $( ".alert-success" ).show();
           
          } else {
            $( ".alert-danger" ).show();
            
          }
        } );
        }
    
    
  </script>

  <script language="Javascript">
function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf("@"));
dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) && 
    (usuario.search("@")==-1) && 
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) && 
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&      
    (dominio.indexOf(".") >=1)&& 
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
 $( ".alert-success" ).show();
}
else{
$( ".alert-danger" ).show();
}
}
</script>

 