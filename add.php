<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Alta trabajador</title>
<!--	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
-->	
</head>

<body>
<!--	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
-->
<div>
	<header>
		<h1>Panel de Control</h1>
	</header>

	<main>

<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de altas. 
En este caso comprueba la información "inserta" procedente del botón Agregar del formulario de altas
Transacción de datos utilizando el método: POST
*/
<?php
// Verificar si se ha enviado el formulario
if(isset($_POST['inserta'])) {
    // Conexión a la base de datos
    $mysqli = mysqli_connect("host", "usuario", "contraseña", "basededatos");

    // Verificar la conexión
    if($mysqli === false){
        die("ERROR: No se pudo conectar. " . mysqli_connect_error());
    }

    // Escapar las variables del formulario para evitar la inyección SQL
    $equipo = mysqli_real_escape_string($mysqli, $_POST['equipo']);
    $jugador = mysqli_real_escape_string($mysqli, $_POST['jugador']);
    $puntos = mysqli_real_escape_string($mysqli, $_POST['puntos']);
    $asistencias = mysqli_real_escape_string($mysqli, $_POST['asistencias']);
    $rebotes = mysqli_real_escape_string($mysqli, $_POST['rebotes']);

    // Validar que los campos no estén vacíos
    if(empty($equipo) || empty($jugador) || empty($puntos) || empty($asistencias) || empty($rebotes)) {
        echo "<div>Por favor, complete todos los campos.</div>";
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    } else {
        // Preparar la sentencia SQL
        $stmt = mysqli_prepare($mysqli, "INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES (?, ?, ?, ?, ?)");

        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "ssiii", $equipo, $jugador, $puntos, $asistencias, $rebotes);

        // Ejecutar la consulta
        if(mysqli_stmt_execute($stmt)) {
            echo "<div>Datos añadidos correctamente</div>";
            echo "<a href='index.php'>Ver resultados</a>";
        } else {
            echo "ERROR: No se pudo ejecutar la consulta.";
        }

        // Liberar la memoria
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
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
