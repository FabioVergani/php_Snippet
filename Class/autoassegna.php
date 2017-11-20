<?php
/*
Plugin Name: 
Php Tested: 5.6.31
*/
if(defined('ABSPATH')){
 class xx{

	function __construct(){
	
 /*	
		for($i=0,$m=func_get_args(),$l=count($m),$o=&$this,$p=['name'];$i<$l;++$i){$o->$p[$i]=$m[$i];};
		unset($i,$m,$l,$p);
*/	
	$m=func_get_args();
	$l=count($m);
	$i=0;
	$n=[
	 'type_name_plural ',
	 'type_name_singular',
	];
	$o=&$this;
	while($i<$l){$o[$n[$i]]=$m[$i];++$i;};
	unset($i,$l,$m,$n);		
		
	}

	 
 
	 

   function __destruct(){
	$o=&$this;
	$n=PHP_EOL;
	echo '<!--',$n,'Created xx:',$o->name,$n,'-->';
   }
 }
 new PostType('zzzzzzz');
}else{
 exit;
};
?>
