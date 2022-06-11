<?php

require_once 'conexion.php';

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=agentes.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$sql="SELECT m.pais,p.pagador as Agente, p.pa_tipoCambio as TipoCambio,
m.tipoCambio as fr_dolar, m.porcentajeTipoCambio as Porcentaje_inc_cambio, 
((1/( m.tipoCambio))*(1+(m.porcentajeTipoCambio/100))) as dolar_fr_venta,
(((1/( m.tipoCambio))*(1+(m.porcentajeTipoCambio/100)))*p.pa_tipoCambio) as Local_fr,
m.fijo, m.porcentaje, t.tipoComision
FROM pagador as p 
JOIN pais as m ON p.idPais = m.idPais
JOIN tipocomision as t ON p.idTipoComision = t.idTipoComision ORDER BY p.idPais";

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
<th>Pais</th>
<th>Agente</th>
<th>Tipo Cambio</th>
<th>fr/$</th>
<th>% inc en el Cambio</th>
<th>Fijo</th>
<th>Comision (%)</th>
<th>Tipo Comision</th>

</tr>

</thead>

<tbody>

<?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>

        <td><?php echo $fila['pais'] ?> </td>
        <td><?php echo $fila['Agente'] ?> </td>
        <td><?php echo $fila['TipoCambio'] ?> </td>
        <td><?php echo $fila['fr_dolar'] ?> </td>
        <td><?php echo $fila['Porcentaje_inc_cambio'] ?> </td>        
        <td><?php echo $fila['fijo'] ?> </td>
        <td><?php echo $fila['porcentaje'] ?> </td>
        <td><?php echo $fila['tipoComision'] ?> </td> 
    
    </tr>
    

<?php } ?>

</tbody>


</table>
    
</body>
</html>