<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=1200">
<link rel="stylesheet" type="text/css" href="<?=$skin_dir?>/css/common.css?<?=today()?>">
<link rel="stylesheet" type="text/css" href="<?=$skin_dir?>/css/style.css?<?=today()?>">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?=$skin_dir?>/css/ie7?<?=today()?>.css">
<![endif]-->
<link rel="shortcut icon" href="/images/common/favicon.ico" type="image/x-icon">
<link rel="icon" href="/images/common/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/images/common/apple_icon.png" /> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?=$skin_dir?>/js/common.js"></script>
<script type="text/javascript" src="<?=$skin_dir?>/js/jquery.selectric.js"></script>
<title> :: <?=$title?> :: </title>
</head>
<body>

<div id="wrap">
	<div id="mask"></div>
	<div id="head">
		<!-- 로고 -->
		<div id="logobox">
			<div class="logo">
				ADMINISTARTOR
			</div>
		</div>
		<!--//로고 -->
		<!-- 상단메뉴-->
		<ul class="nav">
			<li class="<?active_chk($group,'대시보드')?>"><a href="/admin">대시보드</a></li>
			<li class="<?active_chk($group,'회원관리')?>"><a href="<?=MEMBER_LIST?>">회원관리</a></li>
			<li class="<?active_chk($group,'매출관리')?>"><a href="<?=SALES_LIST?>">매출관리</a></li>
			<li class="<?active_chk($group,'포인트관리')?>"><a href="<?=EXCHANGE_LIST?>">머니관리</a></li>
			<li class="<?active_chk($group,'마감관리')?>"><a href="/admin/deadline/lists">마감관리</a></li>
			<li class="<?active_chk($group,'통계관리')?>"><a href="/admin/tong/lists">통계관리</a></li>
	
		</ul>
		<!--//상단메뉴-->
	</div>
	<div class="line-width"></div>
	<div id="container">
	
		<div id="side">
		<?=$this->load->view('admin/layout/side');?>
	
		</div>
		
		
		<div id="conts">
		

			
		
		