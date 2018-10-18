<?php	
	
        $this->load->view('adm/includes/head');
		$this->load->view('adm/includes/menutop');
		$this->load->view('adm/includes/menulateral');
		//echo $mensagensChat->num_rows();
		?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-gamepad" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Meus Jogos</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-trophy" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Meus Torneios</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Money</span>
              <span class="info-box-number">R$760,00</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Novos Membros</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
           
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
               
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="row">
            <div class="col-md-7">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  
                  <!--  Conversations are loaded here -->
                  <div class="direct-chat-messages"  id="chatMensagens">
                    
                   <?php

                      foreach($mensagensChat->result() as $row){
                        if($row->usuario_id == $this->session->id_usuario){
                   ?>
                          <div class="direct-chat-msg right">
                        <?php
                          }else{

                        ?>
                          <div class="direct-chat-msg">

                        <?php
                          }
                        ?>
                        <div class="direct-chat-info clearfix">
                          <span class="direct-chat-name pull-left"><?=$row->nome_usuario?></span>
                          <span class="direct-chat-timestamp pull-right"><?=$row->data_mensagem.' '.$row->hora?></span>
                        </div>
                        <img class="direct-chat-img" src="<?php echo base_url().$row->foto_perfil; ?>" alt="message user image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          <?=$row->descricao?>
                        </div>
                        </div>

                   <?php
                      }
                   ?>

                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm/dist/img/user1-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm/dist/img/user7-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm//dist/img/user3-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm/dist/img/user5-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm/dist/img/user6-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="resources/painel_adm/dist/img/user8-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                 
                    <div class="input-group">
                      <input type="text" name="descricao" id="descricao" placeholder="Type Message ..." class="form-control">
                          <span class="input-group-btn">
                            <button type="button" id="submit" class="btn btn-warning btn-flat">Enivar</button>
                          </span>
                    </div>
                 
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->
            <script src="<?php echo base_url('resources/js/jquery-1.11.2.min.js');?>"></script>
            <script src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
            <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>
            <script>
           
            var socket = io.connect("https://"+window.location.host+':3000' );
          document.write(window.location.host);
            $(document).ready(function(){
              //console.log($( "#chatMensagens" ));
               $( "#chatMensagens" ).scroll(0, 1000);

              
              $("#submit").click(function(){
                
                 console.log('entrou');
                 var dataString = { 
                        descricao : $("#descricao").val(),
                      };

                  $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('MensagemChat/enviar');?>",
                      data: dataString,
                      dataType: "json",
                      cache : false,
                      success: function(data){
                          var dados = data.data;
                        
                          
                        if(data.success == true){
                          $("#descricao").val('');
                          console.log('entrou no succes');
                          console.log(dados);
                          //var dados = data.data;
                          // socket.emit('new_count_message', { 
                          //   new_count_message: dados.new_count_message
                          // });
                          //console.log(socket);
                          // socket.emit('new_count_message', { 
                          //   new_count_message: 1
                          // });
                          // socket.emit('new_message', { 
                          //   nome_usuario: dados.descricao,
                          //   data_mensagem: ""+dados.data_mensagem,
                          //   hora: dados.hora,
                          //   descricao: dados.descricao,
                          //   foto_perfil: dados.foto_perfil
                          // });
                         socket.emit('new_message', { 
                            nome_usuario: dados.nome_usuario,
                            foto_perfil: dados.foto_perfil,
                            descricao: ""+dados.descricao,
                            data_mensagem: dados.data_mensagem,
                            hora: dados.hora,
                            usuario_id: dados.usuario_id,
                            usuario_sessao: dados.usuario_sessao                            
                          });
                          console.log(dados.descricao);
                          $( "#chatMensagens" ).scroll('b', 1000000, true);
                        } else if(data.success == false){

                          $("#descricao").val(dados.descricao);
                          
                        }
                    
                      } ,error: function(xhr, status, error) {
                        alert(error);
                      },

                  });

              });
              

            });
            //var socket = io.connect( 'http://'+window.location.hostname+':3000' );
            socket.on( 'new_message', function( dados ) {
             
              var usuario_sessao = "<?php print $this->session->id_usuario ?>";
              //alert(dados.descricao);
              if(dados.usuario_id == usuario_sessao){
                $( "#chatMensagens" ).append("<div class='direct-chat-msg right'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+dados.nome_usuario+"</span><span class='direct-chat-timestamp pull-right'>"+dados.data_mensagem+" "+dados.hora+"</span></div><img class='direct-chat-img' src='"+dados.foto_perfil+"' alt='message user image'><!-- /.direct-chat-img --><div class='direct-chat-text'>"+dados.descricao+"</div></div>");        
              }else{
                $( "#chatMensagens" ).append("<div class='direct-chat-msg'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+dados.nome_usuario+"</span><span class='direct-chat-timestamp pull-right'>"+dados.data_mensagem+" "+dados.hora+"</span></div><img class='direct-chat-img' src='"+dados.foto_perfil+"' alt='message user image'><!-- /.direct-chat-img --><div class='direct-chat-text'>"+dados.descricao+"</div></div>");        
              }
               $( "#chatMensagens" ).scroll('b', 1000000, true);
              // var novaMensagem = "<div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+dados.nome_usuario+"</span><span class='direct-chat-timestamp pull-right'>"+dados.data+" "+dados.hora+"</span></div><img class='direct-chat-img' src='"+dados.foto_perfil+"' alt='message user image'><!-- /.direct-chat-img --><div class='direct-chat-text'>"+dados.descricao+"</div>";

              // var chat = $( "#chatMensagens" ).innerHTML;

              // chat = chat + novaMensagem;

              // $( "#chatMensagens" ).innerHTML = chat;
                                
                              
            });
            </script>
            <div class="col-md-5">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Jogadores</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 Novos Jogadores</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user8-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user7-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user6-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user2-160x160.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user5-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user4-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="<?php echo base_url(); ?>resources/painel_adm/dist/img/user3-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->

       
       
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

