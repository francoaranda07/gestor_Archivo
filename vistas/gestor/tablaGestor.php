<?php
    session_start();
    require_once "../../clases/conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT 
                archivos.id_archivo as idArchivo,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,
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
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Tipo de Archivo</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $extensionesValidas = array('png', 'jpg', 'PNG', 'pdf', 'mp3', 'mp4');
                    while($mostrar = mysqli_fetch_array($result)){
                        $rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                ?>
                    <tr style="text-align: center;">
                        <td><?php echo $mostrar['categoria']; ?></td>
                        <td><?php echo $mostrar['nombreArchivo']; ?></td>
                        <td><?php echo $mostrar['tipoArchivo']; ?></td>
                        <td>
                            <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                <span class="fas fa-download"></span>
                            </a>
                        </td>
        
                        <td>
                            <?php
                                for ($i=0; $i < count($extensionesValidas); $i++){
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']){
                                
                            ?>
                                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                        <span class="fas fa-eye"></span>
                                    </span>
                            <?php
                                    }
                                }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <span class="btn btn-danger btn-sm" onclick="aliminarArchivo(<?php echo $idArchivo ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </td>
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
        $('#tablaGestorDatatable').DataTable();
    });
</script>