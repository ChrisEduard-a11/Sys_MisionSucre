<?php
require_once '../models/header.php';
require_once '../config/conexion.php';
$conn = conectar();

$aldeas = $conn->query("SELECT id, nombre FROM aldea")->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Content -->
<div class="content">

    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card mt-5">
                    <div class="card-header text-center bg-primary text-white">
                        <h2 class="card-title">Registrar Estudiante</h2>
                    </div>
                    <div class="card-body">
                        <form action="../controladores/controlador_registro_estudiante.php" method="POST" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre completo</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" name="cedula" id="cedula" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="correo">Correo electrónico</label>
                                    <input type="email" name="correo" id="correo" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fecha_nac">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="aldea">Aldea</label>
                                    <select name="aldea" id="aldea" class="form-control" required>
                                        <option value="">Seleccione una aldea</option>
                                        <?php foreach($aldeas as $aldea): ?>
                                            <option value="<?= $aldea['id'] ?>"><?= $aldea['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pnf">PNF</label>
                                    <select name="pnf" id="pnf" class="form-control" required>
                                        <option value="">Seleccione primero una aldea</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="trayecto">Trayecto</label>
                                    <select name="trayecto" id="trayecto" class="form-control" required>
                                        <option value="">-</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="seccion">Sección</label>
                                    <input type="text" name="seccion" id="seccion" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="anio_ingreso">Año de ingreso</label>
                                    <input type="number" name="anio_ingreso" id="anio_ingreso" class="form-control" min="2000" max="<?= date('Y') ?>">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-2">Agregar Estudiante</button>
                                <a href="home.php" class="btn btn-secondary m-2">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Complete todos los campos obligatorios para registrar un estudiante.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#aldea').on('change', function() {
    var aldeaId = $(this).val();
    if (aldeaId) {
        $.ajax({
            url: 'ajax_pnfs_por_aldea.php',
            type: 'POST',
            data: { aldea_id: aldeaId },
            success: function(data) {
                $('#pnf').html(data);
            }
        });
    } else {
        $('#pnf').html('<option value="">Seleccione primero una aldea</option>');
    }
});
</script>
<?php require_once '../models/footer.php'; ?>