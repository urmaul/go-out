<?php

require dirname(__FILE__) . '/core.php';;

$name = $_GET['name'];

if ( isset($config['links'][$name]) ) {
	$url = $config['links'][$name];
	
	logQuery('name', $name, $url);
	redirect($url);
	
} else {
	logQuery('name', $name);
	notFound();
}
