<?php

session_start();

require_once('conexion.php');

//mostrar todos los bancos


$sql = "SELECT g.idGiro,g.gi_fecha,g.gi_importe,m.mo_codigo,c.pagador,e.estadoGiro,e.idEstadoGiro,g.gi_clave
  FROM giro AS g 
  JOIN monedaenvio AS m ON g.idMonedaPago = m.idMonedaEnvio
  JOIN pagador AS c ON g.idPagador = c.idPagador
  JOIN estadogiro AS e ON g.idEstadoGiro = e.idEstadoGiro";

$sentencia = $mbd->prepare($sql);

$sentencia->execute();

$resultado = $sentencia->fetchAll();

$outPut = array();

foreach ($resultado as $row) {

  if ($row["idEstadoGiro"]==1) {

    $st='<span class="badge bg-warning">' .$row["estadoGiro"].'</span>';
    
  } elseif ($row["idEstadoGiro"]==2) {

    $st='<span class="badge bg-success">' .$row["estadoGiro"].' </span>';
    
  } else {
    
    $st='<span class="badge bg-danger">' .$row["estadoGiro"].' </span>';

  }

  $permisoActualizar=[1,4];

    if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {

       $edicion= '<span class="badge bg-primary editar" id=' . $row["idGiro"] . '> Editar</span>';

    } else {
       
        $edicion='';
    }

    $imp= '<a href="factura.php?idGiro='.$row["idGiro"].'" target="_blank"><span class="badge bg-secondary">Imprimir</span></a>';

    //$imp="hola";

  $subArray = array(
    "id" => $row["idGiro"],
    "Fecha" => $row["gi_fecha"],
    "Importe" => $row["gi_importe"],
    "Moneda" => $row["mo_codigo"],
    "Corresponsal" => $row["pagador"],
    "Guia" => $row["gi_clave"],
    "Status" => $st,
    "Edit" =>  $edicion,
    "Imp" =>  $imp,
  );

  $outPut[] = $subArray;
}


echo json_encode(array("data" => $outPut));


//para recuperar los datos del giro por id

//$idGiro = isset($_POST['idGiro']) ? intval(htmlentities($_POST['idGiro'])) : '';

