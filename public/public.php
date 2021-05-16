<?php 
    include "navegacion.php"; 
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container mt-4">
                    <h1 class="display-4">Archivos públicos</h1>
                    <hr>
                    <div id="tablaPublica">Tabla</div>
                </div>                
            </div>
        </div>
    </main>
</div>
<!-- Modal visualizar -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>
<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaPublica').load("tablaPublica.php");
    });
</script>