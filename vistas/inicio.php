<?php 
    session_start();
    
    if (isset($_SESSION['usuario'])){
        $nombre = $_SESSION['usuario'];
        include "../include/navegacion.php"; 
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Inicio</h1>
                    <hr>
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><h3><i class="fas fa-file"></i> 23</h3>Archivos</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="gestor.php">Más detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body"><h3><i class="fas fa-clipboard"></i> 3</h3>Categorías</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="categorias.php">Más detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><h3><i class="fas fa-globe"></i> 5</h3>Archivos públicos</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="public.php">Más detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </main>
</div>
<?php 
    include "../include/footer.php";
    }else{
        header("location: ../login");
    }
?>