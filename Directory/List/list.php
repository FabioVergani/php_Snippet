<?php
if($dir_handler=opendir('./')){
	echo '<pre>';
	$eol=PHP_EOL;
	while(($file_name=readdir($dir_handler))!==false){
		if(is_file($file_name)){
			echo $file_name,$eol;
		};
	};
	closedir($dir_handler);
	echo '</pre>';
};
?>
