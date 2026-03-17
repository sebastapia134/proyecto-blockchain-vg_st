<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header("Location: ./paginaLogin.php");
    exit();
}
?>
