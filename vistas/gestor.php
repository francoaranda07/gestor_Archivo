<?php 
    session_start();
    if (isset($_SESSION['usuario'])){
        include "../include/navegacion.php"; 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Gestor de Archivos</h1>
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
                        <span class="fas fa-plus-circle"></span> Agregar archivos
                    </span>
                    <hr>
                    <div id="tablaGestorArchivos"></div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal para agregar archivos -->
<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir Archivos</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmArchivos" enctype="multipart/form-data" method="post"> 
                    <label>Categorías</label>
                    <div id="categoriasLoad"></div>
                    <hr>
                    <label>Selecciona Archivos:</label>
                    <input type="file" name="archivos[ ]" id="archivos[ ]" class="form-control" multiple="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Subir</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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

<?php include "../include/footer.php"; ?>
<script src="../librerias/sweetalert2.all.min.js"></script>
<script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");

        $('#btnGuardarArchivos').click(function(){
            agregarArchivosGestor();
        });
    });

</script>
<?php
    } else {
        header("location: ../index.php");
    }
?>