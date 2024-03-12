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

    // Cerrar la conexión
    mysqli_close($mysqli);
}

$id = mysqli_real_escape_string($mysqli, $_GET['id']);
$stmt = mysqli_prepare($mysqli, "SELECT Equipo, Jugador, Puntos, Asistencias, Rebotes FROM NBA_Stats WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $equipo, $jugador, $puntos, $asistencias, $rebotes);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta jugador NBA</title>
</head>
    
<body>
<div>
    <header>
        <h1>Panel de control</h1>
    </header>
    <main>                
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Alta jugador NBA</h2>

    <form action="add.php" method="post">
        <div>
            <label for="equipo">Equipo</label>
            <input type="text" name="equipo" id="equipo" placeholder="equipo" required>
        </div>

        <div>
            <label for="jugador">Jugador</label>
            <input type="text" name="jugador" id="jugador" placeholder="jugador" required>
        </div>

        <div>
            <label for="puntos">Puntos</label>
            <input type="number" name="puntos" id="puntos" placeholder="puntos" required>
        </div>

        <div>
            <label for="asistencias">Asistencias</label>
            <input type="number" name="asistencias" id="asistencias" placeholder="asistencias" required>
        </div>

        <div>
            <label for="rebotes">Rebotes</label>
            <input type="number" name="rebotes" id="rebotes" placeholder="rebotes" required>
        </div>

        <div>
            <input type="submit" name="inserta" value="Agregar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </div>
    </form>
    
    </main>    
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
