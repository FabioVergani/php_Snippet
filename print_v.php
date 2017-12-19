	if(function_exists('hasVal')!==true){
		function hasVal($o,$p){
			return isset($o[$p]) && (empty($o[$p])!==true);
		}
	};

	if(function_exists('getValOr')!==true){
		function getValOr($o,$p,$v=''){
			return hasVal($o,$p)?$o[$p]:$v;//restituisce: il valore della propietà indice nell'oggetto o lo normalizza ad un default dato
		}
	};

	if(function_exists('print_v')!==true){
		function print_v($o){
			$s=preg_replace('/\s*=>\s*/','=>',var_export($o,true));
			$s=preg_replace('/array\s*|(\d+\s*=>\s*)|((stdClass|Closure)::)?__set_state/','',$s);
			$s=preg_replace('/\),\s*\(/','),(',$s);
			$s=preg_replace('/\s*\(\s*\)/','()',$s);
			echo '<pre>',$s,'</pre>';
		}
	};
