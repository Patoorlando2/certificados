<?php
session_start();

include '../conexion.php';

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verificar que la contraseña antigua coincida con el usuario iniciado
    if (isset($_SESSION['registro'])) {
        
        $usuarioActual = $_SESSION['registro'];
        $contraseñaAntigua = $_POST['contraseña_antigua'];
        $contraseñaNueva = $_POST['contraseña_nueva'];
        $repetirNueva = $_POST['repetir_nueva'];

        // Consulta preparada para obtener la contraseña almacenada
        $sql = "SELECT password FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuarioActual);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Obtén la contraseña almacenada en la base de datos
            $row = $result->fetch_assoc();
            $contraseñaAlmacenada = $row['password'];

            // Verifica si la contraseña antigua coincide
            if ($contraseñaAntigua == $contraseñaAlmacenada) {
                // Verifica si las contraseñas nuevas coinciden
                if ($contraseñaNueva == $repetirNueva) {
                    // Actualiza la contraseña
                    $sql2 = "UPDATE usuarios SET password = '$contraseñaNueva' WHERE usuario = '$usuarioActual'";
                    $result2 = $conn->query($sql2);

                    if ($result2) {
                        echo '<script>
                                alert("Se ha realizado el cambio de contraseña con éxito. Muchas gracias.");
                                window.location.href="./sesion_iniciada.php";
                            </script>';
                    } else {
                        echo '<script>
                                alert("No se pudo actualizar la contraseña. Inténtalo nuevamente.");
                                window.location.href="contraseña.php";
                            </script>';
                    }
                } else {
                    echo '<script>
                            alert("Las contraseñas nuevas no coinciden. Inténtalo nuevamente.");
                            window.location.href="contraseña.php";
                        </script>';
                }
            } else {
                // Contraseña antigua incorrecta
                echo '<script>
                        alert("La contraseña antigua es incorrecta. Inténtalo nuevamente.");
                        window.location.href="contraseña.php";
                    </script>';
            }
        } else {
            // Credenciales incorrectas; mensaje de error
            echo '<script>
                    alert("Hubo un error de sistema. Inténtalo nuevamente más tarde.");
                    window.location.href="contraseña.php";
                </script>';
        }
    }
}
?>
