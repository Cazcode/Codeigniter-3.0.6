<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><b>ICARO</b>CMMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Por favor inicie sesión</p>

    <?php echo form_open("logown") ?>
      <div class="form-group has-feedback">
        <input class="form-control text-uppercase" placeholder="Usuario" name="user" value="<?php echo set_value('user'); ?>" autofocus >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Contraseña" name="pwd" type="password" value="<?php echo set_value('pwd'); ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button> -->
          <input type="submit"  class="btn btn-primary btn-block btn-flatk" value="Ingresar">
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p><?php echo form_error('user'); ?></p>
    <p><?php echo form_error('pwd'); ?></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>