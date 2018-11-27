
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

                    <div class="card m-t-15">
                        <div class="body">
                            <div class="tcol">  
                                <div class="fc-toolbar">
                                    <!--friltros-->
                                    <center>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                                <div class="form-line ">
                                                    <input type="text" class="form-control" style="font-size: 150%;" id="search" placeholder="Ingresa Documento, Nombre u otros datos para buscar en la tabla...">
                                                </div>
                                            </div></div>
                                    </center>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                    <script>
                                        // Write on keyup event of keyword input element
                                        $(document).ready(function () {
                                            $("#search").keyup(function () {
                                                _this = this;
                                                // Show only matching TR, hide rest of them
                                                $.each($("#mytable tbody tr"), function () {
                                                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                                                        $(this).hide();
                                                    else
                                                        $(this).show();
                                                });
                                            });
                                        });
                                    </script>
                                    <!--------------------------------------------------->
                                    <table id="mytable" class="table table-hover">
                                        <thead class="g-bg-cyan text-white">
                                        <th>Documento</th>
                                        <th>Tipo de documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Estado</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Modificar</th>
                                        </thead>
                                        <tbody> 
                                            <?php
                                            include "conexion.php";
                                            $sql = "";
                                            $result = mysqli_query($mysqli, $sql);

                                            if ($result) {
                                                while ($filas = mysqli_fetch_assoc($result)) {
                                                    echo "<tr >";
                                                    echo "<td>";
                                                    echo $filas['documento_funcionario'];
                                                    echo "</td>";
                                                    echo "<td >";
                                                    echo $filas['tipodocumento'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['nombres'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['apellidos'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['telefono'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['estado'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['correo'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo $filas['rol'];
                                                    echo "</td>";
                                                    echo "<td >  <a href='modif_fun1.php?id_funcionario=" . $filas['id_funcionario'] . "'> <button type='button' style='cursor:pointer;' class=' g-bg-cyan text-white   btn-block '>✎</button></a></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </section>

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