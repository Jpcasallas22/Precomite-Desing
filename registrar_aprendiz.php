

<?php
session_start();
if (isset($_SESSION['u_correo'])) {
    echo 'session exitosa';
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>precomite</title>

        <!-- Favicon-->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
        <link href="assets/css/main.css" rel="stylesheet">
        <!-- Custom Css -->
        <script>
            function cargarHojaExcel()
            {
                if (document.frmcargararchivo.excel.value == "")
                {
                    alert("Suba un archivo");
                    document.frmcargararchivo.excel.focus();
                    return false;
                }

                var ficha = document.getElementById("sltFicha").value;
                document.frmcargararchivo.action = "procesar.php/?ficha=" + ficha;
                document.frmcargararchivo.submit();
            }
        </script>
        <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
        <link rel="icon" href="_IMG/favicon.ico" type="image/x-icon">
    </head>

    <body class="theme-blush">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-blush">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>espera un momento...</p>
            </div>
        </div>
        <!-- #END# Page Loader --> 

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars --> 

        <!-- Morphing Search  -->

        <!-- Top Bar -->
        <nav class="navbar clearHeader">
            <div class="col-12">

                <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a></div>

                <center><a class="navbar-brand" href="menu.php"><h1>Precomite</h1></a></center>
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </nav>
        <section> 
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar"> 
                <!-- User Info -->
                <div class="user-info">
                    <div class="admin-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
                    <div class="admin-action-info"> <span><?php echo $_SESSION['u_correo']; ?></span>
                        <h3>Funcionario</h3>
                        <ul>
                            <li><a data-placement="bottom" title="Cerrar sesion" href="index.php" ><i class="zmdi zmdi-sign-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- #User Info --> 
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">NAVEGACION</li>
                        <li  class="active open"><a href="menu.php"><i class="zmdi zmdi-calendar-check"></i><span>Calendario</span> </a></li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Intructores</span> </a>
                            <ul class="ml-menu">
                                <li><a href="consultar_funcionario.php">Todos los instructores</a></li>
                                <li><a href="registrar_funcionario.php">Añadir instructores</a></li>                       
                            </ul>
                        </li>                
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Aprendices</span> </a>
                            <ul class="ml-menu">
                                <li><a href="consultar_aprendiz.php">Todos los aprendices</a></li>
                                <li><a href="registrar_aprendiz.php">Añadir aprendices</a></li>                       
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-graduation-cap"></i><span>Fichas</span> </a>
                            <ul class="ml-menu">
                                <li><a href="consultar_ficha.php">Todas las fichas</a></li>
                                <li><a href="registrar_ficha.php">añadir ficha</a></li>                       
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Observador</span> </a>
                            <ul class="ml-menu">
                                <li><a href="consultar_observacion.php">Consultar Observaciones</a></li>
                                <li><a href="registrar_observacion.php">Crear observacion</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </aside>
            <!-- #END# Right Sidebar --> 
        </section>
        <div class="color-bg"></div>
        <section class="content">
            <form method="post" action="ControladorAprendiz.php">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>Añadir Aprendices</h2>
                        <small class="text-muted">Bienvenido a precomite</small>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2> Información basica <small>Descripcion...</small> </h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="documento_aprendiz" type="number" class="form-control" placeholder="Documento">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select name="tipodocumento" class="form-control show-tick">
                                                    <option value="">-- Tipo de documento --</option>
                                                    <option>Cédula</option>
                                                    <option>Tarjeta de Identidad</option>
                                                    <option>Cédula de Extrajeria</option>
                                                    <option>Número Ciego SENA</option>
                                                    <option>Pasaporte</option>
                                                    <option>Documento Nacional de Identificación</option>
                                                    <option>Numero de Identificación Tributaria</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="nombres" type="text" class="form-control" placeholder="Nombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="apellidos" type="text" class="form-control" placeholder="Apellidos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="correo" type="email" id="correo" name="correo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="telefono" type="number" class="form-control" placeholder="Telefono">
                                                </div>
                                            </div>
                                        </div>

                                        <select name="estado_aprendiz" hidden>
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                        </select>

                                        <div class="col-md-6 col-sm-12 m-t-15">
                                            Foto
                                            <input name="foto" type="file" class="btn btn-raised g-bg-cyan">
                                        </div>


                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-raised g-bg-cyan btn-block">Guardar</button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <?php
            include 'conexion.php';
            $select = $o->consul_ficha2();
            ?>

            <div class="container-fluid">
                <div class="card">
                    <center>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line g-bg-cyan">
                                    <select id="sltFicha" class="form-control " style="font-size: 110%; color: white;">
                                        <?php foreach ($select as $key => $value) { ?>
                                            <option style="font-size: 110%; color: black;" value="<?= $value["id_ficha"] ?>" ><?= $value["num_ficha"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="header">
                        <div class="tcol">  
                            <div class="fc-toolbar">
                                <div class="fc-center">

                                    <div class="row clearfix ">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form name="frmcargararchivo" method="post" enctype="multipart/form-data">
                                                <div class="dz-message">
                                                    <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                                    <h3>Carga masiva</h3>
                                                    <em>(Selecciona tipo de archivo <strong>.CSV</strong> para añadir.)</em> </div>
                                                <div class="fallback">
                                                    <p><input class="btn btn-raised g-bg-cyan" type="file" name="excel" id="excel" /></p>
                                                    <div class="tcol">  
                                                        <div class="fc-toolbar">
                                                            <div class="fc-center">

                                                                <p><input class="btn btn-raised g-bg-cyan" type="button" value="subir" onclick="cargarHojaExcel();" /></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <em><strong><a href="_IMG/Aprendices.csv" download>Descarga aqui</a></strong> la plantilla!</em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>

        </section>
        <!-- main content -->

        <!-- Jquery Core Js --> 
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 


        <script src="assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
        <script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
        <script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
        <!-- Bootstrap Material Datetime Picker Plugin Js --> 
        <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 

    </body>
</html>