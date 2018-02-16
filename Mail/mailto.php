<?php
function mailto($a,$b,$c,$d){mail($b,$c,$d,'MIME-Version: 1.0'.PHP_EOL.'Content-type: text/html; charset=iso-8859-1'.PHP_EOL.'To: '.$a.' <'.$b.'>'.PHP_EOL.'From: y');}


mailto('Fabio','x@x.it','oggetto','testohtml');



?>
