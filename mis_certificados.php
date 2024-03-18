<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificados Digitales</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/Puerto-Madero-hd.png" type="image/x-icon">

</head>
<body>
<?php 
include 'navbar.php';
?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 style="padding:10px;">Búsqueda de certificados</h2>
        </div>
    </div>
</div>

<div class="container" style="border:1px solid grey; border-radius:30px;">
    <div class="row">
        <div class="col-lg-12" style="padding:50px;">

            <div class="container">
                <div class="row" >
                    <form action="#" method="POST">

                        <div class="col-lg-8">
                            <label class="form-label">Cédula</label>
                            <input type="number" class="form-control" placeholder="Cédula" name="cedula">
                        </div>

                        <!--<div class="col-lg-4">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" placeholder="Fecha" name="fecha">
                        </div>-->

                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary" style="margin-top:20px;margin-left:80px;">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<br />
<br />

<!-- busqueda_cert.php -->
<?php 

include 'conexion.php';

//Obtener datos del formulario
@$cedula = $_POST['cedula'];
/*@$fecha = $_POST['fecha'];*/

//Consulta SQL para buscar en la base de datos
$sql = "SELECT * FROM busqueda_cert WHERE cedula = '$cedula'";
$result = $conn->query($sql);


$ruta = "assets/certificados/";

//Mostrar resultados en una tabla
if ($result->num_rows > 0) {?>
   
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-stripped">
                        <tbody>
                            <tr>
                                <td><b>Nombre y Apellido</b></td>
                                <td><b>Curso</b></td>
                                <td><b>Fecha</b></td>
                            </tr>

                            <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["nombres"] ?></td>
                                <td><?= $row["curso"] ?></td>
                                <td><?= $row["fecha"]?></td>
                                <td><a href="<?= $ruta.$row["nombre_archivo"] ?>" class="btn btn-primary" download>Descargar</a></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
<?php
} /*else {
    echo "<p>No se encontraron resultados para la búsqueda.</p>";
}*/
$conn->close();

?>
<!-- busqueda_cert.php -->

    

<?php 
include 'footer.php';
?>



<script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="assets/js/script.js"></script>    
</body>
</html>