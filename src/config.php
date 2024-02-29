<?php

define('DB_HOST', 'mariadb');
define('DB_NAME', 'crud_db');
define('DB_USER', 'crud_user');
define('DB_PASSWORD', 'crud_password');



$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    printf('Falló la conexión: %s\n', mysqli_connect_error());
    exit();
}

?>
