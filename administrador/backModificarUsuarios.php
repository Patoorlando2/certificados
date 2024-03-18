<?php

$id_usuario = $_POST['id_usuario_m'];
$nombre = $_POST['nombre_modify'];
$apellido = $_POST['apellido_modify'];
$email = $_POST['email_modify'];
$tel = $_POST['tel_modify'];
$rol = $_POST['rol_modify'];
$usuario = $_POST['usuario_modify'];
$password = $_POST['password_modify'];
//$foto = $_POST['foto'];

// Detalle de la foto
$nombreFoto = $_FILES['foto_modify']['name'];
$tipoFoto = $_FILES['foto_modify']['type'];
$rutaTemporal = $_FILES['foto_modify']['tmp_name'];

//mover el archivo al servidor (directorio archivos)
$directorioDestino = 'assets/img/';
$rutaDestino = $directorioDestino . $nombreFoto;

move_uploaded_file($rutaTemporal, $rutaDestino);

include "../conexion.php";

$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$tel', 
        rol = '$rol', usuario = '$usuario', password = '$password', foto = '$nombreFoto' 
        WHERE id = '$id_usuario'"; 

$result = $conn->query($sql);
 
if ($result) {
    //echo "Datos actualizados correctamente";
    echo '<script>
            alert("Datos actualizados correctamente. Muchas gracias.");
            window.location.href = "sesion_iniciada.php";
        </script>';
} else {
    //echo "Error al actualizar los datos: " . $conn->error;
    echo '<script>
            alert("Error al actualizar los datos.Intentelo de nuevo.");
            window.location.href = "modificarUsuarios.php";
        </script>';
}

?>