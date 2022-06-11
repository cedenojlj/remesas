

<?php 

    require_once('conexion.php');

    //Para recuperar todos los usuarios

        $sql= "SELECT * FROM pagador";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $pagadores = $resultado;   

        //Para recuperar todas las cuentas

        $sql= "SELECT * FROM tipocuenta";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $cuentas = $resultado;

        //Para recuperar los bancos

        $sql= "SELECT * FROM banco";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $bancos = $resultado;

        //Para recuperar las monedas

        $sql= "SELECT * FROM moneda";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $monedas = $resultado;


?>