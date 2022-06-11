<?php

session_start();

require_once('conexion.php');


$idGiro = isset($_REQUEST['idGiro']) ? intval(htmlentities($_REQUEST['idGiro'])) : '';

//datos del agente

$sql = "SELECT h.*
  FROM giro AS g   
  JOIN pagador AS h ON g.idAgente = h.idPagador  
  WHERE idGiro = ?
  ";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idGiro));

$agente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//echo json_encode(array("agente" =>  $agente));

//para recuperar los datos del usuario

$sql = "SELECT h.* FROM giro AS g   
  JOIN usuario AS h ON g.idUsuario = h.idUsuario 
  WHERE idGiro = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idGiro));

$usuario = $sentencia->fetchAll(PDO::FETCH_ASSOC);




//mostrar los datos del giro

$sql = "SELECT g.*,h.mo_codigo AS Cobro,m.mo_codigo AS Envio,r.tipoRetiro
  FROM giro AS g 
  JOIN pais AS p ON g.idPais = p.idPais  
  JOIN moneda AS h ON g.idMonedaCobro = h.idMoneda  
  JOIN monedaenvio AS m ON g.idMonedaPago = m.idMonedaEnvio
  JOIN tiporetiro AS r ON g.idTipoRetiro = r.idTipoRetiro WHERE idGiro = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idGiro));

$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$cobro=$resultado[0]['Cobro'];

//echo $resultado[0]['Cobro'];

//echo json_encode(array("data" =>  $resultado));

//echo $resultado[0]['idGiro'];

//datos del cliente

$idCliente = $resultado[0]['idCliente'];

$sql = "SELECT *, i.tipoIdentidad  FROM cliente AS c  
JOIN identidad AS i ON c.idTipoIdentidad = i.idTipoIdentidad
JOIN pais AS p ON c.idPais = p.idPais  
WHERE idCliente = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idCliente));

$cliente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//datos del beneficiario

$idBeneficiario = $resultado[0]['idBeneficiario'];

$sql = "SELECT *, i.tipoIdentidad  FROM beneficiario AS c  
JOIN identidad AS i ON c.idTipoIdentidad = i.idTipoIdentidad
JOIN pais AS p ON c.idPais = p.idPais  
WHERE idBeneficiario = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idBeneficiario));

$beneficiario = $sentencia->fetchAll(PDO::FETCH_ASSOC);


//datos del corresponsal

$idPagador = $resultado[0]['idPagador'];

$sql = "SELECT * FROM pagador AS c
JOIN pais AS p ON c.idPais = p.idPais  
WHERE idPagador = ?";

$sentencia = $mbd->prepare($sql);

$sentencia->execute(array($idPagador));

$corresponsal = $sentencia->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="widstrong=device-widstrong, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Document</title>

</head>

