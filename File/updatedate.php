<?php
function mailto($a,$b,$c,$d){mail($b,$c,$d,'MIME-Version: 1.0'.PHP_EOL.'Content-type: text/html; charset=iso-8859-1'.PHP_EOL.'To: '.$a.' <'.$b.'>'.PHP_EOL.'From: Scraper');}
function sendAlert($c,$d){mailto('xx','x@x.x',$c.' - '.time(),'ALERT: '.$d);}

//========================================================================

function fill($k,$n,$t,$c){
	if(file_put_contents($n,('<!-- '.$t.' -->'.PHP_EOL.$c),LOCK_EX)){
		//ok! ^-^
	}else{
		sendAlert('fail writing data! ['.$k.']',$c);
	};
}

//========================================================================
function UpdateWeekData($n,$c){
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
		sendAlert('no data directory!',$s);
	};
}
//=========================================

UpdateWeekData('xxx.table','zzzzzzzzzzzzzzzzzzz');


?>    
