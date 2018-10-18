
<link rel="stylesheet" href="<?php echo base_url();?>resources/pagseguro/css/colorbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>resources/pagseguro/css/styles.css" />
<?php	
	
        $this->load->view('adm/includes/head');
		$this->load->view('adm/includes/menutop');
		$this->load->view('adm/includes/menulateral');
		
		?>
	
		
  <div id="buyerData">
    
    
    
   	 <input type="hidden" name="senderEmail" id="senderEmail" value="c93366872977184564105@sandbox.pagseguro.com.br"/>

   	 <input type="hidden" name="senderName" id="senderName" holderField="name" value="Tiago Oliveira Souza"/>
    
   	 <input type="hidden" name="senderCPF" id="senderCPF" holderField="cpf" maxlength="11" value="04727597527"/>

   	 <input type="hidden" name="senderAreaCode" id="senderAreaCode" holderField="areaCode" class="areaCode" maxlength="2" value="62"/>
   	 <input type="hidden" name="senderPhone" id="senderPhone" holderField="phone" class="phone" maxlength="9" value="30881333" />
    
   	 
   	 <input type="hidden" name="shippingAddressPostalCode" id="shippingAddressPostalCode" holderField="postalCode" maxlength="8" value="74916100"/>
    
   	 <input type="hidden" name="shippingAddressStreet" id="shippingAddressStreet" holderField="street" value="Avenida Nova Era"/>

   	 <input type="hidden" name="shippingAddressNumber" id="shippingAddressNumber" holderField="number" value="0"/>
    
   	 
   	 <input type="hidden" name="shippingAddressComplement" id="shippingAddressComplement" holderField="complement" value="QD29"/>

   	 <input type="hidden" name="shippingAddressDistrict" id="shippingAddressDistrict" holderField="district" value="Jardim Nova Era"/>
    
   	 <input type="hidden" name="shippingAddressCity" id="shippingAddressCity" holderField="city"value="Aparecida de Goiânia" />
    
   	 <input type="hidden" name="shippingAddressState" id="shippingAddressState" holderField="state" class="addressState" maxlength="2" value="GO"/>
    
   	 <input type="hidden" name="shippingAddressCountry" id="shippingAddressCountry" holderField="country" value="Brasil" />
      <?php /*?>
	  Para enviar o frete do produto
	  
	  <input type="hidden" name="shippingType" id="shippingType" holderField="type" value="1" />
      <input type="hidden" name="shippingCost" id="shippingCost" holderField="cost" value="10.11" /><?php */?>
    
    
</div>

     
	


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <section class="content">

  
        <div class="row">
       
        
        <div class="col-md-6">

          <div class="box box-danger">
          	
        
        
            <div class="box-header">
                <h3 class="box-title">Credit PlayCash</h3>
            </div>
			
          
            <div class="box-body">
          
              
              
             
              <div class="col-md-22" >
              
             <div class="groupData col-md-22" id="cartData" >
    
    <div id="carWrapper" >
   	 
   	
   	 
   	 <table id="cartTable" >
   		 <thead>
   			 <tr>
   				 <th>Id</th>
   				 <th>Descrição</th>
   				 <th>Valor Unitário</th>
   				 <th>Quantidade</th>
   				 <th>Valor</th>
   			 </tr>
   		 </thead>
   		 <tbody><tr><td data-name="itemId">498439509</td><td data-name="itemDescription">tiago</td><td data-name="itemAmount">10,00</td><td data-name="itemQuantity">1</td><td>10,00</td></tr></tbody>
   	 </table>
   	 
   	
   	 
    </div>
    
    <h3 id="cartTotal"> Valor Total: R$ <span id="totalValue">10.00</span> </h3>
    
    
