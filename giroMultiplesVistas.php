<?php

session_start();

require_once "encabezado.php";

require_once "listas.php";


?>

<div class="container-fluid pantalla">

    <div class="row">

        <!-- para los clientes -->
        <div class="col-md-4 mt-3 mb-3 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cliente</h4>
                    <form action="clienteData.php" method="post" id="frmCliente" class="row needs-validation" novalidate enctype="multipart/form-data">

                        <div class="col-12 col-md-4">
                            <label for="idCliente" class="col-form-label col-form-label-sm">idCliente</label>
                            <input type="text" name="idCliente" id="idCliente" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_nombre" class="col-form-label col-form-label-sm">Nombre</label>
                            <input type="text" name="cl_nombre" id="cl_nombre" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_apellido" class="col-form-label col-form-label-sm">Apellido</label>
                            <input type="text" name="cl_apellido" id="cl_apellido" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_fechaNacimiento" class="col-form-label col-form-label-sm">Fecha Nacimiento</label>
                            <input type="date" name="cl_fechaNacimiento" id="cl_fechaNacimiento" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idPais" class="col-form-label col-form-label-sm">Pais</label>
                            <select class="form-select" name="idPais" id="idPais" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($paises as $item) { ?>

                                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_ciudad" class="col-form-label col-form-label-sm">Ciudad</label>
                            <input type="text" name="cl_ciudad" id="cl_ciudad" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-12">
                            <label for="cl_direccion" class="col-form-label col-form-label-sm">Direccion</label>
                            <input type="text" name="cl_direccion" id="cl_direccion" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_provincia" class="col-form-label col-form-label-sm">Provincia</label>
                            <input type="text" name="cl_provincia" id="cl_provincia" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="cl_tlf" class="col-form-label col-form-label-sm">Telefono</label>
                            <input type="text" name="cl_tlf" id="cl_tlf" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="cl_email" class="col-form-label col-form-label-sm">Email</label>
                            <input type="text" name="cl_email" id="cl_email" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_identidad" class="col-form-label col-form-label-sm">Identificacion</label>
                            <input type="text" name="cl_identidad" id="cl_identidad" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idTipoIdentidad" class="col-form-label col-form-label-sm">Tipo Identidad</label>
                            <select class="form-select" name="idTipoIdentidad" id="idTipoIdentidad" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($identidades as $item) { ?>

                                    <option value=" <?php echo $item['idTipoIdentidad'] ?>"> <?php echo $item['tipoIdentidad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_fechaEmision" class="col-form-label col-form-label-sm">Fecha Emision</label>
                            <input type="date" name="cl_fechaEmision" id="cl_fechaEmision" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_fechaCaducidad" class="col-form-label col-form-label-sm">Fecha Caducidad</label>
                            <input type="date" name="cl_fechaCaducidad" id="cl_fechaCaducidad" class="form-control form-control-sm" min="<?php echo date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_nacionalidad" class="col-form-label col-form-label-sm">Nacionalidad</label>
                            <input type="text" name="cl_nacionalidad" id="cl_nacionalidad" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_facebook" class="col-form-label col-form-label-sm">Facebook</label>
                            <input type="text" name="cl_facebook" id="cl_facebook" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_whatsapp" class="col-form-label col-form-label-sm">Whatsapp</label>
                            <input type="text" name="cl_whatsapp" id="cl_whatsapp" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_telegram" class="col-form-label col-form-label-sm">Telegram</label>
                            <input type="text" name="cl_telegram" id="cl_telegram" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_limite" class="col-form-label col-form-label-sm">Limite</label>
                            <input type="text" name="cl_limite" id="cl_limite" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idMoneda" class="col-form-label col-form-label-sm">Monedas</label>
                            <select class="form-select" name="idMoneda" id="idMoneda" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedas as $item) { ?>

                                    <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idEstado" class="col-form-label col-form-label-sm">Estatus</label>
                            <select class="form-select" name="idEstado" id="idEstado" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($status as $item) { ?>

                                    <option value=" <?php echo $item['idEstado'] ?>"> <?php echo $item['estado'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_cedula" class="col-form-label col-form-label-sm">Cedula</label>
                            <input type="file" name="cl_doc_cedula" id="cl_doc_cedula" class="form-control form-control-sm" accept=".png, .jpg, .jpeg">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_form" class="col-form-label col-form-label-sm">Formulario</label>
                            <input type="file" name="cl_doc_form" id="cl_doc_form" class="form-control form-control-sm" accept=".png, .jpg, .jpeg">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="cl_doc_otro" class="col-form-label col-form-label-sm">Otro</label>
                            <input type="file" name="cl_doc_otro" id="cl_doc_otro" class="form-control form-control-sm" accept=".png, .jpg, .jpeg">
                        </div>



                        <input id="mydata" type="hidden" name="mydata" value="">
                        <input type="hidden" name="accion" id="accion" value="7">


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 col-12 col-md-3 mb-3" id="btnUsuario">Submit</button>
                            <button class="btn btn-primary mt-3 col-12 col-md-3 mb-3" id="btnCamara">Camara</button>                            
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

                <div class="card-footer d-none" id="camara">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6" id="my_camera"></div>
                        <div class="col-6" id="results"></div>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg btn-block" onClick="take_snapshot()">Tomar Foto</button>
                    <button type="button" class="btn btn-primary btn-lg btn-block" onClick="apagar()">Apagar</button>
                </div>
            </div>

        </div>

         <!-- para los beneficiarios -->
        <div class="col-md mt-3 mb-3 ">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beneficiario</h4>
                    <form action="beneficiarioData.php" method="post" id="frmBeneficiarioVista" class="row needs-validation" novalidate>

                        <div class="col-12 col-md-4">
                            <label for="idBeneficiario" class="col-form-label col-form-label-sm">idBeneficiario</label>
                            <input type="text" name="idBeneficiario" id="idBeneficiario" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_nombre" class="col-form-label col-form-label-sm">Nombre</label>
                            <input type="text" name="be_nombre" id="be_nombre" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_apellido" class="col-form-label col-form-label-sm">Apellido</label>
                            <input type="text" name="be_apellido" id="be_apellido" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_fechaNacimiento" class="col-form-label col-form-label-sm">Fecha Nacimiento</label>
                            <input type="date" name="be_fechaNacimiento" id="be_fechaNacimiento" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idPais" class="col-form-label col-form-label-sm">Pais</label>
                            <select class="form-select" name="idPais" id="idPais" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($paises as $item) { ?>

                                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_ciudad" class="col-form-label col-form-label-sm">Ciudad</label>
                            <input type="text" name="be_ciudad" id="be_ciudad" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-12">
                            <label for="be_direccion" class="col-form-label col-form-label-sm">Direccion</label>
                            <input type="text" name="be_direccion" id="be_direccion" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_tlf" class="col-form-label col-form-label-sm">Telefono</label>
                            <input type="text" name="be_tlf" id="be_tlf" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="be_email" class="col-form-label col-form-label-sm">Email</label>
                            <input type="text" name="be_email" id="be_email" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_identidad" class="col-form-label col-form-label-sm">Identificacion</label>
                            <input type="text" name="be_identidad" id="be_identidad" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idTipoIdentidad" class="col-form-label col-form-label-sm">Tipo Identidad</label>
                            <select class="form-select" name="idTipoIdentidad" id="idTipoIdentidad" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($identidades as $item) { ?>

                                    <option value=" <?php echo $item['idTipoIdentidad'] ?>"> <?php echo $item['tipoIdentidad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_nacionalidad" class="col-form-label col-form-label-sm">Nacionalidad</label>
                            <input type="text" name="be_nacionalidad" id="be_nacionalidad" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_facebook" class="col-form-label col-form-label-sm">Facebook</label>
                            <input type="text" name="be_facebook" id="be_facebook" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_whatsapp" class="col-form-label col-form-label-sm">Whatsapp</label>
                            <input type="text" name="be_whatsapp" id="be_whatsapp" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_telegram" class="col-form-label col-form-label-sm">Telegram</label>
                            <input type="text" name="be_telegram" id="be_telegram" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="be_numCuenta" class="col-form-label col-form-label-sm">Numero Cuenta</label>
                            <input type="text" name="be_numCuenta" id="be_numCuenta" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idTipoCuenta" class="col-form-label col-form-label-sm">Tipo Cuenta</label>
                            <select class="form-select" name="idTipoCuenta" id="idTipoCuenta" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($cuentas as $item) { ?>

                                    <option value=" <?php echo $item['idTipoCuenta'] ?>"> <?php echo $item['tipoCuenta'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idBanco" class="col-form-label col-form-label-sm">Banco</label>
                            <select class="form-select" name="idBanco" id="idBanco" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($bancos as $item) { ?>

                                    <option value=" <?php echo $item['idBanco'] ?>"> <?php echo $item['banco'] . " " . $item['ba_ciudad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idMoneda" class="col-form-label col-form-label-sm">Monedas</label>
                            <select class="form-select" name="idMoneda" id="idMoneda" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedas as $item) { ?>

                                    <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idEstado" class="col-form-label col-form-label-sm">Estatus</label>
                            <select class="form-select" name="idEstado" id="idEstado" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($status as $item) { ?>

                                    <option value=" <?php echo $item['idEstado'] ?>"> <?php echo $item['estado'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <input type="hidden" name="accion" id="accion" value="2">
                        <input type="hidden" name="origenFormulario" id="origenFormulario" value="1">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 col-12 col-md-3 mb-3" id="btnUsuario">Submit</button>
                        </div>

                    </form>
                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-md-12" id="msgBeneficiario">

                        </div>

                    </div>

                </div>
            </div>

        </div>

         <!-- para los giros -->
        <div class="col-md mt-3 mb-3 ">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Giro</h4>
                    <form action="" method="post" id="frmGiro" class="row needs-validation" novalidate enctype="multipart/form-data">

                        <div class="col-12 col-md-4">
                            <label for="idGiro" class="col-form-label col-form-label-sm">idGiro</label>
                            <input type="text" name="idGiro" id="idGiro" class="form-control form-control-sm" readonly>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_fecha" class="col-form-label col-form-label-sm">Fecha</label>
                            <input type="date" name="gi_fecha" id="gi_fecha" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idEstadoGiro" class="col-form-label col-form-label-sm">Estatus</label>
                            <select class="form-select" name="idEstadoGiro" id="idEstadoGiro" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($statusgiros as $item) { ?>

                                    <option value=" <?php echo $item['idEstadoGiro'] ?>"> <?php echo $item['estadoGiro'] ?></option>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idCliente" class="col-form-label col-form-label-sm">Cliente</label>
                            <select class="form-select" name="idCliente" id="idClientegi" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($clientes as $item) { ?>

                                    <option value=" <?php echo $item['idCliente'] ?>"> <?php echo $item['cl_nombre'] . " " . $item['cl_apellido'] . " " . $item['cl_identidad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idBeneficiario" class="col-form-label col-form-label-sm">Beneficiario</label>
                            <select class="form-select" name="idBeneficiario" id="idBeneficiariogi" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($beneficiarios as $item) { ?>

                                    <option value=" <?php echo $item['idBeneficiario'] ?>"> <?php echo $item['be_nombre'] . " " . $item['be_apellido'] . " " . $item['be_identidad'] ?></option>

                                <?php } ?>
                            </select>
                        </div>



                        <div class="col-12 col-md-4">
                            <label for="idPais" class="col-form-label col-form-label-sm">Pais</label>
                            <select class="form-select" name="idPais" id="idPaisgi" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($paises as $item) { ?>

                                    <option value=" <?php echo $item['idPais'] ?>"> <?php echo $item['pais'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-12">
                            <label for="idPagador" class="col-form-label col-form-label-sm">Corresponsal</label>
                            <select class="form-select" name="idPagador" id="idPagador" required>
                                <option value="">Seleccione</option>

                                <?php foreach ($corresponsales as $item) { ?>

                                    <option value=" <?php echo $item['idPagador'] ?>"> <?php echo $item['pagador'] . " " . $item['pais'] . " " . $item['pa_ciudad'] . " " . $item['pa_direccion'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_TotalLocal" class="col-form-label col-form-label-sm">Moneda a Pagar Local</label>
                            <input type="number" step="0.01" name="gi_TotalLocal" id="gi_TotalLocal" class="form-control form-control-sm" required>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="gi_Total" class="col-form-label col-form-label-sm">Total a Pagar</label>
                            <input type="number" step="0.01" name="gi_Total" id="gi_Total" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idMonedaCobro" class="col-form-label col-form-label-sm">Monedas Cobro</label>
                            <select class="form-select" name="idMonedaCobro" id="idMonedaCobrogi" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedas as $item) { ?>

                                    <option value=" <?php echo $item['idMoneda'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_importe" class="col-form-label col-form-label-sm">Importe</label>
                            <input type="number" step="0.01" name="gi_importe" id="gi_importe" class="form-control form-control-sm" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="idMonedaPago" class="col-form-label col-form-label-sm">Monedas Envio</label>
                            <select class="form-select" name="idMonedaPago" id="idMonedaPagogi" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($monedasEnvio as $item) { ?>

                                    <option value=" <?php echo $item['idMonedaEnvio'] ?>"> <?php echo $item['mo_codigo'] . " " . $item['moneda'] ?></option>

                                <?php } ?>
                            </select>
                        </div>


                        <div class="col-12 col-md-4">
                            <label for="idTipoRetiro" class="col-form-label col-form-label-sm">Tipo Retiro</label>
                            <select class="form-select" name="idTipoRetiro" id="idTipoRetiro" required>
                                <option value=""> Seleccione</option>

                                <?php foreach ($retiros as $item) { ?>

                                    <option value=" <?php echo $item['idTipoRetiro'] ?>"> <?php echo $item['tipoRetiro'] ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_Banco" class="col-form-label col-form-label-sm">Banco</label>
                            <input type="text" name="gi_Banco" id="gi_Banco" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_numCta" class="col-form-label col-form-label-sm">Numero de Cuenta</label>
                            <input type="text" name="gi_numCta" id="gi_numCta" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="gi_TipoCuenta" class="col-form-label col-form-label-sm">Tipo de Cuenta</label>
                            <input type="text" name="gi_TipoCuenta" id="gi_TipoCuenta" class="form-control form-control-sm">
                        </div>

                        <div class="col-12 col-md-12">
                            <label for="gi_comentario" class="col-form-label col-form-label-sm">Comentario</label>
                            <input type="text" name="gi_comentario" id="gi_comentario" class="form-control form-control-sm">
                        </div>


                        <input type="hidden" name="accion" id="accion" value="5">
                        <input type="hidden" name="gi_impuesto" id="gi_impuesto" value="0">
                        <input type="hidden" name="comisionMatriz" id="comisionMatriz" value="">
                        <input type="hidden" name="comisionAgente" id="comisionAgente" value="">
                        <input type="hidden" name="comisionCorresponsal" id="comisionCorresponsal" value="">
                        <input type="hidden" name="beneficio" id="beneficio" value="">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-3 col-12 col-md-3 mb-3" id="btnGiro">Submit</button>
                            <a href="" target="_blank" class="btn btn-primary disabled" id="btnFactura" role="button">Imprimir</a>
                        </div>


                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: "jpeg",
        jpeg_quality: 90,
    });

    Webcam.attach("#my_camera");

    function take_snapshot() {

        Webcam.snap(function(data_uri) {

            document.getElementById("results").innerHTML =
                '<img id="imageprev" src="' + data_uri + '"/>';
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

            document.getElementById('mydata').value = raw_image_data;

        });

    }


    function apagar() {

        Webcam.reset();
    }
</script>

<?php

require_once "pie.php"

?>