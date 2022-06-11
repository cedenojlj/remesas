<?php  

session_start();

if (!isset($_SESSION["rolUsuario"])) {

  //header("Location:index.php");
  
}

require_once('conexion.php');


//Recuperar los usuarios para el datatable

$idCuenta=isset($_POST['idCuenta']) ? htmlentities($_POST['idCuenta']) : '';
$cu_numCta=isset($_POST['cu_numCta']) ? htmlentities($_POST['cu_numCta']) : '';
$idBanco=isset($_POST['idBanco']) ? htmlentities($_POST['idBanco']) : '';
$idTipoCuenta=isset($_POST['idTipoCuenta']) ? htmlentities($_POST['idTipoCuenta']) : '';
$idPagador=isset($_POST['idPagador']) ? htmlentities($_POST['idPagador']) : '';
$idMoneda=isset($_POST['idMoneda']) ? htmlentities($_POST['idMoneda']) : '';
$action=isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])):1;



// agregar nuevo usuario

if($action == 2){

  $sql= "INSERT INTO cuenta VALUES (NULL,?,?,?,?,?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $cu_numCta,$idBanco,$idTipoCuenta,$idPagador,$idMoneda

  ));

  //echo json_encode(array("data" => "ok"));

  $cantidadFilas=$sentencia->rowCount();

    if ($cantidadFilas=1) {

      $_SESSION['msg'] ='Proceso Exitoso';
      $_SESSION['control'] =true;

     
    } else {
      
      $_SESSION['msg'] ='Proceso Fallido';
      $_SESSION['control'] =false;

    }

    header("Location:cuenta.php");

}


?>

    