</div>
              </div>
 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Forma de Pagamento</h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body">
        
        
         <div class="groupData" id="paymentMethods">
    
   
    
    
    <div id="paymentMethodsOptions" style="margin-bottom:25px">
   	 <div class="col-lg-13" >
   	 	<div class="btn-group" data-toggle="buttons">
			
			<label class="btn btn-success" style="width:35%">
				
				 <input id="creditCardRadio" type="radio" name="changePaymentMethod" value="creditCard" autocomplete="off" />
				<span class="glyphicon glyphicon-ok"></span><div class="col-md-7" > Cartão de Crédito</div>
			</label>

			<label class="btn btn-warning" style="width:30%">
			 <input id="boletoRadio" type="radio" name="changePaymentMethod" value="boleto" autocomplete="off" checked/>
				<span class="glyphicon glyphicon-ok"></span><div class="col-md-6" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boleto&nbsp;&nbsp;</div>
			</label>

			<label class="btn btn-danger" style="width:35%">
			 <input id="eftRadio" type="radio" name="changePaymentMethod" value="eft" autocomplete="off" />
				<span class="glyphicon glyphicon-ok"></span> <div class="col-md-8" >Cartão de Débito</div>
			</label>

	
		</div>
		</div>


   	 
   	 <div id="paymentMethodLoading">Aguarde...</div>
   	 
    </div>
    
    <div id="creditCardData" class="paymentMethodGroup" dataMethod="creditCard">
   	 
   	 <div id="cardData">
   		 
   		<div class="col-lg-12">
   		 <div class="form-group">
                <label>Numéro</label>
 
                <div class="input-group">
                  <div class="input-group-addon" >
                  <div class="field" id="cardBrand"></div>
               <i class="fa fa-credit-card" aria-hidden="true"></i>
                  </div>
                   <input class="form-control" type="text" name="cardNumber" id="cardNumber" class="cardDatainput" value="4111111111111111"/>
                    </div>
                <!-- /.input group -->
              </div> </div>
              
              <!-- Fim -->
               <div class="col-lg-4">
                <label>Mês</label>
    <div class="input-group">
      <span class="input-group-addon">
         <i class="fa fa-calendar" aria-hidden="true"></i>
      </span>
      <input class="form-control" type="text" name="cardExpirationMonth" id="cardExpirationMonth" class="cardDatainput month" maxlength="2" value="12" /> 
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
   <label>Ano</label>
    <div class="input-group">
      <span class="input-group-addon">
         <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
      </span>
      <input class="form-control" type="text" name="cardExpirationYear" id="cardExpirationYear" class="cardDatainput year" maxlength="4" value="2030" placeholder="2030"/>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
   <label>CV Code</label>
    <div class="input-group">
      <span class="input-group-addon">
         <i style="width:4px" class="fa  fa-asterisk" aria-hidden="true"></i>
         
      </span>
      <input type="text" name="cardCvv" id="cardCvv" maxlength="5" class="cardDatainput form-control" value="123"/>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
 
   	 </div>
      <!-- Inicio -->
     <div class="col-lg-12">
   		 <div class="form-group">
                <label>Parcelamento</label>
 
                <div class="input-group">
                  <div class="input-group-addon" >
                  <div class="field" id="cardBrand"></div>
               <i class="fa fa-money" aria-hidden="true"></i>
                  </div>
                   <div class="field" id="installmentsWrapper">
   		
   		 <select class="form-control" name="installmentQuantity" id="installmentQuantity"></select>
   		 <input class="form-control" type="hidden" name="installmentValue" id="installmentValue" />
   	 </div>
                  
                    </div>
                <!-- /.input group -->
              </div> </div>
              
              <!-- Fim -->
   	 
   	
   	
   	  <div id="holderDataChoice">
   	
    <div class="col-lg-12" style="margin-top:10px">
   		 
                <label>Quem é o Titular do Cartão</label>
 
                <div class="input-group" style="width: 100%;">
                 
                  
               <div class="btn-group" data-toggle="buttons" style="width: 100%;">
			
			<label class="btn btn-success" style="width:50%;">
				
				  <input type="radio" name="holderType" id="sameHolder" autocomplete="off" checked />
				<span class="glyphicon glyphicon-ok"></span><div class="col-md-12" >Sou Eu</div>
			</label>

			<label class="btn btn-warning"style="width:50%;">
			 <input type="radio" name="holderType" id="otherHolder" autocomplete="off" />
				<span class="glyphicon glyphicon-ok"></span><div class="col-md-12" >Outra Pessoa</div>
			</label>

		

                    </div>
                <!-- /.input group -->
              </div> </div>
           
   	 </div>
   	 
   	 
   	 
   	 <div id="holderData"  style="background-color:#F8F8F8">
     
     <div class="col-lg-12" style="margin-top:10px">
   		 <div class="form-group">
                <label>Nome (Como está impresso no cartão)</label>
 
                <div class="input-group">
                  <div class="input-group-addon field" >
                  
               <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                   
                    <input class="form-control" type="text" name="creditCardHolderName" id="creditCardHolderName" holderField="name" />
                    </div>
                <!-- /.input group -->
              </div> </div>
              
              <!-- Fim -->
           
  <div class="col-lg-6">
  <label>Data de Nascimento</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa fa-calendar" aria-hidden="true"></i>
      </span>
   <input class="form-control" type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" maxlength="10" value="29/11/1989"/>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>CPF</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
      </span>
        <input class="form-control" type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" holderField="cpf" maxlength="11" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->


