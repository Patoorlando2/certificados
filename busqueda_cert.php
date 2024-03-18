<?php 

include 'conexion.php';

//Obtener datos del formulario
$cedula = $_POST['cedula'];
/*$fecha = $_POST['fecha'];*/

//Consulta SQL para buscar en la base de datos
$sql = "SELECT * FROM busqueda_cert WHERE cedula = '$cedula' AND fecha = '$fecha'";
$result = $conn->query($sql);

//Mostrar resultados en una tabla
if ($result->num_rows > 0) {
    echo "<h2> Resultados de la búsqueda: </h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Cédula</th><th>Fecha</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["nombre y apellido"]."</td>";
        echo "<td>".$row["cedula"]."</td>";
        echo "<td>".$row["fecha"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No se encontraron resultados para la búsqueda.</p>";
}
$conn->close();

?>