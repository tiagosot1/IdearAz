
<body itemscope itemtype="https://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M6DLL7S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
                    <style type="text/css">
                        
                        .mobilenav{
                            text-decoration: none;
                        }

                         #link {
                         color: #ffffff;
                        }

                        .mobilenav a:hover {
                         color: #ffffff;
                        }


                    </style>
    <!-- =========================
       Fullscreen menu
    ============================== -->
<?php

    /*
echo $_SERVER['HTTP_HOST'];

?>
<?php 

echo $host = parse_url( base_url() );
echo $host = isset( $host[ 'host' ] ) ? $host[ 'host' ] : $host[ 'path' ];

$url= strtr($host, array( 'blog.' => null ));
$blog_url = strtr($host, array( 'www.' => null ));

*/
 
?>
    <div class="mobilenav">
        <ul>
            <li data-rel="">
                <a id="link" href="<?php echo base_url();?>"> <span class="nav-label">Home</span></a>
               
            </li>
            <li data-rel="">
                <a id="link" href="<?php echo base_url();?>#about-us"> <span class="nav-label">sobre</span></a>
            </li>
            <li data-rel="">
                  <a id="link" href="<?php echo base_url();?>servicos"> <span class="nav-label">Serviços</span></a>
            </li>
            <li data-rel="">
                  <a id="link" href="<?php echo base_url();?>portfolio"> <span class="nav-label">Portfolio</span></a>
            </li>
            <li data-rel="<?php echo $blog_url;?>">
                 <a id="link" href="<?php echo base_url();?>blog"> <span class="nav-label">Blog</span></a>
            </li>
           
            <li data-rel="">
                 <a id="link" href="<?php echo base_url();?>#map"> <span class="nav-label">Contato</span></a>
            </li>
        </ul>
    </div>  <!-- *** end Full Screen Menu *** -->

    <!-- *****  hamburger icon ***** -->
    <a href="javascript:void(0)" class="menu-trigger">
       <div class="hamburger">
         <div class="menui top-menu"></div>
         <div class="menui mid-menu"></div>
         <div class="menui bottom-menu"></div>
       </div>
    </a>