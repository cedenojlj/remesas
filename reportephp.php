<?php
//$out = fopen('php://output', 'w');
header( 'Content-Type: text/csv' );
            header( 'Content-Disposition: attachment;filename="ejemplo.csv"');
            $out = fopen('php://output', 'w');
$a= array('this','is some', 'csv "stuff", you know.');
fputcsv($out,$a,',');
fclose($out);
?>