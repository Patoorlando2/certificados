<?php

$nombre_sys = $_POST['nombre'];
$apellido_sys = $_POST['apellido'];
$email_sys = $_POST['email'];
$tel_sys = $_POST['tel'];
$rol_sys = $_POST['rol'];
$usuario_sys = $_POST['usuario'];
$password_sys = $_POST['password'];


// Detalle de la foto
$nombreFoto = $_FILES['foto']['name'];
$tipoFoto = $_FILES['foto']['type'];
$rutaTemporal = $_FILES['foto']['tmp_name'];

//mover el archivo al servidor (directorio archivos)
$directorioDestino = './';
$rutaDestino = $directorioDestino . $nombreFoto;

move_uploaded_file($rutaTemporal, $rutaDestino);

include '../conexion.php';

$sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, rol, usuario, password, foto) VALUES (
    '$nombre_sys', '$apellido_sys', '$email_sys', '$tel_sys', '$rol_sys', '$usuario_sys', '$password_sys', 
    '$nombreFoto')";

$result = $conn->query($sql);

if ($result) {
    echo '<script>
            alert("Se han cargado los datos exitosamente. Muchas gracias.");
            window.location.href = "sesion_iniciada.php";
        </script>';
} else {
    echo '<script>
            alert("No se han cargado los datos. Intentelo de nuevo.");
            window.location.href = "agregarUsuarios.php";
        </script>';
}

?>