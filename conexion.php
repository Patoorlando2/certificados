<?php

// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = /*"u751774212_u751774212"*/"root"/*"zyyxjrhd_programador"*/;
$password = /*"i3-7100U"*//*"Programador1998!"*/"";
$dbname = /*"u751774212_paginaPersonal"*//*"zyyxjrhd_programador"*/"certificados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>