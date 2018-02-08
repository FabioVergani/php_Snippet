<!DOCTYPE html><html><head><meta charset="utf-8"><base target="_blank"><title>folder: <?php echo basename(__DIR__);?></title></head><body><?php
if($dir_handler=opendir('./')){
	$eol=PHP_EOL;
	echo '<pre>',$eol;
	$dirs=array_diff(scandir('./'), array('..', '.'));
	sort($dirs);
	foreach ($dirs as $i => $value){
		if(is_dir($value)){
			echo '<a href="./',$value,'/list.php?linked=yes">',$value,'</a>',$eol;
		};
	};
	echo '</pre>';
};
?></body></html>