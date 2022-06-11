<?php

session_start();

if (!isset($_SESSION["rolUsuario"])) {

  //header("Location:index.php");

}

require_once('conexion.php');


//Recuperar los usuarios para el datatable

$idPagador = isset($_REQUEST['idPagador']) ? intval(htmlentities($_REQUEST['idPagador'])) : '';
$idMovimiento = isset($_REQUEST['idMovimiento']) ? htmlentities($_REQUEST['idMovimiento']) : '';
$inicio = isset($_REQUEST['inicio']) ? $_REQUEST['inicio'] : '';
$fin = isset($_REQUEST['fin']) ? $_REQUEST['fin'] : '';

$fechaOperacion = isset($_REQUEST['fechaOperacion']) ? htmlentities($_REQUEST['fechaOperacion']) : '';
$numOperacion = isset($_REQUEST['numOperacion']) ? htmlentities($_REQUEST['numOperacion']) : '';
$idCuenta = isset($_REQUEST['idCuenta']) ? htmlentities($_REQUEST['idCuenta']) : '';
$entrada = isset($_REQUEST['entrada']) ? htmlentities($_REQUEST['entrada']) : '';
$salida = isset($_REQUEST['salida']) ? htmlentities($_REQUEST['salida']) : '';
$idUsuario = isset($_SESSION["idUsuario"]) ? $_SESSION["idUsuario"] : 14;
$creacion = isset($_REQUEST['creacion']) ? htmlentities($_REQUEST['creacion']) : '';
$tipoCambio = isset($_REQUEST['tipoCambio']) ? htmlentities($_REQUEST['tipoCambio']) : '';



$action = isset($_REQUEST['accion']) ? intval(htmlentities($_REQUEST['accion'])) : 9;


// agregar nueva carga manual

if ($action == 2) {

  $sql = "INSERT INTO movimiento VALUES (NULL,?,?,?,?,?,?,NULL,?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(


    $fechaOperacion, $numOperacion, $idCuenta, $entrada, $salida, $idUsuario,$tipoCambio

  ));


  $cantidadFilas = $sentencia->rowCount();

  if ($cantidadFilas = 1) {

    $_SESSION['msg'] = 'Proceso Exitoso';
    $_SESSION['control'] = true;
  } else {

    $_SESSION['msg'] = 'Proceso Fallido';
    $_SESSION['control'] = false;
  }

  header("Location:movimiento.php");
}

// recuperar por su id

if ($action == 7) {

  $sql = "SELECT c.idCuenta, c.cu_numCta, m.mo_codigo, m.moneda 
  FROM cuenta AS c
  JOIN moneda AS m ON c.idMoneda = m.idMoneda  
  WHERE idPagador = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array($idPagador));

  $resultado = $sentencia->fetchAll();

  echo json_encode(array("data" => $resultado));
}

// agregar operaciones carga masiva

