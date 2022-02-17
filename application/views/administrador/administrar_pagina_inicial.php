
  <!-- Main content -->
  <section class="content">



<!-- Imagen video-->
<div class="col-md-6">
   <div class="box box-primary ">
          <div class="box-header with-border">
            <h3 class="box-title">Administrar pagina inicio</h3>
         </div>
        <!-- /.box-header -->
        <!-- form start -->
           <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url()?>Subir_archivos/subir_imagen_pagina_inicial">
             <div class="box-body ">
            
                <div class="form-group">
                  <label for="exampleInputFile">Insertar imagen</label>
                  <input type="file" id="Imagen" name="Imagen">

                  <p class="help-block">inserte imagenes relevantes para el entorno laboratorio</p>
                </div>
              </div>
             
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      
   </div>
</div>


  <div class="col-md-6 ">
          <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Administrar pagina inicio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="form_open_multipart" method="POST" action="<?php echo base_url()?>Subir_archivos/subir_imagen_pagina_inicial">
              <div class="box-body ">
                 
                   <div class="form-group">
                      <label for="exampleInputFile">Insertar video </label>
                      <input type="file" id="exampleInputFile">

                      <p class="help-block">inserte el video preparado</p>
                   </div>
                
                 
                  
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>

    
    <div class="box-body">
        <div id="divTable" class="table-responsive">
          
        </div>
      </div>
    <!-- Tabla -->
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Imagenes portada</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>Ruta</th>
              
                  <th>vista previa </th>
                </tr>
                </thead>
                <!--CONTENIDO TABLA-->
                <tbody id='cuerpoTabla'>
                <?php
                   
                  
                   if(isset($carrusel) ){
                   foreach ($carrusel as  $key => $value){
                 
                   
           
                   ?>
                     <td><?php echo $value['Ruta'] ?></td>
                  
                    <?php 
                     echo "<td ><img src='".base_url().$value['Ruta']."' width=250 height=200/></td>"; 
                    ?>
                     </tr>
                   <?php }} 
                 ?>
                  
                     
                  
                          
                          
                    
                </tr>         
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="table-responsive">
    <table id="contactos_modificar" class="table table-bordered table-striped">
        <thead>
            <tr>
              
            </tr>
        </thead>
        <tbody>

            <?php /*foreach($_SESSION['detalle'] as $ka => $detalle): */?>
               
                <tr>
               </tr>

            <?php// endforeach; ?>

        </tbody>        
    </table>
</div>
