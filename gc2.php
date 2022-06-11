<?php

session_start();

require_once('conexion.php');

require_once('funcionesPropias.php');

//$idMonedaEnvio = isset($_POST['idMonedaPago']) ? intval(htmlentities($_POST['idMonedaPago'])) :'';
//$idMonedaCobro = isset($_POST['idMonedaCobro']) ? intval(htmlentities($_POST['idMonedaCobro'])) :'';
//$gi_importe = isset($_POST['gi_importe']) ? floatval(htmlentities($_POST['gi_importe'])) :'';
$corresponsal = isset($_POST['corresponsal']) ? intval(htmlentities($_POST['corresponsal'])) : '';
//$idBeneficiario = isset($_POST['idBeneficiario']) ? intval(htmlentities($_POST['idBeneficiario'])) :'';
//$idCliente = isset($_POST['idCliente']) ? intval(htmlentities($_POST['idCliente'])) :'';
//$gi_Total = isset($_POST['gi_Total']) ? floatval(htmlentities($_POST['gi_Total'])) :'';

//

$idGiro = isset($_POST['idGiro']) ? intval(htmlentities($_POST['idGiro'])) : '';
$gi_fecha = isset($_POST['gi_fecha']) ? (htmlentities($_POST['gi_fecha'])) : '';
$idUsuario = $_SESSION["idUsuario"];
$idCliente = isset($_POST['idCliente']) ? intval(htmlentities($_POST['idCliente'])) : '';
$idBeneficiario = isset($_POST['idBeneficiario']) ? intval(htmlentities($_POST['idBeneficiario'])) : '';
$idAgente = $_SESSION["idAgente"];
$idPagador = isset($_POST['idPagador']) ? intval(htmlentities($_POST['idPagador'])) : '';
$idPais = isset($_POST['idPais']) ? intval(htmlentities($_POST['idPais'])) : '';
$gi_importe = isset($_POST['gi_importe']) ? floatval(htmlentities($_POST['gi_importe'])) : '';
$gi_Total = isset($_POST['gi_Total']) ? floatval(htmlentities($_POST['gi_Total'])) : '';
$gi_TotalLocal = isset($_POST['gi_TotalLocal']) ? floatval(htmlentities($_POST['gi_TotalLocal'])) : '';
$idMonedaCobro = isset($_POST['idMonedaCobro']) ? intval(htmlentities($_POST['idMonedaCobro'])) : '';
$idMonedaEnvio = isset($_POST['idMonedaPago']) ? intval(htmlentities($_POST['idMonedaPago'])) : '';
$gi_tasa = isset($_POST['gi_tasa']) ? floatval(htmlentities($_POST['gi_tasa'])) : '';
$gi_tipoCambio = isset($_POST['gi_tipoCambio']) ? floatval(htmlentities($_POST['gi_tipoCambio'])) : '';
$gi_impuesto = isset($_POST['gi_impuesto']) ? floatval(htmlentities($_POST['gi_impuesto'])) : '';
$idTipoRetiro = isset($_POST['idTipoRetiro']) ? intval(htmlentities($_POST['idTipoRetiro'])) : '';
$gi_Banco = isset($_POST['gi_Banco']) ? (htmlentities($_POST['gi_Banco'])) : '';
$gi_numCta = isset($_POST['gi_numCta']) ? (htmlentities($_POST['gi_numCta'])) : '';
$gi_TipoCuenta = isset($_POST['gi_TipoCuenta']) ? (htmlentities($_POST['gi_TipoCuenta'])) : '';
$idEstadoGiro = isset($_POST['idEstadoGiro']) ? intval(htmlentities($_POST['idEstadoGiro'])) : '';
$gi_clave = generateRandomString($length = 10);
$gi_comentario = isset($_POST['gi_comentario']) ? (htmlentities($_POST['gi_comentario'])) : '';
///////////////////////////////////////////////////////////////////////////////////////

