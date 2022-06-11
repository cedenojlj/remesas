<?php

session_start();

require_once('conexion.php');
require_once('funcionesPropias.php');

redi();

$miEmail = isset($_POST['us_email']) ? htmlentities($_POST['us_email']) : '';

$clave = isset($_POST['us_clave']) ? (htmlentities($_POST['us_clave'])) : '';

jap($miEmail);

$sql = "SELECT * FROM usuario WHERE us_email = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array(

    $miEmail

));

$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$hash = $resultado[0]['us_clave'];

if (password_verify($clave, $hash)) {

    $_SESSION["idUsuario"] = $resultado[0]["idUsuario"];
    $_SESSION["rolUsuario"] = $resultado[0]["idTipoRol"];
    $_SESSION["Usuario"] = $resultado[0]["us_nombre"];
    $_SESSION["idAgente"] = $resultado[0]["idPagador"];
    $_SESSION["msgAccesso"] = "todo ok";

    $idAgente = $resultado[0]["idPagador"];

    $sql = "SELECT *, t.tipoComision FROM pais as p

        JOIN tipocomision AS t ON p.idTipoComision = t.idTipoComision
        
        WHERE idPais = (SELECT idPais FROM pagador WHERE idPagador = ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idAgente));

    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION["idMoneda"] = $resultado[0]["idMoneda"];

    //estas son las variables para las comisiones de la casa matriz

    $_SESSION["ma_tipoCambio"] = $resultado[0]["tipoCambio"];
    $_SESSION["ma_porcentajeTipoCambio"] = $resultado[0]["porcentajeTipoCambio"];
    $_SESSION["ma_fijo"] = $resultado[0]["fijo"];
    $_SESSION["ma_porcentaje"] = $resultado[0]["porcentaje"];
    $_SESSION["ma_idTipoComision"] = $resultado[0]["idTipoComision"];
    $_SESSION["ma_tipoComision"] = $resultado[0]["tipoComision"];



    //echo "<p> tipo cambio: " .$resultado[0]["tipoCambio"]. "</p>";
    //echo "<p> % tc: " .$resultado[0]["porcentajeTipoCambio"]. "</p>";
    //echo "<p>fijo: " .$resultado[0]["fijo"]. "</p>";
    //echo "<p>%: " .$resultado[0]["porcentaje"]. "</p>";
    //echo "<p>idtipocomision: " .$resultado[0]["idTipoComision"]. "</p>";
    //echo "<p>tipocomision: " .$resultado[0]["tipoComision"]. "</p>";


    header("Location: panel.php");
} else {

    header("Location: index.php");
    $_SESSION["msgAccesso"] = "incorrecto";
}