<?php
// include the class file
require 'ethereum.php';

// create a new object
$eth = new Ethereum('211.238.13.157', 8545);

$eth_accounts = $eth->eth_accounts();

echo "<pre>";
foreach ($eth_accounts as $k => $v)
{
	echo $v." : ".number_format( base_convert($eth->eth_getBalance($v), 16, 10)). '  , ' . base_convert($eth->eth_getBalance($v), 16, 10) * 0.000000000000000001;
	echo "<br>";
}
echo "</pre>";
?>