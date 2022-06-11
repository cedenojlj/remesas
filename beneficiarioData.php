<?php

session_start();

if (!isset($_SESSION["rolUsuario"])) {

    //header("Location:index.php");

}

require_once 'conexion.php';

//Recuperar los beneficiarios para el datatable

$idBeneficiario = isset($_POST['idBeneficiario']) ? intval(htmlentities($_POST['idBeneficiario'])) : '';
$be_nombre = isset($_POST['be_nombre']) ? htmlentities($_POST['be_nombre']) : '';
$be_apellido = isset($_POST['be_apellido']) ? htmlentities($_POST['be_apellido']) : '';
$be_fechaNacimiento = isset($_POST['be_fechaNacimiento']) ? htmlentities($_POST['be_fechaNacimiento']) : '';
$idPais = isset($_POST['idPais']) ? htmlentities($_POST['idPais']) : '';
$be_ciudad = isset($_POST['be_ciudad']) ? htmlentities($_POST['be_ciudad']) : '';
$be_direccion = isset($_POST['be_direccion']) ? htmlentities($_POST['be_direccion']) : '';
$be_tlf = isset($_POST['be_tlf']) ? htmlentities($_POST['be_tlf']) : '';
$be_email = isset($_POST['be_email']) ? htmlentities($_POST['be_email']) : '';
$be_identidad = isset($_POST['be_identidad']) ? htmlentities($_POST['be_identidad']) : '';
$idTipoIdentidad = isset($_POST['idTipoIdentidad']) ? htmlentities($_POST['idTipoIdentidad']) : '';
$be_nacionalidad = isset($_POST['be_nacionalidad']) ? htmlentities($_POST['be_nacionalidad']) : '';
$be_facebook = isset($_POST['be_facebook']) ? htmlentities($_POST['be_facebook']) : '';
$be_whatsapp = isset($_POST['be_whatsapp']) ? htmlentities($_POST['be_whatsapp']) : '';
$be_telegram = isset($_POST['be_telegram']) ? htmlentities($_POST['be_telegram']) : '';
$be_numCuenta = isset($_POST['be_numCuenta']) ? htmlentities($_POST['be_numCuenta']) : '';
$idTipoCuenta = isset($_POST['idTipoCuenta']) ? htmlentities($_POST['idTipoCuenta']) : '';
$idBanco = isset($_POST['idBanco']) ? htmlentities($_POST['idBanco']) : '';
$idMoneda = isset($_POST['idMoneda']) ? htmlentities($_POST['idMoneda']) : '';
$idEstado = isset($_POST['idEstado']) ? htmlentities($_POST['idEstado']) : '';
$action = isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])) : 1;

// agregar nuevo

if ($action == 2) {

    $sql = "INSERT INTO beneficiario VALUES
  (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $be_nombre, $be_apellido, $be_fechaNacimiento, $idPais, $be_ciudad, $be_direccion,
        $be_tlf, $be_email, $be_identidad, $idTipoIdentidad, $be_nacionalidad, $be_facebook,
        $be_whatsapp, $be_telegram, $be_numCuenta, $idTipoCuenta, $idBanco, $idMoneda, $idEstado,

    ));

    //echo json_encode(array("data" => "ok"));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
        $of=1;   //para saber si el proceso fue exitoso usando el formularo de varias vistas


    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
        $of=2;   //para saber si el proceso no fue exitoso usando el formularo de varias vistas


    }

    if (isset($_POST['origenFormulario'])) {


        if ($of==1) {

            echo json_encode(array("data" => 1));

        } else {

            echo json_encode(array("data" => 2));

        }

        
    } else {

        header("Location:beneficiario.php");

    }

    

}

//mostrar todos

if ($action == 1) {

    $sql = "SELECT u.idBeneficiario, u.be_nombre, u.be_apellido, u.be_identidad,
  e.estado FROM beneficiario AS u JOIN estado AS e ON u.idEstado = e.idEstado ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $outPut = array();

    foreach ($resultado as $row) {

        if ($row["estado"] == "Activo") {
            $est = '<span class="badge bg-success" >' . $row["estado"] . '</span>';
        } else {
            $est = '<span class="badge bg-warning" >' . $row["estado"] . '</span>';
        }

        $permisoActualizar=[1,4];

        if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {

           $edicion= '<span class="badge bg-primary editar" id=' . $row["idBeneficiario"] . '> Editar</span>';

        } else {
           
            $edicion='';
        }

        if ($_SESSION["rolUsuario"]==1) {

            $eliminacion='<span class="badge bg-danger borrar" id=' . $row["idBeneficiario"] . '> Borrar</span>';
          
        } else {

           $eliminacion='';
        }        


        $subArray = array(
            "id" => $row["idBeneficiario"],
            "Nombre" => $row["be_nombre"],
            "Apellido" => $row["be_apellido"],
            "Identificacion" => $row["be_identidad"],
            "Status" => $est,
            "Edit" => $edicion,
            "Del" => $eliminacion,
        );

        $outPut[] = $subArray;
    }

    echo json_encode(array("data" => $outPut));

}

// recuperar por su id

if ($action == 3) {

    $sql = "SELECT * FROM beneficiario WHERE idBeneficiario = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idBeneficiario));

    $resultado = $sentencia->fetchAll();

    $_SESSION['beneficiario'] = $resultado;

    echo json_encode(array("data" => $resultado));

}

//borrar

if ($action == 5) {

    $sql = "DELETE FROM beneficiario WHERE idBeneficiario = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idBeneficiario));

    echo json_encode(array("data" => "ok"));

}

//actualizar

if ($action == 4) {

    $sql = "UPDATE beneficiario SET   be_nombre = ?, be_apellido = ?, be_fechaNacimiento = ?,
  idPais = ?, be_ciudad = ?, be_direccion = ?, be_tlf = ?, be_email = ?, be_identidad = ?,
  idTipoIdentidad = ?, be_nacionalidad = ?, be_facebook = ?, be_whatsapp = ?, be_telegram = ?,
  be_numCuenta = ?, idTipoCuenta = ?, idBanco = ?, idMoneda = ?, idEstado = ?
  WHERE idBeneficiario = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $be_nombre, $be_apellido, $be_fechaNacimiento, $idPais, $be_ciudad, $be_direccion,
        $be_tlf, $be_email, $be_identidad, $idTipoIdentidad, $be_nacionalidad, $be_facebook,
        $be_whatsapp, $be_telegram, $be_numCuenta, $idTipoCuenta, $idBanco, $idMoneda,
        $idEstado, $idBeneficiario,

    ));

    echo json_encode(array("data" => "ok"));

}
