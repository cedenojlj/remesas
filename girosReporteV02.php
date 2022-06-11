<?php

require_once 'conexion.php';

header("Content-Type:   application/txt;");
header("Content-Disposition: attachment; filename=bco.txt");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$sql="SELECT g.idGiro, g.gi_TotalLocal, g.gi_tipoCambio, b.be_numCuenta, b.idTipoCuenta,
b.be_identidad,b.idTipoIdentidad, b.be_nombre, b.be_apellido, 
(g.gi_TotalLocal/g.gi_tipoCambio) as valor, bco.ba_codbanco
FROM `giro` as g 
JOIN `beneficiario` as b ON g.idBeneficiario=b.idBeneficiario
JOIN `banco` as bco ON b.idBanco = bco.idBanco";

$sentencia = $mbd->prepare($sql);
$sentencia->execute();  

$jump = "\r\n";
$separator = "\t";

//echo 'TIPO'.$separator.'CONTRAPARTIDA'.$separator.'MONEDA'.$separator.'VALOR'.$separator.'FORMA DE PAGO'.$separator.'TIPO CTA'.$separator.'NUMERO CTA'.$separator.'REFERENCIA'.$separator.'TIPO ID'.$separator.'NUMERO ID'.$separator.'NOMBRE BENEFICIARIO'.$separator.'CODIGOS BANCOS'.$separator.$jump;


$contador = 0;

while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { 

        $contador= $contador + 1;
        
        $valor= strval(number_format($fila['valor'],2,',','.'));
        $caracteres = Array(".",",");
        $rto = str_replace($caracteres,"",$valor);  

        
        if($fila['idTipoIdentidad']==1){

            $t_id='C';

        } elseif($fila['idTipoIdentidad']==2){

            $t_id='P';

        }else{

            $t_id='R';

        }  
        
        if($fila['idTipoCuenta']==1){

            $cuenta='AHO';
            
        }else{

            $cuenta='CTE';
        }
     
   
      $nombreCompleto= $fila['be_nombre']. ' '.$fila['be_apellido'];   

      echo 'PA'.$separator.$contador.$separator.'USD'.$separator.$rto.$separator.'CTA'.$separator.$cuenta.$separator.$fila['be_numCuenta'].$separator.$fila['idGiro'].$separator.$t_id.$separator.$fila['be_identidad'].$separator.$nombreCompleto.$separator.$fila['ba_codbanco'].$separator.$jump;
    

 } ?>

