<?php
session_start();
require_once 'other.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV XML</title>
</head>
<body>
    <form method="post" action='index.php' enctype="multipart/form-data">
		<label for="archivo">Selecciona un archivo:</label>
		<input type="file" name="archivo" id="archivo" required><br>
		<label></label>Nombre de Fichero de Salida<br>
		<input type="text" name="salida" placeholder="Introduce el nombre del fichero de salida" required/><br>
		<input type="submit" value="Subir archivo">
	</form>

    <?php
    // Comprobar si se ha enviado el formulario
	if(isset($_FILES['archivo'])) {
		// Obtener el nombre del archivo seleccionado
		$nombre_archivo = $_FILES['archivo']['name'];
		//echo "El archivo seleccionado es: $nombre_archivo";
		$salida = $_POST['salida'];
		//echo "Nombre de fichero de salida : ".$salida;
		metodoCSVXML2($nombre_archivo,$salida);

	}
    ?>
    
</body>
</html>