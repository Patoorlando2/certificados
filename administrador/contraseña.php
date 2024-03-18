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
  <!--
  <li class="nav-item">
    <a class="nav-link" href="configuracion.php">Configuración de Usuarios</a>
  </li>-->
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
          Configuración de usuario
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-center" href="#">Agregar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="#">Modificar usuarios</a></li>
            <li><a class="dropdown-item text-center" href="#">Eliminar usuarios</a></li>
        </ul>
    </li>
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
            <li><a class="dropdown-item text-center" href="#"><img class="rounded" src="<?= $path.$row['foto']?>" alt="" width="64px" height="64px"></a></li>
            <li><a class="dropdown-item text-center" href="#"><?= $row['nombre']." ".$row['apellido']?></a></li>
            <li><a class="dropdown-item text-center" href="#">Rol: <?= $row['rol']?></a></li>
            <li><a class="dropdown-item text-center" href="ajustes.php">Ajustes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-center" href="logout.php">Salir</a></li>
        </ul>
    </li>
</ul>

<div class="container mt-3 bg bg-light w-50 shadow-lg rounded">
    <div class="row p-5">
        <div class="col-lg-12">
            <h2 class="text-center mt-3">Cambio de contraseña</h2>
        </div>
    </div>

    <div class="row">
        <form action="cambiar_contraseña.php" method="post">
        
            <div class="col-lg-12">
                <label for="contraseñaAntigua" class="form-label">Contraseña antigua</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña Anterior" name="contraseña_antigua">
            </div>

            <div class="col-lg-12">
                <label for="contraseñaNueva" class="form-label">Contraseña Nueva</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña Nueva" name="contraseña_nueva">
            </div>

            <div class="col-lg-12">
                <label for="contraseñaNueva" class="form-label">Repetir Contraseña Nueva</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Repetir Contraseña Nueva" name="repetir_nueva">
            </div>

            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary mt-3 mb-3">Cambiar contraseña</button>
                <button type="reset" class="btn btn-primary mt-3 mb-3">Reset</button>
            </div>
        </form>
    </div>
</div>

<br />
<br />

<?php
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