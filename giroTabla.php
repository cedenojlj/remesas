<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

?>

<div class="container-fluid">
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de giros</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="giro_tabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Moneda</th>
                <th>Corresponsal</th>
                <th>Guia</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Imp</th>
              </tr>
            </thead>

          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->

<!-- /.container -->


<div class="container">

  <div class="row">

    <!-- Modal -->
    <div class="modal fade" id="giroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar giro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="giroData.php" method="post" id="frmGiroModal" class="row needs-validation" novalidate enctype="multipart/form-data">
              <div class="col-12 col-md-4">
                <label for="idGiro" class="form-label">idGiro</label>
                <input type="text" name="idGiro" id="idGiro" class="form-control" readonly>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_fecha" class="form-label">Fecha</label>
                <input type="date" name="gi_fecha" id="gi_fecha" class="form-control" readonly value="<?php echo date('Y-m-d') ?>" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="idEstadoGiro" class="form-label">Estatus</label>
                <select class="form-select" name="idEstadoGiro" id="idEstadoGirog" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($statusgiros as $item) { ?>

                    <option value=" <?php echo $item['idEstadoGiro'] ?>"> <?php echo $item['estadoGiro'] ?></option>

                  <?php } ?>
                </select>
              </div>


              <div class="col-12 col-md-4">
                <label for="idCliente" class="form-label">Cliente</label>
                <select class="form-select" name="idCliente" id="idClientegiro" disabled required>
                  <option value="">Seleccione</option>

                  <?php foreach ($clientes as $item) { ?>

                    <option value=" <?php echo $item['idCliente'] ?>"> <?php echo $item['cl_nombre'] . " " . $item['cl_apellido'] . " " . $item['cl_identidad'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="idBeneficiario" class="form-label">Beneficiario</label>
                <select class="form-select" name="idBeneficiario" id="idBeneficiariogiro" disabled required>
                  <option value="">Seleccione</option>

                  <?php foreach ($beneficiarios as $item) { ?>

                    <option value=" <?php echo $item['idBeneficiario'] ?>"> <?php echo $item['be_nombre'] . " " . $item['be_apellido'] . " " . $item['be_identidad'] ?></option>

                  <?php } ?>
                </select>
              </div>



              <div class="col-12 col-md-4">
                <label for="idPais" class="form-label">Pais</label>
                <select class="form-select" name="idPais" id="idPaisgiro" disabled required>
                  <option value="">Seleccione</option>

                  <?php foreach ($paises as $item) { ?>

                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-12">
                <label for="idPagador" class="form-label">Corresponsal</label>
                <select class="form-select" name="idPagador" id="idPagadorgiro" disabled required>
                  <option value="">Seleccione</option>

                  <?php foreach ($corresponsales as $item) { ?>

                    <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] . " " . $item['pais'] . " " . $item['pa_ciudad'] . " " . $item['pa_direccion'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_TotalLocal" class="form-label">Local</label>
                <input type="number" step="0.01" name="gi_TotalLocal" id="gi_TotalLocal" class="form-control" readonly required>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_Total" class="form-label">Total a Pagar</label>
                <input type="number" step="0.01" name="gi_Total" id="gi_Total" class="form-control" readonly required>
              </div>


              <div class="col-12 col-md-4">
                <label for="idMonedaCobro" class="form-label">Monedas Cobro</label>
                <select class="form-select" name="idMonedaCobro" id="idMonedaCobrogiro" disabled required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($monedas as $item) { ?>

                    <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_importe" class="form-label">Importe</label>
                <input type="number" step="0.01" name="gi_importe" id="gi_importe" class="form-control" readonly required>
              </div>              

              <div class="col-12 col-md-4">
                <label for="idMonedaPago" class="form-label">Monedas Envio</label>
                <select class="form-select" name="idMonedaPago" id="idMonedaPagogiro" disabled required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($monedasEnvio as $item) { ?>

                    <option value=" <?php echo $item['idMonedaEnvio'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                  <?php } ?>
                </select>
              </div>              

              <div class="col-12 col-md-4">
                <label for="idTipoRetiro" class="form-label">Tipo Retiro</label>
                <select class="form-select" name="idTipoRetiro" id="idTipoRetiro" disabled  required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($retiros as $item) { ?>

                    <option value=" <?php echo $item['idTipoRetiro'] ?>"> <?php echo $item['tipoRetiro'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_Banco" class="form-label">Banco</label>
                <input type="text" name="gi_Banco" id="gi_Banco" class="form-control" readonly>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_numCta" class="form-label">Numero de Cuenta</label>
                <input type="text" name="gi_numCta" id="gi_numCta" class="form-control" readonly>
              </div>

              <div class="col-12 col-md-4">
                <label for="gi_TipoCuenta" class="form-label">Tipo de Cuenta</label>
                <input type="text" name="gi_TipoCuenta" id="gi_TipoCuenta" class="form-control" readonly>
              </div>

              <div class="col-12 col-md-12">
                <label for="gi_comentario" class="form-label">Comentario</label>
                <input type="text" name="gi_comentario" id="gi_comentario" class="form-control" readonly>
              </div>

              <div class="col-12 col-md-12">
                <label for="gi_clave" class="form-label">Clave</label>
                <input type="text" name="gi_clave" id="gi_clave" class="form-control" readonly>
              </div>

              <input type="hidden" name="accion" id="accion" value="7">
              <input type="hidden" name="gi_impuesto" id="gi_impuesto" value="0">

              <div class="col-12">
                <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnUsuario">Submit</button>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>

  </div>



  <?php

  require_once "pie.php"

  ?>