<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base target="_blank">
		<title>Test</title>
	</head>
	<body>
		<pre><script>
				(function(m){

					class link{
						constructor(x){this.x =x;}
						toString(){
							const s=a+this.x+b;
							return '<a target="_blank" href="'+s+'">'+s+'</a>';
						}
					}

					const d=document,l=m.length, a='http://sss.htm?data,', b=',0,it';
					for(let i=0;i<l;++i){m[i]=new link(m[i]);};
					d.title=l+' test available..';
					d.write(m.join('\n'));

				})([<?php

	if($dir_handler=opendir('./data/')){
		$eol=PHP_EOL;
		while(($file=readdir($dir_handler))!==false){
			if(is_dir($file)!==true){
				$info=pathinfo($file);
				if(strcmp($info['extension'],'json')===0){
					echo '"',$info['filename'],'",';
				};
			};
		};
		closedir($dir_handler);
	};

	?>]);</script></pre>
	</body>
</html>



