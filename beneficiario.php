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
                    <h4 class="card-title">Beneficiario</h4>
                    <form action="beneficiarioData.php" method="post" id="frmBeneficiario" class="row needs-validation" novalidate>

                        <div class="col-12 col-md-4">
                            <label for="idBeneficiario" class="form-label">idBeneficiario</label>
                            <input type="text" name="idBeneficiario" id="idBeneficiario" class="form-control" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_nombre" class="form-label">Nombre</label>
                            <input type="text" name="be_nombre" id="be_nombre" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_apellido" class="form-label">Apellido</label>
                            <input type="text" name="be_apellido" id="be_apellido" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                            <input type="date" name="be_fechaNacimiento" id="be_fechaNacimiento" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idPais" class="form-label">Pais</label>
                            <select class="form-select" name="idPais" id="idPais" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($paises as $item) { ?>

                                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_ciudad" class="form-label">Ciudad</label>
                            <input type="text" name="be_ciudad" id="be_ciudad" class="form-control" required>
                        </div>


                        <div class="col-12 col-md-12">
                            <label for="be_direccion" class="form-label">Direccion</label>
                            <input type="text" name="be_direccion" id="be_direccion" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_tlf" class="form-label">Telefono</label>
                            <input type="text" name="be_tlf" id="be_tlf" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_email" class="form-label">Email</label>
                            <input type="text" name="be_email" id="be_email" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_identidad" class="form-label">Identificacion</label>
                            <input type="text" name="be_identidad" id="be_identidad" class="form-control" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idTipoIdentidad" class="form-label">Tipo Identidad</label>
                            <select class="form-select" name="idTipoIdentidad" id="idTipoIdentidad" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($identidades as $item) { ?>

                                    <option value=" <?php echo $item['idTipoIdentidad'] ?>"> <?php echo $item['tipoIdentidad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" name="be_nacionalidad" id="be_nacionalidad" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_facebook" class="form-label">Facebook</label>
                            <input type="text" name="be_facebook" id="be_facebook" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_whatsapp" class="form-label">Whatsapp</label>
                            <input type="text" name="be_whatsapp" id="be_whatsapp" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_telegram" class="form-label">Telegram</label>
                            <input type="text" name="be_telegram" id="be_telegram" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_numCuenta" class="form-label">Numero Cuenta</label>
                            <input type="text" name="be_numCuenta" id="be_numCuenta" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idTipoCuenta" class="form-label">Tipo Cuenta</label>
                            <select class="form-select" name="idTipoCuenta" id="idTipoCuenta" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($cuentas as $item) { ?>

                                    <option value=" <?php echo $item['idTipoCuenta'] ?>"> <?php echo $item['tipoCuenta'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idBanco" class="form-label">Banco</label>
                            <select class="form-select" name="idBanco" id="idBanco" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($bancos as $item) { ?>

                                    <option value=" <?php echo $item['idBanco'] ?>"> <?php echo $item['banco'] . " " . $item['ba_ciudad'] ?></option>

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