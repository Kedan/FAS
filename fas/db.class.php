<?php defined('FAS') or die('No direct access');

class DB {
	
	protected $_config 		= array(
		
		'host'		=> 'localhost',
		
		'username'	=> 'root',
		
		'password'	=>	FALSE,
		
		'database'	=> 'fas_db'
		
	
	);
	
	protected $_connection 	= NULL;
	
	protected $_tmp_result	= NULL;
	
	protected $_result		= array();
	
	protected $_as_array	= FALSE;
	
	protected $_assos		= FALSE;
	
	public function __construct($config_=NULL) {
		
		if(!empty($config_)) $this->_config = $config_;
		
	}
	
	public function query($query_) {
		
		$this->_connect();
		
		$this->_tmp_result	= mysql_query($query_);
		
		return $this;
		
	}
	
	public function as_array() {
		
		$this->_as_array = TRUE;
		
		return $this;
		
	}
	
	public function get() {
		
		if($this->_as_array) {
		
			if($this->_tmp_result !== FALSE) {
		
				while($obj	= mysql_fetch_array($this->_tmp_result)) {
				
					array_push($this->_result,$obj);
		
				}
			
			}
			
		} else {
			
			while($obj	= mysql_fetch_object($this->_tmp_result)) {
			
				array_push($this->_result,$obj);
	
			}
			
		}
		
		$this->_as_array = FALSE;
		
		return $this->_result;
		
	}
	
	protected function _connect() {
		
		$this->_connection	= mysql_connect(
		
			$this->_config['host'],
			
			$this->_config['username'],
			
			$this->_config['password']
			
		);
		
		if(!$this->_connection) {
			
			die(mysql_error());
			
		}
		
		mysql_select_db($this->_config['database']);
			
		return $this;
		
	}
	
	protected function _disconnect() {
		
		mysql_close($this->_connection);
		
		return $this;
		
	}
	
	public function __set($key_, $val_) {
		
		if(isset($this->_config[$key_])) {
			
			$this->_config[$key_] = $val_;
			
		} else {
			
			die('Unknown data');
			
		}
		
	}
	
	public function __get($key_) {
		
		if(isset($this->_config[$key_])) {
			
			return $this->_config[$key_];
			
		} else {
			
			die('Unknown data');
			
		}
		
	}
	
}

?>
