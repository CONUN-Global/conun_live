<?

require("xcoin_api_client.php");

$api = new XCoinAPI("c01a4c80b70a589f8a11fd3f7e30e57f", "145e81a845740c615d319c00fe04f311");

 $rgParams['order_currency'] = 'ETC';
 $rgParams['payment_currency'] = 'KRW';


$result = $api->xcoinApiCall("/public/ticker", $rgParams);

print_r($result);

/*
$api = new XCoinAPI();
$result = $api->execute("/public/ticker");
echo "status : " . $result->status . "<br />";
echo "last : " . $result->data->closing_price . "<br />";
echo "sell : " . $result->data->sell_price . "<br />";
echo "buy : " . $result->data->buy_price . "<br />";
*/

/*
 * public api
 *
 * /public/ticker
 * /public/recent_ticker
 * /public/orderbook
 * /public/recent_transactions
 */

/*
 * private api
 *
 * endpoint				=> parameters
 * /info/current		=> array('current' => 'btc');
 * /info/account
 * /info/balance		=> array('current' => 'btc');
 * /info/wallet_address	=> array('current' => 'btc');
 */



/*
 * date example
 * 2014-12-30 13:29:49 = 1419913789000
 * 2014-12-29 14:29:49 = 1419830989000
 * 2014-12-23 14:29:49 = 1419312589000
 * 2014-11-30 14:29:49 = 1417325389000
 */

?>