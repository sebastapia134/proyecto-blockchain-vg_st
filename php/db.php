<?php
$host = "localhost";
$user = "root"; 
$password = "Rodisejuda74"; 
$database = "blockchainbasededatos";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
