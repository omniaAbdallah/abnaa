<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn' => 'mysql:host=localhost;dbname=abnaa-15-3-21',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => '',
    'dbdriver' => 'pdo',
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

$db['otherdb'] = array(
    'dsn' => 'mysql:host=localhost;dbname=trahm',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => '',
    'dbdriver' => 'pdo',
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

$db['default']['cachedir'] = 'application/cache';

/**
 * $db['default'] = array(
 * 'dsn'    => 'mysql:host=localhost;dbname=secschool',
 * 'hostname' => 'localhost',
 * 'username' => 'root',
 * 'password' => '',
 * 'database' => '',
 * 'dbdriver' => 'pdo',
 * 'dbprefix' => '',
 * 'pconnect' => FALSE,
 * 'db_debug' => (ENVIRONMENT !== 'production'),
 * 'cache_on' => FALSE,
 * 'cachedir' => '',
 * 'char_set' => 'utf8',
 * 'dbcollat' => 'utf8_general_ci',
 * 'swap_pre' => '',
 * 'encrypt' => FALSE,
 * 'compress' => FALSE,
 * 'stricton' => FALSE,
 * 'failover' => array(),
 * 'save_queries' => TRUE
 * );
 */