/* $outPut = [ 
 'gi_fecha ' => $gi_fecha,
 'idUsuario ' => $idUsuario,
 'idCliente ' => $idCliente ,
 'idBeneficiario ' => $idBeneficiario,
 'idAgente' => $idAgente,
 'idPagador ' => $idPagador,
 'idPais ' => $idPais,
 'gi_importe ' => $gi_importe,
 'gi_Total ' => $gi_Total,
 'gi_TotalLocal ' => $gi_TotalLocal,
 'idMonedaCobro ' => $idMonedaCobro,
 'idMonedaEnvio ' => $idMonedaEnvio,
 'gi_tasa ' => $gi_tasa,
 'gi_tipoCambio ' => $gi_tipoCambio,
 'gi_impuesto ' => $gi_impuesto,
 'idTipoRetiro ' => $idTipoRetiro,
 'gi_Banco ' => $gi_Banco,
 'gi_numCta ' => $gi_numCta,
 'gi_TipoCuenta ' => $gi_TipoCuenta,
 'idEstadoGiro ' => $idEstadoGiro,
 'gi_clave ' => $gi_clave,
 'gi_comentario ' => $gi_comentario];*/


//



$accion = intval($_POST['accion']);

/* if ($accion==5) {   

        echo json_encode(array("data" => $outPut));
} */

//para los calculos de las tarifas a cobrar al cliente

if ($accion == 1) {

    //Para recuperar el agente que inicio sesion

    $id = $_SESSION["idAgente"];
    

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaAgente = $resultado[0]["pa_tasa"];
    $tipoCambioAgente = $resultado[0]["pa_tipoCambio"];
    $comisionAgente = ($resultado[0]["pa_comision"]) / 100;
    $fijoAgente = $resultado[0]["pa_fijo"];
    $idTipoComisionAgente = $resultado[0]["idTipoComision"];
    $idMonedaPagoAgente = $resultado[0]["idMoneda"];

    
    //Para recuperar el corresponsal que inicio sesion

   $id = $corresponsal;    

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaCorresponsal = $resultado[0]["pa_tasa"];
    $tipoCambioCorresponsal = $resultado[0]["pa_tipoCambio"];
    $comisionCorresponsal = ($resultado[0]["pa_comision"]) / 100;
    $fijoCorresponsal = $resultado[0]["pa_fijo"];
    $idTipoComisionCorresponsal = $resultado[0]["idTipoComision"];
    $idMonedaPagoCorresponsal = $resultado[0]["idMoneda"];


    //llevar el monto fijo a dollares

    $fijoDolarizadoAgente = Dolarizar($fijoAgente,$idMonedaPagoAgente,$tasaAgente,$tipoCambioAgente);

    $fijoDolarizadoCorresponsal = Dolarizar($fijoCorresponsal,$idMonedaPagoCorresponsal,$tasaCorresponsal,$tipoCambioCorresponsal);

    //para llevar los dolares a la moneda de envio
    
    $fijoMonedaEnvioAgente=MonedaEnvioCorresponsal($fijoDolarizadoAgente,$idMonedaEnvio,$tasaCorresponsal,$tipoCambioCorresponsal);

    $fijoMonedaEnvioCorresponsal=MonedaEnvioCorresponsal($fijoDolarizadoCorresponsal,$idMonedaEnvio,$tasaCorresponsal,$tipoCambioCorresponsal);

    //para calcular los montos de la comisiones del agente y el corresponsal en moneda de envio
    // segun el tipo de comision


    $cargoAgente = cargoMod($idTipoComisionAgente, $comisionAgente, $gi_importe, $fijoMonedaEnvioAgente);

    $cargoCorresponsal = cargoMod($idTipoComisionCorresponsal, $comisionCorresponsal, $gi_importe, $fijoMonedaEnvioCorresponsal);


    //$cargoAgente = cargo($idTipoComisionAgente, $comisionAgente, $gi_importe, $fijoAgente, $tipoCambioAgente, $tasaAgente, $idMonedaPagoAgente, $idMonedaEnvio);

    //$cargoCorresponsal = cargo($idTipoComisionCorresponsal, $comisionCorresponsal, $gi_importe, $fijoCorresponsal, $tipoCambioCorresponsal, $tasaCorresponsal, $idMonedaPagoCorresponsal, $idMonedaEnvio);

    $total = $gi_importe + $cargoAgente + $cargoCorresponsal;

    $totalDolarizado= Dolarizar($total,$idMonedaEnvio,$tasaCorresponsal,$tipoCambioCorresponsal);

    $local = $totalDolarizado*$tipoCambioAgente;

    //$local = guardarMontoCobrado($total, $tipoCambioAgente, $tasaAgente, $idMonedaCobro, $idMonedaEnvio);

    //echo json_encode(array("data" => "ok")); 

    $outPut = ["total" => $total, "local" => $local, "mAgente" => $idMonedaPagoAgente, 
    "mCorresponsal" => $idMonedaPagoCorresponsal, "mCobro" => $idMonedaCobro, "mEnvio" => $idMonedaEnvio ];

    echo json_encode(array("data" => $outPut));
}

