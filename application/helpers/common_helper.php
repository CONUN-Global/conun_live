<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* =================================================================
* 레이아웃 컨트롤
================================================================= */

	
function layout($layout_name,$data,$type=NULL)
{
	$CI =& get_instance();

	$data['skin_dir'] = '/views/'.APP_THEME .'/' .$type;

	//echo '/views/'.APP_THEME .'/' .$type;
	if ($type == NULL) {

		$CI->load->view('layout/header',$data);
		$CI->load->view($layout_name,$data);
		$CI->load->view('layout/footer',$data);

	}
	else if ($type == 'app') {

		$CI->load->view('/conun/layout/header_send',$data);	 // 최상단
		$CI->load->view($layout_name,$data);		


	}
    else if ($type == 'conun') {

		$CI->load->view('/conun/layout/header',$data);	 // 최상단		
		$CI->load->view($layout_name,$data);		
		

	}
    else if ($type == 'conun_main') {

		$CI->load->view('/conun/layout/header_main',$data);	 // 최상단		
		$CI->load->view($layout_name,$data);		
	 

	}

	else if ($type == 'conun_send') {

		$CI->load->view('/conun/layout/header_send',$data);	 // 최상단
		$CI->load->view($layout_name,$data);


	}


	else if ($type == 'conun_qr') {

		$CI->load->view('/conun/layout/header_qr',$data);	 // 최상단
		$CI->load->view($layout_name,$data);


	}
	else if ($type == 'conun_login') {

		$CI->load->view('/conun/layout/header_login',$data);	 // 최상단
		$CI->load->view($layout_name,$data);


	}
	else if ($type == 'app_main') {
//echo $layout_name;
		$CI->load->view('/app/layout/header',$data);	 // 최상단		
		$CI->load->view($layout_name,$data);		
		$CI->load->view('/app/layout/footer',$data);	// 최하단

	}
	
	else if ( $type == 'admin') {
		$CI->load->view($type.'/layout/header',$data);
		$CI->load->view($type.'/'.$layout_name,$data);
		$CI->load->view($type.'/layout/footer',$data);
	}

	else if ( $type == 'partner') {
		$CI->load->view($type.'/layout/header',$data);
		$CI->load->view($type.'/'.$layout_name,$data);
		$CI->load->view($type.'/layout/footer',$data);
	}
	else if ( $type != 'single' and $type != NULL) {
		$CI->load->view($type.'/header',$data);
		$CI->load->view($type.'/'.$layout_name,$data);
		$CI->load->view($type.'/footer',$data);
	}
	else if ( $type == 'single') {
		$CI->load->view('layout/single_header',$data);
		$CI->load->view($layout_name,$data);
		$CI->load->view('layout/single_footer',$data);
	}
	else if ($type == 'app') {
		$CI->load->view('/app/layout/header_app',$data);	 // 최상단		
		$CI->load->view($layout_name,$data);		
		$CI->load->view('/app/layout/footer_app',$data);	// 최하단
	}
	 
}

/* =================================================================
* 기본설정
================================================================= */
function coin_list(){
	$CI =& get_instance();

	$param_bal['APT_TYPE'] = 'W_GETADDR';
	$param_bal['MEMBER_ID'] = $CI->session->userdata('member_id');
	$bal_list = $CI->m_member->getApiData($param_bal);
	$bal_list = json_decode(trim($bal_list), true);
	$bal_list = $bal_list['coin_list'];

	return $bal_list;
}

function send_socket($to,$content,$type=publish){

	return  file_get_contents( "https://socket.conunkorea.io/sender/?type=$type&to=$to&content=$content");




}
function payment_error($arlet,$qr_value){
	$CI =& get_instance();

	$CI->lang->load('alert');
	$language_lang=$CI->lang->line($arlet);

	if($language_lang == ""){
		$language_lang=$arlet;
	}







	echo  '<script>
alert("$language_lang");
qr_form.submit();
</script>';
	echo  '  <form name="qr_form" id="qr_form" method="post" action="send">
          <input type="hidden" name="qr_value" id="qr_value" value="$qr_value">
      </form>';

}
function active_chk($group,$menu) {
	
	if ($group == $menu) {
		echo 'active';
	} 

}




function active_id_chk($title,$menu) {
	
	if ($title == $menu) {
		echo 'active';
	} 

}

