<?php  $this->load->view('painel/includes/head');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
    
          
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="<?php echo ('painel/login/sair'); ?>"class="dropdown-toggle" >
              <i class="fa fa-flag-o"></i> Sair
            </a>
           
            
          </li>
          
    
        </ul>
      </div>
    </nav>
  </header>
<?php
				$this->load->view('painel/includes/cliente_admin'); 
				?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
     <?php echo $contents;?>	

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

          <?php  $this->load->view('painel/includes/footer');  ?>


        

