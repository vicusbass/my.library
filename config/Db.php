<?php

$config = parse_ini_file('config.ini');
$dbc = @mysqli_connect($config['host'], $config['user'], $config['password'], $config['dbname'])
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');