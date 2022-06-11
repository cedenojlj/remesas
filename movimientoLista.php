<?php

session_start();

require_once "encabezado.php";

require_once "listascuenta.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Movimiento Listado</h4>
                <form action="" method="post" id="frmMovimientoLista" class="row needs-validation" novalidate enctype="multipart/form-data">


                    <div class="col-12 col-md-6">
                        <label for="idPagador" class="form-label">Agente o Corresponsal</label>
                        <select class="form-select" name="idPagador" id="idPagadormo" required>
                            <option value="">Seleccione</option>

                            <?php foreach ($pagadores as $item) { ?>

                                <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="idCuenta" class="form-label">Cuenta</label>
                        <select class="form-select" name="idCuenta" id="idCuentamo" required>
                            <option value="">Seleccione</option>

                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="inicio" class="form-label">Fecha Inicio</label>
                        <input type="date" name="inicio" id="inicio" class="form-control" minlength="20" required></div>

                    <div class="col-12 col-md-4">
                        <label for="fin" class="form-label">Fecha Fin</label>
                        <input type="date" name="fin" id="fin" class="form-control" minlength="20" required></div>


                    <input type="hidden" name="accion" id="accion" value="9">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-5" id="btncuenta">Submit</button>
                    </div>

                </form>

                <?php

                if (isset($_SESSION['control'])) {

                    if ($_SESSION['control']) {

                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> Estatus de la Operación </strong>' . $_SESSION['msg'] . '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                    } else {

                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Estatus de la Operación </strong>' . $_SESSION['msg'] . '
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                    }
                }

                unset($_SESSION['control']);

                ?>
                
                <table id="movimiento_tabla" class="table table-bordered table-striped mt-5">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Fecha</th>
                            <th>Referencia</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Saldo</th>                            
                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>
</div>

<?php

require_once "pie.php"

?>