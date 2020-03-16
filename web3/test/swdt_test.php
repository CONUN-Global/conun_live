<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
// include the class file
require '../ethereum.php';


// create a new object
$eth = new Ethereum('http://nginx:conun1234@175.126.176.119', 80);

$eth_accounts = $eth->eth_accounts();

echo "<pre>";
print_r($eth);
print_r($eth_accounts);

foreach ($eth_accounts as $k => $v)
{
	echo $v." : ".number_format( base_convert($eth->eth_getBalance($v), 16, 10)). '  , ' . base_convert($eth->eth_getBalance($v), 16, 10) * 0.000000000000000001;
	echo "<br>";
}
echo "</pre>";
?>