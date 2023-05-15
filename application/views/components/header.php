<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.2.6/css/dx.light.css" />
  <style>
      #dataGrid {
          height: 500px;
      }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn3.devexpress.com/jslib/22.2.6/js/dx.all.js"></script>
  
</head>
<body class="hold-transition <?php echo @$tipoPage; ?>">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Sistema de control</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session_sidebar['nombres'].' '.$session_sidebar['apellidos']; ?></a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <?php
            if($session_sidebar['id_rol'] == 'Admin'){
           ?>
              <li class="nav-item">
                  <a href="<?php echo base_url().'index.php/welcome/home'?>" class="nav-link">
                      <i class="nav-icon fas fa-home"></i>
                      <p>Inicio</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'index.php/welcome/allusuarios'?>" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Usuarios</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'index.php/welcome/usuarios'?>" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Crear Usuarios</p>
                  </a>
              </li>
              <li class="nav-item">
              <a href="<?php echo base_url().'index.php/welcome/pagos'?>" class="nav-link">
                      <i class="nav-icon fas fa-money-bill"></i>
                      <p>Registrar Pago</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'index.php/welcome/allpagos'?>" class="nav-link">
                      <i class="nav-icon fas fa-money-bill"></i>
                      <p>Ver Pagos</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url().'index.php/welcome/logout'?>" class="nav-link">
                      <i class="nav-icon fas fa-power-off"></i>
                      <p>Cerrar Sessión</p>
                  </a>
              </li>
          <?php 
            }else{
           ?>
           <li class="nav-item">
                <a href="<?php echo base_url().'index.php/welcome/home'?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
           <li class="nav-item">
                  <a href="<?php echo base_url().'index.php/welcome/logIngresos'?>" class="nav-link">
                      <i class="nav-icon fas fa-paperclip"></i>
                      <p>Log Ingresos</p>
                  </a>
              </li>
            <li class="nav-item">
                  <a href="<?php echo base_url().'index.php/welcome/logout'?>" class="nav-link">
                      <i class="nav-icon fas fa-power-off"></i>
                      <p>Cerrar Sessión</p>
                  </a>
              </li>
          <?php 
            }
           ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">