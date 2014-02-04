<?php defined('FAS') or die('No direct access');

include ('router.class.php');

include ('db.class.php');

include ('view.class.php');

include ('controller.class.php');

function __autoload($class_name) {
    
    include './controllers/'.$class_name.'.php';

}

class FAS {

	protected $_config;

	protected $_db;

	protected $_router;

	public function __construct($config_ = NULL) {

		$this->_config = include($config_==NULL ? './config/fas.cfg.php' : $config_);

		$this->_db = new DB($this->_config['db']);

		$this->_router = Router::instance($this->_config['router']);

	}

	static public function instance() {	

		static $fas = NULL;

		if($fas == NULL) {

			$fas = new FAS();

		}

		return $fas;

	}

	public function run() {

		$this->_router->run();

	}
	
}

?>
