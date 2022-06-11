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

$cobro = $resultado[0]['Cobro'];

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
  <!-- html2pdf -->
  <script src="plugins/html2pdf/dist/html2pdf.bundle.min.js"></script>

  <style>
    .negrita {
      font-weight: bold;
    }
  </style>

  <title>Document</title>

</head>

<body>

  <div class="container">

    <p><img src="archivos/logopaco.png" width="200"></p>
    <p>Agencia: <?php echo $agente[0]['pagador'] . ' Nº: ' . $agente[0]['idPagador'] ?></p>
    <p>Direccion: <?php echo $agente[0]['pa_direccion'] . ' Tlf: ' . $agente[0]['pa_tlf'] ?></p>

    <table class="table">

      <tbody>
        <tr>

          <td> <span class="negrita">Remitente: </span><?php echo $cliente[0]['idCliente'] ?></td>
          <td><?php echo $cliente[0]['tipoIdentidad'] . ' / ' . $cliente[0]['cl_identidad'] ?></td>
          <td colspan="2"><span class="negrita">Corresponsal: </span><?php echo $corresponsal[0]['pagador'] ?></td>

        </tr>

        <tr>

          <td colspan="2"><?php echo  $cliente[0]['cl_nombre'] . ' ' . $cliente[0]['cl_apellido'] ?></td>
          <td colspan="2">Fecha: <?php echo $resultado[0]['gi_fecha'] ?></td>

        </tr>

        <tr>

          <td colspan="2"><?php echo  $cliente[0]['cl_direccion'] ?></td>
          <td> Operacion: <?php echo $resultado[0]['idGiro'] ?></td>
          <td>Clave: <?php echo $resultado[0]['gi_clave'] ?></td>

        </tr>



        <tr>

          <td colspan="2"> Tlf: <?php echo $cliente[0]['cl_tlf'] ?></td>
          <td colspan="2">Cambio: <?php echo $resultado[0]['gi_tipoCambio'] ?></td>

        </tr>

        <!-- beneficiario -->

        <tr>

          <td> <span class="negrita">Destinatario Nº: </span><?php echo $beneficiario[0]['idBeneficiario'] ?></td>
          <td> <?php echo $beneficiario[0]['tipoIdentidad'] . ' / ' . $beneficiario[0]['be_identidad'] ?></td>
          <td colspan="2"> Nominal: <?php echo $resultado[0]['gi_TotalLocal'] . ' ' . $cobro ?></td>

        </tr>

        <!-- ******** -->

        <tr>


          <td colspan="2"> <?php echo $beneficiario[0]['be_nombre'] . ' ' . $beneficiario[0]['be_apellido'] ?></td>
          <td colspan="2"> Cargo: <?php echo $resultado[0]['gi_Total'] - $resultado[0]['gi_TotalLocal'] . ' ' . $cobro ?></td>

        </tr>

        <!-- ------ -->

        <tr>

          <td> <?php echo $resultado[0]['tipoRetiro'] ?></td>
          <td> <?php echo $beneficiario[0]['pais'] ?></td>
          <td colspan="2"> Total a Cobrar: <span class="negrita"><?php echo $resultado[0]['gi_Total'] . ' ' . $cobro ?></span> </td>

        </tr>


        <!-- ******* -->

        <tr>

          <td colspan="2"> <?php echo $resultado[0]['gi_Banco'] ?></td>
          <td colspan="2"> A pagar en: <?php echo $beneficiario[0]['pais'] ?></td>

        </tr>


        <!-- ++++++ -->

        <tr>

          <td> <?php echo  $resultado[0]['gi_TipoCuenta'] ?></td>
          <td> <?php echo $resultado[0]['gi_numCta'] ?></td>
          <td colspan="2"> <span class="negrita"> <?php echo $resultado[0]['gi_importe'] . ' ' . $resultado[0]['Envio'] ?> </span> </td>

        </tr>


      </tbody>
    </table>

    <div class="row mt-1">

      <div class="col-md-12">
        <p> Con la firma el remitente reconoce y entiende los terminos y condiciones del contrato </p>
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

    <!-- parte dos -->

    <p><img src="archivos/logopaco.png" width="200"></p>
    <p>Agencia: <?php echo $agente[0]['pagador'] . ' Nº: ' . $agente[0]['idPagador'] ?></p>
    <p>Direccion: <?php echo $agente[0]['pa_direccion'] . ' Tlf: ' . $agente[0]['pa_tlf'] ?></p>

    <table class="table">

      <tbody>
        <tr>

          <td> <span class="negrita">Remitente: </span><?php echo $cliente[0]['idCliente'] ?></td>
          <td><?php echo $cliente[0]['tipoIdentidad'] . ' / ' . $cliente[0]['cl_identidad'] ?></td>
          <td colspan="2"><span class="negrita">Corresponsal: </span><?php echo $corresponsal[0]['pagador'] ?></td>

        </tr>

        <tr>

          <td colspan="2"><?php echo  $cliente[0]['cl_nombre'] . ' ' . $cliente[0]['cl_apellido'] ?></td>
          <td colspan="2">Fecha: <?php echo $resultado[0]['gi_fecha'] ?></td>

        </tr>

        <tr>

          <td colspan="2"><?php echo  $cliente[0]['cl_direccion'] ?></td>
          <td> Operacion: <?php echo $resultado[0]['idGiro'] ?></td>
          <td>Clave: <?php echo $resultado[0]['gi_clave'] ?></td>

        </tr>



        <tr>

          <td colspan="2"> Tlf: <?php echo $cliente[0]['cl_tlf'] ?></td>
          <td colspan="2">Cambio: <?php echo $resultado[0]['gi_tipoCambio'] ?></td>

        </tr>

        <!-- beneficiario -->

        <tr>

          <td> <span class="negrita">Destinatario Nº: </span><?php echo $beneficiario[0]['idBeneficiario'] ?></td>
          <td> <?php echo $beneficiario[0]['tipoIdentidad'] . ' / ' . $beneficiario[0]['be_identidad'] ?></td>
          <td colspan="2"> Nominal: <?php echo $resultado[0]['gi_TotalLocal'] . ' ' . $cobro ?></td>

        </tr>

        <!-- ******** -->

        <tr>


          <td colspan="2"> <?php echo $beneficiario[0]['be_nombre'] . ' ' . $beneficiario[0]['be_apellido'] ?></td>
          <td colspan="2"> Cargo: <?php echo $resultado[0]['gi_Total'] - $resultado[0]['gi_TotalLocal'] . ' ' . $cobro ?></td>

        </tr>

        <!-- ------ -->

        <tr>

          <td> <?php echo $resultado[0]['tipoRetiro'] ?></td>
          <td> <?php echo $beneficiario[0]['pais'] ?></td>
          <td colspan="2"> Total a Cobrar: <span class="negrita"><?php echo $resultado[0]['gi_Total'] . ' ' . $cobro ?></span> </td>

        </tr>


        <!-- ******* -->

        <tr>

          <td colspan="2"> <?php echo $resultado[0]['gi_Banco'] ?></td>
          <td colspan="2"> A pagar en: <?php echo $beneficiario[0]['pais'] ?></td>

        </tr>


        <!-- ++++++ -->

        <tr>

          <td> <?php echo  $resultado[0]['gi_TipoCuenta'] ?></td>
          <td> <?php echo $resultado[0]['gi_numCta'] ?></td>
          <td colspan="2"> <span class="negrita"> <?php echo $resultado[0]['gi_importe'] . ' ' . $resultado[0]['Envio'] ?> </span> </td>

        </tr>


      </tbody>
    </table>

    <div class="row mt-1">

      <div class="col-md-12">
        <p> Con la firma el remitente reconoce y entiende los terminos y condiciones del contrato </p>
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

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // Escuchamos el click del botón
      const $boton = document.querySelector("#btnCrearPdf");
      const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
      html2pdf()
        .set({
          margin: 0.1,
          filename: 'documento.pdf',
          image: {
            type: 'jpeg',
            quality: 0.98
          },
          html2canvas: {
            scale: 3, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
          },
          jsPDF: {
            unit: "in",
            format: "letter",
            orientation: 'landscape' // landscape o portrait
          }
        })
        .from($elementoParaConvertir)
        .save()
        .catch(err => console.log(err));
    });
  </script>
</body>

</html>