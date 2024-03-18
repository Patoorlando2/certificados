<?php 

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$cedula = $_POST['cedula'];
$curso = $_POST['curso'];
$fecha = $_POST['fecha'];


include '../conexion.php';

$sql = "UPDATE alumnos SET nombres = '$nombres', cedula = '$cedula', curso = '$curso' WHERE id = '$id'";
$result = $conn->query($sql);
// Redirigir de nuevo al formulario con un mensaje
if ($result) {
    echo '<script> 
        alert("Se ha realizado la modificación exitosamente. Muchas gracias.");
        window.location.href = " sesion_iniciada.php";
    </script>';
} else {
// Si intentan acceder directamente a este archivo sin enviar datos por POST, redirige al formulario
header("Location: modificar.php");
}


?>