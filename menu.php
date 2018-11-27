
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
<section class="content page-calendar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="card m-t-15">
                    <div class="body">
                        <button type="button" class="btn btn-raised btn-primary btn-sm m-t-0" data-toggle="modal" href="#cal-new-event"> <i class="zmdi zmdi-plus"></i> Events</button>
                        <button class="btn btn-sm btn-default hidden-lg-up m-t-0 float-right" data-toggle="collapse" data-target="#open-chats" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-chevron-down"></i></button>
                        <div class="collapse-xs collapse-sm collapse" id="open-chats">
                            <div class="event-name b-greensea"> The Custom Event #1 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-lightred"> The Custom Event #2 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-amethyst"> The Custom Event #3 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-amethyst"> The Custom Event #4 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #5 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-lightred"> The Custom Event #6 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-greensea"> The Custom Event #7 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #8 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-success"> The Custom Event #9 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>
                            <div class="event-name b-primary"> The Custom Event #10 <a class=" text-muted event-remove"><i class="zmdi zmdi-delete"></i></a> </div>                
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="card m-t-15">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <h4 class="custom-font text-default m-0">Events Schedule</h4>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12 text-right">
                                <div class="btn-group">
                                    <button class="btn btn-raised btn-success btn-sm" id="change-view-today">today</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-day" >Day</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-week">Week</button>
                                    <button class="btn btn-raised btn-default btn-sm" id="change-view-month">Month</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="tcol">                       
                            <div id="calendar"></div>                       
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

