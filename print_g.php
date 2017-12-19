	if(function_exists('print_g')!==true){
		function print_g($n,$v,$c=''){//debug, stampa un gruppo di informazioni
			echo '<div>';
			if(empty($v)){
				if($v!==false){
					if($v!==null){
						if($v!==0||$v!=='0'){
							if(is_array($v)){
								$v='[]';
							}else{
								if(is_string($v)){
									$v='<code>'.$v.'</code>';
								};
							};
						}else{
							$v='0';
						};
					}else{
						$v='null';
					};
				}else{
					$v='false';
				};
				echo '&ensp;',$v,'&ensp;<b>',$n,'</b>';
			}else{
				echo '<input type="checkbox" ',$c,'><b>',$n,'</b><span>:<pre>',PHP_EOL,print_r($v,true),'</pre></span>';
			};
			echo '</div>';
		}
	};
