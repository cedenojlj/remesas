<?php  

session_start();

if (!isset($_SESSION["rolbanco"])) {

  //header("Location:index.php");
  
}

require_once('conexion.php');

//Recuperar los bancos para el datatable

//$idBanco=isset($_POST['idBanco']) ? intval($_POST['idBanco']) : ' ';

$idBanco=isset($_POST['idBanco']) ? intval(htmlentities($_POST['idBanco'])) : ' ';
$banco=isset($_POST['banco']) ? htmlentities($_POST['banco']) : ' ';
$idPais=isset($_POST['idPais']) ? intval(htmlentities($_POST['idPais'])) : ' ';
$ba_ciudad=isset($_POST['ba_ciudad']) ? htmlentities($_POST['ba_ciudad']) : ' ';
$ba_email=isset($_POST['ba_email']) ? htmlentities($_POST['ba_email']) : ' ';
$ba_tlf=isset($_POST['ba_tlf']) ? htmlentities($_POST['ba_tlf']) : ' ';
$ba_direccion=isset($_POST['ba_direccion']) ? htmlentities($_POST['ba_direccion']) : ' ';
$action=isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])):1;
$ba_codbanco=isset($_POST['ba_codbanco']) ? htmlentities($_POST['ba_codbanco']) : ' ';


// agregar nuevo banco

if($action == 2){

  $sql= "INSERT INTO banco VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $banco,$idPais,$ba_ciudad,$ba_email,$ba_tlf,$ba_direccion, $ba_codbanco   

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

    header("Location:banco.php");

}

//mostrar todos los bancos

if($action == 1){
        
  $sql= "SELECT u.idBanco, u.banco, p.pais, u.ba_ciudad
  FROM banco AS u JOIN pais AS p ON u.idPais = p.idPais";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute();

  $resultado= $sentencia->fetchAll();  

  $outPut=Array();

  foreach($resultado as $row){ 

    $permisoActualizar=[1,4];

    if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {

       $edicion= '<span class="badge bg-primary editar" id=' .$row["idBanco"].'> Editar</span>';

    } else {
       
        $edicion='';
    }

    if ($_SESSION["rolUsuario"]==1) {

        $eliminacion= '<span class="badge bg-danger borrar" id=' .$row["idBanco"].'> Borrar</span>';
      
    } else {

       $eliminacion='';
    }      

          $subArray=Array(
              "id" => $row["idBanco"],
              "Banco" => $row["banco"],
              "Pais" => $row["pais"],
              "Ciudad" => $row["ba_ciudad"],                        
              "Edit" => $edicion,
              "Del" => $eliminacion,       
          );                   

          $outPut[]=$subArray;
  }

  
  echo json_encode(array("data" => $outPut)); 

}

// recuperar un banco con su id

if($action == 3){

 
  $sql= "SELECT * FROM banco WHERE idBanco = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array($idBanco));

  $resultado= $sentencia->fetchAll(); 
  
  $_SESSION['banco'] = $resultado;

  echo json_encode(array("data" =>  $resultado));
  
} 

//borrar banco

if($action == 5){

        
  $sql="DELETE FROM banco WHERE idBanco = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array($idBanco));       

  echo json_encode(array("data" => "ok"));

}

//actualizar los bancos

if($action == 4){  

  $sql= "UPDATE banco SET  banco = ?, idPais = ?, ba_ciudad = ?, ba_email = ?,
  ba_tlf = ?, ba_direccion = ?, ba_codbanco = ?  WHERE idBanco = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(
    
    $banco,$idPais,$ba_ciudad,$ba_email,$ba_tlf,$ba_direccion,$ba_codbanco,$idBanco    

  ));  


  /* $cantidadFilas=$sentencia->rowCount();

  if ($cantidadFilas=1) {

    $_SESSION['msg'] ='Proceso Exitoso';
    $_SESSION['control'] =true;
   

   
  } else {
    
    $_SESSION['msg'] ='Proceso Fallido';
    $_SESSION['control'] =false;

  }

    header("Location:bancoTabla.php"); */
 
  echo json_encode(array("data" => "ok"));
  
}


?>

    