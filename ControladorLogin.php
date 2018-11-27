<?php

session_start();

$correo = $_POST['correo'];
$pass = md5($_POST['pass']);

include 'conexion.php';

$proceso = $mysqli->query("SELECT nombres,correo,pass FROM funcionario WHERE correo = '$correo' and pass= '$pass'");
if ($resultado = mysqli_fetch_all($proceso)){
    $_SESSION['u_correo'] = $correo;
   
    echo'<script type="text/javascript">
        alert("Bienvenido!");
        window.location.href="menu.php";
        </script>';  
}else{
    echo'<script type="text/javascript">
        alert("Usuario/Contraseña incorrectos!");
        window.location.href="login.php";
        </script>';  


}
