<?php    
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
?>
<div class="col-md-6">
   <div class="box box-primary ">
          <div class="box-header with-border">
            <h3 class="box-title">Filtrar</h3>
         </div>
        <!-- /.box-header -->
        <!-- form start -->
           <form role="form"  method="POST" action="<?php echo base_url()?>Administrador/GraficarDia">
             <div class="box-body ">
              <!-- Select por mes o por dia -->
  <div class="col-md-6">
      <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="mes" id="mes">
                  <?php
                      for ($i=1; $i<=12; $i++) {
                          if ($i == date('m'))
                      echo '<option value="'.$i.'"selected name="mes">'.$Meses[($i)-1].'</option>';
                          else
                      echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
                          }
                      ?>
                  </select>
                </div>
</div>
              </div>
             <div class="col-md-6">
      <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="mes" id="mes">
                  <?php
                  foreach ($Fechas as $key => $value) {
                    $newDate = date('Y',$value['Fecha_Actividad']);

                    echo '<option value="'.$i.'"selected name="mes">'.$value['Fecha_Actividad'].'</option>';
            
                  }
                  $array_num = count($Fechas);
                  for ($i=0; $i < $array_num; $i++) { 
                    $newDate = date('Y',$value['Fecha_Actividad']);
                    echo '<option value="'.$i.'"selected name="mes">'.strval($Fechas[$i]).'</option>';
                     }
                     
                      ?>
                  </select>
                </div>
</div>
              


              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      
   </div>
</div>

<div class="col-md-6">
   <div class="box box-primary ">
          <div class="box-header with-border">
            <h3 class="box-title">Filtrar</h3>
         </div>
        <!-- /.box-header -->
        <!-- form start -->
           <form role="form"  method="POST" action="<?php echo base_url()?>Administrador/GraficarDia">
             <div class="box-body ">
              <!-- Select por mes o por dia -->
 
              <div class="col-md-6">
<div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="dia" id="dia">
                </div>
                <!-- /.input group -->
              </div>
</div>



              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
      
   </div>
</div>
                    </div>

<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

            
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 221px;" width="221" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
