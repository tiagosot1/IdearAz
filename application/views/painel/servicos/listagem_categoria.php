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
								  
								   <th>Categória</th>
								
								  
								 
								   <th width="58" style="text-align:center">A&ccedil;&otilde;es</th>
								</tr>
								
							</thead>

						 
							<tbody>

<?php $conta_linhas = 0;
foreach($infra->result() as $res): 


  ?>

								<tr style="background:none repeat scroll 0 0 #EEEEEE">
									

									<td><?php echo $res->categoria; ?></td>
									
								
             
          <td>
              <!-- Editar -->
               <a href="<?php echo site_url('painel/servicos/editar_categoria/' . $res->id); ?>" title="Editar">Editar</a>
               
              <!-- Excluir -->
               <a href="<?php echo site_url('painel/servicos/excluir_categoria/' . $res->id); ?>" title="Deletar">Excluir</a>
               
              <!-- Alterar status -->
              
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
