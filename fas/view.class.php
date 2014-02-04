<?php defined('FAS') or die('No direct access');

class View {
	
	protected $_view_path = FALSE;
	
	protected $_data = array();
	
	static public function factory($path_) {
	
		return new View($path_);		
	
	}
	
	public function __construct($path_) {
	
		if(file_exists($path_)) {
	
			$this->_view_path = $path_;
	
		}
	}
	
	public function render() {
	
		if(!empty($this->_data))
	
			extract($this->_data);
	
		ob_start();
	
		include $this->_view_path;
	
		return ob_get_clean();
	
	}
	
	public function __set($key_, $val_) {
	
		$this->_data[$key_] = $val_;
	
	}
	
	public function __get($key_) {
	
		return $this->_data[$key_];
	
	}
	
	public function values($values_) {
	
		$this->_data = $values_;
	
		return $this;
	
	}
}

?>
