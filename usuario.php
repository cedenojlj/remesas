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
                <h4 class="card-title">Usuario</h4>
                <form action="usuarioData.php" method="post" id="frmUsuario" class="row needs-validation" novalidate>

                    <div class="col-12 col-md-4">
                        <label for="idUsuario" class="form-label">idUsuario</label>
                        <input type="text" name="idUsuario" id="idUsuario" class="form-control" readonly></div>
                    <div class="col-12 col-md-4">
                        <label for="us_nombre" class="form-label">Nombre</label>
                        <input type="text" name="us_nombre" id="us_nombre" class="form-control" required></div>
                    <div class="col-12 col-md-4">
                        <label for="us_apellido" class="form-label">Apellido</label>
                        <input type="text" name="us_apellido" id="us_apellido" class="form-control" required></div>

                    <div class="col-12 col-md-12">
                        <label for="us_direccion" class="form-label">Direccion</label>
                        <input type="text" name="us_direccion" id="us_direccion" class="form-control" required></div>

                    <div class="col-12 col-md-4">
                        <label for="us_identificacion" class="form-label">Identificacion</label>
                        <input type="text" name="us_identificacion" id="us_identificacion" class="form-control" required></div>

                    <div class="col-12 col-md-4">
                        <label for="us_tlf" class="form-label">Telefono</label>
                        <input type="text" name="us_tlf" id="us_tlf" class="form-control" required></div>
                    <div class="col-12 col-md-4">
                        <label for="us_email" class="form-label">Email</label>
                        <input type="text" name="us_email" id="us_email" class="form-control" required></div>
                    <div class="col-12 col-md-4">
                        <label for="us_clave" class="form-label">Password</label>
                        <input type="password" name="us_clave" id="us_clave" class="form-control" required></div>

                    <div class="col-12 col-md-4">
                        <label for="idTipoRol" class="form-label">Rol</label>
                        <select class="form-select" name="idTipoRol" id="idTipoRol" required>
                            <option value="">Seleccione</option>

                            <?php foreach ($roles as $item) { ?>

                                <option value=" <?php echo $item['idTipoRol'] ?>"> <?php echo $item['rol'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="us_ciudad" class="form-label">Ciudad</label>
                        <input type="text" name="us_ciudad" id="us_ciudad" class="form-control" required></div>


                    <div class="col-12 col-md-4">
                        <label for="idPagador" class="form-label">Agente</label>
                        <select class="form-select" name="idPagador" id="idPagador" required>
                            <option value=""> Seleccione</option>

                            <?php foreach ($pagadores as $item) { ?>

                                <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="idEstado" class="form-label">Estatus</label>
                        <select class="form-select" name="idEstado" id="idEstado" required>
                            <option value=""> Seleccione</option>

                            <?php foreach ($status as $item) { ?>

                                <option value=" <?php echo $item['idEstado'] ?>"> <?php echo $item['estado'] ?></option>

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