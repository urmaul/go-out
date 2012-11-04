<?php

require dirname(__FILE__) . '/core.php';;

$url = $_SERVER['QUERY_STRING'];

logQuery('url', $url, $url);
redirect($url);
