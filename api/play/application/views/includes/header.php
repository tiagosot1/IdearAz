<div class="header">
		   <div class="col-sm-8 header-left">
					 <div class="logo">
						<a href="<?php echo base_url('home');?>"><img src="<?php echo base_url('resources/images/logo.png');?>" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="<?php echo base_url('resources/images/nav.png');?>" alt="" /></a>
						    <ul class="nav" id="nav" style="float:right">
						    	<li class="active"><a href="<?php echo base_url('home');?>">Home</a></li>
						    	<li><a href="<?php echo base_url('home');?>">Play Cash</a></li>
						    	<div class="clearfix"></div>
							</ul>
							<script type="text/javascript" src="<?php echo base_url('resources/js/responsive-nav.js');?>"></script>
				    </div>	
				     <!-- start search-->
				      
						<!----//search-scripts---->						
	    		    <div class="clearfix"></div>
	    	    </div>
	            <div class="col-sm-4 header_right" style="float:right">
	    		      <div id="loginContainer"><a href="#" id="loginButton"><img src="<?php echo base_url('resources/images/login.png');?>"><span>Login</span></a>
						    <div id="loginBox">                
						        <form id="loginForm" action="<?php echo base_url('Login/logar');?>" method="post">
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
				              </div>
			             </div>
		                 <div class="clearfix"></div>
	                 </div>
	                <div class="clearfix"></div>
   </div>