<!-- Fim -->
   		  <!-- Fim -->
           
  <div class="col-lg-6">
  <label>DDD</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa  fa-phone" aria-hidden="true"></i>
      </span>
       <input class="form-control" type="text" name="creditCardHolderAreaCode" id="creditCardHolderAreaCode" holderField="areaCode" class="areaCode" maxlength="2" />
  
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>Número</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa  fa-phone" aria-hidden="true"></i>
      </span>
     
        <input class="form-control"  type="text" name="creditCardHolderPhone" id="creditCardHolderPhone" holderField="phone" class="phone" maxlength="9" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
  
<div class="col-lg-12 box box-danger" style="margin-top:25px">
  <label style="margin-top:15px">Endereço de Cobrança do Cartão</label>
   
  </div><!-- /.col-lg-6 -->

<!-- Fim -->
   		
   	 <!-- Fim -->
           
  <div class="col-lg-6">
  <label>CEP</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
      </span>
      <input class="form-control" type="text" name="billingAddressPostalCode" id="billingAddressPostalCode" holderField="postalCode" />
  
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>Rua, Avenida, etc..</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa fa-map-signs" aria-hidden="true"></i>
      </span>
     
        <input class="form-control" type="text" name="billingAddressStreet" id="billingAddressStreet" holderField="street" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
   	<!-- FIM -->	 
   		
   		 
   			 <!-- Fim -->
           
  <div class="col-lg-6">
  <label>Número</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
      </span>
      <input class="form-control" type="text" name="billingAddressNumber" id="billingAddressNumber" holderField="number" />
  
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>Complemento</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa fa-map" aria-hidden="true"></i>
      </span>
     
       <input class="form-control" type="text" name="billingAddressComplement" id="billingAddressComplement" holderField="complement" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
   	<!-- FIM -->	
    
   	 <!-- Fim -->
           
  <div class="col-lg-6">
  <label>Bairro</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa fa-map-signs" aria-hidden="true"></i>
      </span>
     <input class="form-control" type="text" name="billingAddressDistrict" id="billingAddressDistrict" holderField="district" />
  
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>Cidade</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa fa-map-pin" aria-hidden="true"></i>
      </span>
     
       <input class="form-control" type="text" name="billingAddressCity" id="billingAddressCity" holderField="city" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
   	<!-- FIM -->	
   		
   		  	 <!-- Fim -->
           
  <div class="col-lg-6">
  <label>Estado</label>
    <div class="input-group">
     
      <span class="input-group-addon">
        <i class="fa fa-map-pin" aria-hidden="true"></i>
      </span>
     <input class="form-control" type="text" name="billingAddressState" id="billingAddressState" holderField="state" class="addressState" maxlength="2" />
  
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
  <label>País</label>
    <div class="input-group">
     
      <span class="input-group-addon">
       <i class="fa fa-map-pin" aria-hidden="true"></i>
      </span>
     
       	 <input class="form-control" type="text" name="billingAddressCountry" id="billingAddressCountry" holderField="country" />
      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  
   	<!-- FIM -->	
   		   		
   		 
   	 </div>
   	 
     <!-- /.col-lg-6 -->
<div class="col-lg-12" style="margin-top:30px">
  <input type="hidden" name="creditCardToken" id="creditCardToken"  />
   	 <input type="hidden" name="creditCardBrand" id="creditCardBrand"  />
   	 <button class="btn btn-success" style="width:100%" type="button" id="creditCardPaymentButton">Pagar</button>
   
  </div><!-- /.col-lg-6 -->
   	 
   	 
    </div>
    
    <div id="eftData" class="paymentMethodGroup" dataMethod="eft">
   	 <ul>
   		 <li dataBank="bancodobrasil" class="bank-flag bancodobrasil">Banco do Brasil</li>
   		 <li dataBank="bradesco" class="bank-flag bradesco">Bradesco</li>
   		 <li dataBank="itau" class="bank-flag itau">Itau</li>
   		 <li dataBank="banrisul" class="bank-flag banrisul">Banrisul</li>
   		 <li dataBank="hsbc" class="bank-flag hsbc">HSBC</li>
   	 </ul>
    </div>
    
    <div id="boletoData" class="paymentMethodGroup" dataMethod="boleto">
    <img src="http://playcash.com.br/resources/pagseguro/images/boleto.png"/>
   	 <input class="btn btn-success" style="width:100%" type="button" id="boletoButton" value="Gerar Boleto"/>
     
    </div>
    
</div>

          
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
      </form>

        
          </div>
          </div>
          
          
        
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<?php $this->load->view('adm/includes/footer');?>
		<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>resources/pagseguro/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>resources/pagseguro/js/helpers.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>resources/pagseguro/js/checkout.js"></script>
		
	</body>

</html>