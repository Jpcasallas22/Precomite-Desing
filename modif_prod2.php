<?php

	ModificarAprendiz($_POST['foto'],$_POST['documento_aprendiz'], $_POST['tipodocumento'], $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $_POST['estado_aprendiz'], $_POST['id_aprendiz']);

	function ModificarAprendiz($foto,$documento,$tipo,$nombres,$apellidos,$correo,$telefono,$estado,$id)
	{
        include 'conexion.php';
		$sentencia="UPDATE aprendiz SET foto='".$foto."', documento_aprendiz= '".$documento."', tipodocumento='".$tipo."', nombres= '".$nombres."', apellidos= '".$apellidos."', correo= '".$correo."', telefono= '".$telefono."', estado_aprendiz= '".$estado."' WHERE id_aprendiz='".$id."' ";
		mysqli_query($mysqli, $sentencia) or die (mysqli_error());
	}
?>

<script type="text/javascript">
	alert("Aprendiz Modificado exitosamente");
	window.location.href='consultar_aprendiz.php';
</script>