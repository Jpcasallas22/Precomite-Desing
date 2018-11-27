<?php

include("conexion.php");
$ficha= $_GET["ficha"];
$cn = Conexion();
if (substr($_FILES['excel']['name'], -3) == "csv") {
    $fecha = date("Y-m-d");
    $carpeta = "tmp_excel/";
    $excel = $fecha . "-" . $_FILES['excel']['name'];

    move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");

    $row = 1;

    $fp = fopen("$carpeta$excel", "r");

    //fgetcsv. obtiene los valores que estan en el csv y los extrae.

    while ($data = fgetcsv($fp, 1000, ";")) {
        //si la linea es igual a 1 no guardamos por que serian los titulos de la hoja del excel.
        if ($row != 1) {
           
            $num = count($data);
            $insertar = "INSERT INTO aprendiz (documento_aprendiz,tipodocumento,nombres,apellidos,correo,telefono,foto,estado_aprendiz) 
						   VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]');";
            $sql = $mysqli->query($insertar);
                $id=$mysqli->insert_id;
            
           $insertar = "INSERT INTO ficha_aprendiz VALUES (null,$id,$ficha,CURRENT_DATE,null);";
        $sql = $mysqli->query($insertar);
  
    }
            $row++;
           
    }
  echo'<script type="text/javascript">
        alert("La importacion de archivo subio satisfactoriamente");
        window.location.href="registrar_aprendiz.php";
       </script>';
     exit;
} else {
 echo'<script type="text/javascript">
     window.location.href="registrar_aprendiz.php";
     </script>';
    exit;
}
    
    fclose($fp);
    echo'<script type="text/javascript">
     window.location.href="registrar_aprendiz.php";
     </script>';
    
?>