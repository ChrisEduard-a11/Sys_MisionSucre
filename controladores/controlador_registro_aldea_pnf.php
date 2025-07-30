<?php
require_once '../config/conexion.php';
$conn = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si viene el campo nombre_aldea y NO viene nombre_pnf => solo registrar aldea
    if (!empty($_POST['nombre_aldea']) && empty($_POST['nombre_pnf'])) {
        $nombre_aldea = trim($_POST['nombre_aldea']);
        // Verificar si la aldea ya existe
        $stmt = $conn->prepare("SELECT id FROM aldea WHERE nombre = ?");
        $stmt->execute([$nombre_aldea]);
        if ($stmt->fetch()) {
            header("Location: ../vistas/registro_aldea_pnf.php?error=aldea_duplicada");
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO aldea (nombre) VALUES (?)");
        $stmt->execute([$nombre_aldea]);
        header("Location: ../vistas/registro_aldea_pnf.php?exito=1");
        exit;
    }

    // Si viene nombre_pnf y aldea_id => registrar PNF y asociar a la aldea
    if (!empty($_POST['nombre_pnf']) && !empty($_POST['aldea_id'])) {
        $nombre_pnf = trim($_POST['nombre_pnf']);
        $aldea_id = intval($_POST['aldea_id']);

        // Insertar el PNF si no existe
        $stmt = $conn->prepare("SELECT id FROM pnf WHERE nombre = ?");
        $stmt->execute([$nombre_pnf]);
        $pnf = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pnf) {
            $pnf_id = $pnf['id'];
        } else {
            $stmt = $conn->prepare("INSERT INTO pnf (nombre) VALUES (?)");
            $stmt->execute([$nombre_pnf]);
            $pnf_id = $conn->lastInsertId();
        }

        // Asociar el PNF a la aldea si no existe la asociación
        $stmt = $conn->prepare("SELECT id FROM aldea_pnf WHERE aldea_id = ? AND pnf_id = ?");
        $stmt->execute([$aldea_id, $pnf_id]);
        if (!$stmt->fetch()) {
            $stmt = $conn->prepare("INSERT INTO aldea_pnf (aldea_id, pnf_id) VALUES (?, ?)");
            $stmt->execute([$aldea_id, $pnf_id]);
        }

        header("Location: ../vistas/registro_aldea_pnf.php?exito=1");
        exit;
    }

    // Si no se cumplen las condiciones, error
    header("Location: ../vistas/registro_aldea_pnf.php?error=1");
    exit;
} else {
    header("Location: ../vistas/registro_aldea_pnf.php");
    exit;
}