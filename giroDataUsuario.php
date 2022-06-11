<?php

session_start();

require_once('conexion.php');

//mostrar todos los bancos


$sql = "SELECT g.idGiro,g.gi_fecha,g.gi_TotalLocal,m.mo_codigo,c.us_nombre,c.us_apellido, 
c.us_identificacion, e.estadoGiro,e.idEstadoGiro
  FROM giro AS g 
  JOIN moneda AS m ON g.idMonedaCobro = m.idMoneda
  JOIN usuario AS c ON g.idUsuario = c.idUsuario
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

  $subArray = array(

    "id" => $row["idGiro"],
    "Fecha" => $row["gi_fecha"],
    "Monto" => $row["gi_TotalLocal"],
    "Moneda" => $row["mo_codigo"],
    "Identificacion" => $row["us_identificacion"],
    "Usuario" => $row["us_nombre"]." ".$row["us_apellido"],
    "Status" => $st
    
  );

  $outPut[] = $subArray;
}


echo json_encode(array("data" => $outPut));


//para recuperar los datos del giro por id

//$idGiro = isset($_POST['idGiro']) ? intval(htmlentities($_POST['idGiro'])) : '';

