<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Sistema de Carga de Notas</title>
    <meta name="description" content="Sistema de Carga de Notas - Misión Sucre Miranda">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/logo_misionsucre.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_login.css">


    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
    <div class="sufee-login d-flex align-content-center flex-wrap" style="width:100vw;min-height:100vh;">
        <div class="container">
            <div class="login-content">
                <div class="login-logo text-center">
                    <img src="images/logo_misionsucre.png" alt="Logo Misión Sucre" class="rounded-circle shadow animate__animated animate__fadeInDown" style="background:#fff;padding:8px;max-width:100px;">
                    <div class="sistema-desc">
                        Aldeas Universitarias Misión Sucre<br>
                        Municipio Miranda, Estado Falcón, Venezuela
                    </div>
                </div>
                <div class="login-form">
                    <?php
                    if (isset($_SESSION['error'])) {
                        // Display error message using SweetAlert
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: '" . addslashes($_SESSION['error']) . "',
                                confirmButtonColor: '#3085d6'
                            });
                        </script>";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <form action="controladores/controlador_login.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="usuario"><i class="fa fa-user"></i> Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="clave"><i class="fa fa-lock"></i> Contraseña</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Ingrese su contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block m-b-30 m-t-30">Iniciar Sesión</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="vistas/recuperar.php" class="text-info" style="margin-right:15px;"><i class="fa fa-key"></i> ¿Olvidaste tu contraseña?</a>
                        <a href="vistas/desbloquear.php" class="text-warning" style="margin-right:15px;"><i class="fa fa-unlock"></i> Desbloquear usuario</a>
                        <a href="vistas/registro.php" class="text-success"><i class="fa fa-user-plus"></i> Registrarse</a>
                    </div>
                    <div class="text-center mt-3 text-muted" style="font-size:0.98em;">
                        Acceso exclusivo para administradores, profesores y coordinadores de las aldeas universitarias.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
