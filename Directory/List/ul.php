<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php

function show_files($start) {
	$contents = scandir($start);
	array_splice($contents,0,2);
	echo '<ul>';
	foreach($contents as $item){
		echo '<li>',$item,'</li>';
		$x=$start.'/'.$item;
		if(is_dir($x) && (substr($item,0,1)!='.')){
			show_files($x);
		}
	};
	echo '</ul>';
}

show_files('./');

?></body></html>
