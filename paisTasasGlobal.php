<?php

session_start();

require_once "encabezado.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actualizacion de Tarifas Globales de la Matriz</h4>

                <form action="paisData.php" method="post" id="frmMatrizTasa" class="row needs-validation" novalidate>

                <div class="col-12 col-md-4">
                                <label for="tipoCambio" class="form-label">Cambio Fr/$ del Dia</label>
                                <input type="number" step="0.0001" name="tipoCambio" id="tipoCambio" class="form-control"  required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="porcentajeTipoCambio" class="form-label">% Inc del Cambio</label>
                                <input type="number" step="0.01" name="porcentajeTipoCambio" id="porcentajeTipoCambio" class="form-control" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="fijo" class="form-label">Fijo CHF comision $</label>
                                <input type="number" step="0.01" name="fijo" id="fijo" class="form-control" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="porcentaje" class="form-label">% CHF Comision</label>
                                <input type="number" step="0.01" name="porcentaje" id="porcentaje" class="form-control" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="idTipoComision" class="form-label">Tipo Comision</label>
                                <select class="form-select" name="idTipoComision" id="idTipoComision" required>
                                    <option value=""> Seleccione</option>
                                    <option value="1" > Porcentual</option>
                                    <option value="2" > Fijo</option>
                                    <option value="3" > Mixto</option>

                                </select>
                            </div>
                    
                    <input type="hidden" name="accion" id="accion" value="4">

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