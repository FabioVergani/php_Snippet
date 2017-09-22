class XXX {

	private static $instance;
	public static function init(){if(!isset(self::$instance )){self::$instance=new self();};return self::$instance;}

	public function __construct(){
		echo 1;
	}
	
}

XXX::init();
