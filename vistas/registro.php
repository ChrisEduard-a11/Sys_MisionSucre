<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro de Usuario - Sistema de Carga de Notas</title>
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
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Registro de Nuevo Usuario</h4>
                    <form action="procesar_registro.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="nombre"><i class="fa fa-user"></i> Nombre completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario"><i class="fa fa-user-circle"></i> Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="correo"><i class="fa fa-envelope"></i> Correo electrónico</label>
                            <input type="email" name="correo" id="correo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rol"><i class="fa fa-users"></i> Rol</label>
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                <option value="administrador">Administrador</option>
                                <option value="profesor">Profesor</option>
                                <option value="coordinador">Coordinador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="clave"><i class="fa fa-lock"></i> Contraseña</label>
                            <input type="password" name="clave" id="clave" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Registrar</button>
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