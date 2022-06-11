
 <div class="container">

<img src="archivos/logopaco.png" width="200">

<table class="table table-bordered">

  <tbody>



    <tr>

      <th>Agencia Nº:</th>
      <td><?php echo $agente[0]['idPagador'] ?></td>
      <th>Agencia:</th>
      <td><?php echo $agente[0]['pagador'] ?></td>
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
      <th>Direccion:</th>
      <td colspan="5"><?php echo $cliente[0]['cl_direccion'] ?></td>
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
      <th>Direccion:</th>
      <td colspan="5"><?php echo $beneficiario[0]['be_direccion'] ?></td>
    </tr>

    <tr>
      <th>Numero:</th>
      <td><?php echo $corresponsal[0]['idPagador'] ?></td>
      <th>Corresponsal:</th>
      <td><?php echo $corresponsal[0]['pagador'] ?></td>
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
      <th>Direccion:</th>
      <td colspan="5"><?php echo $corresponsal[0]['pa_direccion'] ?></td>
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
      <th>Comision:</th>
      <td><?php echo $resultado[0]['gi_Total'] - $resultado[0]['gi_TotalLocal'] ?></td>
      <th>Total:</th>
      <td><?php echo $resultado[0]['gi_Total'] ?></td>

    </tr>
    <tr>
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
