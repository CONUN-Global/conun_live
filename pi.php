<?php
phpinfo();

/*
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		ini_set('display_errors', 1);

$pdo = new PDO('sqlsrv:Server=119.205.234.36;Database=revvFoundation', 'revvFoundation', 'P@ssw0rd1004', [65001=>1]);
$smth = $pdo->query('SELECT GETDATE()');
var_dump($smth->fetch());
var_dump($smth->fetchAll());
*/