<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['ssl'] = FALSE;
$config['user'] = 'revvcoinrpc';
$config['password'] = 'S1H5NoDqIh02z9xh1zjirKk88]A[2g4kpIR]CD7NGA6x';
$config['host'] = '114.207.244.75'; // 코인전용서버
$config['port'] = '50211';

$config['ssl'] = ($config['ssl'] == TRUE) ? 'https://' : 'http://';
$config['url'] = $config['ssl'].$config['user'].':'.$config['password'].'@'.$config['host'].':'.$config['port'].'/';
?>
