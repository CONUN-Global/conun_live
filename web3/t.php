<?php
// include the class file
require 'ethereum.php';

// create a new object
$eth = new Ethereum('211.238.13.157', 8545);

// do your thing


echo "<pre> 0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5 계정의 잔고 : ";
echo base_convert($eth->eth_getBalance('0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5'), 16, 10);
echo "</pre>";

echo 1600000000000000*0.000000000000000001;

echo "<pre> 0xfcaa72c579b2642952e7b00fcd90aa696be5e613 계정의 잔고 : ";
echo base_convert($eth->eth_getBalance('0xfcaa72c579b2642952e7b00fcd90aa696be5e613'), 16, 10)*0.000000000000000001;
echo "</pre>";


echo $eth->eth_getBalance('0xe7254f7af5d116e4d0e3ee20f0f9097d514e0b56');
echo "<br>";
echo base_convert($eth->eth_getBalance('0xe7254f7af5d116e4d0e3ee20f0f9097d514e0b56'), 16, 10);
echo "<br>";
echo base_convert($eth->eth_getBalance('0xe7254f7af5d116e4d0e3ee20f0f9097d514e0b56'), 16, 10)*0.000000000000000001;
echo "<br>";

echo $eth->eth_getBalance('0x358373e8dcf618e7bdbc37f83cf01de348494790');
echo "<br>";
echo "<br>";
echo base_convert("0x5af3107a4000", 16, 10)*0.000000000000000001;

echo "<br>";
echo "<pre>계정목록<br>";
print_r ($eth->eth_accounts());

//echo "0x".base_convert(10000000, 10, 16);
//echo "</pre>";
//print_r( $eth->personal_listAccounts());
//echo $eth->personal_newAccount('kres');
171683995 0000000000
 97591890 0000000000
 79191890 0000000000
   781418 9000000000
  8400000 0000000000
 21000000 0000000000
 10000000 0000000000
  3040000 0000000000
  5000000 0000000000
  1071000 0000000000
   718900 0000000000
 10000000 0000000000

$eth->personal_unlockAccount('0x358373e8dcf618e7bdbc37f83cf01de348494790', 'mir');
$eth_tran = new Ethereum_Transaction('0x358373e8dcf618e7bdbc37f83cf01de348494790', '0x729359ade1a9b3ea288f4e824eb2ad3904fbe253', '0xc350', '0xe8d4a51000', "0x".base_convert(100000000000000000, 10, 16), ''); 
$eth_tx = $eth->eth_sendTransaction($eth_tran);
$eth->personal_lockAccount('0x358373e8dcf618e7bdbc37f83cf01de348494790', 'mir');
echo $eth_tx;



$date1 = '2018-02-09 15:44:15';
$thisTime = date("Y-m-d H:i:s");

echo intval((strtotime($thisTime)-strtotime($date1)) / 60);

//echo date('i', $someTime=strtotime($thisTime)-strtotime("$date1 GMT"));
//$eth->personal_unlockAccount('0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5', 'mircoin4');

$eth->personal_unlockAccount('0xfcaa72c579b2642952e7b00fcd90aa696be5e613', 'kreskres');
$eth_tran = new Ethereum_Transaction('0xfcaa72c579b2642952e7b00fcd90aa696be5e613', '0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5', '0x186a0', '0x153005ce00', "0x".base_convert(3000000000000000, 10, 16), ''); 
$eth_tx = $eth->eth_sendTransaction($eth_tran);
if ($eth_tx)
{
	$eth->personal_lockAccount('0xfcaa72c579b2642952e7b00fcd90aa696be5e613', 'kreskres');

	echo $eth_tx;
}
else
{

	$eth->personal_lockAccount('0xfcaa72c579b2642952e7b00fcd90aa696be5e613', 'kreskres');
}

$eth->personal_unlockAccount('0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5', 'mircoin4');
$eth->personal_lockAccount('0x7a36c984e7c30641d9c34a7027b6e229a4ba08f5', 'mircoin4');

?>