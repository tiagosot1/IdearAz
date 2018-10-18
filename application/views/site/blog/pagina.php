<?php $this->load->view('site/includes_new/head'); ?>
<?php $this->load->view('site/includes_new/header'); ?>
<?php 
			$filename = "uploads/blog/".$blogPost->img;
			 ?>
 <!-- =========================
       Twitter
    ============================== -->
    <section id="twitter" class="twitter" style="background: url(<?php echo base_url().$filename;?>);background-repeat: repeat;
background-attachment: scroll;
background-clip: border-box;
background-origin: padding-box;
background-position-x: 0%;
background-position-y: 0%;
background-size: 100% 100%;
 background-size: 100%;
 background-position: center center;
height: 300px
 ">
        <div class="overlay" style="height: 300px">
            <div class="container padding-large text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon hvr-grow" style="line-height: 0.5;">
                        <h1 style="font-size: 50px">
                        <?=$blogPost->titulo;?>
                           </h1>
                        </div>
                        <div class="tweet-text" id="tweets">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Twitter *** -->

    <!-- start: CSS -->

			<style type="text/css">

            #image{
                padding: 15px 15px 15px 15px
            }
       
       @media screen and (max-width: 770px) {
                        #image{

                            display: none;
                        }
                       
                    }
         
            </style>	
    
    
     <div class="sub-page-content" style="margin-top: 30px; margin-bottom: 30px">
    	 
        
        <div class="container big-font">
            <small style="font-size: 12px">Estou em:
                <a href="<?php echo base_url(); ?>" title=" <?=$blogPost->titulo;?>">Home</a> <i style="height: 2px" class="fa fa-chevron-right" aria-hidden="true"></i><a href="<?php echo base_url(); ?>blog/" title=" <?=$blogPost->titulo;?>"> Blog</a> <i style="height: 2px" class="fa fa-chevron-right" aria-hidden="true"></i>
 <?=$blogPost->titulo;?></small>
        	<div style="margin-top: 30px">
            <?php 
			
			if (file_exists($filename)) { ?>
            <div class="media pull-right" id="image" ><img src="<?php echo base_url().$filename;?>" width="400" class="img-rounded" alt="" title=""></div>
            <?php } ?>
            <p align="justify" ><?=nl2br($blogPost->descricao);?></p>
            </div>
        </div>
    
    <div class="clr"></div>    
    </div><!--end sub-page-content-->
    
<?php // $this->load->view('site/includes/ultimas'); ?>
    <div class="clr"></div>    
    
     <?php $this->load->view('site/includes_new/footer_blog'); ?>
  <?php $this->load->view('site/includes_new/script'); ?> 
   