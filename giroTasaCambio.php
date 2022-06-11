<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

require_once "pagadorTarifas.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actulizacion Tarifas de Agentes y Corresponsales</h4>
                <form action="pagadorData.php" method="post" id="frmPagadorTasaCambio" class="row needs-validation" novalidate>

                    <?php while($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){ ?> 

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <label for="pagador" class="form-label">Agencia o Corresponsal</label>
                            <input type="text" name="pagador" id="pagador" class="form-control" Value="<?php echo $fila["pagador"] ?>" required>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="Pais" class="form-label">Pais</label>
                            <input type="text" name="Pais" id="Pais" class="form-control" Value="<?php echo $fila["pais"] ?>" required>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="pa_tasa" class="form-label">Tasa $/euro</label>
                            <input type="number" step="0.01" name="tasa[<?php echo $fila["idPagador"] ?>]" id="pa_tasa" class="form-control" Value="<?php echo $fila["pa_tasa"] ?>" required>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="pa_tipoCambio" class="form-label">Moneda/$</label>
                            <input type="number" step="0.01" name="tipoCambio[<?php echo $fila["idPagador"] ?>]" id="pa_tipoCambio" class="form-control" Value="<?php echo $fila["pa_tipoCambio"] ?>" required>
                        </div>                       

                    </div>

                    <?php } ?>

                    <input type="hidden" name="accion" id="accion" value="7">

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