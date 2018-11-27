<?php
include 'conexion.php';
$documento_aprendiz = $_GET['documento_aprendiz'];
$c = new conexion();
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
        <!--Side menu and right menu -->

        <!-- main content -->
        <section class="content page-calendar ">
            <div class="container-fluid">

                <!--                    <form action="consultar_observacion.php" method="post">
                                        <div class="card m-t-15">
                                            <div class="body">
                                                <div class="tcol">  
                                                    <div class="fc-toolbar">
                                                        <div class="fc-center">
                                                            <label for="codigo" >Codigo estudiante</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo"></div></div>
                                                            <input type="submit" name="consultar" value="buscar" class="btn btn-raised g-bg-cyan"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>-->
                <?php
                $consulta = $c->MostrarObservacion($documento_aprendiz);
                ?>
            </div>
            <div class="container-fluid">

                <div >
                    <div class="">
                        <div class="card m-t-15">

                            <div class="body">
                                <div class="tcol">  
                                    <div class="fc-toolbar">
                                        <div class="fc-center">
                                            <h2>Consultar observaciones</h2>              
                                        </div>
                                        <div class="fc-clear"></div>
                                    </div>
                                    <div class="fc-view-container">
                                        <div class="fc-view fc-month-view fc-basic-view">

                                            <table id="mytable" class="table table-hover">
                                                <thead class="g-bg-cyan text-white">
                                                <th scope="col">Documento Aprendiz</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Archivo Adjunto</th>
                                                <th scope="col">Fecha De Observación</th>
                                                <th scope="col">Documento funcionario</th>
                                                <th scope="col">Nombre funcionario</th>
                                                </thead>
                                                <tbody class="fc-body">
                                                    <tr>
                                                        <?php
                                                        foreach ($consulta as $filas):
                                                            $validacion = $filas["adjunto"]
                                                            ?>
                                                            <td> <?php echo $filas["documento_aprendiz"] ?></td>
                                                            <td> <?php echo $filas["nombrecategoria"] ?> </td>
                                                            <td> <?php echo $filas["descripcion"] ?></td>
                                                          <?php if ($validacion == "") { ?> 
                                                                <td>No Hay Archivo Adjunto</td>
                                                                <?php } else{ ?>
                                                                <td> <?php echo $validacion; }?></td>
                                                           
                                                            <td> <?php echo $filas["fecha"] ?></td>
                                                            <td> <?php echo $filas["documento_funcionario"] ?></td>
                                                            <td> <?php echo $filas["NombreCompleto"] ?></td>
                                                        </tr>  
                                                        <?php
                                                    endforeach;
                                                    ?>
                                            </table>
                                            <a href='consultar_observacion.php'><button class="btn btn-raised g-bg-blush2">Volver a consultar</button></a>

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

        <div class="color-bg"></div>
        <!-- Jquery Core Js --> 
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

        <script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
        <script src="assets/js/pages/calendar/calendar.js"></script>

    </body>
</html>