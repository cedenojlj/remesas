<?php

session_start();

require_once "encabezado.php";

require_once "listascuenta.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Movimiento Carga Masiva</h4>
                <form action="movimientoData.php" method="post" id="frmMovimiento" class="row needs-validation" novalidate enctype="multipart/form-data">


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
                        <label for="fileCsv" class="form-label">Archivo Csv</label>
                        <input type="file" name="fileCsv" id="fileCsv" class="form-control" required accept=".csv"></div>
                    
                    <input type="hidden" name="accion" id="accion" value="8">

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

<?php

require_once "pie.php"

?>