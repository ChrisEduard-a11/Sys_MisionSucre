<?php require_once '../models/header.php'; ?>
<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2 class="card-title">Reportes del Sistema</h2>
                    </div>
                    <div class="card-body">
                        <img src="../images/logo_misionsucre.png" alt="Misión Sucre" style="max-width:100px; margin-bottom:20px;" class="d-block mx-auto">
                        <p class="text-center">
                            Consulta y descarga reportes de notas, estudiantes y actividades realizadas en las aldeas universitarias de <strong>Misión Sucre</strong>.
                        </p>
                        <hr>
                        <h5 class="text-center">Selecciona el tipo de reporte</h5>
                        <div class="d-flex flex-column align-items-center">
                            <a href="reporte_notas.php" class="btn btn-primary m-2 w-75"><i class="fa-solid fa-file-lines"></i> Reporte de Notas</a>
                            <a href="reporte_estudiantes.php" class="btn btn-success m-2 w-75"><i class="fa-solid fa-users"></i> Reporte de Estudiantes</a>
                            <a href="reporte_actividades.php" class="btn btn-info m-2 w-75"><i class="fa-solid fa-chart-bar"></i> Reporte de Actividades</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Los reportes pueden ser descargados en formato PDF o Excel para su análisis y respaldo.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<?php require_once '../models/footer.php'; ?>