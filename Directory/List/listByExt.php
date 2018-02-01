<?php
if($dir_handler=opendir('./')){
	echo '<pre>';
	$eol=PHP_EOL;
	while(($file=readdir($dir_handler))!==false){
		if(is_file($file)){
			$info=pathinfo($file);
			$file_ext=$info['extension'];
			if(strcmp($file_ext,'json')===0){
				$file_name=$info['filename'];
				echo $file_name,'.',$file_ext,$eol;
			};

		};
	};
	closedir($dir_handler);
	echo '</pre>';
};
?>
