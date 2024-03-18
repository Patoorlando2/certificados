<?php

session_start();

include '../conexion.php';

// Verificar que se haya enviado el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        $_SESSION['registro'] = $usuario;
        header('Location: sesion_iniciada.php');
        exit();
    } else {
        // credenciales incorrectas; mensaje de error
        echo '<script>
        alert("Credenciales incorrectas. Intenta nuevamente");
        
        window.location.href = "iniciar_sesion.php";
        </script>';
    }
}
?>