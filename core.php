<?php

$defaultConfig = array(
	'redirectStatus' => 302,
	'links' => array(),
);

function initConfig()
{
	$config = @include dirname(__FILE__) . '/config.php';

	if ($config === false) {
		$config = array();
	}

	return array_merge($defaults, $config);
}

function redirect($url)
{
	header('Location: ' . $url, true, $config['redirectStatus']);
	echo 'Location: <a href="' . $url . '">' . $url . '</a>';
}

function notFound()
{
	header('HTTP/1.0 404 Not Found');
	echo 'Link not found';
}

$config = initConfig();
