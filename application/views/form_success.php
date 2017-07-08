  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $name_view ?>
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
                        <h3 class="box-title"><i class="fa fa-book"></i><?php echo $name_view; ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <h1><?php echo $mensaje; ?></h1>
                        <div class="col-xs-6">
                            <button class="btn btn-default btn-block btn-flat">salir</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                            <a href="<?php echo base_url();?>rutina" class="btn btn-success btn-block btn-flatk" >Agregar Nuevo</a>
                        </div>
                        <!-- /.col -->
                      </div>
                        
                    </div><!-- /.box-body -->
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
<script src="<?php echo base_url();?>assets/js/actividad.js"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url();?>assets/js/sweetalert2.min.js"></script>
<!-- PACE -->
<script data-pace-options='{ "ajax": true }'  src="<?php echo base_url();?>assets/js/pace.min.js"></script>
<script>
    $(function(){
        ele = $('.rutina').addClass('active');
        $($(ele).parents()[1]).addClass('active')
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
