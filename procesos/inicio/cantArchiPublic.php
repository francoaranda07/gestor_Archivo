<?php
    session_start();
    require_once "../../clases/inicio.php";
    $Inicio = new Inicio();

    echo json_encode($Inicio->cantArchiPublic($_POST['idUsuario']));

?>