<?php
require_once '../config/conexion.php';
$conn = conectar();

if (isset($_POST['aldea_id'])) {
    $aldea_id = intval($_POST['aldea_id']);
    $stmt = $conn->prepare("
        SELECT pnf.id, pnf.nombre 
        FROM aldea_pnf 
        INNER JOIN pnf ON aldea_pnf.pnf_id = pnf.id 
        WHERE aldea_pnf.aldea_id = ?
        ORDER BY pnf.nombre
    ");
    $stmt->execute([$aldea_id]);
    $pnfs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($pnfs) {
        echo '<option value="">Seleccione un PNF</option>';
        foreach ($pnfs as $pnf) {
            echo '<option value="'.$pnf['id'].'">'.$pnf['nombre'].'</option>';
        }
    } else {
        echo '<option value="">No hay PNF para esta aldea</option>';
    }
}
?>