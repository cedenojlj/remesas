<?php

session_start();

require_once 'conexion.php';


$frDolar=isset($_POST['ma_TasaFrancoDolar']) ? htmlentities($_POST['ma_TasaFrancoDolar']) : '';


//Recuperar las comisones de la casa matriz

//mostrar todos

$action = isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])) : 2;


// para actualizar las tarifas de la casa matriz por pais

if ($action == 2) {

  
    $tipoCambio = $_POST['tipoCambio'];
    $porcentajeTipoCambio =$_POST['porcentajeTipoCambio'];
    $fijo =$_POST['fijo'];
    $porcentaje =$_POST['porcentaje'];
    $idTipoComision =$_POST['idTipoComision'];

    $filasActualizadas=0;    

    

     //echo "la tasa de 3 es: ".$_POST['tasa'][3]. "</br>";
     //echo "tipo de cambio de 3 es: ".$tipoCambio[1]. "</br>";


    $sql = "SELECT * FROM pais ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(); 
    
    while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)) {

       //echo "id:". $fila['idPais'];
       //echo " tipocambio: ". $tipoCambio[$fila['idPais']];
       
       //echo " PorcentajeTipoCambio: ". $porcentajeTipoCambio[$fila['idPais']];
       //echo " fijo: ". $fijo[$fila['idPais']];
       //echo " porcentaje: ". $porcentaje[$fila['idPais']];
       //echo " idTipoComision: ". $idTipoComision[$fila['idPais']];              
       //echo "</br>";
       
       

       $sqlTasa = "UPDATE pais SET  tipoCambio = ?, porcentajeTipoCambio = ?, 
       fijo = ?, porcentaje = ?, idTipoComision = ? WHERE idPais = ? ";

        $stm = $mbd->prepare($sqlTasa);

        $stm->execute(array( 
            
            $tipoCambio[$fila['idPais']], $porcentajeTipoCambio[$fila['idPais']], 
            $fijo[$fila['idPais']], $porcentaje[$fila['idPais']], $idTipoComision[$fila['idPais']],
            $fila['idPais'] ));

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

    header("Location:pais.php");
 
    
}

//actualizar tasa franco / dolar

if ($action == 3) {

    $cantidadFilas = 0;
   
    $sql = "UPDATE pais SET  tipoCambio = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($frDolar));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:paisTasa.php");

    
}


// para actualizar las tarifas de la casa matriz a unos valores globales

if ($action == 4) {

  
    $tipoCambio = $_POST['tipoCambio'];
    $porcentajeTipoCambio =$_POST['porcentajeTipoCambio'];
    $fijo =$_POST['fijo'];
    $porcentaje =$_POST['porcentaje'];
    $idTipoComision =$_POST['idTipoComision'];

    $filasActualizadas=0;    


       $sqlTasa = "UPDATE pais SET  tipoCambio = ?, porcentajeTipoCambio = ?, 
       fijo = ?, porcentaje = ?, idTipoComision = ?";

        $stm = $mbd->prepare($sqlTasa);

        $stm->execute(array( 
            
            $tipoCambio, $porcentajeTipoCambio, 
            $fijo, $porcentaje, $idTipoComision));

            $filasActualizadas= $stm->rowCount();


    if ($filasActualizadas >= 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;

    } else {

        $_SESSION['msg'] = 'Proceso Fallido';
        $_SESSION['control'] = false;
    }

    header("Location:paisTasasGlobal.php");
 
    
}
