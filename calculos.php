<?php

session_start();

require_once('conexion.php');

require_once('funcionesPropias.php');

$idMonedaEnvio = isset($_POST['idMonedaPago']) ? intval(htmlentities($_POST['idMonedaPago'])) : '';
$idMonedaCobro = isset($_POST['idMonedaCobro']) ? intval(htmlentities($_POST['idMonedaCobro'])) : '';
$gi_importe = isset($_POST['gi_importe']) ? floatval(htmlentities($_POST['gi_importe'])) : '';
$corresponsal = 4;
$idBeneficiario = isset($_POST['idBeneficiario']) ? intval(htmlentities($_POST['idBeneficiario'])) : '';
$idCliente = 4;



$accion = 3;


//Para recuperar el agente que inicio sesion

$id = 3;

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

$acum = 0;

if ($accion == 3) {

    //recuperar el monto limite del cliente y luego dolarizarlo

    $sql = "SELECT * FROM cliente WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    $resultado = $sentencia->fetchAll();

    $limite = $resultado[0]["cl_limite"];
    $moneda = $resultado[0]["idMoneda"];
    $limiteDolarizado= Dolarizar($limite,$moneda,$tasaAgente,$tipoCambioAgente);

    echo $limiteDolarizado;

    //recuperar todas las operaciones en el mes

    //calculo de la fecha de inicio del mes actual

    $inicio = date('Y-m-d', mktime(0,0,0,date('m'),3,date('Y')));

    $sql = "SELECT * FROM giro WHERE idCliente = ? AND gi_fecha >= ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente,$inicio));

    while ($fila = $sentencia->fetch(PDO::FETCH_BOTH)) {
       
        $acum=$acum+$fila['gi_Total'];
        echo '<p>'.$fila['idGiro']." el monto es ".$fila['gi_Total']." y la moneda es ".$fila['idMonedaPago'].'</p>';

    }
        echo '<p>'. $acum . '</p>';
    



}
