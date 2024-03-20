<?php

$id = $_POST['id'];

if (isset($_POST['confirmar_baja'])) {


    include '../conexion.php';

    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    $result = $conn->query($sql);

    // Redirigir de nuevo al formulario con un mensaje
    if ($result) {
        echo '<script> 
            alert("Se ha realizado la eliminación exitosamente. Muchas gracias.");
            window.location.href = "sesion_iniciada.php";
        </script>';
    } else {
    // Si intentan acceder directamente a este archivo sin enviar datos por POST, redirige al formulario
    header("Location: eliminar_usuarios.php");
    }
}
?>


