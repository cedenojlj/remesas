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
          <h3 class="card-title">Lista de Agentes o Corresponsales</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="pagador_tabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Pais</th>
                <th>Ciudad</th>
                <th>Empresa</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Del</th>
              </tr>
            </thead>

          </table>

          <?php

          if (isset($_SESSION['control'])) {

            if ($_SESSION['control']) {

              echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong> Estatus de la Operación </strong>' . $_SESSION['msg'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            } else {

              echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <strong>Estatus de la Operación </strong>' . $_SESSION['msg'] . '
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
          }

          unset($_SESSION['control']);

          ?>

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
    <div class="modal fade" id="pagadorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar Agente o Corresponsal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="pagadorData.php" method="post" id="frmPagadorModal" class="row needs-validation" novalidate enctype="multipart/form-data">

              <div class="col-12 col-md-4">
                <label for="idPagadores" class="form-label">idPagador</label>
                <input type="text" name="idPagador" id="idPagadores" class="form-control" readonly></div>
            
              <div class="col-12 col-md-4">
                <label for="pagador" class="form-label">Nombre</label>
                <input type="text" name="pagador" id="pagador" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="idPais" class="form-label">Pais</label>
                <select class="form-select" name="idPais" id="idPaispa" required>
                  <option value="">Seleccione</option>

                  <?php foreach ($paises as $item) { ?>

                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                  <?php } ?>
                </select>
              </div>


              <div class="col-12 col-md-12">
                <label for="pa_direccion" class="form-label">Direccion</label>
                <input type="text" name="pa_direccion" id="pa_direccion" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_provincia" class="form-label">Provincia</label>
                <input type="text" name="pa_provincia" id="pa_provincia" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_ciudad" class="form-label">Ciudad</label>
                <input type="text" name="pa_ciudad" id="pa_ciudad" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_tlf" class="form-label">Telefono</label>
                <input type="text" name="pa_tlf" id="pa_tlf" class="form-control" required></div>
              <div class="col-12 col-md-4">
                <label for="pa_email" class="form-label">Email</label>
                <input type="email" name="pa_email" id="pa_email" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_cp" class="form-label">Codigo Postal</label>
                <input type="text" name="pa_cp" id="pa_cp" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_Director" class="form-label">Director</label>
                <input type="text" name="pa_Director" id="pa_Director" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_tlfDirector" class="form-label">Tlf Director</label>
                <input type="text" name="pa_tlfDirector" id="pa_tlfDirector" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_emailDirector" class="form-label">Email Director</label>
                <input type="email" name="pa_emailDirector" id="pa_emailDirector" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_tlfEnvios" class="form-label">Tlf Envios</label>
                <input type="text" name="pa_tlfEnvios" id="pa_tlfEnvios" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_emailEnvios" class="form-label">Email Envios</label>
                <input type="email" name="pa_emailEnvios" id="pa_emailEnvios" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_GteContabilidad" class="form-label">GteContabilidad</label>
                <input type="text" name="pa_GteContabilidad" id="pa_GteContabilidad" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_tlfContabilidad" class="form-label">Tlf Contabilidad</label>
                <input type="text" name="pa_tlfContabilidad" id="pa_tlfContabilidad" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_emailContabilidad" class="form-label">Email Contabilidad</label>
                <input type="email" name="pa_emailContabilidad" id="pa_emailContabilidad" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_horarios" class="form-label">Horarios</label>
                <input type="text" name="pa_horarios" id="pa_horarios" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_contrato" class="form-label">Contrato</label>
                <input type="text" name="pa_contrato" id="pa_contrato" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_inicioOperaciones" class="form-label">Inicio Operaciones</label>
                <input type="date" name="pa_inicioOperaciones" id="pa_inicioOperaciones" class="form-control" required></div>


              <div class="col-12 col-md-4">
                <label for="pa_limite" class="form-label">Limite</label>
                <input type="number" step="0.01" name="pa_limite" id="pa_limite" class="form-control" required></div>


              <div class="col-12 col-md-4">
                <label for="idMoneda" class="form-label">Monedas</label>
                <select class="form-select" name="idMoneda" id="idMonedapa" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($monedas as $item) { ?>

                    <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="pa_web" class="form-label">Web</label>
                <input type="text" name="pa_web" id="pa_web" class="form-control"></div>

              <div class="col-12 col-md-4">
                <label for="pa_conciliarCada" class="form-label">Conciliar Cada</label>
                <input type="number" name="pa_conciliarCada" id="pa_conciliarCada" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_comision" class="form-label">Comision</label>
                <input type="number" step="0.01" name="pa_comision" id="pa_comision" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_fijo" class="form-label">Fijo</label>
                <input type="number" step="0.01" name="pa_fijo" id="pa_fijo" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="idTipoComision" class="form-label">Tipo Comision</label>
                <select class="form-select" name="idTipoComision" id="idTipoComision" required>
                  <option value=""> Seleccione</option>
                  <option value="1"> Porcentual</option>
                  <option value="2"> Fijo</option>
                  <option value="3"> Mixto</option>

                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="idTipoEmpresa" class="form-label">Tipo Empresa</label>
                <select class="form-select" name="idTipoEmpresa" id="idTipoEmpresa" required>
                  <option value=""> Seleccione</option>
                  <option value="1"> Agente</option>
                  <option value="2"> Corresponsal</option>

                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="pa_tasa" class="form-label">Tasa</label>
                <input type="number" step="0.01" name="pa_tasa" id="pa_tasa" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_tipoCambio" class="form-label">Tipo de Cambio</label>
                <input type="number" step="0.01" name="pa_tipoCambio" id="pa_tipoCambio" class="form-control" required></div>

              <div class="col-12 col-md-4">
                <label for="pa_impuesto" class="form-label">Impuesto</label>
                <input type="number" step="0.01" name="pa_impuesto" id="pa_impuesto" class="form-control" required></div>


              <div class="col-12 col-md-4">
                <label for="idEstado" class="form-label">Estatus</label>
                <select class="form-select" name="idEstado" id="idEstadopa" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($status as $item) { ?>

                    <option value=" <?php echo $item['idEstado'] ?>"> <?php echo $item['estado'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <input type="hidden" name="accion" id="accion" value="4">

              <div class="col-12 col-md-12">
                <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnpagador">Actualizar</button>
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