			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->		
            		
				<div class="content-box-header">
				
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">


						<table class="table">

							<thead>
								<tr>
								   <th>T&iacute;tulo</th>
								   <th>Imagem</th>
								 
								   <th width="58" style="text-align:center">A&ccedil;&otilde;es</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						 
							<tbody>

<?php 



foreach ($listar_banner as $banner_listar) {
	

 

 
  ?>


	
<tr>
	<td>
<?php echo $banner_listar->titulo; ?>
</td>
<td>
<img style="height: 90px; width: 120px" src="uploads/banners/<?php echo $banner_listar->img; ?>" />
</td>
<td>
<a href="<?php echo site_url('painel/inicio/editar/' .  $banner_listar->id); ?>" title="Editar">Editar</a>
         
        <!-- Excluir -->
         <a href="<?php echo site_url('painel/inicio/excluir/' .  $banner_listar->id); ?>" title="Deletar">Excluir</a>
         </td>
</tr>




  <?php 


	
}
 
  ?>
		
			</table>