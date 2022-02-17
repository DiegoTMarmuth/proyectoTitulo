  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($this->session->userdata('nombre_usuario')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="treeview <?php if(isset($menu) && ($menu == "Inicio")) echo "active"; ?>">
          <a href="<?php echo base_url()?>Administrador">
            <i class="fa fa-dashboard"></i> <span>Modificación pagina inicial</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($submenu) && ($submenu == "PaginaI")) echo "active"; ?>">
            <a href="<?php echo base_url()?>Administrador/administrar_pagina_inicial"><i class="fa fa-circle-o"></i>Imagenes, video pagina inicial</a></li>
            <li class="<?php if(isset($submenu) && ($submenu == "PaginaG")) echo "active"; ?>">
            <a href="<?php echo base_url()?>Administrador/administrar_galeria"><i class="fa fa-circle-o"></i> Imagenes galeria</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>Administrador/informe_dispositivos">
            <i class="fa fa-th"></i> <span>Informe dispositivos</span>
            <span class="pull-right-container">
      
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url()?>Administrador/proyectos">
            <i class="fa fa-th"></i> <span>proyectos dispositivos</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