<body>


  <div class="container">

    <div class="row pt-4">

      <div class="col-md-5">

        <h5>Agencia Nº: <?php echo $agente[0]['idPagador'] . " " . $agente[0]['pagador'] . "/" . $agente[0]['pa_ciudad'] ?> </h5>
        <h5><?php echo $agente[0]['pa_direccion'] ?></h5>
        <h5><?php echo "Tlf:" . $agente[0]['pa_tlf'] . " email:" . $agente[0]['pa_email'] ?></h5>
      </div>

      <div class="col-md-7">

        <h5>Nº Envio: <?php echo $resultado[0]['idGiro'] ?></h5>
        <h5> Fecha: <?php echo $resultado[0]['gi_fecha'] ?></h5>

      </div>

    </div>

    <!-- tabla cliente -->
    <div class="row mt-2">

      <h5>Datos del Cliente</h5>


      <div class="col-md-6">
        <strong>Nombre:</strong>
        <?php echo $cliente[0]['cl_nombre'] ?>
        <strong>Apellido:</strong>
        <?php echo $cliente[0]['cl_apellido'] ?>
        <strong>Tipo Doc:</strong>
        <?php echo $cliente[0]['tipoIdentidad'] ?>
        <strong>Nº Doc:</strong>
        <?php echo $cliente[0]['cl_identidad'] ?>
      </div>

      <div class="col-md-6">
        <strong>Tlf:</strong>
        <?php echo $cliente[0]['cl_tlf'] ?>
        <strong>Email:</strong>
        <?php echo $cliente[0]['cl_email'] ?>
        <strong>Ciudad:</strong>
        <?php echo $cliente[0]['cl_ciudad'] ?>
        <strong>Pais:</strong>
        <?php echo $cliente[0]['pais'] ?>
      </div>

      <div class="col-md-6">
        <strong>Direccion:</strong>
        <?php echo $cliente[0]['cl_direccion'] ?>

      </div>


    </div>



    <!-- tabla Beneficiario -->
    <div class="row mt-2">

      <h5>Datos del Beneficiario</h5>


      <div class="col-md-6">
        <strong>Nombre:</strong>
        <?php echo $beneficiario[0]['be_nombre'] ?>
        <strong>Apellido:</strong>
        <?php echo $beneficiario[0]['be_apellido'] ?>
        <strong>Tipo Doc:</strong>
        <?php echo $beneficiario[0]['tipoIdentidad'] ?>
        <strong>Nº Doc:</strong>
        <?php echo $beneficiario[0]['be_identidad'] ?>
      </div>

      <div class="col-md-6">
        <strong>Tlf:</strong>
        <?php echo $beneficiario[0]['be_tlf'] ?>
        <strong>Email:</strong>
        <?php echo $beneficiario[0]['be_email'] ?>
        <strong>Ciudad:</strong>
        <?php echo $beneficiario[0]['be_ciudad'] ?>
        <strong>Pais:</strong>
        <?php echo $beneficiario[0]['pais'] ?>
      </div>

      <div class="col-md-6">
        <strong>Direccion:</strong>
        <?php echo $beneficiario[0]['be_direccion'] ?>

      </div>




    </div>

    <!-- tabla Corresponsal -->
    <div class="row mt-2">

      <h5>Datos del Corresponsal</h5>


      <div class="col-md-6">
        <strong>Numero:</strong>
        <?php echo $corresponsal[0]['idPagador'] ?>
        <strong>Nombre:</strong>
        <?php echo $corresponsal[0]['pagador'] ?>
        <strong>Ciudad:</strong>
        <?php echo $corresponsal[0]['pa_ciudad'] ?>
        <strong>CP:</strong>
        <?php echo $corresponsal[0]['pa_cp'] ?>
      </div>

      <div class="col-md-6">
        <strong>Provincia:</strong>
        <?php echo $corresponsal[0]['pa_provincia'] ?>
        <strong>Tlf:</strong>
        <?php echo $corresponsal[0]['pa_tlf'] ?>
        <strong>Email:</strong>
        <?php echo $corresponsal[0]['pa_email'] ?>
        <strong>Pais:</strong>
        <?php echo $corresponsal[0]['pais'] ?>
      </div>

      <div class="col-md-6">
        <strong>Direccion:</strong>
        <?php echo $corresponsal[0]['pa_direccion'] ?>

      </div>


    </div>




    <!-- tabla giro -->
    <div class="row mt-3">

      <h5>Datos del Giro</h5>


      <div class="col-md-6">
        <strong>Tipo Retiro:</strong>
        <?php echo $resultado[0]['tipoRetiro'] ?>
        <strong>Banco:</strong>
        <?php echo $resultado[0]['gi_Banco'] ?>
        <strong>Cuenta:</strong>
        <?php echo $resultado[0]['gi_numCta'] ?>
        <strong>Tipo:</strong>
        <?php echo $resultado[0]['gi_TipoCuenta'] ?>
      </div>

      <div class="col-md-6">
        <strong>Importe:</strong>
        <?php echo $resultado[0]['gi_importe'] ?>              
        <strong>Moneda Envio:</strong>
        <?php echo $resultado[0]['Envio'] ?>
      </div>

      <div class="col-md-6">
        <strong>Monto:</strong>
        <?php echo $resultado[0]['gi_TotalLocal'] ?>
        <strong>Comision:</strong>
        <?php echo $resultado[0]['gi_Total'] - $resultado[0]['gi_TotalLocal'] ?>  
        <strong>Total:</strong>
        <?php echo $resultado[0]['gi_Total'] ?>
        <strong>Moneda Cobro:</strong>
        <?php echo $cobro ?>

      </div>


    </div>


    <div class="row mt-1">

      <div class="col-md-12">
        <p>EL CLIENTE DECLARA QUE EL DINERO ES SU PROPIEDAD NO PROVIENE DE NINGUN ILICITO, QUE NO SERA UTILIZADO PARA FINANCIAMIENTO DE TERRORIMO NI CORRUPCION NINGUNA </p>
      </div>
    </div>

    <div class="row mt-1">
      <div class="col-md-5">
        <p class="text-center">_____________________</p>
        <p class="text-center"><?php echo $cliente[0]['cl_nombre'] . " " . $cliente[0]['cl_apellido'] ?></p>
        <p class="text-center">Cliente</p>
      </div>
      <div class="col-md-5">
        <p class="text-center">______________________</p>
        <p class="text-center"><?php echo $usuario[0]['us_nombre'] . " " . $usuario[0]['us_apellido'] ?></p>
        <p class="text-center">Usuario</p>
      </div>
    </div>  

    
    
  </div>

  

  <script src="js\bootstrap.bundle.min.js"></script>
  <script src="js\jquery.min.js"></script>

  <!-- DataTables  & Plugins -->

  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>

  <script>
    window.addEventListener("load", window.print());
  </script>
</body>

</html>