//para recuperar los datos bancarios del beneficiario

if ($accion == 2) {


    $sql = "SELECT u.be_numCuenta,c.tipoCuenta,b.banco FROM beneficiario AS u 
    JOIN tipocuenta AS c ON u.idTipoCuenta = c.idTipoCuenta
    JOIN banco AS b ON u.idBanco = b.idBanco
    WHERE idBeneficiario = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idBeneficiario));

    $resultado = $sentencia->fetchAll();

    $cuenta = $resultado[0]["be_numCuenta"];
    $tipoCta = $resultado[0]["tipoCuenta"];
    $banco = $resultado[0]["banco"];

    $outPut = ["cuenta" => $cuenta, "tipoCta" => $tipoCta, "banco" => $banco];

    echo json_encode(array("data" => $outPut));
}

//para verificar el cliente

if ($accion == 3) {

    //Para recuperar el agente que inicio sesion

    $id = $_SESSION["idAgente"];

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaAgente = $resultado[0]["pa_tasa"];
    $tipoCambioAgente = $resultado[0]["pa_tipoCambio"];
    $comisionAgente = ($resultado[0]["pa_comision"]) / 100;
    $fijoAgente = $resultado[0]["pa_fijo"];
    $idTipoComisionAgente = $resultado[0]["idTipoComision"];
    $idMonedaPagoAgente = $resultado[0]["idMoneda"];


    //recuperar el monto limite del cliente y luego dolarizarlo

    $sql = "SELECT * FROM cliente WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    $resultado = $sentencia->fetchAll();

    $limite = $resultado[0]["cl_limite"];
    $moneda = $resultado[0]["idMoneda"];
    $limiteDolarizado = Dolarizar($limite, $moneda, $tasaAgente, $tipoCambioAgente);

    //recuperar todas las operaciones en el mes

    $acumuladoGiros = 0;

    $montoNuevo = Dolarizar($gi_Total, $idMonedaEnvio, $tasaAgente, $tipoCambioAgente);

    //calculo de la fecha de inicio del mes actual

    $inicio = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));

    $sql = "SELECT * FROM giro WHERE idCliente = ? AND gi_fecha >= ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente, $inicio));

    while ($fila = $sentencia->fetch(PDO::FETCH_BOTH)) {

        $acumuladoGiros = $acumuladoGiros + Dolarizar($fila['gi_Total'], $fila['idMonedaPago'], $tasaAgente, $tipoCambioAgente);
    }

    if (($montoNuevo + $acumuladoGiros) <= $limiteDolarizado) {

        $outPut = ["valor" => 1];

        echo json_encode(array("data" => $outPut));
    } else {

        $outPut = ["valor" => 2];

        echo json_encode(array("data" => $outPut));
    }
}

//para verificar el corresponsal

