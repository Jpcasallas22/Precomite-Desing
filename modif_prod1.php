
<?php
session_start();
if (isset($_SESSION['u_correo'])) {
    echo 'session exitosa';
} else {
    header("Location: login.php");
}
?>
<?php
$consulta = Consultaraprendiz($_GET['id_aprendiz']);

function Consultaraprendiz($id_aprendiz) {
    include 'conexion.php';
    $sql = "SELECT * FROM aprendiz WHERE id_aprendiz ='" . $id_aprendiz . "' ";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error());
    $filas = mysqli_fetch_assoc($result);
    return [
        $filas['foto'],
        $filas['documento_aprendiz'],
        $filas['tipodocumento'],
        $filas['nombres'],
        $filas['apellidos'],
        $filas['correo'],
        $filas['telefono'],
        $filas['estado_aprendiz']
    ];
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
            <form action="modif_prod2.php" method="POST">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>Editar Aprendices</h2>
                        <small class="text-muted">Bienvenido a precomite</small>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2> Información basica <small>Descripcion...</small> </h2>
                                </div>
                                <div class="body">
                                    <input type="hidden" id="id_aprendiz" name="id_aprendiz" value="<?php echo $_GET['id_aprendiz'] ?> ">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Documento" type="number" id="documento_aprendiz" name="documento_aprendiz" value="<?php echo $consulta[1] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" type="text" id="tipo_documento" name="tipodocumento" value="<?php echo $consulta[2] ?>">
                                                    <option value="Cédula">-- Tipo de documento --</option>
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
                                                    <input class="form-control" placeholder="Nombres" type="text" id="nombres" name="nombres" value="<?php echo $consulta[3] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Apellidos" type="text" id="apellidos" name="apellidos" value="<?php echo $consulta[4] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Correo" type="text" id="correo" name="correo" value="<?php echo $consulta[5] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input  type="number" class="form-control" placeholder="Telefono" id="telefono" name="telefono" value="<?php echo $consulta[6] ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group drop-custum">
                                                <select class="form-control show-tick" type="text" id="estado_aprendiz" name="estado_aprendiz" value="<?php echo $consulta[7] ?>">
                                                    <option value="Activo">-- Estado --</option>
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                             
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 m-t-15">
                                            Foto
                                            <input type="file" id="foto" name="foto" value="<?php echo $consulta[0] ?>"  class="btn btn-raised g-bg-cyan">
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-raised g-bg-cyan">Guardar</button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </section>
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