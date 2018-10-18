 <!-- =========================
       Case Study
    ============================== -->
  

 <section id="case-study" class="case-study">
          <div class="container padding-top-large">
            <h2>
                
                <strong class="bold-text">Blog</strong>
                -
                <span class="light-text main-color">Post recentes</span>
                
            </h2>
              <div class="line main-bg margin-bottom-large"></div>

        <div class="row mar-none mat-none">

              <div class="row">


                <?php foreach ($blog as $blogItem) {
                  # code...
                ?>
                      <!-- *** end Case Study *** -->
                      <a href="<?php echo base_url().'blog/publico-alvo/'. $blogItem->id;?>">
                        <div class="col-sm-6 col-md-4">
                          <div class="thumbnail ">
                            <img class="overlay " src="<?php echo base_url().'uploads/blog/'. $blogItem->img;?>" alt="<?php echo $blogItem->titulo;?>">
                            <div class="caption ">
                              <h3><?php echo $blogItem->titulo;?> </h3>
                              <p><?php echo $blogItem->resumo;?></p>
                              
                            </div>
                          </div>
                        </div>
                      </a>

                <?php } ?>

                          
               
                </div>
                </div>
        </div>
        <div class="text-center">
             <a href="<?php echo base_url(); ?>blog" class="button light margin-top-medium margin-bottom-medium hvr-grow"><span class="light-text main-color"><i class="icon-reload"></i>Acessar o Blog</span></a>
        </div>
         
    </section> 

    <!-- *** end Case Study *** -->