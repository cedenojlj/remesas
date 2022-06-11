<?php

require_once 'conexion.php';

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$sql="SELECT *, p.pais FROM cliente AS c JOIN pais AS p ON c.idPais = p.idPais";

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
<th>Nombre</th>
<th>Apellido</th>
<th>Fecha de Nacimiento</th>
<th>Pais</th>
<th>Provincia</th>
<th>Ciudad</th>
<th>Direccion</th>
<th>Telefono</th>
<th>Email</th>

</tr>

</thead>

<tbody>

<?php while ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>

        <td><?php echo $fila['idCliente'] ?> </td>
        <td><?php echo $fila['cl_nombre'] ?> </td>
        <td><?php echo $fila['cl_apellido'] ?> </td>
        <td><?php echo $fila['cl_fechaNacimiento'] ?> </td>
        <td><?php echo $fila['pais'] ?> </td>        
        <td><?php echo $fila['cl_provincia'] ?> </td>
        <td><?php echo $fila['cl_ciudad'] ?> </td>
        <td><?php echo $fila['cl_direccion'] ?> </td> 
        <td><?php echo $fila['cl_tlf'] ?> </td> 
        <td><?php echo $fila['cl_email'] ?> </td> 
    
    </tr>
    

<?php } ?>

</tbody>


</table>
    
</body>
</html>