<?php
session_start();

require_once '../constants/constantes.php';
require_once '../DB/coneccion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST["usuario"];
    $password = $_POST["password"];

    $conexion = coneccion();

    $query = "SELECT * FROM veris.usuarios WHERE IdUsuario = '$idUsuario' AND Password = '$password'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $_SESSION["idUsuario"] = $idUsuario;
        $_SESSION["rol"] = 2;
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: loginMedicos.php?error=Credenciales incorrectas. Por favor, inténtelo de nuevo.");
        exit();
    }

    $conexion->close();
}
?>