<?php

session_start();

require_once('conexion.php');
require_once('funcionesPropias.php');

$miEmail = isset($_POST['us_email']) ? htmlentities($_POST['us_email']) : '';


$sql = "SELECT * FROM usuario WHERE us_email = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($miEmail));

$resultado = $sentencia->fetchAll();

//echo json_encode(array("data" => $resultado));

$control = $sentencia->rowCount();

if ($control > 0) {

  //crear nueva clave, actualizar base de datos y luego enviar clave por email

  $nuevaClave = generateRandomString();

  $hash = password_hash($nuevaClave, PASSWORD_DEFAULT);

  $sql = "UPDATE usuario SET us_clave = ? WHERE us_email = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $hash,
    $miEmail

  ));

  $stm = $sentencia->fetchAll();

  if ($sentencia->rowCount() > 0) {
    //codigo para el envio del email

    $para = $resultado[0]['us_email'];

    // título
    $título = 'Recuperacion de clave de usuarios';

    // mensaje
    /* $mensaje = '
<html>
<head>
<title>Recuperacion de clave de usuarios</title>
</head>
<body>

<p>Usuario' . $resultado[0]['us_email'] . '</p>
<p>Clave' . $nuevaClave . '</p>

</body>
</html>'; */

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    /* $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'To:' . $resultado[0]['us_email'] . "\r\n";
    $cabeceras .= 'From: PacoMoney' . "\r\n"; */

    $mensaje ="Usuario: ". $resultado[0]['us_email']. "\r\n\r\n";
    $mensaje .="Password: ". $nuevaClave ."\r\n";

    $cabeceras = 'From: Pacomoney' . "\r\n" . phpversion();

    // Enviarlo
    mail($para, $título, $mensaje, $cabeceras);

    $_SESSION["msgclave"] = "Se envio un email a su correo con los datos datos ";
    $_SESSION["controlClave"] = 1;

    header("Location: loginClave.php");

  } else {

    $_SESSION["msgclave"] = "Los sentimos pruebe mas tarde";
    $_SESSION["controlClave"] = 2;
    
  }
} else {

  $_SESSION["msgclave"] = "El email no encontrado en la base de datos";
  $_SESSION["controlClave"] = 2;

  header("Location: loginClave.php");
}
