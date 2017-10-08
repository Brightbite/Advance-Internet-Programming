<?php defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

//azure(clearDB) database
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'au-cdbr-azure-southeast-a.cloudapp.net',
	'username' => 'b5d0461cd2b1b2',
	'password' => 'c34a7ed7',
	'database' => 'aipdatabase',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
?>
