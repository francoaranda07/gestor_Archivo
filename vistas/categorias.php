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
                    <h1 class="display-4">Categorías</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
                                <span class="fas fa-plus-circle"></span> Nueva categoría
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="tablaCategorias"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="frmCategorias">
                    <label>Nombre de la Categoría</label>
                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="frmActualizaCategoria">
                    <input type="text" id="idCategoria" name="idCategoria" hidden="">
                    <label>Categoría</label>
                    <input type="text" name="categoriaU" id="categoriaU" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnActualizaCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?php 
    include "../include/footer.php";
?>
<script src="../js/categorias.js"></script>
<script src="../librerias/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategorias').load("categorias/tablaCategoria.php");

        $('#btnGuardarCategoria').click(function(){
            agregarCategoria();
        });
        $('#btnActualizaCategoria').click(function(){
            actualizaCategoria();
        });
    });

</script>
<?php
    }else{
        header("location: ../index.php");
    }
?>