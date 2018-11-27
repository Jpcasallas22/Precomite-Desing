<?php
include 'conexion.php';

$o->insert_aprendiz( $_POST["documento_aprendiz"], $_POST["tipodocumento"], $_POST["nombres"], $_POST["apellidos"], $_POST["correo"], $_POST["telefono"], $_POST["foto"], $_POST["estado_aprendiz"]);
if (!$o){  
    
    echo'<script type="text/javascript">
        alert("Aprendiz No fue registrado");
        window.location.href="registrar_aprendiz.php";
        </script>';
    
}else{
    echo'<script type="text/javascript">
        alert("Aprendiz registrado correctamente");
        window.location.href="registrar_aprendiz.php";
        </script>';
   }

