<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'u1487393_superuser',
	'password' => 'Cheiljedang99',
	'database' => 'u1487393_customer',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => TRUE,
	'db_debug' => '',
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
$brs ='
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 103.209.6.32)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = BRS)
    )
  )';

$db['oracledb'] = array(
    'dsn'   => '',
    'hostname' => $brs,
    'username' => 'mobile',
    'password' => 'cjfnladmin', 
    'database' => 'BRS',
    'dbdriver' => 'oci8',
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

// $db['oracledb'] = array(
//     'dsn'   => '',
//     'hostname' => $brs,
//     'username' => 'mobile',
//     'password' => 'cjfnladmin', 
//     'database' => 'BRS',
//     'dbdriver' => 'oci8',
//     'dbprefix' => '',
//     'pconnect' => FALSE,
//     'db_debug' => (ENVIRONMENT !== 'production'),
//     'cache_on' => FALSE,
//     'cachedir' => '',
//     'char_set' => 'utf8',
//     'dbcollat' => 'utf8_general_ci',
//     'swap_pre' => '',
//     'encrypt' => FALSE,
//     'compress' => FALSE,
//     'stricton' => FALSE,
//     'failover' => array(),
//     'save_queries' => TRUE
// );

// $db['oracledb']['hostname'] = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.137.26.67)(PORT=1521))(CONNECT_DATA=(SID=BRS)))';
// $db['oracledb']['username'] = 'SUJA';
// $db['oracledb']['password'] = 'SUJA';
// $db['oracledb']['database'] = '';
// $db['oracledb']['dbdriver'] = 'oci8';
// $db['oracledb']['dbprefix'] = '';
// $db['oracledb']['pconnect'] = TRUE;
// $db['oracledb']['db_debug'] = TRUE;
// $db['oracledb']['cache_on'] = FALSE;
// $db['oracledb']['cachedir'] = '';
// $db['oracledb']['char_set'] = 'utf8';
// $db['oracledb']['dbcollat'] = 'utf8_general_ci';
// $db['oracledb']['swap_pre'] = '';
// $db['oracledb']['autoinit'] = TRUE;
// $db['oracledb']['stricton'] = FALSE;