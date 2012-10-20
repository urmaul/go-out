<?php

require dirname(__FILE__) . '/core.php';;

$name = $_GET['name'];

if ( isset($config['links'][$name]) ) {
	redirect($config['links'][$name]);
} else {
	notFound();
}
