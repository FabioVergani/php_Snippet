<?php
if($dir_handler=opendir('./data/')){
	echo '<pre>';
	$eol=PHP_EOL;
	while(($file=readdir($dir_handler))!==false){
		if(is_dir($file)!==true){
			$info=pathinfo($file);
			if(strcmp($info['extension'],'json')===0){
				
				//$file_name=$info['filename'];
				//$file_ext=$info['extension'];
				//echo $file_name,'.',$file_ext,$eol;
			};
		};
	};
	closedir($dir_handler);
	echo '</pre>';
};
?>
