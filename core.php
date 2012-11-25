<?php

function initConfig()
{
	$defaultConfig = array(
		'redirectStatus' => 302,
		'links' => array(),
		'logRoutes' => array(),
	);
	
	$config = @include dirname(__FILE__) . '/config.php';

	if ($config === false) {
		$config = array();
	}
	
	return array_merge($defaultConfig, $config);
}

# Response #

function redirect($url)
{
	global $config;
	
	header('Location: ' . $url, true, $config['redirectStatus']);
	echo 'Location: <a href="' . $url . '">' . $url . '</a>';
}

function notFound()
{
	header('HTTP/1.0 404 Not Found');
	echo 'Link not found';
}

# Log #

function getHostInfo()
{
	if (!empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'],'off'))
		$http='https';
	else
		$http='http';
	
	return $http.'://'.$_SERVER['HTTP_HOST'];
}

function getLogData($type, $name, $url = '')
{
	return array(
		'type' => $type,
		'name' => $name,
		'url'  => $url,
		'date' => date('Y-m-d'),
		'time' => date('Y-m-d H:i:s'),
		'ip'   => $_SERVER['REMOTE_ADDR'],
		'ref'  => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
		'sref' => isset($_SERVER['HTTP_REFERER']) ? str_replace(getHostInfo(), '', $_SERVER['HTTP_REFERER']) : '',
	);
}

function logToRoute($data, $route)
{
	$route += array(
		'tpl' => "{time}\t{ip}\t{name}",
	);
	
	$str = $route['tpl'];
	
	foreach ($data as $name => $val) {
		$str = str_replace('{' . $name .'}', $val, $str);
	}
	
	$filePath = dirname(__FILE__) . '/logs/' . $route['fileName'];
	
	file_put_contents($filePath, $str . "\n", FILE_APPEND);
}

function logQuery($type, $name, $url)
{
	global $config;
	
	$data = getLogData($type, $name, $url);
	
	foreach ($config['logRoutes'] as $route) {
		logToRoute($data, $route);
	}
}

$config = initConfig();
