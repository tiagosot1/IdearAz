<?php $this->load->view('site/includes_new/head'); ?>
<?php $this->load->view('site/includes_new/header'); ?>



 <script>
        window.addEventListener('DOMContentLoaded', function() {
            "use strict";
            new QueryLoader2(document.querySelector("body"), {
                barColor: "#e74c3c",
                backgroundColor: "#111",
                percentage: true,
                barHeight: 1,
                minimumTime: 200,
                fadeOutTime: 1000
            });
        });
    </script>
<?php $this->load->view('site/includes_new/slider'); ?>



    <!-- =========================
       Call to action
    ============================== -->
    <section id="call-to-action" class="call-to-action main-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 wow slideInLeft animated">
                    <p class="light">Gostou do que está vendo? Estamos apenas começando</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 button-container wow slideInRight animated">
                    <a href="#portfolio" class="button light internal-link pull-left hvr-grow" data-rel="#portfolio">Portfolio</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section> <!-- *** end call-to-action *** -->


    <!-- =========================
       About Us
    ============================== -->
    <section id="about-us" class="about-us">
        <div class="overlay">
            <div class="container padding-top-large">
                <h2>
                    <strong class="bold-text">Sobre</strong>
                    <span class="light-text main-color">Idear AZ</span>
                </h2>
                <div class="line main-bg"></div>
                <div class="row margin-bottom-medium">
                    <div class="col-md-7">
                        <div class="jumbo-text  margin-top-medium wow slideInLeft" data-wow-duration="2s">
                            <h1>
                            Idear, uma <strong class="">agência de desenvolvimento web</strong>
                          </br> Deixe a sua marca na web
                         </h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img itemprop="image" src="<?php echo base_url(); ?>resources_idear/img/about-side-side.png" alt="About Us Big Image" class="center-block img-responsive">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <p class="margin-bottom-medium wow slideInUp">

										<?=$sobre->texto1;?>

										 <?=nl2br($sobre->texto2);?></p>
               
            </div>
        </div>
    </section> <!-- *** end About Us *** -->


    <?php $this->load->view('site/includes_new/blog'); ?>




  <?php $this->load->view('site/includes_new/portfolio'); ?>

    <section id="map" class="map">

   
        <div id="map-container">

        </div>
    </section> <!-- *** end Map Container *** -->



<?php $this->load->view('site/includes_new/footer'); ?>
<?php $this->load->view('site/includes_new/script'); ?>
  