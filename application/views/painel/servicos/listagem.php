			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->		
            		
				<div class="content-box-header">
				
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

<?php if($infra->num_rows() > 0) : ?>
						<table class="table">
<?php echo form_open('painel/main/atualiza_status_multiplo'); ?>
							<thead>
								<tr>
								   <th>Nome</th>
								   <th>Categória</th>
								   <th>Imagem</th>
								  
								   <th  style="text-align:center">Visualiza&ccedil;&atilde;o</th>
								   <th width="58" style="text-align:center">A&ccedil;&otilde;es</th>
								</tr>
								
							</thead>
						 

						 
							<tbody>

<?php $conta_linhas = 0;
foreach($infra->result() as $res): 


  ?>

								<tr style="background:none repeat scroll 0 0 #EEEEEE">
									<td><?php echo $res->titulo; ?></td>

									<td><?php echo $res->categoria; ?></td>
									
									<td><img style="width: 100px" src="<?php echo base_url();?>uploads/servicos/<?php echo $res->img_banner; ?>"/></td>
                <td style="text-align:center">
                <!-- Alterar status -->
<?php $outro_status = ($res->situacao == 'A') ? 'I' : 'A'; ?>
<a href="<?php echo site_url('painel/main/atualiza_status/servicos/' . $outro_status . '/' . $res->infra_id . '/infra'); ?>" title="Alterar Status">
<?php if ($res->situacao == 'A') {?>
Desativar
<?php } else { ?>
Ativar
<?php } ?></a>
</td>
          <td>
              <!-- Editar -->
               <a href="<?php echo site_url('painel/servicos/editar/' . $res->infra_id); ?>" title="Editar">Editar</a>
               
              <!-- Excluir -->
               <a href="<?php echo site_url('painel/servicos/excluir/' . $res->infra_id); ?>" title="Deletar">Excluir</a>
               
     

          </td>
      </tr>
<?php 
$conta_linhas = $conta_linhas + 1 ;
endforeach; ?>

							</tbody>
                            <input type="hidden" name="tabela" value="servicos" />
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
