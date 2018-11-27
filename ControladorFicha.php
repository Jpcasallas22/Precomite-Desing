<?php
include 'conexion.php';

$o->insert_ficha( $_POST["num_ficha"], $_POST["programa_fk"], $_POST["inicio_ficha"], $_POST["final_ficha"],$_POST["estadoficha"]);









   


if (!$o){
     echo'<script type="text/javascript">
        alert("Ficha No fue registrada correctamente");
        window.location.href="registrar_ficha.php";
        </script>';  
    
}else {
     echo'<script type="text/javascript">
        alert("Ficha registrada correctamente");
        window.location.href="registrar_ficha.php";
        </script>';
    
  
}