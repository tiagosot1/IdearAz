var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
var server  = require('https').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {

  // socket.on( 'new_count_message', function( data ) {
  //   io.sockets.emit( 'new_count_message', { 
  //   	new_count_message: data.new_count_message
  //     //console.log(new_count_message);
  //   });
  // });

  // socket.on( 'update_count_message', function( data ) {
  //   io.sockets.emit( 'update_count_message', {
  //   	update_count_message: data.update_count_message 
  //   });
  // });

  socket.on( 'new_message', function( dados) {
    //console.log(data);
    io.sockets.emit( 'new_message', {
      nome_usuario: dados.nome_usuario,
      foto_perfil: dados.foto_perfil,
      descricao: ""+dados.descricao,
      data_mensagem: dados.data_mensagem,
      hora: dados.hora,
      usuario_id: dados.usuario_id,
      usuario_sessao: dados.usuario_sessao   
    });
 });

  
});
