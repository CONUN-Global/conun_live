<?
require("api_client.php");

$api = new XCoinAPI();
$rgParams['order_currency'] = '';
$rgParams['payment_currency'] = '';

$result = $api->xcoinApiCall("", $rgParams);

$price = $result->data->closing_price;
echo $price;


require("db_con.php");

mysql_query(" update m_config set coin1_unit='$price' where cfg_no='1' "); 


/*
include_once 'Snoopy.class.php';
$snoopy = new snoopy;
$snoopy->fetch("https://api.bithumb.com//public/ticker/ETC/KRW");
$txt = $snoopy->results;
print_r($txt);
*/

?>