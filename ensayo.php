<?php 

$idUsuario=isset($_POST['idUsuario']) ? $_POST['idUsuario'] : ' ';

$action=isset($_POST['accion']) ?$_POST['accion']:1;

$output=['usuario'=>$idUsuario, 'accion'=>$action];

echo json_encode(array("data" => $output));

?>