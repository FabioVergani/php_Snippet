<!DOCTYPE html><html><head><meta charset="utf-8"><?php
echo '<title>',basename(__DIR__),'</title>';

function group($dir){
	if($dir_handler=opendir('./res/data/'.$dir.'/')){
		$m=[];
		while(($file=readdir($dir_handler))!==false){
			if(is_dir($file)!==true){
				$info=pathinfo($file);
				if(strcmp($info['extension'],'json')==0){$m[]=$info['filename'];};
			};
		};
		closedir($dir_handler);
		if(empty($m)){
			//..
		}else{
			sort($m);
			echo 'availables("',$dir,'",["',implode('","', $m),'"]);';
		};
	};
}

$linked=false;
$p='linked';
if(isset($_GET[$p])){
	$p=$_GET[$p];
	$linked=(strcasecmp($p,'yes' )===0);
};

?><base target="_blank"></head><body><?php
$dirs=array_diff(scandir('./res/data/'),array('..', '.'));
if(empty($dirs)){
	echo 'none';
}else{
	$dirs=array_filter($dirs,function($x){return is_dir('./res/data/'.$x);});
	//print_r($dirs);
	$i=count($dirs);
	if($i>0){
		echo '<style>pre{padding-left:1em;}</style><script>function availables(t,m){class link{constructor(x){this.x =x;}toString(){const s=(\'http://173.193.141.26/content/app/test/play.htm?\'+t+\',\'+this.x+\',0,it\');return ',$linked?'\'<a href="\'+s+\'">\'+s+\'</a>\'':'s','}}const d=document,l=m.length;if(l){m.push(\'</pre>\');for(let i=0;i<l;++i){m[i]=new link(m[i]);};m.unshift(\'<b>\'+t+\'</b>&thinsp;(<code>\'+l+\'</code>)<pre>\');d.write(m.join(\'\n\'));};};';
		sort($dirs);
		foreach($dirs as $i => $value){
			if(is_dir('./res/data/'.$value)){
				group($value);
			};
		};
		echo '</script>';
	};
};

?></body></html>