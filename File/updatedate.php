<?php
function mailto($a,$b,$c,$d){mail($b,$c,$d,'MIME-Version: 1.0'.PHP_EOL.'Content-type: text/html; charset=iso-8859-1'.PHP_EOL.'To: '.$a.' <'.$b.'>'.PHP_EOL.'From: Scraper');}
function sendAlert($c,$d){mailto('Fabio','x@x.it',$c.' - '.time(),'ALERT: '.$d);}
function scrape_error($a,$b='Unexpected error',$c=''){
	switch((int)$a){
		case 1:
			$b='Absent '.$b;
			break;
		case 404:
			$b='Not Found ('.$b.')';
			break;
	};
	//echo '[',$a,'] ',$b,'.',PHP_EOL;
	sendAlert('scraping error','[',$a,'] '.$b.PHP_EOL.$c);
}
function scrape($url,$xpath,$process=false){
	$o=curl_init($url);
	curl_setopt($o,CURLOPT_RETURNTRANSFER,true);
	$s=curl_exec($o);
	$x=curl_getinfo($o,CURLINFO_HTTP_CODE); 
	curl_close($o);
	if($x==200){
		unset($x,$o);
		$s=trim($s);
		if(empty($s)){
			scrape_error(1,'page',$url);
		}else{
			$o=new DOMDocument();
			if($process!==false){$s=$process($s);};
			$o->loadHTML($s);//@exp, any error messages that might be generated by that 'exp' will be ignored.
			$s=(new DOMXpath($o))->query($xpath);
			if(empty($s)){
				scrape_error(1,'node',$url.PHP_EOL.$xpath);
			}else{
				$s=$o->saveXML($s[0]);
				unset($o);
				return trim($s);
			};
		};
	}else{
		scrape_error($x,'curl status',$url);
	};
}
function updateFile($k,$n,$t,$url,$xpath,$process){
	$c=scrape($url,$xpath,$process);
	if(empty($c)){
		sendAlert('no data scraped from:',$url);
	}else{
		echo $c;
		if(file_put_contents($n,('<!-- '.$t.' -->'.PHP_EOL.$c),LOCK_EX)){
			//ok!
		}else{
			sendAlert('fail writing data! ['.$k.']',$c);
		};
	};
}
function getWeekData($n,$url,$xpath,$process=false){
	$A=strtotime(date('Y-m-d'));
	$s='./data/';
	if(is_dir($s)){
		$s.=$n;
		if(file_exists($s)){
			$l=trim(fgets(fopen($s,'r')));
			if(empty($l)){//no firstline!
				updateFile(1,$s,$A,$url,$xpath,$process);//replace file.
			}else{
				$B=substr($l,5,-4);
				if(intval(date('Y',$B)) < intval(date('Y',$A))){//anno precedente
					updateFile(2,$s,$A,$url,$xpath,$process);
				}else{//stesso anno..
					if(intval(date('W',$B)) < intval(date('W',$A))){//ma settimana precedente..
						updateFile(3,$s,$A,$url,$xpath,$process);//aggiorna file.
					}else{//no update
						$t=file_get_contents($s);
						if(empty($t)){
							sendAlert('no data read:',$n);
						}else{
							echo $t;
						};
					};
				};
			};
		}else{
			updateFile(0,$s,$A,$url,$xpath,$process);//crea file.
		};
	}else{
		sendAlert('no data directory!',$s);
	};
}

//====================================================

getWeekData(
'x.table',
'http://x/full.htm',
'/html/body/table',
function($a){
	$s=preg_replace('/[\r\n]/','',$a);
	$s=preg_replace('/>\s*/','>',$s);
	$s=preg_replace('/<.?center>/','',$s);
	$s=preg_replace('/<.?font[^>]*>/','',$s);
	$s=preg_replace('/style="[^"]*"/','',$s);
	$s=preg_replace('/bgcolor="[^"]*"/','',$s);
	$s=preg_replace('/align="(left|center)"/','',$s);
	$s=preg_replace('/border|(cell(padding|spacing))="0"/','',$s);
	//'<span><style scoped>table table td{background:red}</style></span>'
	return $s;
});

?>    
