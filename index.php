<?php

$defaults = array(
	'links' => array(),
);

$config = @include dirname(__FILE__) . '/config.php';

if ($config === false) {
	$config = array();
}

$config += $defaults;

echo('<pre>' . var_export(__FILE__, true) . "</pre>\n");
//echo('<pre>' . var_export($_SERVER, true) . "</pre>\n");
//echo('<pre>' . var_export($_GET, true) . "</pre>\n");
echo('<pre>' . var_export($_GET['name'], true) . "</pre>\n");
die();
	
if ( isset($config['links'][$to]) ) {
	$url = $config['links'][$to];
	header('Location: http://li.ru/go?' . $url, true, 302);
}
