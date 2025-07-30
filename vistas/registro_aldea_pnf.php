<?php
require_once '../models/header.php';
require_once '../config/conexion.php';
$conn = conectar();

// Cargar aldeas para el select del formulario de PNF
$aldeas = $conn->query("SELECT id, nombre FROM aldea ORDER BY nombre")->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Content -->
<div class="content">
    <?php
    if (isset($_GET['exito'])) {
        echo '<div class="alert alert-success text-center">¡Operación realizada correctamente!</div>';
    }
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger text-center">Debes completar todos los campos requeridos.</div>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 'aldea_duplicada') {
        echo '<div class="alert alert-warning text-center">La aldea ya existe. Intenta con otro nombre.</div>';
    }
    ?>
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <!-- Formulario para agregar Aldea -->
            <div class="col-lg-5">
                <div class="card mt-5 shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="card-title mb-0"><i class="fa fa-building"></i> Agregar Aldea</h4>
                    </div>
                    <div class="card-body">
                        <form action="../controladores/controlador_registro_aldea_pnf.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="nombre_aldea">Nombre de la Aldea</label>
                                <input type="text" name="nombre_aldea" id="nombre_aldea" class="form-control" required placeholder="Ej: Aldea Universitaria Miranda">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-2"><i class="fa fa-plus"></i> Agregar Aldea</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Registre una nueva aldea universitaria.
                    </div>
                </div>
            </div>
            <!-- Formulario para agregar PNF a una Aldea -->
            <div class="col-lg-5">
                <div class="card mt-5 shadow">
                    <div class="card-header text-center bg-info text-white">
                        <h4 class="card-title mb-0"><i class="fa fa-list"></i> Agregar PNF a una Aldea</h4>
                    </div>
                    <div class="card-body">
                        <form action="../controladores/controlador_registro_aldea_pnf.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="aldea_id">Seleccione la Aldea</label>
                                <select name="aldea_id" id="aldea_id" class="form-control" required>
                                    <option value="">Seleccione una aldea</option>
                                    <?php foreach($aldeas as $aldea): ?>
                                        <option value="<?= $aldea['id'] ?>"><?= $aldea['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre_pnf">Nombre del PNF</label>
                                <input type="text" name="nombre_pnf" id="nombre_pnf" class="form-control" required placeholder="Ej: Educación Integral">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info m-2"><i class="fa fa-plus"></i> Agregar PNF</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Registre un nuevo PNF y asígnelo a una aldea existente.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../models/footer.php'; ?>