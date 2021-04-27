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
    //         $usuario = "u321499243_frannubecilla";
    //         $password = "Wb8/m:|J#Z7";
    //         $base = "u321499243_nubecilla";

    //         $conexion = mysqli_connect($servidor, $usuario, $password, $base);
    //         $conexion->set_charset('utf8mb4');
    //         return $conexion;
            
    //     }
    // }

?>