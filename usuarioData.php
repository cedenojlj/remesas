<?php  

session_start();

if (!isset($_SESSION["rolUsuario"])) {

  //header("Location:index.php");
  
}

require_once('conexion.php');



//Recuperar los usuarios para el datatable

$idUsuario=isset($_POST['idUsuario']) ? intval($_POST['idUsuario']) : ' ';
$us_nombre=isset($_POST['us_nombre']) ? htmlentities($_POST['us_nombre']) : ' ';
$us_apellido=isset($_POST['us_apellido']) ? htmlentities($_POST['us_apellido']) : ' ';
$us_direccion=isset($_POST['us_direccion']) ? htmlentities($_POST['us_direccion']) : ' ';
$us_tlf=isset($_POST['us_tlf']) ? htmlentities($_POST['us_tlf']) : ' ';
$us_email=isset($_POST['us_email']) ? htmlentities($_POST['us_email']) : ' ';
$us_clave=isset($_POST['us_clave']) ? password_hash(htmlentities($_POST['us_clave']),PASSWORD_DEFAULT) : '';
$us_identificacion=isset($_POST['us_identificacion']) ? htmlentities($_POST['us_identificacion']) : ' ';
$us_ciudad=isset($_POST['us_ciudad']) ? htmlentities($_POST['us_ciudad']) : ' ';
$idPagador=isset($_POST['idPagador']) ? htmlentities($_POST['idPagador']) : ' ';
$idTipoRol=isset($_POST['idTipoRol']) ? htmlentities($_POST['idTipoRol']) : ' ';
$idEstado=isset($_POST['idEstado']) ? htmlentities($_POST['idEstado']) : ' ';
$action=isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])):1;



// agregar nuevo usuario

if($action == 2){

  $sql= "INSERT INTO usuario VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(

    $us_nombre,$us_apellido,$us_direccion,$us_tlf,$us_email,
    $us_clave,$us_identificacion,$us_ciudad,$idPagador,$idTipoRol,$idEstado   

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

    header("Location:usuario.php");

}

//mostrar todos los usuarios

if($action == 1){
        
  $sql= "SELECT u.idUsuario, u.us_nombre, u.us_apellido, u.us_identificacion, 
  r.rol, e.estado FROM usuario AS u JOIN tiporol AS r ON u.idTipoRol = r.idTipoRol 
  JOIN estado AS e ON u.idEstado = e.idEstado ";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute();

  $resultado= $sentencia->fetchAll();  

  $outPut=Array();

  foreach($resultado as $row){  

         if ($row["estado"]=="Activo") {
          $est='<span class="badge bg-success" >'. $row["estado"]. '</span>';
         } else {
          $est='<span class="badge bg-warning" >'. $row["estado"]. '</span>';
         }

         $permisoActualizar=[1,4];

         if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {
 
            $edicion= '<span class="badge bg-primary editar" id=' .$row["idUsuario"].'> Editar</span>';
 
         } else {
            
             $edicion='';
         }
 
         if ($_SESSION["rolUsuario"]==1) {
 
             $eliminacion= '<span class="badge bg-danger borrar" id=' .$row["idUsuario"].'> Borrar</span>';
           
         } else {
 
            $eliminacion='';
         }        

          $subArray=Array(
              "id" => $row["idUsuario"],
              "Nombre" => $row["us_nombre"],
              "Apellido" => $row["us_apellido"],
              "Identificacion" => $row["us_identificacion"],
              "Rol" => $row["rol"],
              "Status" => $est,              
              "Edit" => $edicion,
              "Del" => $eliminacion,       
          );                   

          $outPut[]=$subArray;
  }

  
  echo json_encode(array("data" => $outPut)); 

}

// recuperar un usuario con su id

if($action == 3){

 
  $sql= "SELECT * FROM usuario WHERE idUsuario = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array($idUsuario));

  $resultado= $sentencia->fetchAll(); 
  
  $_SESSION['user'] = $resultado;

  echo json_encode(array("data" =>  $resultado));
  
} 

//borrar usuario

if($action == 5){

        
  $sql="DELETE FROM usuario WHERE idUsuario = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array($idUsuario));       

  echo json_encode(array("data" => "ok"));

}

//actualizar los usuarios

if($action == 4){  

  $sql= "UPDATE usuario SET us_nombre = ?, us_apellido = ?, us_direccion = ?,
  us_tlf = ?, us_email = ?, us_clave = ?, us_identificacion = ?, us_ciudad = ?, 
  idPagador = ?, idTipoRol = ?, idEstado = ? WHERE idUsuario = ?";

  $sentencia = $mbd->prepare($sql);

  $sentencia->execute(array(
    
    $us_nombre, $us_apellido, $us_direccion, $us_tlf, $us_email, $us_clave,
    $us_identificacion, $us_ciudad, $idPagador, $idTipoRol, $idEstado,
    $idUsuario,    

  ));  


  /* $cantidadFilas=$sentencia->rowCount();

  if ($cantidadFilas=1) {

    $_SESSION['msg'] ='Proceso Exitoso';
    $_SESSION['control'] =true;
   

   
  } else {
    
    $_SESSION['msg'] ='Proceso Fallido';
    $_SESSION['control'] =false;

  }

    header("Location:usuarioTabla.php"); */
 
  echo json_encode(array("data" => "ok"));
  
}


?>

    