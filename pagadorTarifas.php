<?php

//session_start();

require_once 'conexion.php';

//Recuperar los pagadors para el datatable

//mostrar todos

$action = 1;

if ($action == 1) {

    $sql = "SELECT u.idPagador, u.pagador, p.pais, u.pa_tasa,u.pa_tipoCambio
    FROM pagador AS u 
    JOIN pais AS p ON u.idPais = p.idPais ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();      

    //echo "tasa en dolares / euro : " . $resultado[0]['pa_tasa'];
}