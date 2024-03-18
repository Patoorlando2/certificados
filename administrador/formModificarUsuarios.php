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

if ($row['rol'] !== 'administrador') {
	echo '<script>
	alert("Al no tener un rol de administrador, configuración de sistema está deshabilitado.");
	</script>';
}
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
    <!-- Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../administrador/assets/css/style.css">
    <!--FAVICON -->
    <link rel="shortcut icon" href="../assets/img/Puerto-Madero-hd.png" type="image/x-icon">
    <!--GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 p-5">
            <img src="../assets/img/Puerto-Madero-hd.png" alt="" width="128px">
        </div>
    </div>
</div>


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
    <!--<li class="nav-item dropdown">
    	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
          Configuración de sistema
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-center" href="#">Agregar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="#">Modificar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="#">Eliminar usuarios</a></li>
        </ul>
    </li>-->
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



<?php 

include "../conexion.php";

$id_usuario = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
$result = $conn->query($sql);
// Si existe fila
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $email = $row['email'];
    $tel = $row['telefono'];
    $rol = $row['rol'];
    $usuario = $row['usuario'];
    $password = $row['password'];
    $foto = $row['foto'];
?>


<div class="container mt-3 bg bg-light w-50 shadow-lg rounded"> 
    <div class="row p-5">
        <div class="col-lg-12">
            <h2 class="text-center m-3">Modificación de usuario </h2>
        </div>
    </div>

    <div class="row">
    <form action="backModificarUsuarios.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario_m" value="$id_usuario">

    <div class="col-lg-12">
        <!-- Nombre -->
        <label for="nombre" class="form-label">Nombre:</label>
        <input class="form-control" type="text" name="nombre_modify" value='<?=$nombre?>' />
    </div>

    <div class="col-lg-12">
        <!-- Apellido -->
        <label for="apellido" class="form-label">Apellido:</label>
        <input class="form-control" type="text" placeholder="Apellido" name="apellido_modify" value='<?=$apellido?>' />
    </div>

    <div class="col-lg-12">
        <!--E-mail -->
        <label for="email" class="form-label">E-mail:</label>
        <input class="form-control" type="text" placeholder="E-mail" name="email_modify" value='<?=$email?>' />
    </div>

    <div class="col-lg-12">
        <!--Telefono -->
        <label for="telefono" class="form-label">Teléfono:</label>
        <input class="form-control" type="tel" placeholder="Teléfono" name="tel_modify" value='<?=$tel?>' />
    </div>

    <div class="col-lg-12">
        <!--Rol -->
        <label for="rol" class="form-label">Rol:</label>
        <select class="form-select" aria-label="Default select example" name="rol_modify">
            <option selected>Elige un rol:</option>
            <option value="<?=$rol?>"><?=$rol?></option>
        </select>
    </div>

    <div class="col-lg-12">
        <!--Usuario: -->
        <label for="usuario" class="form-label">Usuario:</label>
        <input class="form-control" type="text" placeholder="Usuario" name="usuario_modify" value='<?=$usuario?>' />
    </div>

    <!--Password-->
    <div class="col-lg-12">   
        <label for="password" class="form-label">Password:</label>
        <input class="form-control" type="password" placeholder="Password" name="password_modify" value='<?= $password?>' />
    </div>

    <div class="col-lg-12">
        <!--Password -->
        <label for="foto" class="form-label">Foto:</label>
        <input class="form-control" type="file" placeholder="Foto" name="foto_modify" value='<?=$foto?>' />
    </div>
    
    

    <div class="col-lg-12">
        <!-- Botón cargar datos -->
        <button type="submit" class="btn btn-primary mt-3 mb-3">Guardar Cambios</button>
        <button type="reset" class="btn btn-primary mt-3 mb-3">Reset</button>
    </div>

    </form>
    </div> <!-- row -->
</div> <!-- container -->
<?php
} else {
    echo "Usuario no encontrado";
}


        }
    }
  } else {
    header("Location: iniciar_sesion.php");
  }
?>


<?php 
include '../footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>
</html>








?>