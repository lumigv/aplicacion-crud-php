<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta trabajador</title>
</head>

<body>
<div>
	<header>
		<h1>Panel de Control</h1>
	</header>

	<main>

<?php
include_once("config.php");

if(isset($_POST['inserta'])) 
{
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);

	if(empty($name) || empty($age) || empty($surname)) 
	{
		if(empty($name)) {
			echo "<div>Campo nombre vacío.</div>";
		}

		if(empty($surname)) {
			echo "<div>Campo apellido vacío</div>";
		}

		if(empty($age)) {
			echo "<div>Campo edad vacío.</div>";
		}

		echo "<a href='javascript:self.history.back();'>Volver atras</a>";
	} //fin si
	else 
	{
		$stmt = mysqli_prepare($mysqli, "INSERT INTO users (name,surname,age) VALUES(?,?,?)");
		mysqli_stmt_bind_param($stmt, "ssi", $name, $surname, $age);
		mysqli_stmt_execute( $stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);
		echo "<div>Datos añadidos correctamente</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}//fin sino
}

//Cierra la conexión
mysqli_close($mysqli);
?>

	</main>
	<footer>
    Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>
