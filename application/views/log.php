  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de Maestros
        <small>Mantenimiento</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->  
        <!-- /.nav-tabs-custom -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"><i class="fa fa-book"></i>Maestro <?php echo $name_master ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                <label>ID</label>
                                <input id="id_area" type="text" class="form-control" disabled>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <label>Área</label>
                                <input id="descripcion" type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label>Planta</label>
                                <select id="id_planta" name="planta" class="form-control selecte" style="width: 100%;" required>
                                    <option disabled="disabled" selected="selected">Seleccione Ubicación</option>
                                    <?php foreach ($ubicacion as $v) { ?>
                                    <option value="<?php echo $v->id_ubicacion?>">
                                        <?php echo  $v->descripcion?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                <label>Planta</label>
                                <br>
                                <button type="button" class="btn btn-sm btn-success" title="Nuevo" ><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" ><i class="fa fa-edit"></i></button> 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="table-responsive">          
                                    <table class="table datatb table-condensed table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sede</th>
                                                <th>Id_log</th>
                                                <th>Id_master_plan</th>
                                                <th>Id_actividad</th>
                                                <th>Id_ot</th>
                                                <th>Id_usuario</th>
                                                <th>Fecha</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cont = 0; ?>
                                            <?php if(!is_null($log)){ ?>
                                            <?php foreach ($log as $v) { ?>
                                            <tr>
                                                <td><?php echo ++$cont; ?></td>
                                                <td><?php echo $v->sede ?></td>
                                                <td><?php echo $v->id_log ?></td>
                                                <td><?php echo $v->id_master_job ?></td>
                                                <td><?php echo $v->id_actividad ?></td>
                                                <td><?php echo $v->id_ot ?></td>
                                                <td><?php echo $v->id_usuario ?></td>
                                                <td><?php echo $v->fecha ?></td>
                                                <td><strong><?php echo $v->descripcion ?></strong></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>    
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        The footer of the box
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
<!-- DualListBox -->
<script src="<?php echo base_url();?>assets/js/duallistbox.js"></script>
<!-- viewJS -->


<!-- viewJS -->
<script src="<?php echo base_url();?>assets/js/area.js"></script>
<script>
    $(function(){
        ele = $('.log').addClass('active');
        $($(ele).parents()[1]).addClass('active')
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
