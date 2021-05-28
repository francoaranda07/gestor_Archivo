<?php

    require_once "conexion.php";
    class Categorias extends Conectar{

        public function agregarCategoria($datos) {
            $conexion = Conectar::conexion();

            if (self::categoriaRepetida($datos['categoria'])){
                return 2;
            }else{
                $sql = "INSERT INTO t_categorias (id_usuario, nombre) VALUES (?,?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("is", $datos['idUsuario'], $datos['categoria']);

                $respuesta = $query->execute();
                $query->close();

                return $respuesta;
            }
        }
        static function categoriaRepetida($categoria){
            $conexion = Conectar::conexion();

            $sql = "SELECT nombre FROM t_categorias WHERE nombre = '$categoria'";
            $result = mysqli_query($conexion, $sql);
            $datos = mysqli_fetch_array($result);

            if ($datos['nombre'] != "" || $datos['nombre'] == $categoria) {
                return 1;
            } else {
                return 0;
            }
        }


        public function eliminarCategorias($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "DELETE FROM t_categorias WHERE id_categoria = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idCategoria);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function obtenerCategoria($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "SELECT id_categoria, nombre FROM t_categorias WHERE id_categoria = '$idCategoria'";
            $result = mysqli_query($conexion, $sql);
            $categoria = mysqli_fetch_array($result);

            $datos = array(
                "idCategoria" => $categoria['id_categoria'],
                "nombreCategoria" => $categoria['nombre']
            );
            return $datos;
        }
        public function actualizarCategoria($datos) {
            $conexion = Conectar::conexion();

            $sql = "UPDATE t_categorias SET nombre = ? WHERE id_categoria = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("si", $datos['categoria'], $datos['idCategoria']);
            
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }
    }

?>