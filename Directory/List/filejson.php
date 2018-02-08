<!DOCTYPE html><html><head><meta charset="utf-8"><base target="_blank"><title><?php echo basename(__DIR__);?></title></head><body><?php

if($dir_handler=opendir('./')){
	$m=[];
	while(($file=readdir($dir_handler))!==false){
		if(is_file($file)){
			$info=pathinfo($file);
			if(strcmp($info['extension'],'json')===0){
				//echo '"',$info['filename'],'",';
				$m[]=$info['filename'];
			};
		};
	};
	closedir($dir_handler);
	if(empty($m)){
		//
	}else{
		sort($m);
		$linked=false;
		$p='linked';
		if(isset($_GET[$p])){$p=$_GET[$p];$linked=(strcasecmp($p,'yes' )===0);};
		echo '<pre><script>(function(m){class link{constructor(x){this.x =x+\'.json\';}toString(){const s=this.x;return ',($linked?'\'<a target="_blank" href="\'+(\'./\'+s)+\'">\'+s+\'</a>\'':'s'),';}}const d=document,l=m.length;for(let i=0;i<l;++i){m[i]=new link(m[i]);};d.title+=(\' \'+l);d.write(m.join(\'\n\'));})(["',implode('","',$m),'"]);</script></pre>';
	};
};


?></body></html>
