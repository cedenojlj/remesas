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
                <h4 class="card-title">Banco</h4>
                <form action="bancoData.php" method="post" id="frmBanco" class="row needs-validation" novalidate>

                    <div class="col-12 col-md-4">
                        <label for="idBanco" class="form-label">idBanco</label>
                        <input type="text" name="idBanco" id="idBanco" class="form-control" readonly></div>
                    <div class="col-12 col-md-4">
                        <label for="banco" class="form-label">Banco</label>
                        <input type="text" name="banco" id="banco" class="form-control" required></div>
                    <div class="col-12 col-md-4">
                        <label for="ba_ciudad" class="form-label">Ciudad</label>
                        <input type="text" name="ba_ciudad" id="ba_ciudad" class="form-control" required></div>

                    <div class="col-12 col-md-12">
                        <label for="ba_direccion" class="form-label">Direccion</label>
                        <input type="text" name="ba_direccion" id="ba_direccion" class="form-control" required></div>
                 
                        <div class="col-12 col-md-4">
                        <label for="ba_codbanco" class="form-label">Num Codigo</label>
                        <input type="text" name="ba_codbanco" id="ba_codbanco" class="form-control" ></div>
                    
                        <div class="col-12 col-md-4">
                        <label for="ba_tlf" class="form-label">Telefono</label>
                        <input type="text" name="ba_tlf" id="ba_tlf" class="form-control" ></div>
                    <div class="col-12 col-md-4">
                        <label for="ba_email" class="form-label">Email</label>
                        <input type="text" name="ba_email" id="ba_email" class="form-control" ></div>
                    
                    <div class="col-12 col-md-4">
                        <label for="idPais" class="form-label">Pais</label>
                        <select class="form-select" name="idPais" id="idPais" required>
                            <option value="">Seleccione</option>

                            <?php foreach ($paises as $item) { ?>

                                <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                            <?php } ?>
                        </select>
                    </div>                    

                    <input type="hidden" name="accion" id="accion" value="2">

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
</div>

<?php

require_once "pie.php"

?>