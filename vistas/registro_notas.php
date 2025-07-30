<?php
require_once '../models/header.php';
require_once '../config/conexion.php'; // <-- Agrega esta línea
$conn = conectar();
$aldeas = $conn->query("SELECT id, nombre FROM aldea")->fetchAll(PDO::FETCH_ASSOC);
$pnfs = $conn->query("SELECT id, nombre FROM pnf")->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-header text-center bg-primary text-white">
                        <h2 class="card-title">Registrar Nota</h2>
                    </div>
                    <div class="card-body">
                        <form action="procesar_registro_nota.php" method="POST">
                            <div class="form-group">
                                <label for="aldea">Aldea</label>
                                <select name="aldea" id="aldea" class="form-control" required>
                                    <option value="">Seleccione una aldea</option>
                                    <?php foreach($aldeas as $aldea): ?>
                                        <option value="<?= $aldea['id'] ?>"><?= $aldea['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pnf">PNF</label>
                                <select name="pnf" id="pnf" class="form-control" required>
                                    <option value="">Seleccione un PNF</option>
                                    <?php foreach($pnfs as $pnf): ?>
                                        <option value="<?= $pnf['id'] ?>"><?= $pnf['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="estudiante">Estudiante</label>
                                <select name="estudiante" id="estudiante" class="form-control" required>
                                    <option value="">Seleccione un estudiante</option>
                                    <!-- Aquí puedes cargar los estudiantes vía AJAX según Aldea y PNF -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <select name="materia" id="materia" class="form-control" required>
                                    <option value="">Seleccione una materia</option>
                                    <!-- Puedes cargar las materias según el PNF -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nota">Nota</label>
                                <input type="number" name="nota" id="nota" class="form-control" min="0" max="20" step="0.01" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-2">Registrar Nota</button>
                                <a href="home.php" class="btn btn-secondary m-2">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Solo profesores pueden registrar notas.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<?php require_once '../models/footer.php'; ?>