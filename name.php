<?php

require dirname(__FILE__) . '/core.php';;

$name = $_GET['name'];

echo '<pre>';
var_export($_SERVER);

if ( isset($config['links'][$name]) ) {
	redirect($config['links'][$name]);
} else {
	notFound();
}
