<?php 
    session_start();
    $nombre = $_SESSION['usuario'];
    if (isset($_SESSION['usuario'])){
        include "../include/navegacion.php"; 
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">¡Hola, <?php echo $nombre;?>!</h1>
                    <!-- <br>
                    <div class="">
                        <img src="../img/portada.svg" class="rounded mx-auto d-block">
                    </div> -->
                </div>
            </div>
        </div>
    </main>
</div>
<?php 
    include "../include/footer.php";
    }else{
        header("location: https://sistemafranco.000webhostapp.com/login");
    }
?>