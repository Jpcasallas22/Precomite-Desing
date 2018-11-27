<?php
include 'conexion.php';
$c = new conexion;
$arreglocategoria = $c->combocategoria();
$arregloaprendiz = $c->comboaprendiz();
$arrelgofunci = $c->combofunci();
$arregloficha = $c->comboficha();
?>
<?php
session_start();
if(isset($_SESSION['u_correo'])){
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
        <link rel="icon" href="_IMG/favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
        <link href="assets/css/main.css" rel="stylesheet">
        <!-- Custom Css -->


        <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-blush">
<!--         Page Loader 
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
         #END# Page Loader  -->

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
            <form method="post" action="ControladorObservacion.php">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>Añadir Observacion</h2>
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
                                            <div class="form-group drop-custum">
                                                <select name="categoria_fk" class="form-control show-tick">
                                                    <option value="">Seleccione la categoria</option>
                                                    <?php
                                                    foreach ($arreglocategoria as $index => $categoria):

                                                        echo "<option value=" . $categoria["id_categoria"] . ">" . $categoria["id_categoria"] . " - " . $categoria["nombrecategoria"] . "</option>";

                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="descripcion" type="" class="form-control" placeholder="Descripcion"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">Fecha y hora
                                                    <input name="fecha" type="date" class="datepicker form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select name="ficha_fk" class="form-control show-tick">
                                                    <option value="">Seleccione la ficha</option>
                                                    <?php
                                                    foreach ($arregloficha as $index => $ficha):

                                                        echo "<option value=" . $ficha["id_ficha"] . ">" . $ficha["id_ficha"] . " - " . $ficha["num_ficha"] . " - " . $ficha["nombre_programa"] . "</option>";

                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select name="id_documento_aprendiz_fk" class="form-control show-tick">
                                                    <option value="">Seleccione el aprendiz</option>
                                                    <?php
                                                    foreach ($arregloaprendiz as $index => $aprendiz):

                                                        echo "<option value=" . $aprendiz["id_aprendiz"] . ">" . $aprendiz["nombres"] . " - " . $aprendiz["apellidos"] . "</option>";

                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select name="id_documento_funcionario_fk" class="form-control show-tick">
                                                    <option value="">Seleccione la funcionario</option>
                                                    <?php
                                                    foreach ($arrelgofunci as $index => $funcionario):

                                                        echo "<option value='" . $funcionario["id_funcionario"] . ">" . $funcionario["id_funcionario"] . " - " . $funcionario["nombres"] . " - " . $funcionario["apellidos"] . " - " . $funcionario["nombre"] . "</option>";

                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="gravedad_observacion"  type="number" class="form-control" placeholder="Gravedad de la observación">
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                Evidencia
                                                <Button class="btn btn-raised g-bg-cyan">Seleccionar archivo</Button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-raised g-bg-cyan btn-block">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </form>
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