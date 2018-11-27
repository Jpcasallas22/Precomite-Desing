
<?php

	ModificarAprendiz($_POST['documento_funcionario'], $_POST['tipodocumento'], $_POST['nombres'], $_POST['apellidos'], $_POST['telefono'], $_POST['estado'], $_POST['correo'], $_POST['rol_fk'], $_POST['pass'], $_POST['id_funcionario']);

	function ModificarAprendiz($documento,$tipo,$nombres,$apellidos,$telefono,$estado,$correo,$rol,$pass,$id)
	{
        include 'conexion.php';
		$sentencia="UPDATE funcionario SET  documento_funcionario= '".$documento."', tipodocumento='".$tipo."', nombres= '".$nombres."', apellidos= '".$apellidos."', telefono= '".$telefono."', estado= '".$estado."', correo= '".$correo."', rol_fk= '".$rol."', pass= '".$pass."' WHERE id_funcionario='".$id."' ";
		mysqli_query($mysqli, $sentencia) or die (mysqli_error());
	}
?>

<script type="text/javascript">
	alert("Funcionario Modificado exitosamente");
	window.location.href='consultar_funcionario.php';
</script>