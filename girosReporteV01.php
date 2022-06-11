<?php

require_once 'conexion.php';

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=bco.xls");
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

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>

<thead>

<tr>
<th>TIPO</th>
<th>CONTRAPARTIDA</th>
<th>MONEDA</th>
<th>VALOR</th>
<th>FORMA DE PAGO</th>
<th>TIPO CTA</th>
<th>NUMERO CTA</th>
<th>REFERENCIA</th>
<th>TIPO ID</th>
<th>NUMERO ID</th>
<th>NOMBRE BENEFICIARIO</th>
<th>CODIGOS BANCOS</th>
</tr>

</thead>

<tbody>

<?php $contador = 1?>
<?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>

        <td><?php echo 'PA' ?> </td>
        <td><?php 
            
            echo $contador;
            $contador= $contador +1;

        ?> </td>
        <td><?php echo 'USD' ?> </td>
        <!-- <td><?php echo ($fila['gi_TotalLocal']/$fila['gi_tipoCambio']) ?> </td> -->
        <td><?php 

                 //$valor= strval(round($fila['valor'],2));
                 $valor= strval(number_format($fila['valor'],2,',','.'));
                 $caracteres = Array(".",",");
                 $rto = str_replace($caracteres,"",$valor);
                 echo $rto; 

                ?> </td>
        <td><?php echo 'CTA' ?> </td>
        <td><?php echo $fila['idTipoCuenta']==1?'AHO':'CTE'?> </td>        
        <td><?php echo $fila['be_numCuenta'] ?> </td>
        <td><?php echo $fila['idGiro'] ?> </td>
        <td><?php 
        
        if($fila['idTipoIdentidad']==1){

            echo 'C';

        } elseif($fila['idTipoIdentidad']==2){

            echo 'P';

        }else{

            echo 'R';

        }  
               
        
        ?> </td>
        <td><?php echo $fila['be_identidad'] ?> </td>
        <td><?php echo $fila['be_nombre']. ' '.$fila['be_apellido']  ?> </td>
        <td><?php echo $fila['ba_codbanco'] ?> </td>
    
    </tr>
    

<?php } ?>

</tbody>


</table>
    
</body>
</html>