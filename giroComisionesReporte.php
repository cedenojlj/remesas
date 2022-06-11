<?php

require_once 'conexion.php';

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=giros.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$sql="SELECT g.idGiro, g.gi_fecha as Fecha, p.pagador as agente, c.pagador as corresponsal,
g.comisionMatriz,g.comisionAgente, g.comisionCorresponsal,
g.gi_Total as Total, m.mo_codigo, m.moneda, e.estadoGiro as Status  FROM `giro` as g 
JOIN `pagador` as p ON g.idAgente=p.idPagador
JOIN `pagador` as c ON g.idPagador=c.idPagador
JOIN `moneda` as m ON g.idMonedaCobro=m.idMoneda
JOIN `estadogiro` as e ON g.idEstadoGiro=e.idEstadoGiro";

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
<th>id</th>
<th>Fecha</th>
<th>Agente</th>
<th>Corresponsal</th>
<th>ComisionMatriz</th>
<th>ComisionAgente</th>
<th>ComisionCorresponsal</th>
<th>Total</th>
<th>codigo</th>
<th>Moneda</th>
<th>Status</th>
</tr>

</thead>

<tbody>

<?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>

        <td><?php echo $fila['idGiro'] ?> </td>
        <td><?php echo $fila['Fecha'] ?> </td>
        <td><?php echo $fila['agente'] ?> </td>
        <td><?php echo $fila['corresponsal'] ?> </td>
        <td><?php echo $fila['comisionMatriz'] ?> </td>
        <td><?php echo $fila['comisionAgente'] ?> </td>
        <td><?php echo $fila['comisionCorresponsal'] ?> </td>
        <td><?php echo $fila['Total'] ?> </td>
        <td><?php echo $fila['mo_codigo'] ?> </td>
        <td><?php echo $fila['moneda'] ?> </td>
        <td><?php echo $fila['Status'] ?> </td>
    
    </tr>
    

<?php } ?>

</tbody>


</table>
    
</body>
</html>