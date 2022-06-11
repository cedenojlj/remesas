<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

require_once "paisTarifas.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actualizacion Tarifas Matriz</h4>

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

                <form action="paisData.php" method="post" id="frmPais" class="row needs-validation" novalidate>

                    <?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="row">

                            <div class="col">
                                <label for="pais" class="form-label">Pais</label>
                                <input type="text" name="pais" id="pais" class="form-control" Value="<?php echo $fila["pais"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="tipoCambio" class="form-label">Fr/$ Compra Banco</label>
                                <input type="number" step="0.01" name="tipoCambio[<?php echo $fila["idPais"] ?>]" id="tipoCambio" class="form-control" Value="<?php echo $fila["tipoCambio"] ?>" required>
                            </div>

                            <div class="col">
                                <label for="porcentajeTipoCambio" class="form-label">% Fr/$ Inc en el Cambio</label>
                                <input type="number" step="0.01" name="porcentajeTipoCambio[<?php echo $fila["idPais"] ?>]" id="porcentajeTipoCambio" class="form-control" Value="<?php echo  $fila["porcentajeTipoCambio"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="tipoCambioVenta" class="form-label">$/Fr Venta Cliente</label>
                                <input type="number" step="0.01" name="tipoCambioVenta" class="form-control" Value="<?php echo round((1/$fila["tipoCambio"])*(1+( $fila["porcentajeTipoCambio"]/100  )) ,2)        ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="fijo" class="form-label">Fijo CHF comision $</label>
                                <input type="number" step="0.01" name="fijo[<?php echo $fila["idPais"] ?>]" id="fijo" class="form-control" Value="<?php echo $fila["fijo"] ?>" required>
                            </div>                           

                        </div>

                        <div class="row pb-3">
                        
                        <div class="col-12 col-md-2">
                                <label for="porcentaje" class="form-label">% CHF Comision</label>
                                <input type="number" step="0.01" name="porcentaje[<?php echo $fila["idPais"] ?>]" id="porcentaje" class="form-control" Value="<?php echo $fila["porcentaje"] ?>" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <label for="idTipoComision" class="form-label">Tipo Comision</label>
                                <select class="form-select" name="idTipoComision[<?php echo $fila["idPais"] ?>]" id="idTipoComision" required>
                                    <option value=""> Seleccione</option>
                                    <option value="1" <?php echo $fila["idTipoComision"] == 1 ? "selected" : "" ?>> Porcentual</option>
                                    <option value="2" <?php echo $fila["idTipoComision"] == 2 ? "selected" : "" ?>> Fijo</option>
                                    <option value="3" <?php echo $fila["idTipoComision"] == 3 ? "selected" : "" ?>> Mixto</option>

                                </select>
                            </div>
                        
                        </div>

                    <?php } ?>

                    <input type="hidden" name="accion" id="accion" value="2">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3 col-12 col-md-2 mb-3" id="btnUsuario">Submit</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>

<?php

require_once "pie.php"

?>