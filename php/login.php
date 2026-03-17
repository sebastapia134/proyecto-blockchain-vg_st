<?php
session_start(); 
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM usuario WHERE mail = ?");
    $query->bind_param("s", $mail);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password===$user['contrasenia']) {

            $_SESSION['idusuario'] = $user['idusuario'];
            $_SESSION['mail'] = $user['mail'];
            $_SESSION['blockchain_direccion'] = $user['blockchain_direccion'];
            $_SESSION['url_foto'] = $user['url_foto']; 
            $_SESSION['nombre'] = $user['nombre']; 
            $_SESSION['timestamp'] = $user['timestamp']; 



            header("Location: ../principal.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