if ($accion == 4) {

    //Para recuperar el corresponsal que inicio sesion

    $id = $corresponsal;

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaCorresponsal = $resultado[0]["pa_tasa"];

    $tipoCambioCorresponsal = $resultado[0]["pa_tipoCambio"];

    //Para recuperar los movimientos

    $sql = "SELECT m.idCuenta, (SUM(m.entrada)-SUM(m.salida)) AS Saldo,
    c.idPagador,c.idMoneda 
    FROM movimiento AS m
    JOIN cuenta AS c ON m.idCuenta = c.idCuenta
    WHERE c.idPagador = ?    
    GROUP BY idCuenta";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($corresponsal));

    //saldo acumulado

    $acumulado = 0;

    while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {

        //echo "<p> num cuenta ".$fila['idCuenta']. " saldo: ". $fila['Saldo']." pagador: ".$fila['idPagador']."</p>";

        $dol = Dolarizar($fila['Saldo'], $fila['idMoneda'], $tasaCorresponsal, $tipoCambioCorresponsal);

        $acumulado = $acumulado + $dol;

        //echo "<p> Monto Dolarizado ". $dol ." Saldo acumulado ".$acumulado."</p>";
    }

    $montoNuevo = Dolarizar($gi_importe, $idMonedaEnvio, $tasaCorresponsal, $tipoCambioCorresponsal);

    if ($montoNuevo <= $acumulado) {

        $outPut = ["valor" => 1, "acumulado" => $acumulado];

        echo json_encode(array("data" => $outPut));
    } else {

        $outPut = ["valor" => 2, "acumulado" => $acumulado];

        echo json_encode(array("data" => $outPut));
    }
}

//para insertar los datos del giro 5

if ($accion == 5) {

    //para recuperar la tasa y el tipo de cambio del corresponsal

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    $resultado = $sentencia->fetchAll();

    $gi_tasa = $resultado[0]["pa_tasa"];

    $gi_tipoCambio = $resultado[0]["pa_tipoCambio"];

    $sql = "INSERT INTO giro VALUES 
    (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $gi_fecha, $idUsuario, $idCliente, $idBeneficiario, $idAgente, $idPagador,
        $idPais, $gi_importe, $gi_Total, $gi_TotalLocal, $idMonedaCobro, $idMonedaEnvio,
        $gi_tasa, $gi_tipoCambio, $gi_impuesto, $idTipoRetiro, $gi_Banco, $gi_numCta,
        $gi_TipoCuenta, $idEstadoGiro, $gi_clave, $gi_comentario

    ));

    //$_SESSION['idFactura']=$mbd->lastInsertId();

    $lastId=$mbd->lastInsertId();

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $outPut = ["valor" => 1, "idFactura" => $lastId];

        echo json_encode(array("data" => $outPut));
        
    } else {

        $outPut = ["valor" => 2, "idFactura" => 0];

        echo json_encode(array("data" => $outPut));
    }
}

//para recuperar el giro por su id

if ($accion == 8) {

    $sql = "SELECT * FROM giro WHERE idGiro = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idGiro));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("data" =>  $resultado));
}

//para actualizar el estatus del giro

if ($accion == 7) {

    $sql = "UPDATE giro SET  idEstadoGiro = ? WHERE idGiro = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idEstadoGiro, $idGiro));

    echo json_encode(array("data" => "ok"));
}

//para actualizar la moneda de cobro en el formulario de giro

if ($accion == 9) {
    
    $sql = "SELECT * FROM moneda WHERE idPais = (SELECT idPais FROM cliente WHERE idCliente = ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("data" =>  $resultado));
        

}

//para actualizar la moneda de envio en el formulario de giro

if ($accion == 10) {
    
    $sql = "SELECT * FROM monedaenvio WHERE idPais = (SELECT idPais FROM pagador WHERE idPagador = ?)";  

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("data" =>  $resultado));
        

}

//para actualizar el pais en el formulario de giro

if ($accion == 11) {
    
    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("data" =>  $resultado));
        

}