<?php

session_start();

require_once "encabezado.php";

require_once "listascuenta.php";

?>

<div class="container">
    <div class="row d-flex mt-3 justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Movimiento</h4>
                    <form action="movimientoData.php" method="post" id="frmMovimiento" class="row needs-validation" novalidate>


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
                            <label for="idMovimiento" class="form-label">idMovimiento</label>
                            <input type="text" name="idMovimiento" id="idMovimiento" class="form-control" readonly>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="fechaOperacion" class="form-label">Fecha Operacion</label>
                            <input type="date" name="fechaOperacion" id="fechaOperacion" class="form-control" minlength="20" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="numOperacion" class="form-label">Numero Operacion</label>
                            <input type="text" name="numOperacion" id="numOperacion" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="entrada" class="form-label">Entrada</label>
                            <input type="number" step="0.01" name="entrada" id="entrada" class="form-control" value="0">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="salida" class="form-label">Salida</label>
                            <input type="number" step="0.01" name="salida" id="salida" class="form-control" value="0">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="tipoCambio" class="form-label">TipoCambio</label>
                            <input type="number" step="0.01" name="tipoCambio" id="tipoCambio" class="form-control" value="0">
                        </div>

                        <input type="hidden" name="accion" id="accion" value="2">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btncuenta">Submit</button>
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


                </div>
            </div>

        </div>
    </div>
</div>

<?php

require_once "pie.php"

?>