<?php
    require_once "../clases/conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $sql = "SELECT id_usuario, id_archivo, nombre, tipo, ruta FROM t_publico";
    $result = mysqli_query($conexion, $sql);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
        
            <table class="table table-dark" id="tablaGestorDatatable">
                <thead>
                    <tr style="text-align: center;">
                        <th>Usuario</th>
                        <th>Nombre del Archivo</th>
                        <th>Tipo de Archivo</th>
                        <th>Visualizar</th>
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($datos = mysqli_fetch_array($result)){
                        $idUsuario = $datos['id_usuario'];
                        $rutaDescarga = "../archivos/".$idUsuario."/".$datos['nombre'];
                        $nombreArchivo = $datos['nombre'];
                        $idArchivo = $datos['id_archivo'];
                ?>
            
                    <tr style="text-align: center;">
                    
                        <td><?php echo $datos['nombre']; ?></td>
                        <td><?php echo $datos['nombre']; ?></td>
                        <td><?php echo $datos['tipo']; ?></td>
                        <td>
                            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                            <span class="fas fa-eye"></span>
                            </span>
                        </td>
                        <td>
                            <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                <span class="fas fa-download"></span>
                            </a>
                        </td>
                    </tr>
                </tr>
            
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaGestorDatatable').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>