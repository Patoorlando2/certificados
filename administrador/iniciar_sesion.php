<?php 
// Iniciar la sesión
session_start();

// Verificar si la sesión 'registro' está seteada
if (isset($_SESSION['registro'])) {
    header("Location: sesion_iniciada.php");
    exit(); // Es buena práctica agregar exit() después de una redirección para asegurarse de que el script se detenga
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 bg-light">
                <a class="btn btn-primary" href="../index.php" role="button">Volver</a>    
            </div>
        </div>
    </div>

    <!-- common navbar -->

    <div class="container mt-3 bg bg-light w-50 shadow-lg rounded">
        <div class="row p-5">

            <div class="col-lg-12 mt-3">
                <h2 class="text-center mt-3 open-sans-style">Inicio de sesión</h2>
            </div>

            <form action="ingresar.php" method="POST">
                <div class="col-lg-12">
                    <label class="form-label">Usuario:</label>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                </div>

                <div class="col-lg-12">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary mt-3">Iniciar</button>
                </div>
            </form>
                    
            <div class="col-lg-12 mt-3">
            <!--<a href="" class="mt-3">Olvidé la contraseña</a>-->
            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Olvidé la contraseña</button>-->
            </div>      
        </div>
    </div>  
<br />
<br />

<!-- prueba modal 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Olvido de Constraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="generar_codigo.php" method="POST">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">E-mail:</label>
                        <input type="email" class="form-control" id="recipient-name" name="email" placeholder="E-mail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="submit">Enviar código</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->
<!-- prueba modal -->


<!-- JS MODAL  -->
<script>
const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const recipient = button.getAttribute('data-bs-whatever')
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = `Escriba su E-mail: ${recipient}`
  modalBodyInput.value = recipient
})
</script>
<!-- JS MODAL  -->


<?php 
include '../footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!--<script  src="assets/js/script.js"></script>-->

</body>
</html>