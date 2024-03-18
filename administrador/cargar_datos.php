<?php

$nomApe_cargar = $_POST['nombres'];
$curso_cargar = $_POST['curso'];
$cedula_cargar = $_POST['cedula'];
$fecha_cargar = $_POST['fecha'];

// Detalle del archivo
$nombreArchivo = $_FILES['archivo']['name'];
$tipoArchivo = $_FILES['archivo']['type'];
$rutaTemporal = $_FILES['archivo']['tmp_name'];

//mover el archivo al servidor (directorio archivos)
$directorioDestino = 'assets/archivos/';
$rutaDestino = $directorioDestino . $nombreArchivo;

move_uploaded_file($rutaTemporal, $rutaDestino);

include '../conexion.php';

$sql = "INSERT INTO alumnos (nombres, curso, cedula, fecha, nombre_archivo, ruta_archivo) VALUES 
('$nomApe_cargar', '$curso_cargar', '$cedula_cargar', '$fecha_cargar', '$nombreArchivo', '$rutaDestino')";
$result = $conn->query($sql);

if ($result) {
    echo '<script>
    alert("Se han cargado los datos exitosamente. Muchas gracias.");
    window.location.href = "sesion_iniciada.php";
    </script>';
}

?>