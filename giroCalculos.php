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
$comisionMatriz = isset($_POST['comisionMatriz']) ? (htmlentities($_POST['comisionMatriz'])) : '';
$comisionAgente = isset($_POST['comisionAgente']) ? (htmlentities($_POST['comisionAgente'])) : '';
$comisionCorresponsal = isset($_POST['comisionCorresponsal']) ? (htmlentities($_POST['comisionCorresponsal'])) : '';
$beneficio = isset($_POST['beneficio']) ? (htmlentities($_POST['beneficio'])) : '';

//

$accion = intval($_POST['accion']);
//$accion = 1;


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
    $comisionAgente = ($resultado[0]["pa_comision"]);
    $fijoAgente = $resultado[0]["pa_fijo"];
    $idTipoComisionAgente = $resultado[0]["idTipoComision"];
    $idMonedaPagoAgente = $resultado[0]["idMoneda"];

    //echo "<p>AGENTE</p>";
    //echo "tasa: " . $tasaAgente ."</br>";
    //echo "tipo cambio: " . $tipoCambioAgente ."</br>";
    //echo "comsion: " . $comisionAgente ."</br>";
    //echo "fijo: " . $fijoAgente ."</br>";
    //echo "idtipo comision: " . $idTipoComisionAgente ."</br>";
    //echo "idmonedaAgente" . $idMonedaPagoAgente ."</br>";



    //Para recuperar el corresponsal que inicio sesion

    $id = $corresponsal;
    //$id=4; //para el id del corresponsal

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaCorresponsal = $resultado[0]["pa_tasa"];
    $tipoCambioCorresponsal = $resultado[0]["pa_tipoCambio"];
    $comisionCorresponsal = ($resultado[0]["pa_comision"]);
    $fijoCorresponsal = $resultado[0]["pa_fijo"];
    $idTipoComisionCorresponsal = $resultado[0]["idTipoComision"];
    $idMonedaPagoCorresponsal = $resultado[0]["idMoneda"];


    //echo "<p>CORRESPONSAL</p>";
    //echo "tasa: " . $tasaCorresponsal ."</br>";
    //echo "tipo cambio: " . $tipoCambioCorresponsal ."</br>";
    //echo "comsion: " . $comisionCorresponsal ."</br>";
    //echo "fijo: " . $fijoCorresponsal ."</br>";
    //echo "idtipo comision: " . $idTipoComisionCorresponsal ."</br>";
    //echo "idmonedaCorresponsal" . $idMonedaPagoCorresponsal ."</br>";


    //echo "<p>CASA MATRIZ</p>";
    //echo "tipo cambio: " . $_SESSION["ma_tipoCambio"] . "</br>";
    //echo "porcentaje tipo cambio: " . $_SESSION["ma_porcentajeTipoCambio"] . "</br>";
    //echo "fijo: " . $_SESSION["ma_fijo"] . "</br>";
    //echo "porcentaje: " . $_SESSION["ma_porcentaje"] . "</br>";
    //echo "idtipo comision: " . $_SESSION["ma_idTipoComision"] . "</br>";


    //llevar los montos fijos a dolares

    $fijoDolarizadoAgente = Dolarizar($fijoAgente, $idMonedaPagoAgente, $tasaAgente, $tipoCambioAgente);
    
    $fijoDolarizadoCorresponsal = Dolarizar($fijoCorresponsal, $idMonedaPagoCorresponsal, $tasaCorresponsal, $tipoCambioCorresponsal);
   
   // llevar a dolares el importe en moneda de envio

    $montoEnvio = Dolarizar($gi_importe,$idMonedaEnvio,$tasaCorresponsal, $tipoCambioCorresponsal);

    //echo "<p>FIJOS EN DOLARES</p>";
    //echo "agente: " . $fijoDolarizadoAgente ."</br>";
    //echo "corresponsal: " .$fijoDolarizadoCorresponsal ."</br>";
    //echo "importe: " . $montoEnvio ."</br>";

    //comision por tipo de cambio casa matriz

    $ctc= $montoEnvio*($_SESSION['ma_porcentajeTipoCambio']/100);

    //comision de la casa matriz por servicios por la oficina

    $cs= Comisiones($_SESSION['ma_idTipoComision'],$_SESSION['ma_porcentaje'],$montoEnvio,$_SESSION['ma_fijo']);


    // total de las comisiones en dolares de la casa matriz

    $tm= $ctc + $cs;

    //comision del agente en dolares

    $comisionAgente= Comisiones($idTipoComisionAgente,$comisionAgente,$montoEnvio,$fijoDolarizadoAgente);

    //comision del corresponsal en dolares

    $comisionCorresponsal= Comisiones($idTipoComisionCorresponsal,$comisionCorresponsal,$montoEnvio,$fijoDolarizadoCorresponsal);
   
    //beneficio de la casa matriz

    $beneficio= $tm;

    // total de las comisiones de la matriz en moneda de cobro

    $totalCobro = ($tm + $montoEnvio + $comisionAgente + $comisionCorresponsal ) * $tipoCambioAgente;

    // total del importe en moneda de cobro

    $local = $montoEnvio *  $tipoCambioAgente;

    //echo "<p>COMISIONES Y TOTALES</p>";
    //echo "% tipo de cambio: " . $ctc ."</br>";
    //echo "comision servicio: " . $cs ."</br>";
    //echo "total cmosiones matriz: " . $tm ."</br>";
    //echo "comision agente: " . $comisionAgente ."</br>";
    //echo "comision corresponsal: " . $comisionCorresponsal ."</br>";
    //echo "beneficio: " . $beneficio ."</br>";
    //echo "total moneda de cobro: " . $totalCobro ."</br>";
    //echo "monto moneda de cobro: " . $local ."</br>";
   
    
    //***********************************************************************************************/

     $outPut = [
        "total" => $totalCobro, "local" => $local, "mAgente" => $idMonedaPagoAgente,
        "mCorresponsal" => $idMonedaPagoCorresponsal, "mCobro" => $idMonedaCobro, 
        "mEnvio" => $idMonedaEnvio, "comisionMatriz" => $tm, "comisionAgente" => $comisionAgente,
        "comisionCorresponsal" => $comisionCorresponsal, "beneficio" => $beneficio
    ];

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

    $hoyAccesso = strtotime(date('Y-m-d'), time());
    $fechaCaducidad = strtotime($resultado[0]["cl_fechaCaducidad"]);

    if ($fechaCaducidad >= $hoyAccesso) {

        $permisoGiro = true;

    } else {

        $permisoGiro = false;

    }
    
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

        $outPut = ["valor" => 1, "permisoGiro" => $permisoGiro];

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

