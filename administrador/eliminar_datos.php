<?php

session_start();

if (isset($_SESSION['registro']) && !empty($_SESSION['registro'])) {

  $usuario = $_SESSION['registro'];

include '../conexion.php';

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);


if($result){
//Mostrar los resultados
    while ($row = $result->fetch_assoc()) { 
      
$path = "assets/img/";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de contenidos</title>
    <!-- CSS BOOTSTRAP 5.2.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../administrador/assets/css/style.css">
    <!--FAVICON -->
    <link rel="shortcut icon" href="../assets/img/Puerto-Madero-hd.png" type="image/x-icon">

    <!--GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>

<!-- common navbar -->
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-5">
                <img src="../assets/img/Puerto-Madero-hd.png" alt="" width="128px">
            </div>
        </div>
    </div>

    <!--volver
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 bg-light">
                <a class="btn btn-primary" href="../index.php" role="button">Volver</a>    
            </div>
        </div>
    </div> -->

    <ul class="nav nav-pills nav-fill p-3">
    
  <li class="nav-item">
    <a class="nav-link" href="sesion_iniciada.php">Cargar Datos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="modificar_datos.php">Modificar Datos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="eliminar_datos.php">Eliminar Datos</a>
  </li>

	<?php 
		if ($row['rol'] == "administrador") { 
	?>
	<!-- front end si es administrador -->
	<li class="nav-item dropdown">
    	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
          Configuración de sistema
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-center" href="./agregarUsuarios.php">Agregar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="./modificarUsuarios.php">Modificar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="./eliminarUsuarios.php">Eliminar usuarios</a></li>
        </ul>
    </li>
	<?php
	} else { 
	?>
	<!-- front end si no es administrador -->
	<li class="nav-item dropdown">
    	<a class="nav-link dropdown-toggle disabled" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
          Configuración de sistema
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-center" href="./agregarUsuarios.php">Agregar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="./modificarUsuarios.php">Modificar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="./eliminarUsuarios.php">Eliminar usuarios</a></li>
        </ul>
    </li>
	<?php 
	}
  	?>
  <li class="nav-item">
    <a class="nav-link" href="contraseña.php">Cambiar Contraseña</a>
  </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <?php 
              if ($usuario) {
                echo "Usuario: " .$row['usuario'];
            }
          ?>
        </a>
        <ul class="dropdown-menu">
            <!--<li><a class="dropdown-item text-center text-bold" href="#"></li>-->
            <li><a class="dropdown-item text-center" href="#"><img class="rounded" src="<?= $path.$row['foto']?>" alt="" width="64px" height="64px"></a></li>
            <li><a class="dropdown-item text-center" href="#"><?= $row['nombre']." ".$row['apellido']?></a></li>
            <li><a class="dropdown-item text-center" href="#">Rol: <?= $row['rol']?></a></li>
            <li><a class="dropdown-item text-center" href="ajustes.php">Ajustes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-center" href="logout.php">Salir</a></li>
        </ul>
    </li>
</ul>
<br />

    <!--Finished common navbar -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="text-center p-3">Eliminación de Datos</h2>
		</div>
	</div>
</div>

    <?php 

    include '../conexion.php';

    $sqls = "SELECT * FROM alumnos";
    $results = $conn->query($sqls);
	?>

    <!-- Table  -->
    <table class="table container">
  		<thead>
    		<tr>
			<th scope="col">#</th>
      			<th scope="col">Nombres</th>
      			<th scope="col">Cédula</th>
     	 		<th scope="col">Curso</th>
      			<th scope="col">Fecha</th>
      			<th scope="col">Nombre del Archivo</th>
      			<th scope="col">Ruta Archivo</th>
    		</tr>
  		</thead>
  		<tbody>
		<?php 
		while ($rows = $results->fetch_assoc()){ ?>
    		<tr>
				<td><?= $rows['id'] ?></th>
      			<td><?= $rows['nombres'] ?></th>
      			<td><?= $rows['cedula'] ?></td>
      			<td><?= $rows['curso'] ?></td>
      			<td><?= $rows['fecha'] ?></td>
      			<td><?= $rows['nombre_archivo'] ?></td>
      			<td><?= $rows['ruta_archivo'] ?></td>
				<td>
              		<a class="btn btn-primary" href="confirm_eliminar_datos.php?id=<?= $rows['id']?>">Eliminar</a>
            	</td>
                <!--<td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Eliminar
                    </button>
                </td>-->
			</tr>
			<?php } ?>
  		</tbody>
    </table>

<!-- modal eliminación datos -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminación de datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro que quieres eliminar esa fila?
      </div>
      <form action="" method="POST">
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="submit_si">Sí</button>
      </div>
      </form>
    </div>
  </div>
</div>-->

<?php

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //$submit = $_POST['submit_si'];
    $id = $_POST['id'];
       
    include '../conexion.php';

    // Validar y limpiar el ID para evitar SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "DELETE FROM alumnos WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
            echo '<script>
            alert("Se ha realizado la eliminación correspondiente. Desde ya, muchas gracias.");
            window.location.href = "sesion_iniciada.php";
            </script>';
    } else {
            echo '<script>
            alert("No se ha realizado la eliminación correspondiente. Intentelo de nuevo.");
            window.location.href = "eliminar_datos.php";
            </script>';
    }
}*/

?>

<?php 
		}
    }
}
?>



<?php 
include '../footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>





    <!-- Table -->
