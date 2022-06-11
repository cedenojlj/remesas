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
                    <h4 class="card-title">Cliente</h4>
                    <form action="clienteData.php" method="post" id="frmCliente" class="row needs-validation" novalidate enctype="multipart/form-data">

                        <div class="col-12 col-md-4">
                            <label for="idCliente" class="form-label">idCliente</label>
                            <input type="text" name="idCliente" id="idCliente" class="form-control" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_nombre" class="form-label">Nombre</label>
                            <input type="text" name="cl_nombre" id="cl_nombre" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_apellido" class="form-label">Apellido</label>
                            <input type="text" name="cl_apellido" id="cl_apellido" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                            <input type="date" name="cl_fechaNacimiento" id="cl_fechaNacimiento" class="form-control" required>
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
                            <label for="cl_ciudad" class="form-label">Ciudad</label>
                            <input type="text" name="cl_ciudad" id="cl_ciudad" class="form-control" required>
                        </div>


                        <div class="col-12 col-md-12">
                            <label for="cl_direccion" class="form-label">Direccion</label>
                            <input type="text" name="cl_direccion" id="cl_direccion" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_provincia" class="form-label">Provincia</label>
                            <input type="text" name="cl_provincia" id="cl_provincia" class="form-control" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="cl_tlf" class="form-label">Telefono</label>
                            <input type="text" name="cl_tlf" id="cl_tlf" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_email" class="form-label">Email</label>
                            <input type="text" name="cl_email" id="cl_email" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_identidad" class="form-label">Identificacion</label>
                            <input type="text" name="cl_identidad" id="cl_identidad" class="form-control" required>
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
                            <label for="cl_fechaEmision" class="form-label">Fecha Emision</label>
                            <input type="date" name="cl_fechaEmision" id="cl_fechaEmision" class="form-control" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_fechaCaducidad" class="form-label">Fecha Caducidad</label>
                            <input type="date" name="cl_fechaCaducidad" id="cl_fechaCaducidad" class="form-control" min="<?php echo date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" name="cl_nacionalidad" id="cl_nacionalidad" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_facebook" class="form-label">Facebook</label>
                            <input type="text" name="cl_facebook" id="cl_facebook" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_whatsapp" class="form-label">Whatsapp</label>
                            <input type="text" name="cl_whatsapp" id="cl_whatsapp" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_telegram" class="form-label">Telegram</label>
                            <input type="text" name="cl_telegram" id="cl_telegram" class="form-control">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_limite" class="form-label">Limite</label>
                            <input type="text" name="cl_limite" id="cl_limite" class="form-control" required>
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

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_cedula" class="form-label">Cedula</label>
                            <input type="file" name="cl_doc_cedula" id="cl_doc_cedula" class="form-control" accept=".png, .jpg, .jpeg" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_form" class="form-label">Formulario</label>
                            <input type="file" name="cl_doc_form" id="cl_doc_form" class="form-control" accept=".png, .jpg, .jpeg">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_otro" class="form-label">Otro</label>
                            <input type="file" name="cl_doc_otro" id="cl_doc_otro" class="form-control" accept=".png, .jpg, .jpeg">
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


                    if (isset($_SESSION['msgArchivo'])) {

                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Estatus de la Operación </strong>' . $_SESSION['msgArchivo'] . '
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                    }

                    unset($_SESSION['control']);
                    unset($_SESSION['msgArchivo']);

                    ?>


                </div>
            </div>

        </div>
    </div>
</div>

<?php

require_once "pie.php"

?>