//para insertar los datos del giro

if ($accion == 5) {

    $frDolar = $_SESSION["ma_tipoCambio"];

    //para recuperar la tasa y el tipo de cambio del corresponsal

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    $resultado = $sentencia->fetchAll();

    $gi_tasa = $resultado[0]["pa_tasa"];

    $gi_tipoCambio = $resultado[0]["pa_tipoCambio"];

    $sql = "INSERT INTO giro VALUES 
    (NULL,?,?,?,?,?,?,
    ?,?,?,?,?,?,
    ?,?,?,?,?,?,
    ?,?,?,?,?,?,
    ?,?,?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $gi_fecha, $idUsuario, $idCliente, $idBeneficiario, $idAgente, $idPagador,
        $idPais, $gi_importe, $gi_Total, $gi_TotalLocal, $idMonedaCobro, $idMonedaEnvio,
        $gi_tasa, $gi_tipoCambio, $gi_impuesto, $idTipoRetiro, $gi_Banco, $gi_numCta,
        $gi_TipoCuenta, $idEstadoGiro, $gi_clave, $gi_comentario,$comisionMatriz,$comisionAgente,
        $comisionCorresponsal,$beneficio,$frDolar

    ));

    //$_SESSION['idFactura']=$mbd->lastInsertId();

    $lastId = $mbd->lastInsertId();

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

    //$sql = "SELECT * FROM moneda WHERE idPais = (SELECT idPais FROM cliente WHERE idCliente = ?)";

    $sql = "SELECT * FROM pais WHERE idPais = (SELECT idPais FROM pagador WHERE idPagador = ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idAgente));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("data" =>  $resultado));
}

//para actualizar la moneda de envio en el formulario de giro

