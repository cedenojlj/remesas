<?php   

require_once('config.php');


try {
    $mbd = new PDO($link, $user, $pass);
       
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>