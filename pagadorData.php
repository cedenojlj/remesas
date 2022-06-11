<?php

session_start();

if (!isset($_SESSION["rolUsuario"])) {

    //header("Location:index.php");

}

require_once 'conexion.php';

//Recuperar los pagadors para el datatable
$idPagador=isset($_POST['idPagador']) ? intval(htmlentities($_POST['idPagador'])) : '';
$pagador=isset($_POST['pagador']) ? htmlentities($_POST['pagador']) : '';
$idPais=isset($_POST['idPais']) ? htmlentities($_POST['idPais']) : '';
$pa_provincia=isset($_POST['pa_provincia']) ? htmlentities($_POST['pa_provincia']) : '';
$pa_ciudad=isset($_POST['pa_ciudad']) ? htmlentities($_POST['pa_ciudad']) : '';
$pa_direccion=isset($_POST['pa_direccion']) ? htmlentities($_POST['pa_direccion']) : '';
$pa_tlf=isset($_POST['pa_tlf']) ? htmlentities($_POST['pa_tlf']) : '';
$pa_email=isset($_POST['pa_email']) ? htmlentities($_POST['pa_email']) : '';
$pa_cp=isset($_POST['pa_cp']) ? htmlentities($_POST['pa_cp']) : '';
$pa_Director=isset($_POST['pa_Director']) ? htmlentities($_POST['pa_Director']) : '';
$pa_tlfDirector=isset($_POST['pa_tlfDirector']) ? htmlentities($_POST['pa_tlfDirector']) : '';
$pa_emailDirector=isset($_POST['pa_emailDirector']) ? htmlentities($_POST['pa_emailDirector']) : '';
$pa_tlfEnvios=isset($_POST['pa_tlfEnvios']) ? htmlentities($_POST['pa_tlfEnvios']) : '';
$pa_emailEnvios=isset($_POST['pa_emailEnvios']) ? htmlentities($_POST['pa_emailEnvios']) : '';
$pa_GteContabilidad=isset($_POST['pa_GteContabilidad']) ? htmlentities($_POST['pa_GteContabilidad']) : '';
$pa_tlfContabilidad=isset($_POST['pa_tlfContabilidad']) ? htmlentities($_POST['pa_tlfContabilidad']) : '';
$pa_emailContabilidad=isset($_POST['pa_emailContabilidad']) ? htmlentities($_POST['pa_emailContabilidad']) : '';
$pa_horarios=isset($_POST['pa_horarios']) ? htmlentities($_POST['pa_horarios']) : '';
$pa_contrato=isset($_POST['pa_contrato']) ? htmlentities($_POST['pa_contrato']) : '';
$pa_inicioOperaciones=isset($_POST['pa_inicioOperaciones']) ? htmlentities($_POST['pa_inicioOperaciones']) : '';
$pa_limite=isset($_POST['pa_limite']) ? htmlentities($_POST['pa_limite']) : '';
$pa_web=isset($_POST['pa_web']) ? htmlentities($_POST['pa_web']) : '';
$pa_conciliarCada=isset($_POST['pa_conciliarCada']) ? htmlentities($_POST['pa_conciliarCada']) : '';
$idMoneda=isset($_POST['idMoneda']) ? htmlentities($_POST['idMoneda']) : '';
$pa_comision=isset($_POST['pa_comision']) ? htmlentities($_POST['pa_comision']) : '';
$pa_fijo=isset($_POST['pa_fijo']) ? htmlentities($_POST['pa_fijo']) : '';
$idTipoComision=isset($_POST['idTipoComision']) ? ($_POST['idTipoComision']) : '';
$idTipoEmpresa=isset($_POST['idTipoEmpresa']) ? htmlentities($_POST['idTipoEmpresa']) : '';
$pa_tasa=isset($_POST['pa_tasa']) ? htmlentities($_POST['pa_tasa']) : '';
$pa_tipoCambio=isset($_POST['pa_tipoCambio']) ? htmlentities($_POST['pa_tipoCambio']) : '';
$pa_impuesto=isset($_POST['pa_impuesto']) ? htmlentities($_POST['pa_impuesto']) : '';
$idEstado=isset($_POST['idEstado']) ? htmlentities($_POST['idEstado']) : '';
$action = isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])) : 1;