if ($accion == 10) {

    $sql = "SELECT * FROM pais WHERE idPais = (SELECT idPais FROM pagador WHERE idPagador = ?)";

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

//para los calculos de las tarifas a cobrar al cliente, usando como importe la moneda local

if ($accion == 12) {

    //Para recuperar el agente que inicio sesion

    $id = $_SESSION["idAgente"];

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaAgente = $resultado[0]["pa_tasa"];
    $tipoCambioAgente = $resultado[0]["pa_tipoCambio"];
    $comisionAgente = ($resultado[0]["pa_comision"]);
    $fijoAgente = $resultado[0]["pa_fijo"];
    $idTipoComisionAgente = $resultado[0]["idTipoComision"];
    $idMonedaPagoAgente = $resultado[0]["idMoneda"];

    //echo "<p>AGENTE</p>";
    //echo "tasa: " . $tasaAgente ."</br>";
    //echo "tipo cambio: " . $tipoCambioAgente ."</br>";
    //echo "comsion: " . $comisionAgente ."</br>";
    //echo "fijo: " . $fijoAgente ."</br>";
    //echo "idtipo comision: " . $idTipoComisionAgente ."</br>";
    //echo "idmonedaAgente" . $idMonedaPagoAgente ."</br>";



    //Para recuperar el corresponsal que inicio sesion

    $id = $corresponsal;

    //$id=4; //para el id del corresponsal

    $sentencia->execute(array($id));

    $resultado = $sentencia->fetchAll();

    $tasaCorresponsal = $resultado[0]["pa_tasa"];
    $tipoCambioCorresponsal = $resultado[0]["pa_tipoCambio"];
    $comisionCorresponsal = ($resultado[0]["pa_comision"]);
    $fijoCorresponsal = $resultado[0]["pa_fijo"];
    $idTipoComisionCorresponsal = $resultado[0]["idTipoComision"];
    $idMonedaPagoCorresponsal = $resultado[0]["idMoneda"];


    //echo "<p>CORRESPONSAL</p>";
    //echo "tasa: " . $tasaCorresponsal ."</br>";
    //echo "tipo cambio: " . $tipoCambioCorresponsal ."</br>";
    //echo "comsion: " . $comisionCorresponsal ."</br>";
    //echo "fijo: " . $fijoCorresponsal ."</br>";
    //echo "idtipo comision: " . $idTipoComisionCorresponsal ."</br>";
    //echo "idmonedaCorresponsal" . $idMonedaPagoCorresponsal ."</br>";


    //echo "<p>CASA MATRIZ</p>";
    //echo "tipo cambio: " . $_SESSION["ma_tipoCambio"] . "</br>";
    //echo "porcentaje tipo cambio: " . $_SESSION["ma_porcentajeTipoCambio"] . "</br>";
    //echo "fijo: " . $_SESSION["ma_fijo"] . "</br>";
    //echo "porcentaje: " . $_SESSION["ma_porcentaje"] . "</br>";
    //echo "idtipo comision: " . $_SESSION["ma_idTipoComision"] . "</br>";


    //llevar los montos fijos a dolares

    $fijoDolarizadoAgente = Dolarizar($fijoAgente, $idMonedaPagoAgente, $tasaAgente, $tipoCambioAgente);
    
    $fijoDolarizadoCorresponsal = Dolarizar($fijoCorresponsal, $idMonedaPagoCorresponsal, $tasaCorresponsal, $tipoCambioCorresponsal);
   
   // llevar a dolares el monto en moneda de cobro local 

    $montoLocal = Dolarizar($gi_TotalLocal,$idMonedaCobro,$tasaAgente, $tipoCambioAgente);

    //echo "<p>FIJOS EN DOLARES</p>";
    //echo "agente: " . $fijoDolarizadoAgente ."</br>";
    //echo "corresponsal: " .$fijoDolarizadoCorresponsal ."</br>";
    //echo "monto local: " . $montoLocal ."</br>";

    //comision por tipo de cambio casa matriz

    $ctc= $montoLocal*($_SESSION['ma_porcentajeTipoCambio']/100);

    //comision de la casa matriz por servicios por la oficina

    $cs= Comisiones($_SESSION['ma_idTipoComision'],$_SESSION['ma_porcentaje'],$montoLocal,$_SESSION['ma_fijo']);


    // total de las comisiones en dolares de la casa matriz

    $tm= $ctc + $cs;

    //comision del agente en dolares

    $comisionAgente= Comisiones($idTipoComisionAgente,$comisionAgente,$montoLocal,$fijoDolarizadoAgente);

    //comision del corresponsal en dolares

    $comisionCorresponsal= Comisiones($idTipoComisionCorresponsal,$comisionCorresponsal,$montoLocal,$fijoDolarizadoCorresponsal);
   
    //beneficio de la casa matriz

    $beneficio= $tm;

    // total de las comisiones de la matriz en moneda de cobro

    $totalCobro = ($tm + $montoLocal + $comisionAgente + $comisionCorresponsal ) * $tipoCambioAgente;
    $totalCobroDolar = ($tm + $montoLocal + $comisionAgente + $comisionCorresponsal ) ;

    // total del importe en moneda de envio

    $importeEnvio = $montoLocal * $tipoCambioCorresponsal;

    //echo "<p>COMISIONES Y TOTALES</p>";
    //echo "% tipo de cambio: " . $ctc ."</br>";
    //echo "comision servicio: " . $cs ."</br>";
    //echo "total cmosiones matriz: " . $tm ."</br>";
    //echo "comision agente: " . $comisionAgente ."</br>";
    //echo "comision corresponsal: " . $comisionCorresponsal ."</br>";
    //echo "beneficio: " . $beneficio ."</br>";
    //echo "total cobro dolar: " . $totalCobroDolar ."</br>";
    //echo "tipo cambio agente: " . $tipoCambioAgente ."</br>";
    //echo "total moneda de cobro: " . $totalCobro ."</br>";
    //echo "importe moneda de envio: " . $importeEnvio ."</br>";

    
     $outPut = [
        "totalCobro" => $totalCobro, "importeEnvio" => $importeEnvio, "mAgente" => $idMonedaPagoAgente,
        "mCorresponsal" => $idMonedaPagoCorresponsal, "mCobro" => $idMonedaCobro, 
        "mEnvio" => $idMonedaEnvio, "comisionMatriz" => $tm, "comisionAgente" => $comisionAgente,
        "comisionCorresponsal" => $comisionCorresponsal, "beneficio" => $beneficio
    ];

    echo json_encode(array("data" => $outPut)); 
}