<?php
function scan($dir) {
 $ignored=array('.', '..','double','test');
 $m=[];
 foreach(scandir($dir) as $file){
	if(in_array($file,$ignored)){continue;};
	$m[$file]=filemtime($dir.'/'.$file);
 };
 arsort($m);
 $m=array_keys($m);
 return ($m) ? $m : false;
}

$src_folder='/var/www/zzz';
echo '<style>span{display:none}</style><pre>';
foreach(scan($src_folder) as $file){
	$x=filemtime($src_folder.'/'.$file);
	$s=date('Y|m|d',$x);
	$s=$s.'<span>'.date('H:i:s',$x);
	$s=$s.'|'.str_replace('-','</span>|',$file);
 echo $s.PHP_EOL;
};
echo '</pre>';
?>
