<?php
session_start();
session_destroy();
header("Location: ../pages/paginaLogin.php");exit();
?>