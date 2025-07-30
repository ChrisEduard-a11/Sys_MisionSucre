<?php
require_once '../config/conexion.php';
$conn = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe y limpia los datos
    $nombre      = trim($_POST['nombre']);
    $cedula      = trim($_POST['cedula']);
    $telefono    = trim($_POST['telefono']);
    $correo      = trim($_POST['correo']);
    $fecha_nac   = trim($_POST['fecha_nac']);
    $sexo        = trim($_POST['sexo']);
    $aldea_id    = intval($_POST['aldea']);
    $pnf_id      = intval($_POST['pnf']);
    $trayecto    = trim($_POST['trayecto']);
    $seccion     = trim($_POST['seccion']);
    $anio_ingreso= trim($_POST['anio_ingreso']);

    // Validación básica
    if (
        !$nombre || !$cedula || !$aldea_id || !$pnf_id || !$trayecto ||
        !$sexo || !$anio_ingreso
    ) {
        header("Location: ../vistas/estudiantes.php?error=1");
        exit;
    }

    // Verifica si la cédula ya está registrada
    $stmt = $conn->prepare("SELECT id FROM estudiante WHERE cedula = ?");
    $stmt->execute([$cedula]);
    if ($stmt->fetch()) {
        header("Location: ../vistas/estudiantes.php?error=cedula_duplicada");
        exit;
    }

    // Inserta el estudiante
    $stmt = $conn->prepare("INSERT INTO estudiante 
        (nombre, cedula, telefono, correo, fecha_nac, sexo, aldea_id, pnf_id, trayecto, seccion, anio_ingreso)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $nombre, $cedula, $telefono, $correo, $fecha_nac, $sexo,
        $aldea_id, $pnf_id, $trayecto, $seccion, $anio_ingreso
    ]);

    header("Location: ../vistas/estudiantes.php?exito=1");
    exit;
} else {
    header("Location: ../vistas/estudiantes.php");
    exit;
}