function aes_encrypt($pass){

	$endata = @openssl_encrypt($pass , "aes-128-cbc", aes_pass, true, aes_key);
	$endata = base64_encode($endata);

	return $endata;

}

function aes_decrypt($pass){

	$data = base64_decode($pass);
	$endata = @openssl_decrypt($data, "aes-128-cbc", aes_pass, true, aes_key);

	return $endata;

}

function get_site() {

	$item = file_get_contents('data/web.php');

	if ($item !== false) {
		$item = json_decode($item,TRUE);

		return $item;

	} else {
		echo "LicenseCode Error";
	}

}

function get_cfg() 
{
	$CI =& get_instance();
	
	$cfg = $CI->m_cfg->get_config();
	return $cfg;

}

/* =================================================================
* 날짜 차이구하기
================================================================= */
function dateDiff($date1, $date2){ 
	$dt1 = explode("-",$date1);
	$dt2 = explode("-",$date2);

	$tm1 = mktime(0,0,0,$dt1[1],$dt1[2],$dt1[0]); 
	$tm2 = mktime(0,0,0,$dt2[1],$dt2[2],$dt2[0]);

	$diff = ($tm1 - $tm2) / 86400;
	return $diff;
}

/* =================================================================
* 로그인
================================================================= */

function loginCheck()
{
	$CI =& get_instance();
	if ($CI->session->userdata('is_login') == FALSE) {
		redirect(login_url());
	}
}


/* =================================================================
* QRCODE
================================================================= */

function qrcode($img,$addr)
{

	$qrimg = '/home/Revv_Wallet/www/data/member/'.$img .".png";

	QRcode::png($addr,$qrimg,QR_ECLEVEL_L);

}

/* =================================================================
* id,code create
================================================================= */

function order_code()
{
	// 주문코드 만들기
	$nowdate = date("ymdHis");
	$rd = rand(100,999);
	$order_code = $nowdate.$rd;
	return $order_code;
}
	

function id_make($coin_id)
{
	/*
	$item = 1;
		
	while ($item == 1 ) { 

		$rand = rand(1,99999);

		$mb =  'S'.$rand;
	}
	*/
	$nowdate = date("ymdHis");
	$mb = $coin_id.$nowdate;
	return $mb;

}

// 랜덤발생
function generateRandomText($addr,$length = 31) {
   	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = $addr;
	for ($i = 0; $i < $length; $i++) {
       	$randomString .= $characters[rand(0, $charactersLength - 1)];
   	}
	return $randomString;
}

// 랜덤발생
function generateRandomString($length = 31) {
   	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = 'M';
	for ($i = 0; $i < $length; $i++) {
       	$randomString .= $characters[rand(0, $charactersLength - 1)];
   	}
	return $randomString;
}

// 랜덤발생
function generateRandomText1($addr,$length = 2) {
   	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = $addr;
	for ($i = 0; $i < $length; $i++) {
       	$randomString .= $characters[rand(0, $charactersLength - 1)];
   	}
	return $randomString;
}

// 랜덤발생 - ico
function generateRandomString2($length = 1) {
   	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = 'M';
	for ($i = 0; $i < $length; $i++) {
       	$randomString .= $characters[rand(0, $charactersLength - 1)];
   	}
	return $randomString;
}
// 랜덤발생 - api
function generateRandomString_api($length = 1) {
   	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = 'A';
	for ($i = 0; $i < $length; $i++) {
       	$randomString .= $characters[rand(0, $charactersLength - 1)];
   	}
	return $randomString;
}

/* =================================================================
* URL / alert 컨트롤
================================================================= */

function url_encode($str) {
	return str_replace('%', '.', urlencode($str));
}


function today() {
	return date("YmdH");
}


function nowdate()
{
	$nowdate = date("Y-m-d H:i:s");	
	return $nowdate;
}


function nowday()
{
	$nowday = date("Y-m-d");	
	return $nowday;
}


// 비회원시 이전 url 로 로그인
function login_url() {
	$url = "/conun";
	return $url;
}


// 부모창 리로드
function topwin_reload() {
	echo "<script type='text/javascript'>
	location.reload()</script>";
	
}


// 부모창 리로드
function openwin_reload() {
	echo "<script type='text/javascript'>
	opener.location.reload()</script>";
	
}


