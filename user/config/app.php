<?php

	# General PHP config
	#
	ini_set('display_errors',	'On');
	ini_set('html_errors', 		'On');
	ini_set('error_reporting',	E_ALL ^ E_NOTICE ^ E_DEPRECATED);

	# Dump
	#
	define('DUMPDIR',			USER.'/dump');
	define('DBLOG',				USER.'/log');
	define('ISUTF8', 			true);

?>