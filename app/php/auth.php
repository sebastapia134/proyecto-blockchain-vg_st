<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    include __DIR__ . '/../../app/php/db.php';
    exit();
}
?>
