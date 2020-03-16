<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=1500">
<link rel="stylesheet" type="text/css" href="/views/web/admin/css/common.css?<?=today()?>">
<link rel="stylesheet" type="text/css" href="/views/web/admin/css/style.css?<?=today()?>">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?=$skin_dir?>/css/ie7?<?=today()?>.css">
<![endif]-->
<link rel="shortcut icon" href="/views/web/admin/images/common/favicon.ico" type="image/x-icon">
<link rel="icon" href="/views/web/admin/images/common/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/views/web/admin/images/common/apple_icon.png" />
<script type="text/javascript" src="/views/web/admin/js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="/views/web/admin/js/common.js"></script>
<script type="text/javascript" src="/views/web/admin/js/jquery.selectric.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript" src="/views/web/partner/js/qr.js"></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "c7e5c2d4-f2ad-4dbd-a121-e05a24c1a956",
                notifyButton: {
                    enable: true,
                },
            });



            OneSignal.push(function() {
                OneSignal.sendTags({
                    userId: "<?=$this->session->userdata('member_id');?>",

                });
            });

        });
    </script>
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
			<? if($this->session->userdata('level') > 8) { ?>
			<li class="<?active_chk($group,'회원관리')?>"><a href="<?=MEMBER_LIST?>">회원관리</a></li>
			<? }?>
            <? if($this->session->userdata('level') == "10") { ?>
			<li class="<?active_chk($group,'매출관리')?>"><a href="<?=COIN_LIST?>">코인 관리</a></li>
            <? } ?>
<!--			<li class="<?active_chk($group,'매출관리')?>"><a href="<?=POINT_LIST?>">이더리움 관리</a></li>
			<li class="<?active_chk($group,'2차관리')?>"><a href="<?=ICO_LIST?>">ICO 관리</a></li> -->
	
		</ul>
		<!--//상단메뉴-->
	</div>
	<div class="line-width"></div>
	<div id="container">
	
		<div id="side">
		<?=$this->load->view('admin/layout/side');?>
	
		</div>
		
		
		<div id="conts">
		

			
		
		
