<?php

echo('<pre>' . var_export(__FILE__, true) . "</pre>\n");
//echo('<pre>' . var_export($_SERVER, true) . "</pre>\n");
echo('<pre>' . var_export($_SERVER['QUERY_STRING'], true) . "</pre>\n");
die();
