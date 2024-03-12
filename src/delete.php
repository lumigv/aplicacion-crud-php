<?php
include("config.php");

$id = $_GET['id'];

$stmt = mysqli_prepare($mysqli, "DELETE FROM NBA_Stats WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);

header("Location:index.php");
?>