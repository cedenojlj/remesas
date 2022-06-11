<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";

?>

<div class="container">
    <div class="row d-flex mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Actualizacion Tasa $/Euro de Agencias</h4>
                <form action="pagadorData.php" method="post" id="frmPagadorTasa" class="row needs-validation" novalidate>

                    <div class="col-12 col-md-4">
                        <label for="pa_tasa" class="form-label">Tasa $/euro</label>
                        <input type="number" step="0.01" name="pa_tasa" id="pa_tasa" class="form-control" required></div>
                    
                    <input type="hidden" name="accion" id="accion" value="6">

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