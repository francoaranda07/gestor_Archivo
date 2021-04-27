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
                    <h1 class="display-4">Público</h1>
                    <h4>Archivos compartidos</h4>
                    <hr>
                    <div id="tablaPublica"></div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include "../include/footer.php";}?>
<script src="../librerias/sweetalert2.all.min.js"></script>
<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaPublica').load("gestor/tablaPublica.php");
    });

</script>