<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

require_once "agenciasTarifas.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actualizacion Tarifas Agencias y Corresponsales</h4>
                <form action="pagadorData.php" method="post" id="frmPagadorTasaCambio" class="row needs-validation" novalidate>

                    <?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="row">

                            <div class="col-12 col-md-3">
                                <label for="Pais" class="form-label">Pais</label>
                                <input type="text" name="Pais" id="Pais" class="form-control" Value="<?php echo $fila["pais"] ?>" required>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="pagador" class="form-label">Agencias</label>
                                <input type="text" name="pagador" id="pagador" class="form-control" Value="<?php echo $fila["pagador"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="tipoEmpresa" class="form-label">Empresa</label>
                                <input type="text" name="tipoEmpresa" id="tipoEmpresa" class="form-control" Value="<?php echo $fila["tipoEmpresa"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="pa_tasa" class="form-label">Tasa $/euro</label>
                                <input type="number" step="0.01" name="tasa[<?php echo $fila["idPagador"] ?>]" id="pa_tasa" class="form-control" Value="<?php echo $fila["pa_tasa"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="pa_tipoCambio" class="form-label">Tipo de Cambio Mo/$</label>
                                <input type="number" step="0.01" name="tipoCambio[<?php echo $fila["idPagador"] ?>]" id="pa_tipoCambio" class="form-control" Value="<?php echo $fila["pa_tipoCambio"] ?>" required>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-12 col-md-2">
                                <label for="pa_comision" class="form-label">Comision %</label>
                                <input type="number" step="0.01" name="comision[<?php echo $fila["idPagador"] ?>]" id="pa_comision" class="form-control" Value="<?php echo $fila["pa_comision"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="pa_fijo" class="form-label">Fijo</label>
                                <input type="number" step="0.01" name="fijo[<?php echo $fila["idPagador"] ?>]" id="pa_fijo" class="form-control" Value="<?php echo $fila["pa_fijo"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="moneda" class="form-label">moneda</label>
                                <input type="text" name="moneda" id="moneda" class="form-control" Value="<?php echo $fila["moneda"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="idTipoComision" class="form-label">Tipo Comision</label>
                                <select class="form-select" name="idTipoComision[<?php echo $fila["idPagador"] ?>]" id="idTipoComision" required>
                                    <option value=""> Seleccione</option>
                                    <option value="1" <?php echo $fila["idTipoComision"] == 1 ? "selected" : "" ?>> Porcentual</option>
                                    <option value="2" <?php echo $fila["idTipoComision"] == 2 ? "selected" : "" ?>> Fijo</option>
                                    <option value="3" <?php echo $fila["idTipoComision"] == 3 ? "selected" : "" ?>> Mixto</option>

                                </select>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="tasaLocalFranco" class="form-label">Mo/fr</label>
                                <input type="number" step="0.01" name="" id="tasaLocalFranco" class="form-control" Value="<?php echo round($fila["pa_tipoCambio"]*(1/$fila["tipoCambio"])*(1+($fila["porcentajeTipoCambio"]/100)),2) ?>" required>
                            </div>

                        </div>

                    <?php } ?>

                    <input type="hidden" name="accion" id="accion" value="8">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnUsuario">Submit</button>
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
                unset($_SESSION['msg']);

                ?>


            </div>
        </div>
    </div>
</div>

<?php

require_once "pie.php"

?>