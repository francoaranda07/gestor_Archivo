<?php

    class Conectar{
        public function conexion(){
            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $base = "gestor";

            $conexion = mysqli_connect($servidor, $usuario, $password, $base);
            $conexion->set_charset('utf8mb4');
            return $conexion;
            
        }
    }
    // class Conectar{
    //     public function conexion(){
    //         $servidor = "localhost";
    //         $usuario = "id16133567_id13425596_root";
    //         $password = "S+qT+nMh(ymGGk_0";
    //         $base = "id16133567_id13425596_gestor";

    //         $conexion = mysqli_connect($servidor, $usuario, $password, $base);
    //         $conexion->set_charset('utf8mb4');
    //         return $conexion;
            
    //     }
    // }

?>