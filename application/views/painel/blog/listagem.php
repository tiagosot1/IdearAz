			<div class="clear"></div> <!-- End .clear -->
			<div class="content-box"><!-- Start Content Box -->		
            		
				<div class="content-box-header">
					<h3>Listando <?=$listando;?></h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

<?php if($blog->num_rows() > 0) : ?>
						<table class="table">
<?php echo form_open('painel/main/atualiza_status_multiplo'); ?>
							<thead>
								<tr>
								   <th>Data</th>
								   <th>T&iacute;tulo</th>
								   <th>Imagem</th>
								   <th  style="text-align:center">Visualiza&ccedil;&atilde;o</th>
								   <th width="58" style="text-align:center">A&ccedil;&otilde;es</th>
								</tr>
								
							</thead>

						 
							<tbody>

<?php $conta_linhas = 0;
foreach($blog->result() as $res): 
  ?>

								<tr style="background:none repeat scroll 0 0 #EEEEEE; ">
									<td><?php echo do_banco($res->data); ?></td>

									<td><?php echo $res->titulo; ?></td> 
									<td>
<?php if($res->img) : 
$img_at = '<img src="uploads/blog/'.$res->img.'" border="0" height="50" style="border:1px solid #333333;" />';
//$img_at = base_url() . 'uploads/paginas/' . $pagina->img;
?>
<div style="margin-bottom:10px;"><?php echo $img_at;?></div>
<?php endif; ?>									
                                    </td>
                <td style="text-align:center">
                <!-- Alterar status -->
<?php $outro_status = ($res->situacao == 'A') ? 'I' : 'A'; ?>
<a href="<?php echo site_url('painel/main/atualiza_status/blog/' . $outro_status . '/' . $res->id . '/blog'); ?>" title="Alterar Status">
<?php if ($res->situacao == 'A') {?>
Desativar
<?php } else { ?>
Ativar
<?php } ?></a>
</td>
    <td>
        <!-- Editar -->
         <a href="<?php echo site_url('painel/blog/editar/' . $res->id); ?>" title="Editar">Editar</a>
         
        <!-- Excluir -->
         <a href="<?php echo site_url('painel/blog/excluir/' . $res->id. '/painel/blog'); ?>" title="Deletar">Excluir</a>
         

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
