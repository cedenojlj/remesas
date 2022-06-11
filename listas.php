

<?php 

    require_once('conexion.php');

    //Para recuperar todos los usuarios

        $sql= "SELECT * FROM tiporol";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $roles = $resultado;

        //Para recuperar todos los agentes

        $agente = 1;

        $sql= "SELECT * FROM pagador WHERE idTipoEmpresa = ?";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute(array($agente));

        $resultado= $sentencia->fetchAll();

        $pagadores = $resultado; 


        //Para recuperar todos los estatus

        $sql= "SELECT * FROM estado";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $status = $resultado;

        //Para recuperar todos los estatus

        $sql= "SELECT * FROM pais";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $paises = $resultado;

        //Para recuperar todas las identidades

        $sql= "SELECT * FROM identidad";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $identidades = $resultado;

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

        //Para recuperar las monedas envio

        $sql= "SELECT * FROM monedaenvio";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $monedasEnvio = $resultado;

        //Para recuperar los clientes

        $sql= "SELECT * FROM cliente";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $clientes = $resultado;

        //Para recuperar los beneficiarios

        $sql= "SELECT * FROM beneficiario";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $beneficiarios = $resultado;

        //Para recuperar todos los agentes o corresponsales

        $estado = 1;

        $sql = "SELECT u.idPagador, u.pagador, p.pais, u.pa_ciudad,u.pa_direccion
        FROM pagador AS u JOIN pais AS p ON u.idPais = p.idPais 
         WHERE idEstado = ?";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute(array($estado));

        $resultado= $sentencia->fetchAll();

        $corresponsales = $resultado; 

        
        //Para recuperar los tipos de retiro

        $sql= "SELECT * FROM tiporetiro";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $retiros = $resultado;

        //Para recuperar los estados de los giros

        $sql= "SELECT * FROM estadogiro";

        $sentencia = $mbd->prepare($sql);

        $sentencia->execute();

        $resultado= $sentencia->fetchAll();

        $statusgiros = $resultado;

?>