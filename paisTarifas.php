<?php

require_once 'conexion.php';

//Recuperar las comisones de la casa matriz

//mostrar todos

$action = isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])) : 1;

if ($action == 1) {

    $sql = "SELECT *  FROM pais";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();      

    //echo "tasa en dolares / euro : " . $resultado[0]['pa_tasa'];
}

