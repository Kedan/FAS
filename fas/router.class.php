<?php defined('FAS') or die('No direct access');

class Router {

	protected $_cfg;

	public function __construct($cfg_=NULL) {

		$this->_cfg = $cfg_;

	}

	static public function instance($cfg_=NULL) {	

		static $r = NULL;

		if($r== NULL) {

			$r = new Router($cfg_);

		}

		return $r;

	}

	public function run() {

		$result = FALSE;

		$uria 	= $this->_uria();
		
		if(!empty($this->_cfg['routes'])) {

			foreach($this->_cfg['routes'] as $name=>$data) {
				
				if($uria[0] == $name) {
					
					$result = $this->_controller($this->_uria($data));
					
					break;

				}

			}

		}
		
		if(!$result) {
			
			if(!$this->_controller($uria)) {
				
				echo '404';
			
			} 

		}
		
	}

	public function uri() {

		return str_replace($this->_cfg['base_url'],'',$_SERVER['REQUEST_URI']);

	}

	public function burl() {

		return $this->_cfg['base_url'];

	}

	protected function _uria($uri_=NULL) {

		return explode('/',empty($uri_) ? $this->uri() : $uri_);

	}

	protected function _controller($uria_) {
	
		$controller	= array_shift($uria_);

		$action		= array_shift($uria_);
		
		$params		= $uria_;
		
		$result 	= FALSE;
		
		if(!empty($controller)) {
		
			$class	= 'Controller_'.ucfirst($controller);
		
			if(class_exists($class)) {

				$obj = new $class();
				
				$action = !empty($action) ? 'action_'.$action : 'action_index';

				if(method_exists($obj,$action)) {

					$result = TRUE;

					$obj->$action($params);

				}

			}
		
		}

		return $result;

	}

}

?>
