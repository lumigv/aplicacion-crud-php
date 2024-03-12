<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM NBA_Stats ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Panel de control</title>
</head>
<body>
<div>
    <header>
        <h1>Panel de Control</h1>
    </header>

    <main>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Listado de trabajador@s</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Equipo</th>
            <th>Jugador</th>
            <th>Puntos</th>
            <th>Asistencias</th>
            <th>Rebotes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>\n";
        echo "<td>".$res['Equipo']."</td>\n";
        echo "<td>".$res['Jugador']."</td>\n";
        echo "<td>".$res['Puntos']."</td>\n";
        echo "<td>".$res['Asistencias']."</td>\n";
        echo "<td>".$res['Rebotes']."</td>\n";
        echo "<td>";
        echo "<a href=\"edit.php?id=$res[id]\">Editar</a>\n";
        echo "<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\" >Eliminar</a></td>\n";
        echo "</td>";
        echo "</tr>\n";
    }

    mysqli_close($mysqli);
?>
    </tbody>
    </table>
    </main>
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
