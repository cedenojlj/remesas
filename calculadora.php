<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

?>

<div class="container">
    <div class="row d-flex mt-3 justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Calculadora</h4>
                    <form action="" method="post" id="frmGiro" class="row needs-validation" novalidate enctype="multipart/form-data">

                        <div class="col-12 col-md-4">
                            <label for="gi_TotalLocal" class="form-label">Monto Local a Enviar</label>
                            <input type="number" step="0.01" name="gi_TotalLocal" id="gi_TotalLocal" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_Total" class="form-label">Total a Pagar</label>
                            <input type="number" step="0.01" name="gi_Total" id="gi_Total" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idMonedaCobro" class="form-label">Monedas Cobro</label>
                            <select class="form-select" name="idMonedaCobro" id="idMonedaCobrogi" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedas as $item) { ?>

                                    <option value=" <?php echo $item['idMoneda'] ?>" <?php echo $item['idMoneda'] == $_SESSION['idMoneda'] ? 'selected' : '' ?>> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>



                        <div class="col-12 col-md-8">
                            <label for="idPagador" class="form-label">Corresponsal</label>
                            <select class="form-select" name="idPagador" id="idPagador" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($corresponsales as $item) { ?>

                                    <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] . " " . $item['pais'] . " " . $item['pa_ciudad'] . " " . $item['pa_direccion'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idPais" class="form-label">Pais</label>
                            <select class="form-select" name="idPais" id="idPaisgi" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($paises as $item) { ?>

                                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_importe" class="form-label">Importe Moneda Envio</label>
                            <input type="number" step="0.01" name="gi_importe" id="gi_importe" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idMonedaPago" class="form-label">Monedas Envio</label>
                            <select class="form-select" name="idMonedaPago" id="idMonedaPagogi" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedasEnvio as $item) { ?>

                                    <option value=" <?php echo $item['idMonedaEnvio'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="ma_tipoCambio" class="form-label">Cambio Fr/$ del Dia</label>
                            <input type="number" name="ma_tipoCambio" id="ma_tipoCambio" class="form-control" value="<?php echo $_SESSION['ma_tipoCambio'] ?>">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="ma_tipoComision" class="form-label">Tipo de Comision</label>
                            <input type="text" name="ma_tipoComision" id="ma_tipoComision" class="form-control" value="<?php echo $_SESSION['ma_tipoComision'] ?>">
                        </div>

                        <input type="hidden" name="accion" id="accion" value="5">
                        <input type="hidden" name="gi_impuesto" id="gi_impuesto" value="0">

                        <div class="col-12 pt-5">
                            <!-- <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnGiro">Submit</button> -->
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