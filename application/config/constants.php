<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


define('SITE_NAME_KR',          '크립토코인');
define('SITE_NAME_EN',          'RevvCoin');

/* =================================================================
* 관리자용 헬퍼
================================================================= */
define('CONFIG_BASE', '/admin/config/base');
define('CONFIG_GOLD', '/admin/config/goldlist');

define('COIN_LIST', '/admin/coin/lists');
define('COIN_WRITE', '/admin/coin/write');

define('TOKEN_LIST', '/admin/token/lists');
define('TOKEN_WRITE', '/admin/token/write');

define('ETH_LIST', '/admin/eth/lists');
define('ETH_WRITE', '/admin/eth/write');

define('MEMBER_LIST', '/admin/member/lists');
define('MEMBER_WRITE', '/admin/member/write');
define('MEMBER_HISTORY', '/admin/member/history');
define('MEMBER_EXCEL', '/admin/member/excel');

define('EXCHANGE_LIST', '/admin/exchange/lists');
define('EXCHANGE_WRITE', '/admin/exchange/write');

define('TRANSFER_LIST', '/admin/transfer/lists');
define('TRANSFER_WRITE', '/admin/transfer/write');

define('CENTER_LIST', '/admin/center/lists');
define('CENTER_WRITE', '/admin/center/write');


define('SALES_LIST', '/admin/sales/lists');
define('SALES_WRITE', '/admin/sales/write');

define('BENE_LIST', '/admin/bene/lists');
define('BENE_WRITE', '/admin/bene/write');

define('GOODS_LIST', '/admin/goods/lists');
define('GOODS_WRITE', '/admin/goods/write');

define('ORDER_LIST', '/admin/order/lists');
define('ORDER_WRITE', '/admin/order/write');

define('POINT_LIST', '/admin/point/lists');
define('POINT_WRITE', '/admin/point/write');

define('ICO_LIST', '/admin/ico/lists');
define('ICO_WRITE', '/admin/ico/write');

define('STATS', '/admin/stats');
define('VERSION', '1.0');

define('DATA_ROOT', '/data/member');
define("default_coin","CON");
define("aes_pass","hCPWk7gpYrsH5u6B");
define("aes_key","YE6qJHVvwJtDM2nx");
/* End of file constants.php */
/* Location: ./application/config/constants.php */
define('G5_SERVER_TIME',         time());
define('G5_TIME_YMDHIS',         date('Y-m-d H:i:s', G5_SERVER_TIME));
define('G5_TIME_YMD',             substr(G5_TIME_YMDHIS, 0, 10));
define('G5_TIME_HIS',             substr(G5_TIME_YMDHIS, 11, 8));

