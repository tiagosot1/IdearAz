  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           
          <img  src="<?php echo base_url() . 'resources_idear/img/logo-header.png' ?>" >
         </div>


      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
    

         <li class="<?php echo $p_home;?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>painel/inicio/adicionar"><i class="fa fa-circle-o"></i>Cadastrar Banner</a></li>
             <li><a href="<?php echo base_url(); ?>painel/inicio/listar"><i class="fa fa-circle-o"></i>Editar Banner</a></li>
            
         
          </ul>
        </li>
         <li class="<?php echo $p_home;?> treeview">
          <a href="painel/sobre/editar">
            <i class="fa fa-pie-chart"></i>
            <span>Sobre</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
        </li>
       <li class="<?php echo $p_blog;?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>painel/blog/adicionar"><i class="fa fa-circle-o"></i>Cadastrar</a></li>
              <li><a href="<?php echo base_url(); ?>painel/blog"><i class="fa fa-circle-o"></i>Listar/Editar</a></li>
         
          </ul>
        </li>


 <li class="<?php echo $p_imagens; ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Portfolio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="painel/Portfolio/adicionar">Cadastrar</a></li>
    <li><a href="painel/Portfolio">Listar / Editar</a></li>
         
          </ul>
        </li>


 

 

<li class="<?php echo $p_exp; ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Serviços</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      <li><a href="painel/servicos/adicionar">Serviços - Cadastrar</a></li>
    <li><a href="painel/servicos/">Serviços - Editar</a></li>
     <li><a href="painel/servicos/adicionar_categoria">  >> Categoria - Cadastrar </a></li>
      <li><a href="painel/servicos/categoria"> >> Categoria - Editar</a></li>
         
          </ul>
        </li>

<li class="<?php echo $p_adm; ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Administrador</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
       <li><a href="painel/usuarios/editar/1">Editar</a></li>
         
          </ul>
        </li>
        
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>