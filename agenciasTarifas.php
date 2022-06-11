<?php

//session_start();

require_once 'conexion.php';

//Recuperar los pagadors para el datatable

//mostrar todos

$action = 1;

if ($action == 1) {

    $sql = "SELECT u.idPagador, u.pagador,p.idPais, p.pais, p.tipoCambio, p.porcentajeTipoCambio,
    u.pa_tasa,u.pa_tipoCambio, u.pa_comision, 
    u.pa_fijo, u.idTipoComision, e.tipoEmpresa, m.moneda
    FROM pagador AS u 
    JOIN pais AS p ON u.idPais = p.idPais 
    JOIN tipoempresa AS e ON u.idTipoEmpresa = e.idTipoEmpresa
    JOIN moneda AS m ON u.idMoneda = m.idMoneda 
    ORDER BY pais,tipoEmpresa ASC";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();      

    //echo "tasa en dolares / euro : " . $resultado[0]['pa_tasa'];

   /* while($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){

    echo "agencia: " .$fila["pagador"];
    echo " idPais: " .$fila["idPais"];
    echo " Pais: " .$fila["pais"];
    echo " TipoEmpresa: " .$fila["tipoEmpresa"];
    echo " Tasa: " .$fila["pa_tasa"];
    echo "</br>";

    }   */






}

