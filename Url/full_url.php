		function full_url($s){
			$ssl=(!empty($s['HTTPS']) && $s['HTTPS']=='on')? true:false;
			$sp=strtolower($s['SERVER_PROTOCOL']);
			$protocol=substr($sp,0,strpos($sp,'/')).(($ssl)?'s':'');
			$port=$s['SERVER_PORT'];
			$port=((!$ssl && $port=='80')||($ssl && $port=='443'))?'':':'.$port;
			$host=isset($s['HTTP_HOST'])? $s['HTTP_HOST'] : $s['SERVER_NAME'];
			return $protocol.'://'.$host.$port.$s['REQUEST_URI'];
		}
