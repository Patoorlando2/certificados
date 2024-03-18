<?php


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        
    $email = $_POST['email'];

    include '../conexion.php';

    $sql = "SELECT rol FROM usuarios WHERE email = '$email'";

    $result = $conn->query($sql); // resultado conexión de la consulta de $sql

    if ($result->num_rows == 1) { //si existe el email // si da un resultado

        $row = $result->fetch_assoc(); // para fetchear una o unas filas
        $rol = $row['rol']; // especificamente la fila del rol
    
        if ($rol == 'administrador') { // si el rol es adminitrador 
            
            //Generar número aleatorio de 6 dígitos
            $numAleatorio = rand('10000', '999999'); // 6 dígitos

            //Dirección de correo electrónico del destinatario
            $destinatario = $email;

            //Asunto del correo electrónico 
            $asunto = "Número aleatorio de 6 dígitos";

            //Cuerpo del Correo electrónico
            $mensaje = "Tu número aleatorio es: $numAleatorio";

            // Encabezados adicionales
            $headers = "From: patricio@patricioagustindev.com";
            
            // Enviar el correo electrónico
            mail($destinatario, $asunto, $mensaje, $headers);

            echo '<script> 
        
                alert("Correo electrónico enviado con éxito."); 

                </script>';

            header("Location: escribir_código_enviado.php");
        } else {
            echo '<script> alert("El rol no es administrador.");
            window.location.href = "iniciar_sesion.php";  </script>';
        }
    }
}

    
/*
Si tengo el email y ademas tiene un rol de administrador se crea un código aleatorio de 6 digitos y se envía
por correo electrónico al usuario de ese email 
*/





?>