if ($action == 8) {

  $file_mimes = pathinfo($_FILES['fileCsv']['name'], PATHINFO_EXTENSION);  

  if ($file_mimes == "csv") {
  
  //echo '<p> estoy dentro del if del csv</p>';

    $fp = fopen($_FILES['fileCsv']['tmp_name'], "r");

    while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {

      //echo '<p> dos: '.$data[1].'</p>';
      //echo '<p> uno: '.$data[0].'</p>';
      //echo '<p> tres: '.$data[2].'</p>';
      //echo '<p> cuatro: '.$data[3].'</p>';
      //echo '<p> cinco: '.$data[4].' valor debe ser 1 </p>';
      

      if (intval($data[4]) == 1) {

        //echo '<p> estoy DENTRO del if para INSERTAR </p>';

        $tipoCambio = 0;

        if (!$data[2] > 0) {
          $data[2] = 0;
        }

        if (!$data[3] > 0) {
          $data[3] = 0;
        }


        $sql = "INSERT INTO movimiento VALUES (NULL,?,?,?,?,?,?,NULL,?)";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute(array(

          //$data[0], intval($data[1]), $idCuenta, $data[3], $data[4], $idUsuario
          $data[0], intval($data[1]), $idCuenta, $data[2], $data[3], $idUsuario,$tipoCambio

        ));

        $cantidadFilas = $sentencia->rowCount();

        //echo '<p> CANTIDAD DE FILA AFECTADA: ' . $cantidadFilas .  '</p>';

        $estadoGiro = 2;

        //echo '<p> estado de giro: ' . $estadoGiro .  '</p>';

      } else {

        //echo '<p> estoy FUERA del if para INSERTAR </p>';

        $estadoGiro = 3;

        //echo '<p> estado de giro: ' . $estadoGiro .  '</p>';

      }

      $idGiro = intval($data[1]);

      $sql = "UPDATE giro SET  idEstadoGiro = ? WHERE idGiro = ?";

      $sentencia = $mbd->prepare($sql);

      $sentencia->execute(array($estadoGiro, $idGiro));


    } //fin del while

    if ($cantidadFilas = 1) {

      $_SESSION['msg'] = 'Proceso Exitoso';
      $_SESSION['control'] = true;
    } else {

      $_SESSION['msg'] = 'Proceso Fallido';
      $_SESSION['control'] = false;
    }

    header("Location:movimientoCarga.php");
    
  } else {

    //echo '<p> PROCESO FALLIDO estoy fuera del if del csv</p>';

    $_SESSION['msg'] = 'Proceso Fallido formato valido de archivo csv';

    $_SESSION['control'] = false;

    header("Location:movimientoCarga.php");
  }

}

//mostrar todas la operaciones con saldo

if ($action == 9) {

  //consulta para determinar el saldo anterior a la fecha de la consulta
  //para que sea considerado el acumulado antes del intervalo de fechas

  $sql = "SELECT (SUM(entrada)-SUM(salida)) AS saldo FROM movimiento WHERE idCuenta = ? 
  AND fechaOperacion < ? ";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $idCuenta, $inicio

  ));

  $resultado = $sentencia->fetchAll();

  if ($resultado[0]['saldo'] > 0) {

    $saldoAcumulado = $resultado[0]['saldo'];
  } else {

    $saldoAcumulado = 0;
  }

  //fin de la consulta del monto acumulado

  // para recuperar el saldo en el intervalo de fecha dado

  $sql = "SELECT *, (entrada-salida) AS saldo FROM movimiento WHERE idCuenta = ? 
  AND (fechaOperacion BETWEEN ? AND ?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $idCuenta, $inicio, $fin

  ));

  $resultado = $sentencia->fetchAll();

  $outPut = array();

  foreach ($resultado as $row) {

    $saldoAcumulado = $saldoAcumulado + ($row["entrada"] - $row["salida"]);

    $subArray = array(
      "id" => $row["idMovimiento"],
      "Fecha" => $row["fechaOperacion"],
      "Referencia" => $row["numOperacion"],
      "Entrada" => $row["entrada"],
      "Salida" => $row["salida"],
      "Saldo" => number_format($saldoAcumulado, 2),
    );

    $outPut[] = $subArray;
  }


  echo json_encode(array("data" => $outPut));
}


//mostrar todas la operaciones con tipo de cambio

if ($action == 10) {

  // para recuperar los movimientos en el intervalo de fecha dado

  $sql = "SELECT * FROM movimiento WHERE idCuenta = ? 
  AND (fechaOperacion BETWEEN ? AND ?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $idCuenta, $inicio, $fin

  ));

  $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

  $outPut = array();

  foreach ($resultado as $row) {

    
    $subArray = array(
      "id" => $row["idMovimiento"],
      "Fecha" => $row["fechaOperacion"],
      "Referencia" => $row["numOperacion"],
      "Entrada" => $row["entrada"],
      "Salida" => $row["salida"],
      "TipodeCambio" => $row["tipoCambio"],
    );

    $outPut[] = $subArray;
  }


  echo json_encode(array("data" => $outPut));
}