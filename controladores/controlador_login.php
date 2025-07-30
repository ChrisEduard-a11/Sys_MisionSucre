<?php
session_start();
require_once '../config/conexion.php'; // Asegúrate de tener este archivo para la conexión PDO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    $conn = conectar(); // función en conexion.php

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE usuario = ? AND estado = 1");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && sha1($clave) === $user['clave']) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: ../vistas/home.php");
        exit;
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: ../index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}