<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mi Nubecilla</title>
        <link rel="shortcut icon" href="../img/icono.png" type="image/jpg"><!--Para colocar el icono de la pag-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../librerias/dataTables.bootstrap4.min.css">
    </head>
    <?php
        session_start();
        $nombre = $_SESSION['usuario'];
    ?>
    <body class="sb-nav-fixed" style="background: #e9ecef;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="https://minubecilla.com/vistas/inicio">
                <img src="../img/icono.png" alt="gestor" width="50px" class="ml-5">
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre?> <i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Configuración</a> -->
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href=""><i class="fas fa-user fa-fw"></i> Perfil</a>
                        <a class="dropdown-item" href="../procesos/usuario/salir"><i class="fas fa-sign-out-alt"></i> Salir de <?php echo $nombre ?></a>
                        
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="https://minubecilla.com/vistas/inicio">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="https://minubecilla.com/vistas/categorias.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Categorías
                            </a>
                            <!-- <a class="nav-link" href="https://minubecilla.com/vistas/gestor.php"> -->
                            <a class="nav-link" href="../vistas/gestor.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                                Gestor de Archivos
                            </a>
                            <a class="nav-link" href="../vistas/public.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                Público
                            </a>
                            
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Sesión como:</div>
                    </div> -->
                </nav>
            </div>

