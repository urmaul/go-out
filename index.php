<?php

$defaults = array(
	'links' => array(),
);

$config = @include dirname(__FILE__) . '/config.php';

if ($config === false) {
	$config = array();
}

$config += $defaults;

echo '<pre>';
var_export($_SERVER);
var_export($_GET);
die();
	
if ( isset($config['links'][$to]) ) {
	$url = $config['links'][$to];
	header('Location: http://li.ru/go?' . $url, true, 302);
}
