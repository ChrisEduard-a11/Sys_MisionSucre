<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Desbloquear Usuario - Sistema de Carga de Notas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 100vh; }
        .card { margin-top: 60px; border-radius: 16px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Desbloquear Usuario</h4>
                    <form action="procesar_desbloquear.php" method="POST">
                        <div class="form-group">
                            <label for="usuario"><i class="fa fa-user"></i> Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Ingrese su usuario">
                        </div>
                        <div class="form-group">
                            <label for="correo"><i class="fa fa-envelope"></i> Correo electrónico</label>
                            <input type="email" name="correo" id="correo" class="form-control" required placeholder="Ingrese su correo">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Solicitar desbloqueo</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="../index.php" class="text-info"><i class="fa fa-arrow-left"></i> Volver al login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>