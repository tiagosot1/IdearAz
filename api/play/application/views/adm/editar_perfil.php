<?php	
	
        $this->load->view('adm/includes/head');
		$this->load->view('adm/includes/menutop');
		$this->load->view('adm/includes/menulateral');
		
		?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <section class="content">

    

      <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Perfil</h3>
            </div>
			 <div class="row">
           <div class="col-md-4">
              <img class="profile-user-img img-responsive img-circle" src="http://playcash.com.br/resources/painel_adm/dist/img/user2-160x160.jpg" alt="User profile picture">

             </div>

  <div class="form-group">
                  <label for="exampleInputFile">Foto do Perfil</label>
                  <input type="file" id="exampleInputFile">

                 <p class="help-block">Foto que aparecerá para os outros jogadores</p>

                </div>     </div>
          
            <div class="box-body">
          
              
              
             
              <div class="col-md-6">
              
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Nome:</label>
 
                <div class="input-group">
                  <div class="input-group-addon">
               <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                 <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>CPF:</label>
 
                <div class="input-group">
                  <div class="input-group-addon">
               <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                 <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
               <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Telefone</label>
 
                <div class="input-group">
                  <div class="input-group-addon">
             
               <i class="fa fa-phone"></i>
                  </div>
                 <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <div class="col-md-6">
              <!-- /.form group -->
                <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Sobrenome</label>
 
                <div class="input-group">
                  <div class="input-group-addon">
               <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                 <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Data de Nascimento</label>
 
                <div class="input-group">
                  <div class="input-group-addon">
               <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
           
              <!-- /.form group -->

  </div></div>
  <button type="button" class="btn btn-success" style="width:100%">Salvar</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Alterar Senha</h3>
            </div>
            <div class="box-body">
              <!-- Color Picker -->
              <div class="form-group">
                <label>Senha Atual</label>
                <input type="text" class="form-control my-colorpicker1">
              </div>
              <!-- /.form group -->
               <!-- Color Picker -->
              <div class="form-group">
                <label>Senha Nova</label>
                <input type="text" class="form-control my-colorpicker1">
              </div>
              <!-- /.form group -->
               <!-- Color Picker -->
              <div class="form-group">
                <label>Senha Nova "Digite Novamente"</label>
                <input type="text" class="form-control my-colorpicker1">
              </div>
              <!-- /.form group -->

             <button type="button" class="btn btn-success" style="width:100%">Salvar</button>
             
            </div>
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Endereço</h3>
            </div>
            <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              
              <div class="form-group">
                <label>CEP</label>
              <input class="form-control"  name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" />
              </div>
              <div class="form-group">
                <label>Cidade</label>
               
                <select ame="cidade" type="text" id="cidade" class="form-control">
<option value="">Escolha um Estado</option>
</select>              </div>
              <div class="form-group">
                <label>Endereço</label>
                 <input class="form-control" type="text" name="logradouro"  value="das Laranjeiras (Rua)" /> 
              </div>
             <div class="form-group">
                <label>Nº</label>
                <input class="form-control" type="text" name="complemento" value="" /> 
              </div>
            
            </div>
            
            <!-- /.col -->
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Estado</label>
                <select name="id_estado" class="form-control">
<option value="">Escolha</option>
<option value="1">ACRE</option>
<option value="2">ALAGOAS</option>
<option value="3">AMAPÁ</option>
<option value="4">AMAZONAS</option>
<option value="5">BAHIA</option>
<option value="6">CEARÁ</option>
<option value="7">DISTRITO FEDERAL</option>
<option value="8">ESPÍRITO SANTO</option>
<option value="10" selected="selected">GOIÁS</option>
<option value="11">MARANHÃO</option>
<option value="12">MATO GROSSO</option>
<option value="13">MATO GROSSO DO SUL</option>
<option value="14">MINAS GERAIS</option>
<option value="15">PARÁ</option>
<option value="16">PARAÍBA</option>
<option value="17">PARANÁ</option>
<option value="18">PERNAMBUCO</option>
<option value="19">PIAUÍ</option>
<option value="20">RIO DE JANEIRO</option>
<option value="21">RIO GRANDE DO NORTE</option>
<option value="22">RIO GRANDE DO SUL</option>
<option value="23">RONDÔNIA</option>
<option value="9">RORAIMA</option>
<option value="25">SANTA CATARINA</option>
<option value="26">SÃO PAULO</option>
<option value="27">SERGIPE</option>
<option value="24">TOCANTINS</option>
</select>				</div>
              <div class="form-group">
                <label>Bairro</label>
               <select name="id_bairro" class="form-control">
<option value="">Escolha uma Cidade</option>
</select>              </div>
              <div class="form-group">
                <label>Qd. Lt. </label>
              
    <input class="form-control" type="text" name="qd_lt_no" value="Qd. 40, Lt. 06" /> 
              </div>
              
              <!-- /.form-group -->
            </div>
			 
            <!-- /.col -->
          </div>
          <!-- /.row -->
           <button type="button" class="btn btn-success" style="width:100%">Salvar</button>
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

 
<?php	
	
		$this->load->view('adm/includes/footer');
        $this->load->view('adm/includes/script');
		
		?>
		
		<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

