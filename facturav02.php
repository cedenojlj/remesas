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

  <title>Document</title>

</head>

<body>

  <div class="container">

    <img src="archivos/logopaco.png" width="200">

    <table class="table table-bordered">

      <tbody>



        <tr>

          <th>Agencia:</th>
          <td colspan="3">Nº:<?php echo $agente[0]['idPagador'].' '. $agente[0]['pagador'] ?></td> 
          <th>Nª Envio:</th>
          <td> <?php echo $resultado[0]['idGiro'] ?></td>

        </tr>

        <tr>
          <th>Telefono:</th>
          <td> <?php echo $agente[0]['pa_tlf'] ?> </td>
          <th>Fecha:</th>
          <td> <?php echo $resultado[0]['gi_fecha'] ?></td>
          <th>Cod Envio:</th>
          <td colspan="2"><?php echo $resultado[0]['gi_clave'] ?></td>
        </tr>
        <tr>
          <th>Direccion</th>
          <td colspan="5"><?php echo $agente[0]['pa_direccion'] ?></td>
        </tr>


        <tr>
          <th>Cliente:</th>
          <td><?php echo $cliente[0]['cl_nombre'] ?></td>
          <th>Apellido:</th>
          <td><?php echo $cliente[0]['cl_apellido'] ?></td>
          <th>Tipo:</th>
          <td><?php echo $cliente[0]['tipoIdentidad'] ?></td>
        </tr>

        <tr>
          <th>Nº Doc:</th>
          <td><?php echo $cliente[0]['cl_identidad'] ?></td>
          <th>Tlf:</th>
          <td><?php echo $cliente[0]['cl_tlf'] ?></td>
          <th>Email:</th>
          <td><?php echo $cliente[0]['cl_email'] ?></td>
        </tr>

        <tr>
          <th>Ciudad:</th>
          <td><?php echo $cliente[0]['cl_ciudad'] ?></td>
          <th>Pais:</th>
          <td colspan="3"><?php echo $cliente[0]['pais'] ?></td>
        </tr>


        <tr>
          <th>Beneficiario:</th>
          <td><?php echo $beneficiario[0]['be_nombre'] ?></td>
          <th>Apellido:</th>
          <td><?php echo $beneficiario[0]['be_apellido'] ?></td>
          <th>Tipo:</th>
          <td><?php echo $beneficiario[0]['tipoIdentidad'] ?></td>


        </tr>
        <tr>
          <th>Nº Doc:</th>
          <td><?php echo $beneficiario[0]['be_identidad'] ?></td>
          <th>Tlf:</th>
          <td><?php echo $beneficiario[0]['be_tlf'] ?></td>
          <th>Email:</th>
          <td><?php echo $beneficiario[0]['be_email'] ?></td>



        </tr>
        <tr>
          <th>Ciudad:</th>
          <td><?php echo $beneficiario[0]['be_ciudad'] ?></td>
          <th>Pais:</th>
          <td colspan="3"><?php echo $beneficiario[0]['pais'] ?></td>
        </tr>


        <tr>
          <th>Corresponsal:</th>
          <td colspan="3">Nª:<?php echo $corresponsal[0]['idPagador'].' '.$corresponsal[0]['pagador'] ?>    
          </td>
          <th>Ciudad:</th>
          <td><?php echo $corresponsal[0]['pa_ciudad'] ?></td>

        </tr>
        <tr>
          <th>CP:</th>
          <td><?php echo $corresponsal[0]['pa_cp'] ?></td>
          <th>Provincia:</th>
          <td><?php echo $corresponsal[0]['pa_provincia'] ?></td>
          <th>Tlf:</th>
          <td><?php echo $corresponsal[0]['pa_tlf'] ?></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><?php echo $corresponsal[0]['pa_email'] ?></td>
          <th>Pais:</th>
          <td colspan="3"><?php echo $corresponsal[0]['pais'] ?></td>

        </tr>


        <tr>
          <th>Tipo Retiro:</th>
          <td><?php echo $resultado[0]['tipoRetiro'] ?></td>
          <th>Banco:</th>
          <td><?php echo $resultado[0]['gi_Banco'] ?></td>
          <th>Cuenta:</th>
          <td><?php echo $resultado[0]['gi_numCta'] ?></td>

        </tr>
        <tr>
          <th>Tipo:</th>
          <td><?php echo $resultado[0]['gi_TipoCuenta'] ?></td>
          <th>Importe:</th>
          <td><?php echo $resultado[0]['gi_importe'] ?></td>
          <th>Moneda Envio:</th>
          <td><?php echo $resultado[0]['Envio'] ?></td>
        </tr>

        <tr>
          <th>Monto:</th>
          <td><?php echo $resultado[0]['gi_TotalLocal'] ?></td>
          <!-- <th>Comision:</th>
          <td><?php echo $resultado[0]['gi_Total'] - $resultado[0]['gi_TotalLocal'] ?></td> -->
          <th>Total:</th>
          <td><?php echo $resultado[0]['gi_Total'] ?></td>
          <th>Moneda Cobro:</th>
          <td><?php echo $cobro ?></td>

        </tr>       


      </tbody>
    </table>

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
            orientation: 'portrait' // landscape o portrait
          }
        })
        .from($elementoParaConvertir)
        .save()
        .catch(err => console.log(err));
    });
  </script>
</body>

</html>