// 메세지창
function alert($msg='', $url='') {
	$CI =& get_instance();

	$CI->lang->load('alert');
	$language_lang=$CI->lang->line($msg);

	if($language_lang == ""){
		$language_lang=$msg;
	}




	if (!$language_lang) $language_lang = '올바른 방법으로 이용해 주십시오.';




	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'>alert('".$language_lang."');";
	if (!$url)
		echo "history.go(-1);";
	echo "</script>";
	if ($url)
		goto_url($url);
	exit;
}


// 메시지창 후 닫기
function alert_close($msg='', $url='') {
	$CI =& get_instance();

	if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'>alert('".$msg."');";
	if (!$url)
		echo "self.close()";
	echo "</script>";
	if ($url)
		goto_url($url);
	exit;
}


// 해당 url로 이동
function goto_url($url) {
	$temp = parse_url($url);
	if (empty($temp['host'])) {
		$CI =& get_instance();
		$url = ($temp['path'] != '/') ? '/'.$url : $CI->config->item('base_url');
	}
	echo "<script type='text/javascript'> location.replace('".$url."'); </script>";
	exit;
}

// 불법접근을 막도록 토큰을 생성하면서 토큰값을 리턴
function get_token() {
	$CI =& get_instance();

	$token = md5(uniqid(rand(), TRUE));
	$CI->session->set_userdata('ses_token', $token);

	return $token;
}
function sendMessage($title, $message, $userId, array $extraParams  = null, bool $isTest = false)
{
	$app_id = "c7e5c2d4-f2ad-4dbd-a121-e05a24c1a956";
	$rest_api_key = "YTBhYTI0ODMtOTVlMS00Nzk3LTllYzMtMzliNGM3NDUxODQ2";

	if($userId=="admin"){
		$url ="https://wallet.conunkorea.io/admin/coin/lists";

	}else{
		$url ="https://wallet.conunkorea.io/partner/coin/lists";
	}
	$heading = array(
		"en" => $title
	);
	$content = array(
		"en" => $message
	);

	if($extraParams == null){
		$fields = array(
			'app_id' => $app_id,

			'url' => $url,
			'contents' => $content,
			'headings' => $heading
		);
	}else{
		$fields = array(
			'app_id' => $app_id,
			'url' => $url,
			'data' => $extraParams,
			'contents' => $content,
			'headings' => $heading
		);
	}


	$fields['large_icon'] = 'http://www.hurdatakip.com/resources/assets/images/icon.png';
	if ($userId != null) {
		$fields['filters'] = array(
			array(
				'field' => 'tag',
				'key' => 'userId',
				'relation' => '=',
				'value' => $userId
			)
		);
	}
	if ($isTest) {
		$fields['included_segments'] = array("Test Users");
	} else {
		$fields['included_segments'] = array("Active Users", "Inactive Users");
	}
	$fields = json_encode($fields);
	print("\nJSON sent:\n");
	print($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json; charset=utf-8',
		'Authorization: Basic ' . $rest_api_key
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);
	curl_close($ch);


	$return["allresponses"] = $response;
	$return = json_encode($return);

	print("\n\nJSON received:\n");
	print($return);
	print("\n");
}
// POST로 넘어온 토큰과 세션에 저장된 토큰 비교
function check_token($url=FALSE) {
	$CI =& get_instance();
	// 세션에 저장된 토큰과 폼값으로 넘어온 토큰을 비교하여 틀리면 에러
	if ($CI->input->post('token') && $CI->session->userdata('ses_token') == $CI->input->post('token')) {
		// 맞으면 세션을 지운다. 세션을 지우는 이유는 새로운 폼을 통해 다시 들어오도록 하기 위함
		$CI->session->unset_userdata('ses_token');
	}
	else
		alert('Access Error'.$CI->session->userdata('ses_token'),($url) ? $url : $CI->input->server('HTTP_REFERER'));

	// 잦은 토큰 에러로 인하여 토큰을 사용하지 않도록 수정
	// $CI->session->unset_userdata('ses_token');
	// return TRUE;
}
if (!function_exists('fn_config_item') && function_exists('config_item')):
	/**
	 * @return mixed
	 */
	function fn_config_item()
	{
		$args = func_get_args();
		$item = array_shift($args);
		$_config = config_item($item);

		foreach ($args as $arg) {
			$_config = $_config[$arg];
		}
		return $_config;
	}
endif;
?>
