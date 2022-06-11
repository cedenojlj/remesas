<?php

session_start();

require_once "encabezado.php";

require_once "listascuenta.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cuenta</h4>
                <form action="cuentaData.php" method="post" id="frmCuenta" class="row needs-validation" novalidate>

                    <div class="col-12 col-md-4">
                        <label for="idCuenta" class="form-label">idCuenta</label>
                        <input type="text" name="idCuenta" id="idCuenta" class="form-control" readonly></div>

                    <div class="col-12 col-md-4">
                        <label for="idPagador" class="form-label">Agente o Corresponsal</label>
                        <select class="form-select" name="idPagador" id="idPagador" required>
                            <option value="">Seleccione</option>

                            <?php foreach ($pagadores as $item) { ?>

                                <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="idBanco" class="form-label">Banco</label>
                        <select class="form-select" name="idBanco" id="idBanco" required>
                            <option value="">Seleccione</option>
                            <?php foreach ($bancos as $item) { ?>

                                <option value=" <?php echo $item['idBanco'] ?>"> <?php echo $item['banco'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="cu_numCta" class="form-label">Numero Cuenta</label>
                        <input type="text" name="cu_numCta" id="cu_numCta" class="form-control" minlength="20" required></div>

                    <div class="col-12 col-md-4">
                        <label for="idTipoCuenta" class="form-label">Tipo Cuenta</label>
                        <select class="form-select" name="idTipoCuenta" id="idTipoCuenta" required>
                            <option value="">Seleccione</option>
                            <?php foreach ($cuentas as $item) { ?>

                                <option value=" <?php echo $item['idTipoCuenta'] ?>"> <?php echo $item['tipoCuenta'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <label for="idMoneda" class="form-label">Monedas</label>
                        <select class="form-select" name="idMoneda" id="idMoneda" required>
                            <option value=""> Seleccione</option>

                            <?php foreach ($monedas as $item) { ?>

                                <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                            <?php } ?>
                        </select>
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

<?php

require_once "pie.php"

?>