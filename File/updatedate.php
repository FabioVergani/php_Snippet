<?php
function UpdateWeekData($n,$c){

	function fill($k,$n,$t,$c){
		if(file_put_contents($n,('<!-- '.$t.' -->'.PHP_EOL.$c),LOCK_EX)){
			//ok! ^-^
		}else{
			//ALERT: fail writing data!
		};
	}

	$A=strtotime(date('Y-m-d'));
	$s='./data/';
	if(is_dir($s)){
		$s.=$n;
		unset($n);
		if(file_exists($s)){
			$l=trim(fgets(fopen($s,'r')));
			if(empty($l)){//no firstline!
				fill(1,$s,$A,$c);//replace file.
			}else{
				$B=substr($l,5,-4);
				if(intval(date('Y',$B)) < intval(date('Y',$A))){//anno precedente
					fill(2,$s,$A,$c);
				}else{//stesso anno..
					if(intval(date('W',$B)) < intval(date('W',$A))){//ma settimana precedente..
						fill(3,$s,$A,$c);//aggiorna file.
					}else{
						echo 'no update';
					};
				};
			};
		}else{
			fill(0,$s,$A,$c);//crea file.
		};
	}else{
		//ALERT: no data directory!
	};
}

UpdateWeekData('sss.table','zzzzzzzzzzzzzzzzzzz');


?>    
