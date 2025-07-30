<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Carga de Notas - Misión Sucre Miranda</title>
    <meta name="description" content="Sistema de Carga de Notas para las aldeas universitarias de Misión Sucre, Municipio Miranda, Falcón, Venezuela">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="../images/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet">

    <style>
        #weatherWidget .currentDesc { color: #ffffff!important; }
        .traffic-chart { min-height: 335px; }
        #flotPie1  { height: 150px; }
        #flotPie1 td { padding:3px; }
        #flotPie1 table { top: 20px!important; right: -10px!important; }
        .chart-container { display: table; min-width: 270px ; text-align: left; padding-top: 10px; padding-bottom: 10px; }
        #flotLine5  { height: 105px; }
        #flotBarChart { height: 150px; }
        #cellPaiChart{ height: 160px; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"><i class="menu-icon fa fa-home"></i>Inicio</a>
                    </li>
                    <li>
                        <a href="registro_notas.php"><i class="menu-icon fa fa-pencil"></i>Registrar Notas</a>
                    </li>
                    <li>
                        <a href="registro_aldea_pnf.php"><i class="menu-icon fa fa-building"></i>Registrar Aldea's y PNF's</a>
                    </li>
                    <li>
                        <a href="registro_estudiante.php"><i class="menu-icon fa fa-user-plus"></i>Registrar Estudiante</a>
                    </li>
                    <li>
                        <a href="consultar_estudiantes.php"><i class="menu-icon fa fa-users"></i>Consultar Estudiantes</a>
                    </li>
                    <li>
                        <a href="reportes.php"><i class="menu-icon fa fa-file-text"></i>Reportes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header -->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php"><img src="../images/logo.png" alt="Logo" style="max-height:40px;"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../images/admin.jpg" alt="Usuario">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../controladores/salir.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->