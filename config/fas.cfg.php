<?php defined('FAS') or die('No direct access');

return array(

	'router'	=> array(
	
		'base_url'	=> '/fas/',
		
		'routes'	=> array(
		
			''			=> 'home', //homepage
			
			'route-example' 	=> 'home/bar/this-is/some/parameters/some-title:11,9.html'
		)

	),
	
	'db' =>	array(
	
		'host'		=> 'localhost',
		
		'username'	=> 'root',
		
		'password'	=> FALSE,
		
		'database'	=> 'fas_db'
	)

);

?>
