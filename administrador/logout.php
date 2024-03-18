<?php 
session_start();
// delete the username 
unset($_SESSION['registro']);
// delete all session's
session_unset();
// finished session
session_destroy();
header("Location: iniciar_sesion.php");
?>