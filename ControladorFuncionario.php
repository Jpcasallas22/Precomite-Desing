<?php

include 'conexion.php';
$ejecutar = $o;
$Documento=$_POST["documento_funcionario"]; 

if (!$ejecutar->insert_funcionario($Documento, $_POST["tipodocumento"], $_POST["nombres"], $_POST["apellidos"], $_POST["telefono"], $_POST["estado"], $_POST["correo"], $_POST["rol_fk"])) {
     
 echo'<script type="text/javascript">
        alert("Funcionario '.$Documento.' fue registrado");
        window.location.href="registrar_funcionario.php";
        </script>';
    
}else{
    echo'<script type="text/javascript">
        alert("Funcionario NO registrado correctamente");
        window.location.href="registrar_funcionario.php";
        </script>';
   }



?>