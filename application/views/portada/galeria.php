<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laboratorio Informatica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/css/portada/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/portada/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/css/portada.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/css/galeria.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Siimple - v4.6.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-landing-page/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 
  <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
<nav class="nav-menu">
  <ul>
    <li class="active"><a href="<?php echo base_url()?>Administrador" class="scrollto">Inicio</a></li>
    <li><a href="<?php echo base_url()?>Administrador/galeria" class="scrollto">Galeria</a></li>
    <li><a href="<?php echo base_url()?>Login" class="scrollto">Ingresar</a></li>
  </ul>
</nav><!-- .nav-menu -->
  <!-- ======= Hero Section ======= -->
  
  <section id="why-us" class="why-us section-bg">
      <div class="container">
      <section id="galeria" class="container">
          <div class="text-center pt-5">
                <h1>Galeria</h1>
                <p>Imagenes que representan el trabajo realizado dentro del laboratorio,ademas de actividades 
                    en las cuales ha participado el alumno
                </p>
            </div> 
            <div class="row">
            
            <?php
                   if(isset($galeria) ){
                   foreach ($galeria as  $key => $value){
                   ?>
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <?php 
                     echo "<img src='".base_url().$value['Ruta']."'/>"; 
                    ?>
                     </div>
                   <?php }} 
                 ?>
               
              
</div> 
</section>
       

      </div>
    </section><!-- End Why Us Section -->

  

  <!-- ======= Footer ======= -->
  <footer id="footer">
   
  </footer><!-- End #footer -->

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/js/portada/bootstrap.bundle.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/js/portada/main.js"></script>

</body>

</html>

























