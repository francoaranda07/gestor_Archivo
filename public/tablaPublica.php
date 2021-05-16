<?php
    require_once "../clases/conexion.php";
    
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = 52;
    $sql = "SELECT 
                archivos.id_archivo as idArchivo,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,
                archivos.publico as publicoArchivo,
                archivos.fecha as fecha
            FROM 
                t_archivos AS archivos
                        INNER JOIN
                t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                        INNER JOIN 
                t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                AND archivos.id_usuario = '$idUsuario'";
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
                        <th>Descargar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($mostrar = mysqli_fetch_array($result)){
                        $rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                ?>
                        <?php if ($mostrar['publicoArchivo']==1){?>
                                <tr style="text-align: center;">
                                
                                    <td><?php echo $mostrar['nombreUsuario']; ?></td>
                                    <td><?php echo $mostrar['nombreArchivo']; ?></td>
                                    <td><?php echo $mostrar['tipoArchivo']; ?></td>
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