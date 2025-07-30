<?php
require_once '../models/header.php';
require_once '../config/conexion.php';
$conn = conectar();

// Consulta estudiantes con JOIN para mostrar aldea y pnf
$stmt = $conn->query("
    SELECT e.id, e.nombre, e.cedula, e.telefono, e.correo, e.fecha_nac, e.sexo, 
           a.nombre AS aldea, p.nombre AS pnf, e.trayecto, e.seccion, e.anio_ingreso
    FROM estudiante e
    INNER JOIN aldea a ON e.aldea_id = a.id
    INNER JOIN pnf p ON e.pnf_id = p.id
    ORDER BY e.nombre
");
$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="content">
        <?php
    if (isset($_GET['exito'])) {
        echo '<div id="alert-exito" class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>¡Éxito!</strong> Estudiante registrado correctamente.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 'cedula_duplicada') {
        echo '<div id="alert-cedula" class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <strong>¡Atención!</strong> La cédula ya está registrada.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
    }
    if (isset($_GET['error'])) {
        echo '<div id="alert-error" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Error:</strong> Debes completar todos los campos obligatorios.
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
    }
    ?>
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title">Estudiantes Registrados</h3>
                    </div>
                    <div class="card-body">
                        <a href="registro_estudiante.php" class="btn btn-primary mb-3">
                            <i class="fa fa-user-plus"></i> Registrar Nuevo Estudiante
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Fecha Nac.</th>
                                        <th>Sexo</th>
                                        <th>Aldea</th>
                                        <th>PNF</th>
                                        <th>Trayecto</th>
                                        <th>Sección</th>
                                        <th>Año Ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($estudiantes) > 0): ?>
                                        <?php foreach($estudiantes as $est): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($est['nombre']) ?></td>
                                                <td><?= htmlspecialchars($est['cedula']) ?></td>
                                                <td><?= htmlspecialchars($est['telefono']) ?></td>
                                                <td><?= htmlspecialchars($est['correo']) ?></td>
                                                <td><?= htmlspecialchars($est['fecha_nac']) ?></td>
                                                <td><?= htmlspecialchars($est['sexo']) ?></td>
                                                <td><?= htmlspecialchars($est['aldea']) ?></td>
                                                <td><?= htmlspecialchars($est['pnf']) ?></td>
                                                <td><?= htmlspecialchars($est['trayecto']) ?></td>
                                                <td><?= htmlspecialchars($est['seccion']) ?></td>
                                                <td><?= htmlspecialchars($est['anio_ingreso']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="11" class="text-center">No hay estudiantes registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Total: <?= count($estudiantes) ?> estudiante(s)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../models/footer.php'; ?>