// agregar nuevo

if ($action == 2) {    

    $sql = "INSERT INTO pagador VALUES
  (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $pagador,$idPais,$pa_provincia,$pa_ciudad,$pa_direccion,$pa_tlf,
        $pa_email,$pa_cp,$pa_Director,$pa_tlfDirector,$pa_emailDirector,
        $pa_tlfEnvios,$pa_emailEnvios,$pa_GteContabilidad,$pa_tlfContabilidad,
        $pa_emailContabilidad,$pa_horarios,$pa_contrato,$pa_inicioOperaciones,
        $pa_limite,$pa_web,$pa_conciliarCada,$idMoneda,$pa_comision,$pa_fijo,
        $idTipoComision,$idTipoEmpresa,$pa_tasa,$pa_tipoCambio,$pa_impuesto,
        $idEstado


    ));

    //echo json_encode(array("data" => "ok"));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:pagador.php");
}

//mostrar todos

if ($action == 1) {

    $sql = "SELECT u.idPagador, u.pagador, p.pais, u.pa_ciudad,c.tipoEmpresa,
  e.estado FROM pagador AS u JOIN pais AS p ON u.idPais = p.idPais 
   JOIN estado AS e ON u.idEstado = e.idEstado 
   JOIN tipoempresa AS c ON u.idTipoEmpresa = c.idTipoEmpresa";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $outPut = array();

    foreach ($resultado as $row) {

        if ($row["estado"] == "Activo") {
            $est = '<span class="badge bg-success" >'. $row["estado"] . '</span>';
        } else {
            $est = '<span class="badge bg-warning" >'. $row["estado"] . '</span>';
        }

        $permisoActualizar=[1,4];

        if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {

           $edicion= '<span class="badge bg-primary editar" id='. $row["idPagador"] . '> Editar</span>';

        } else {
           
            $edicion='';
        }

        if ($_SESSION["rolUsuario"]==1) {

            $eliminacion= '<span class="badge bg-danger borrar" id='. $row["idPagador"] . '> Borrar</span>';
          
        } else {

           $eliminacion='';
        }        

        $subArray = array(
            "id" => $row["idPagador"],
            "Nombre" => $row["pagador"],
            "Pais" => $row["pais"],
            "Ciudad" => $row["pa_ciudad"],
            "Empresa" => $row["tipoEmpresa"],
            "Status" => $est,
            "Edit" =>$edicion,
            "Del" =>$eliminacion,
        );

        $outPut[] = $subArray;
    }

    echo json_encode(array("data" => $outPut));
}

// recuperar por su id

if ($action == 3) {

    $sql = "SELECT * FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    $resultado = $sentencia->fetchAll();

    $_SESSION['pagador'] = $resultado;

    echo json_encode(array("data" => $resultado));
}

//borrar

if ($action == 5) {

    $sql = "DELETE FROM pagador WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idPagador));

    echo json_encode(array("data" => "ok"));
}

//actualizar

if ($action == 4) {

   
    $sql = "UPDATE pagador SET  pagador = ?, idPais = ?, pa_provincia = ?, pa_ciudad = ?,
    pa_direccion = ?, pa_tlf = ?, pa_email = ?, pa_cp = ?, pa_Director = ?, pa_tlfDirector = ?,
    pa_emailDirector = ?, pa_tlfEnvios = ?, pa_emailEnvios = ?, pa_GteContabilidad = ?,
    pa_tlfContabilidad = ?, pa_emailContabilidad = ?, pa_horarios = ?, pa_contrato = ?,
    pa_inicioOperaciones = ?, pa_limite = ?, pa_web = ?, pa_conciliarCada = ?, idMoneda = ?,
    pa_comision = ?, pa_fijo = ?, idTipoComision = ?, idTipoEmpresa = ?, pa_tasa = ?,
    pa_tipoCambio = ?, pa_impuesto = ?, idEstado = ?  

  WHERE idPagador = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $pagador,$idPais,$pa_provincia,$pa_ciudad,$pa_direccion,$pa_tlf,
        $pa_email,$pa_cp,$pa_Director,$pa_tlfDirector,$pa_emailDirector,
        $pa_tlfEnvios,$pa_emailEnvios,$pa_GteContabilidad,$pa_tlfContabilidad,
        $pa_emailContabilidad,$pa_horarios,$pa_contrato,$pa_inicioOperaciones,
        $pa_limite,$pa_web,$pa_conciliarCada,$idMoneda,$pa_comision,$pa_fijo,
        $idTipoComision,$idTipoEmpresa,$pa_tasa,$pa_tipoCambio,$pa_impuesto,
        $idEstado,$idPagador

    ));

    echo json_encode(array("data" => "ok"));
}

