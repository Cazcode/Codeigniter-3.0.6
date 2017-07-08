<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->nombre?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>Conectado</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
        <li class="header">Menú de Navegación</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-th"></i><span>Maestros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="area"><a href="<?php echo base_url();?>area">Área</a></li>
              <li class="equipo"><a href="<?php echo base_url();?>equipo">Equipo</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-tasks"></i><span>Actividad</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="actividad"><a href="<?php echo base_url();?>actividad">Actividad</a></li>
                    <li class="funcion"><a href="<?php echo base_url();?>funcion">Función</a></li>
                    <li class="parte"><a href="<?php echo base_url();?>parte">Parte</a></li>
                    <li class="ubicacion"><a href="<?php echo base_url();?>ubicacion">Ubicación</a></li>
                    <li class="duracion"><a href="<?php echo base_url();?>duracion">Duración</a></li>
                    <li class="tipo_actividad"><a href="<?php echo base_url();?>tipo_actividad">Tipo Actividad</a></li>
                    <li class="epp"><a href="<?php echo base_url();?>epp">EPP</a></li>
                    <li class="tipo_herramienta"><a href="<?php echo base_url();?>tipo_herramienta">Tipo Herramienta</a></li>
                    <li class="herramienta"><a href="<?php echo base_url();?>herramienta">Herramienta</a></li>
                    <li class="estado_maquina"><a href="<?php echo base_url();?>estado_maquina">Estado Máquina</a></li>
                    <li class="periodicidad"><a href="<?php echo base_url();?>periodicidad">Periodicidad</a></li>
                    <li class="nivel_tecnico"><a href="<?php echo base_url();?>nivel_tecnico">Nivel Técnico</a></li>
                </ul>
              </li>      
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cog"></i><span>Config. Prev. Equipo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="assistant_standar"><a href="<?php echo base_url();?>assistant_standar">Plantilla Estándar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-clipboard"></i><span>Plan Preventivo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="borrador"><a href="<?php echo base_url();?>borrador/b_new">Mtto. P1 (Borrador)</a></li>
            <li class="index2"><a href="<?php echo base_url();?>borrador/index2">Mtto. P2 (Aprobación)</a></li>
            <li class="borrador"><a href="<?php echo base_url();?>borrador">Mtto. P3 (Creación)</a></li>
            <li class="rutina"><a href="<?php echo base_url();?>rutina">Rutina Diaria</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-table"></i><span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="plan_mantenimiento"><a href="<?php echo base_url();?>plan_mantenimiento">Planes Mantenimiento</a></li>
            <li class="hoja_de_vida"><a href="<?php echo base_url();?>hoja_de_vida">Hoja de Vida Equipo</a></li>
            <li class=""><a href="#">OT</a></li>
          </ul>
        </li>
        <!-- <li><a href="#"><i class="fa fa-book"></i> <span>Test</span></a></li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>