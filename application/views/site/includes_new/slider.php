

                       
                       

 <!-- =========================
       Header
    ============================== -->
    <header id="header">
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <?php 

                        for ($j=0; $j < $qtd_banner ; $j++) { 
                            if($j==0){

                            $active = 'active';
                            
                        }else{
                            $active = '';
                        }
                        
                        ?>
                <li data-target="#myCarousel"  data-slide-to="<?php echo $j; ?>" class="<?php echo $active; ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">

                <!-- *****  Logo ***** -->
                <div class="logo-container" id="logo" itemscope itemtype="http://schema.org/Organization">
                    <a itemprop="url" href="<?php echo base_url(); ?>">
                        <img itemprop="logo" src="<?php echo base_url(); ?>resources_idear/img/logo-header.png" height="90"  alt="Logo">
                    </a>
                </div>

                <!-- =========================
                   Header item 1
                ============================== -->
                 <?php
                    $i =0;
                    foreach ($listar_banner as $banners) 
                    {
                        if($i==0)
                        {

                            $active = 'active';
                            
                        }else
                        {
                            $active = '';
                        }
                        $i++;
                     ?>
                                        <div class="item <?php echo $active; ?>">

                                            <!-- Set the first background image using inline CSS below. -->
                                            <div class="fill" style="background-image:url('<?php echo base_url(); ?>uploads/banners/<?php echo $banners->img; ?>');">
                                            </div>
                                            <div class="carousel-caption">
                                               <h1 class="light mab-none"><?php echo strtoupper($banners->titulo); ?></h1>
                                                
                                                <p class="light margin-bottom-medium"><?php echo $banners->descricao; ?></p>
                                                <div class="call-button">
                                                    <div class="row">
                                                        <div class="col-md-1 col-md-offset-1 col-sm-2 col-sm-offset-5 col-xs-12">
                                                        <!-- 
                                                            <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                                            -->
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                       
                                                                <a style="width: 100%" class="button pull-right internal-link bold-text light hvr-grow" href="<?php echo $banners->link; ?>"><?php echo $banners->nome_botao; ?></a>


                                                           
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overlay"></div>
                                        </div>
              <?php } ?>
                <!-- =========================
                   Header item 2
                ============================== -->
            


            </div> <!-- *** end wrapper *** -->

            <!-- Carousel Controls -->
            <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
                <span class="icon-prev icon-arrow-left"></span>
            </a>
            <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
                <span class="icon-next icon-arrow-right"></span>
            </a>
        </div>
    </header> <!-- *** end Header *** -->


   <?php /*?>                     
    <!-- =========================
       Header
    ============================== -->
    <header id="header">
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">

                <!-- *****  Logo ***** -->
                <div class="logo-container" id="logo">
                    <a href="#">
                        <img itemprop="photo"  src="<?php echo base_url(); ?>resources_idear/img/logo-header.png" height="90"  alt="Logo">
                    </a>
                </div>

                <!-- =========================
                   Header item 1
                ============================== -->
                <div class="item active">

                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url(); ?>uploads/banners/15.jpg');">
                    </div>
                    <div class="carousel-caption">
                       <h1 class="light mab-none">Aqui é a <strong class="bold-text">Idear </strong>az</h1>
                        <h1 class="light margin-bottom-medium mat-none">E somos <strong class="bold-text">impressionantes</strong>!</h1>
                        <p class="light margin-bottom-medium">Para começar a deixar sua marca na web.</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-1 col-sm-2 col-sm-offset-5 col-xs-12">
                                <!-- 
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                    -->
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                               
                                    <a href="https://api.whatsapp.com/send?phone=5562992399835" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">
                            <i class="fa fa-whatsapp"></i>Gostou? Nos chame no WhatsApp!
                        </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 2
                ============================== -->
                <div class="item">

                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url(); ?>uploads/banners/16.jpg');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">Aqui é a <strong class="bold-text">Idear az</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">E somos <strong class="bold-text">impressionantes!</strong></h1>
                        <p class="light margin-bottom-medium">Para começar a deixar sua marca na web.</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="#about-us" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">About Us</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 3
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url(); ?>resources_idear/img/slider/slider-2.jpg');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">Aqui é a <strong class="bold-text">Idear az</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">E somos <strong class="bold-text">impressionantes!</strong></h1>
                        <p class="light margin-bottom-medium">Para começar a deixar sua marca na web.</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="#about-us" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">Quems somos</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 4
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url(); ?>resources_idear/img/slider/slider-3.jpg');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">Kreative</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">And We Are <strong class="bold-text">Awesome</strong></h1>
                        <p class="light margin-bottom-medium">Stop blending in & start leaving your mark on the web.</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="#about-us" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">About Us</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>

                <!-- =========================
                   Header item 5
                ============================== -->
                <div class="item">

                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url(); ?>resources_idear/img/slider/slider-4.jpg');"></div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">Kreative</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">And We Are <strong class="bold-text">Awesome</strong></h1>
                        <p class="light margin-bottom-medium">Stop blending in & start leaving your mark on the web.</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="#about-us" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">About Us</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div> <!-- *** end wrapper *** -->

            <!-- Carousel Controls -->
            <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
                <span class="icon-prev icon-arrow-left"></span>
            </a>
            <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
                <span class="icon-next icon-arrow-right"></span>
            </a>
        </div>
    </header> <!-- *** end Header *** -->
    <?php */?>