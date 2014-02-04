<?php defined('FAS') or die('No direct access');

class Controller_Home extends Controller {

	public function action_index() {
	
		echo '<h1>This is INDEX</h1>';

	}
	
	public function action_foo() {
	
		echo 'Home::foo';
	
	}
	
	public function action_bar($params_) {
	
		var_dump($params_);
	
	}

}

?>
