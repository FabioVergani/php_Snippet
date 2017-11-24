	 static private function dump(){  
		$m=func_get_args();
		$l=count($m);
		$i=0;
		$n=null;
		$a=['<','>'];
		$b=['&lt;','&gt;'];
		$e=PHP_EOL;
		ob_start();
		echo '<pre class="dump n',$i,'">';
		while($i<$l){echo empty($n=$m[$i])?'Empty':str_replace($a,$b,print_r($n,true)).'<hr />';++$i;};
		$n=ob_get_clean();
		echo $n,'</pre>',$e;
	 }
