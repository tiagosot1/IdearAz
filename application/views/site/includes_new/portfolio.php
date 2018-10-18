  <!-- =========================
       Portfolio
    ============================== -->
    <section id="portfolio" class="portfolio padding-large text-center">
        <div class="container margin-bottom-medium">
            <div class="row margin-bottom-medium wow fadeInUp">
                <h2>
                    
                    <strong class="main-color bold-text">Portfolios</strong>
                </h2>
                <div class="line main-bg"></div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="subtitle">Desenvolvimento de site e criação de cards para redes sociais.</div>
                   
                </div>
            </div> <!-- *** end row *** -->

        </div> <!-- *** end container *** -->

        <!-- *****  Portfolio  wrapper ***** -->
        <div class="portfolio-wrapper margin-bottom-medium">


		<?php 	


    foreach($portfolio->result() as $res) {?> 
							
            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item sites">
                <div class="portfolio">
                    <a href="<?php echo base_url(); ?>portfolio/<?=url_title($res->titulo)?>/<?=$res->id?>">
                        <img itemprop="image" src="<?php echo base_url(); ?>uploads/portfolio/<?=$res->img?>" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                        <div class="portfolio-overlay hvr-rectangle-out">
                            <h2 class="margin-bottom-small">
                                
                                <strong class="white-color bold-text"><?=$res->titulo?></strong>
                            </h2>
                            <div class="button">Ver Projeto</div>
                        </div><!-- END PORTFOLIO OVERLAY -->
                    </a>
               </div>
            </div> <!-- *** end portfolio-item *** -->
  		<?php } ?>  

       

           
        </div> <!-- *** end  portfolio-wrapper *** -->
        <a href="<?php echo base_url();?>portfolio" class="button light margin-top-medium margin-bottom-medium hvr-grow"><i class="icon-reload"></i> Visualizar</a>
    </section> <!-- *** end Portfolio *** -->


    <!-- =========================
       We are  hiring
    ============================== -->
    <section id="we-are-hiring" class="we-are-hiring"  itemscope itemtype="http://data-vocabulary.org/Person">

        <div class="container padding-large">
            <div class="row">
                <div class="col-md-7 col-sm-6 wow fadeInLeft">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><span class="main-color bold-text" itemprop="name">Tiago Oliveira </span><span itemprop="title">Idear Master</span></h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p class="margin-top-medium">Formado em Ciência da Computação pela Faculdade Objetivo em 2011 e com especialização em Marketing e Comunicação Digital pela Faculdade Cambury em 2015, atua no mercado há mais de 5 anos.</p>
                </div>
                <div class="col-md-5 col-sm-6 wow fadeInUp">
                    <div class="upload-cv text-center inner">
                     <img class="img-circle" width="210" height="210" src="<?php echo base_url();?>resources_idear/img/about.jpg" itemprop="photo" alt="Tiago Oliveira" />
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end We Are Hiring *** -->