//actualizar tasa dolar / euro

if ($action == 6) {

   
    $sql = "UPDATE pagador SET  pa_tasa = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($pa_tasa));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:giroTasa.php");

    
}


// para actualizar la tasa dolar / euro y el tipo de cambio moneda / dolar

if ($action == 7) {

    $tasa =$_POST['tasa'];
    $tipoCambio = $_POST['tipoCambio'];
    $filasActualizadas=0;    

     //echo "la tasa de 3 es: ".$_POST['tasa'][3]. "</br>";
     //echo "la tasa de 3 es: ".$tasa[3]. "</br>";


    $sql = "SELECT * FROM pagador ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(); 
    
    while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)) {

       echo "el id es: ".$fila['idPagador']. "</br>";
       echo "la tasa de es: ".$tasa[$fila['idPagador']]. "</br>";
       echo "el tipo de cambio es: ".$tipoCambio[$fila['idPagador']]. "</br>";
       

       $sqlTasa = "UPDATE pagador SET  pa_tasa = ?, pa_tipoCambio = ? WHERE idPagador = ? ";

        $stm = $mbd->prepare($sqlTasa);

        $stm->execute(array( 
            
            $tasa[$fila['idPagador']], $tipoCambio[$fila['idPagador']], $fila['idPagador'] ));

        $nfilas= $stm->rowCount();

        $filasActualizadas = $filasActualizadas + $nfilas;  

    }   
         

    if ($filasActualizadas >= 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:giroTasaCambio.php");
 
    
}

// para actualizar todas las tarifas de los agentes

if ($action == 8) {

    //arrays de post donde se guarda la informacion

    $tasa =$_POST['tasa'];
    $tipoCambio = $_POST['tipoCambio'];
    $comision =$_POST['comision'];
    $fijo =$_POST['fijo'];
    $idTipoComision =$_POST['idTipoComision'];
    $filasActualizadas=0;    

     //echo "la tasa de 3 es: ".$_POST['tasa'][3]. "</br>";
     //echo "la tasa de 3 es: ".$tasa[3]. "</br>";


    $sql = "SELECT * FROM pagador ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(); 
    
    while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)) {

       //echo "el id es: ".$fila['idPagador']. "</br>";
       //echo "la tasa de es: ".$tasa[$fila['idPagador']]. "</br>";
       //echo "el tipo de cambio es: ".$tipoCambio[$fila['idPagador']]. "</br>";
       

       $sqlTasa = "UPDATE pagador SET  pa_tasa = ?, pa_tipoCambio = ?, pa_comision = ?,
       pa_fijo = ?, idTipoComision = ? WHERE idPagador = ? ";

        $stm = $mbd->prepare($sqlTasa);

        $stm->execute(array( 
            
            $tasa[$fila['idPagador']], $tipoCambio[$fila['idPagador']], 
            $comision[$fila['idPagador']], $fijo[$fila['idPagador']],
            $idTipoComision[$fila['idPagador']], 
            $fila['idPagador'] ));

        $nfilas= $stm->rowCount();

        $filasActualizadas = $filasActualizadas + $nfilas;  

    }   
         

    if ($filasActualizadas >= 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:agencias.php");
 
    
}