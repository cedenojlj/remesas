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
          <h3 class="card-title">Lista de giros por Usuarios</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="giro_tablaUser" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Moneda</th>
                <th>Identificacion</th>
                <th>Usuario</th>
                <th>Status</th>
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

  <?php

  require_once "pie.php"

  ?>