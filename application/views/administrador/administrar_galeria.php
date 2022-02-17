
  <!-- Main content -->
  <section class="content">
  <!-- Imagenes galeria-->
<div class="col-md-12">
   <div class="box box-primary ">
          <div class="box-header with-border">
            <h3 class="box-title">Administrar pagina inicio</h3>
         </div>
        <!-- /.box-header -->
        <!-- form start -->
           <form role="form" enctype="form_open_multipart" method="POST" action="<?php echo base_url()?>Subir_archivos/subir_imagen">
             <div class="box-body ">
            
                <div class="form-group">
                  <label for="exampleInputFile">Insertar foto galeria</label>
                  <input type="file" id="exampleInputFile" name="Imagen">

                  <p class="help-block">inserte el foto preparada</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      
   </div>
</div>


</section>

 <!-- Tabla -->
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Imagenes galeria</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
               
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <!--CONTENIDO TABLA-->
                <thead>
                <tr>
                <th>Ruta</th>
                  <th>Vista previa</th>
                </tr>
                </thead>
                <tbody id='cuerpoTabla'>
                  <tr>

                <?php
                   
                  
                    if(isset($galeria) ){
                    foreach ($galeria as  $key => $value){
                  
                    
            
                    ?>
                      <td><?php echo $value['Ruta'] ?></td>
                   
                     <?php 
                      echo "<td ><img src='".base_url().$value['Ruta']."' width=250 height=200/></td>"; 
                     ?>
                      </tr>
                    <?php }} 
                  ?>
                   
                     
                  
             
           
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>