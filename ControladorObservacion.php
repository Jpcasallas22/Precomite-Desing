<?php
include 'conexion.php';
$o->insert_observacion( $_POST["categoria_fk"], $_POST["descripcion"], $_POST["adjunto"], $_POST["fecha"], $_POST["ficha_fk"], $_POST["id_documento_aprendiz_fk"], $_POST["id_documento_funcionario_fk"], $_POST["gravedad_observacion"]);
if (!$o){
    echo'<script type="text/javascript">
        alert("Observacion No fue registrada.");
        window.location.href="registrar_observacion.php";
        </script>';
    
}else {
    echo'<script type="text/javascript">
        alert("Observacion registrada correctamente.");
        window.location.href="registrar_observacion.php";
        </script>';  
}

