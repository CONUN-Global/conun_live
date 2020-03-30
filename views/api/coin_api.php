<?
$url = "https://api.bithumb.com/public/ticker/ETC/KRW";

$curl_handle = curl_init();

curl_setopt($curl_handle, CURLOPT_URL, $url);

curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);

curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl_handle, CURLOPT_USERAGENT, 'mircoin');



$json = curl_exec($curl_handle);
curl_close($curl_handle);

$data_array = json_decode($json, true);

var_dump($data_array);

echo $data_array["data"]["closing_price"];

/*
include_once 'Snoopy.class.php';
$snoopy = new snoopy;
$snoopy->fetch("https://api.bithumb.com//public/ticker/ETC/KRW");
$txt = $snoopy->results;
print_r($txt);
*/

?>