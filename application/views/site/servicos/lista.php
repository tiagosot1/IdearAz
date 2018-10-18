
<?php $this->load->view('site/includes_new/head'); ?>
<?php $this->load->view('site/includes_new/header'); ?>



  <link rel="stylesheet" href="<?php echo base_url(); ?>resources_idear/css/blog/bootstrap-responsivess.min.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>resources_idear/css/blog/style.css">
      





    <!-- =========================
       Twitter
    ============================== -->
    <section id="twitter" class="twitter">
        <div class="overlay">
            <div class="container padding-large text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon hvr-grow">
                        Serviços
                            <i >  <img itemprop="logo" src="<?php echo base_url(); ?>resources_idear/img/logo-header.png" height="90"  alt="Logo Idear Az"></i>
                        </div>
                        <div class="tweet-text" id="tweets">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Twitter *** -->

    <!-- start: CSS -->
  
  

  
  <!--start: Header -->
  
  <!--end: Header-->
  <!--start: Container -->
  <div class="container" style="margin-top: 90px">
        
    <!--start: Wrapper-->
    <div id="wrapper">
    
      <!-- start: Wall -->
      <div id="wall" class="row-fluid isotope" style="position: relative; overflow: hidden; height: 1829px;">

        
        <?php
    $options_artigos = array ('' => '');
    foreach($servicosInf->result() as $servicosList):?>
        <div class="span3 item isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(878px, 0px, 0px); ">

          <div class="picture">
                            <div class="panel-heading">
                            <h4 class="panel-title text-center">
                            <a  data-parent="#accordion3" href="<?php echo base_url();?>servicos/em/<?=url_title($servicosList->categoria)?>/<?=$servicosList->id;?>">
                           <?=$servicosList->categoria;?>
                            </a>
                            </h4>
                            </div>
                          
                          </div>    
                                                
            </div>
       
     
        <?php
    endforeach;
 
    ?>

   <div class="col-md-10"></div>
   
      <?php 
                $i = 1;
                 
                   foreach($pagina->result() as $rest) { 

                     
                   
        ?>



        <div class="span3 item isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(878px, 0px, 0px); ">
          <div class="picture">
         

            <a class="image" href="<?php echo base_url(); ?>servicos/listar/<?=url_title($res->titulo)?>/<?=$res->id?>" title="<?=$res->titulo;?>"><img src="<?php echo base_url(); ?>uploads/servicos/<?=$rest->img_banner;?>" alt="<?=$rest->titulo;?>"></a>

             
            <div class="description">
              
              <a href="<?php echo base_url(); ?>servicos/listar/<?=url_title($rest->titulo)?>/<?=$rest->infra_id?>" title="<?=$rest->titulo;?>">

            <h1 class="main-color text-center" style="font-size: 19px; margin-bottom: 10px"><?=$rest->titulo;?></h1>
              <p class="text-justify" style="color: #5f5e5e;">
              <?=$rest->texto1;?>
              </p>
              </a>
            </div>
           
          </div>  
        </div>

          <?php } ?>  

       

       

      </div>
      <!-- end: Wall -->        
          
    </div>
    <!--end: Container-->
  
  </div>
  <!-- end: Wrapper  -->      
  <?php /*?>   Inicio - Estrutura da paginação <?php */?>
               <section class="text-center" data-stellar-background-ratio="0.3" >
                      <div class="container">
                            <div class="pagination pagination-centered"><?php echo $pagination; ?></div>
                      </div>
                </section>
                 <?php /*?>FIM - Estrutura da paginação <?php */?>
         
                
  
  <?php $this->load->view('site/includes_new/footer_blog'); ?>
  <?php $this->load->view('site/includes_new/script'); ?>

  

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.imagesloaded.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/flexslider.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/carousel.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.cslider.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/slider.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.fancybox.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/twitter.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.placeholder.min.js"></script>

<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery-easing-1.3.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/layerslider.kreaturamedia.jquery.js"></script>

<script src="<?php echo base_url(); ?>resources_idear/js/blog/excanvas.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>resources_idear/js/blog/jquery.flot.resize.min.js"></script>

<script defer="defer" src="<?php echo base_url(); ?>resources_idear/js/blog/modernizr.js"></script>
<script defer="defer" src="<?php echo base_url(); ?>resources_idear/js/blog/retina.js"></script>
<script defer="defer" src="<?php echo base_url(); ?>resources_idear/js/blog/custom.js"></script>
<!-- end: Java Script -->

