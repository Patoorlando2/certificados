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

    <div class="container mt-3 bg bg-light w-50">
        <div class="row p-5">

            <div class="col-lg-12 mt-3">
                <h2 class="text-center mt-3 open-sans-style">Registro de usuario</h2>
            </div>

            <form action="registrar.php" method="POST">
                <div class="col-lg-12">
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                </div>

                <div class="col-lg-12">
                    <label class="form-label">Apellido:</label>
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                </div>

                <div class="col-lg-12">
                    <label class="form-label">E-mail:</label>
                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                </div>

                <!--<div class="col-lg-12">
                    <label class="form-label">Rol:</label>
                    <input type="text" class="form-control" placeholder="Rol" name="rol">
                </div>-->
                <div class="col-lg-12">
                    <label class="form-label">Rol:</label>
                    
                </div>

                <div class="col-lg-12">
                    <label class="form-label">Usuario:</label>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                </div>

                <div class="col-lg-12">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <div class="col-lg-12">
                    <label class="form-label">Imagen:</label>
                    <input type="file" class="form-control" placeholder="imagen" name="imagen">
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary mt-3">Registrarse</button>
                </div>

                <div class="col-lg-12 mt-3">
                    <a href="iniciar_sesion.php" class="mt-3">Inicio de sesión</a>
                </div>
                    

                <div class="col-lg-12 mt-3">
                    <a href="#" class="mt-3">Olvidé la contraseña</a>
                </div>
            </form>
        </div>
    </div> 

</body>
</html>