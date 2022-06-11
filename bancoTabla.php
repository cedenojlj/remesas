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
          <h3 class="card-title">Lista de Bancos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="banco_tabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Banco</th>
                <th>Pais</th>
                <th>Ciudad</th>
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
          unset($_SESSION['msg']);

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
    <div class="modal fade" id="bancoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar banco</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="bancoData.php" method="post" id="frmBancoModal" class="row needs-validation" novalidate>

              <div class="col-12 col-md-4">
                <label for="idBanco" class="form-label">idBanco</label>
                <input type="text" name="idBanco" id="idBanco" class="form-control" readonly>
              </div>
              <div class="col-12 col-md-4">
                <label for="banco" class="form-label">Banco</label>
                <input type="text" name="banco" id="banco" class="form-control" required>
              </div>
              <div class="col-12 col-md-4">
                <label for="ba_ciudad" class="form-label">Ciudad</label>
                <input type="text" name="ba_ciudad" id="ba_ciudad" class="form-control" required>
              </div>

              <div class="col-12 col-md-12">
                <label for="ba_direccion" class="form-label">Direccion</label>
                <input type="text" name="ba_direccion" id="ba_direccion" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="ba_codbanco" class="form-label">Num Codigo</label>
                <input type="text" name="ba_codbanco" id="ba_codbanco" class="form-control">
              </div>


              <div class="col-12 col-md-4">
                <label for="ba_tlf" class="form-label">Telefono</label>
                <input type="text" name="ba_tlf" id="ba_tlf" class="form-control">
              </div>
              <div class="col-12 col-md-4">
                <label for="ba_email" class="form-label">Email</label>
                <input type="text" name="ba_email" id="ba_email" class="form-control">
              </div>

              <div class="col-12 col-md-4">
                <label for="idPais" class="form-label">Pais</label>
                <select class="form-select" name="idPais" id="idPaism" required>
                  <option value="">Seleccione</option>

                  <?php foreach ($paises as $item) { ?>

                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                  <?php } ?>

                </select>
              </div>

              <input type="hidden" name="accion" id="accion" value="4">

              <div class="col-12 col-md-12">
                <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnbanco">Actualizar</button>
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