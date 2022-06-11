<?php 

//echo password_hash('12345',PASSWORD_DEFAULT);

$f = password_hash('12345',PASSWORD_DEFAULT);

var_dump( password_get_info($f));

var_dump( password_algos());

?>