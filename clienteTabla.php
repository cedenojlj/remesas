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
          <h3 class="card-title">Lista de clientes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="cliente_tabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Identificacion</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Del</th>
                <th>Ver</th>
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
    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="clienteData.php" method="post" id="frmClienteModal" class="row needs-validation" novalidate enctype="multipart/form-data">

              <div class="col-12 col-md-4">
                <label for="idCliente" class="form-label">idCliente</label>
                <input type="text" name="idCliente" id="idCliente" class="form-control" readonly>
              </div>
              <div class="col-12 col-md-4">
                <label for="cl_nombre" class="form-label">Nombre</label>
                <input type="text" name="cl_nombre" id="cl_nombre" class="form-control" required>
              </div>
              <div class="col-12 col-md-4">
                <label for="cl_apellido" class="form-label">Apellido</label>
                <input type="text" name="cl_apellido" id="cl_apellido" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" name="cl_fechaNacimiento" id="cl_fechaNacimiento" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="idPais" class="form-label">Pais</label>
                <select class="form-select" name="idPais" id="idPaiscl" required>
                  <option value="">Seleccione</option>

                  <?php foreach ($paises as $item) { ?>

                    <option value="<?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_ciudad" class="form-label">Ciudad</label>
                <input type="text" name="cl_ciudad" id="cl_ciudad" class="form-control" required>
              </div>


              <div class="col-12 col-md-12">
                <label for="cl_direccion" class="form-label">Direccion</label>
                <input type="text" name="cl_direccion" id="cl_direccion" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_provincia" class="form-label">Provincia</label>
                <input type="text" name="cl_provincia" id="cl_provincia" class="form-control" required>
              </div>


              <div class="col-12 col-md-4">
                <label for="cl_tlf" class="form-label">Telefono</label>
                <input type="text" name="cl_tlf" id="cl_tlf" class="form-control" required>
              </div>
              <div class="col-12 col-md-4">
                <label for="cl_email" class="form-label">Email</label>
                <input type="text" name="cl_email" id="cl_email" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_identidad" class="form-label">Identificacion</label>
                <input type="text" name="cl_identidad" id="cl_identidad" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="idTipoIdentidad" class="form-label">Tipo Identidad</label>
                <select class="form-select" name="idTipoIdentidad" id="idTipoIdentidadcl" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($identidades as $item) { ?>

                    <option value="<?php echo $item['idTipoIdentidad'] ?>"> <?php echo $item['tipoIdentidad'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_fechaEmision" class="form-label">Fecha Emision</label>
                <input type="date" name="cl_fechaEmision" id="cl_fechaEmision" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_fechaCaducidad" class="form-label">Fecha Caducidad</label>
                <input type="date" name="cl_fechaCaducidad" id="cl_fechaCaducidad" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" name="cl_nacionalidad" id="cl_nacionalidad" class="form-control" required>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_facebook" class="form-label">Facebook</label>
                <input type="text" name="cl_facebook" id="cl_facebook" class="form-control">
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_whatsapp" class="form-label">Whatsapp</label>
                <input type="text" name="cl_whatsapp" id="cl_whatsapp" class="form-control">
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_telegram" class="form-label">Telegram</label>
                <input type="text" name="cl_telegram" id="cl_telegram" class="form-control">
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_limite" class="form-label">Limite</label>
                <input type="text" name="cl_limite" id="cl_limite" class="form-control" required>
              </div>


              <div class="col-12 col-md-4">
                <label for="idMoneda" class="form-label">Monedas</label>
                <select class="form-select" name="idMoneda" id="idMonedacl" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($monedas as $item) { ?>

                    <option value="<?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                  <?php } ?>
                </select>
              </div>


              <div class="col-12 col-md-4">
                <label for="idEstado" class="form-label">Estatus</label>
                <select class="form-select" name="idEstado" id="idEstadocl" required>
                  <option value=""> Seleccione</option>

                  <?php foreach ($status as $item) { ?>

                    <option value="<?php echo $item['idEstado'] ?>"> <?php echo $item['estado'] ?></option>

                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_doc_cedula" class="form-label">Cedula</label>
                <input type="file" name="cl_doc_cedula" id="cl_doc_cedula" class="form-control" accept=".png, .jpg, .jpeg">
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_doc_form" class="form-label">Formulario</label>
                <input type="file" name="cl_doc_form" id="cl_doc_form" class="form-control" accept=".png, .jpg, .jpeg">
              </div>

              <div class="col-12 col-md-4">
                <label for="cl_doc_otro" class="form-label">Otro</label>
                <input type="file" name="cl_doc_otro" id="cl_doc_otro" class="form-control" accept=".png, .jpg, .jpeg">
              </div>


              <input type="hidden" name="accion" id="accion" value="4">

              <div class="col-12 col-md-12">
                <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btncliente">Actualizar</button>
              </div>

            </form>

          </div>

          <div class="modal-footer justify-content-left" id="footerCliente">

          </div>

        </div>
      </div>
    </div>

  </div>
</div>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="archivosModal" tabindex="-1" aria-labelledby="archivosCliente" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="archivosCliente">Archivos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row">

            <div class="col-12">

              <div class="card" style="width: 100%;">
                <img src="archivos/afiche.JPG" id="docCedula" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#" id="docCedulaLink" download class="btn btn-primary">Descargar</a>
                </div>
              </div>

            </div>
            <div class="col-12">

              <div class="card" style="width: 100%;">
                <img src="archivos/afiche.JPG" id="docDos" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#" id="docDosLink" download class="btn btn-primary">Descargar</a>
                </div>
              </div>



            </div>
            <div class="col-12">

              <div class="card" style="width: 100%;">
                <img src="archivos/afiche.JPG" id="docTres" class="card-img-top" alt="...">
                <div class="card-body">
                  <a href="#" id="docTresLink" download class="btn btn-primary">Descargar</a>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

</div>

<?php

require_once "pie.php"

?>