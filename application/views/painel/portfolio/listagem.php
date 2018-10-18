			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->		
            		
				<div class="content-box-header">
					<h3>Listando <?=$listando;?></h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

<?php if($portfolio->num_rows() > 0) : ?>
						<table class="table">
<?php echo form_open('painel/main/atualiza_status_multiplo'); ?>
							<thead>
								<tr>
								   <th>#</th>
								     <th>Nome</th>
								  
								   <th  style="text-align:center">Visualiza&ccedil;&atilde;o</th>
								   <th width="58" style="text-align:center">A&ccedil;&otilde;es</th>
								</tr>
								
							</thead>
				
						 
							<tbody>

<?php $conta_linhas = 0;
foreach($portfolio->result() as $res): 

  $word_limit = 14;
  if ($res->tratamento)
	  $string1 = $res->tratamento;
  if ($res->preparacao)
	  $string1 = $res->preparacao;
  if ($res->texto)
	  $string1 = $res->texto;
	  
  $words1 = explode(' ', $string1);
  $resumen =  implode(' ', array_slice($words1, 0, $word_limit))."...";	
  ?>

								<tr style="background:none repeat scroll 0 0 #EEEEEE">
									<td><img src="<?php echo base_url();?>uploads/portfolio/<?php echo $res->img; ?>" style="width: 90px"></td>

									<td><?php echo $res->titulo; ?></td>
									
                <td style="text-align:center">
                <!-- Alterar status -->
<?php $outro_status = ($res->situacao == 'A') ? 'I' : 'A'; ?>
<a href="<?php echo site_url('painel/main/atualiza_status/portfolio/' . $outro_status . '/' . $res->id . '/portfolio'); ?>" title="Alterar Status">
<?php if ($res->situacao == 'A') {?>
Desativar
<?php } else { ?>
Ativar
<?php } ?></a>
</td>
									<td>
										<!-- Editar -->
										 <a href="<?php echo site_url('painel/portfolio/editar/' . $res->id); ?>" title="Editar">Editar</a>
                                         
										<!-- Excluir -->
										 <a href="<?php echo site_url('painel/portfolio/excluir/' . $res->id. '/painel/portfolio'); ?>" title="Deletar">Deletar</a>
                                         
								

									</td>
								</tr>
<?php 
$conta_linhas = $conta_linhas + 1 ;
endforeach; ?>

							</tbody>
                            <input type="hidden" name="tabela" value="paginas" />
							</form>
						</table>
<?php
	else :
		echo exibir_notificacao('Não há dados cadastrados', 'error');
endif;
?>
						

					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->		
            
            <?php if ($mess) {
echo"<script>alert('".$mess."');</script>";
$mensaje = "";
} ?>
