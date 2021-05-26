<?php

    require_once "conexion.php";
    class Inicio extends Conectar{
        function cantArchivos($idUsuario){
            $conexion = Conectar::conexion();
            $sql = "SELECT id_archivo FROM t_archivos WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);
            $cantidad = 0;
            while(mysqli_fetch_array($result)){
                $cantidad = $cantidad + 1;
            }
            return $cantidad;
        }
        function cantCategorias($idUsuario){
            $conexion = Conectar::conexion();
            $sql = "SELECT id_categoria FROM t_categorias WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);
            $cantidad = 0;
            while(mysqli_fetch_array($result)){
                $cantidad = $cantidad + 1;
            }
            return $cantidad;
        }
        function cantArchiPublic($idUsuario){
            $conexion = Conectar::conexion();
            $sql = "SELECT id_archivo FROM t_publico WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);
            $cantidad = 0;
            while(mysqli_fetch_array($result)){
                $cantidad = $cantidad + 1;
            }
            return $cantidad;
        }
    }