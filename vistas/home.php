<?php require_once '../models/header.php'; ?>
<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2 class="card-title">Bienvenido al Sistema de Carga de Notas</h2>
                    </div>
                    <div class="card-body text-center">
                        <img src="../images/logo_misionsucre.png" alt="Misión Sucre" style="max-width:120px; margin-bottom:20px;">
                        <p>
                            Este sistema está diseñado para la gestión y carga de notas de los estudiantes de las diferentes aldeas universitarias de <strong>Misión Sucre</strong> en el <strong>Municipio Miranda, Estado Falcón, Venezuela</strong>.
                        </p>
                        <p>
                            Aquí podrás registrar, consultar y administrar las calificaciones de los estudiantes de manera sencilla y segura.
                        </p>
                        <hr>
                        <h5>¿Qué deseas hacer?</h5>
                        <a href="registro_notas.php" class="btn btn-primary m-2">Registrar Notas</a>
                        <a href="consultar_estudiantes.php" class="btn btn-success m-2">Consultar Estudiantes</a>
                        <a href="reportes.php" class="btn btn-info m-2">Ver Reportes</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Sistema exclusivo para uso de las aldeas de Misión Sucre - Municipio Miranda, Falcón.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<?php require_once '../models/footer.php'; ?>