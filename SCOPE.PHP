<?php
$b=3;
function a(){
	echo 1;
	 $b=function(){echo 2;};	

	$b();
	$b=4;
}

a();
echo $b;
