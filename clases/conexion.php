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
    //         $servidor = "files.000webhost.com";
    //         $usuario = "id13425596_root";
    //         $password = "S+qT+nMh(ymGGk_0";
    //         $base = "id13425596_gestor";

    //         $conexion = mysqli_connect($servidor, $usuario, $password, $base);
    //         $conexion->set_charset('utf8mb4');
    //         return $conexion;
            
    //     }
    // }
    
    //crear tabla categorias
    // CREATE TABLE `gestor`.`t_categorias` (
    //     `id_categoria` INT NOT NULL AUTO_INCREMENT, 
    //     `id_usuario` INT NOT NULL,
    //     `nombre` VARCHAR(255) NOT NULL,
    //     `fechaInsert` DATETIME NOT NULL DEFAULT now(),
    //     PRIMARY KEY (`id_categoria`));
    



    //par al arelacion entre categorias y usuario
    // ALTER TABLE `gestor`.`t_categorias`
    // ADD INDEX `fkCategoriaUsuario_idx` (`id_usuario` ASC);
    // ;
    // ALTER TABLE `gestor`.`t_categorias`
    // ADD CONSTRAINT `fkCategoriaUsuario`
    //  FOREIGN KEY (`id_usuario`)
    //  REFERENCES `gestor`.`t_usuarios` (`id_usuario`)
    //  ON DELETE NO ACTION
    //  ON UPDATE NO ACTION;
    


    //para crear tabla de archivos
    // CREATE TABLE `gestor`.`t_archivos` (
    //     `id_archivo` INT NOT NULL AUTO_INCREMENT,
    //     `id_categoria` INT NULL,
    //     `nombre` VARCHAR(255) NULL,
    //     `tipo` VARCHAR(255) NULL,
    //     `ruta` TEXT NULL,
    //     `fecha` DATETIME NOT NULL DEFAULT now(),
    //    PRIMARY KEY (`id_archivo`));


    //para crear la relacion entre categorias y archivos
    // ALTER TABLE `gestor`.`t_archivos`
    // ADD INDEX `fkArchivosCategorias_idx` (`id_categoria` ASC);
    // ;
    // ALTER TABLE `gestor`.`t_archivos`
    // ADD CONSTRAINT `fkArchivosCategorias`
    //  FOREIGN KEY (`id_categoria`)
    //  REFERENCES `gestor`.`t_categorias` (`id_categoria`)
    //  ON DELETE NO ACTION
    //  ON UPDATE NO ACTION;

    // ALTER TABLE `gestor`.`t_archivos` 
    // ADD COLUMN `id_usuario` INT NOT NULL AFTER `id_archivo`;

    //     ALTER TABLE `gestor`.`t_archivos`
    // ADD INDEX `fkUsuariosArchivos_idx` (`id_usuario` ASC);
    // ;
    // ALTER TABLE `gestor`.`t_archivos`
    // ADD CONSTRAINT `fkUsuariosArchivos`
    //  FOREIGN KEY (`id_usuario`)
    //  REFERENCES `gestor`.`t_usuarios` (`id_usuario`)
    //  ON DELETE NO ACTION
    //  ON UPDATE NO ACTION;

?>