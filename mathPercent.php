//#mathPercent exist?
if(function_exists('mathPercent')){
	//exist!
}else{
	function mathPercent($a,$b,$c=2){return ($b>0?round(($a/$b)*100,$c):0);}
};
