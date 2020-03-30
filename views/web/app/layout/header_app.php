<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CONUN coin</title>
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script type="text/javascript" src="<?=$skin_dir?>/js/jquery-3.1.1.min.js"></script>
	
    

    <!-- vendor css -->
    <link href="<?=$skin_dir?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?=$skin_dir?>/css/ionicons.css" rel="stylesheet">
    <link href="<?=$skin_dir?>/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?=$skin_dir?>/css/jquery.switchButton.css" rel="stylesheet">

    <link href="<?=$skin_dir?>/css/select2.min.css" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?=$skin_dir?>/css/bracket.css">


    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/popper.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/bootstrap.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/perfect-scrollbar.jquery.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/moment.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery-ui.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.switchButton.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.peity.js"></script>


    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.resize.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.flot.spline.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/jquery.sparkline.min.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/echarts.min.js"></script>
    <script type="text/javascript"  src="<?=$skin_dir?>/js/select2.full.min.js"></script>

    <script type="text/javascript"  src="<?=$skin_dir?>/js/bracket.js?version=2"></script>

    <script type="text/javascript"  src="<?=$skin_dir?>/js/ResizeSensor.js"></script>

    <script>
        $(function(){
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function(){
                minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
                if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>
    <script type="text/javascript"  src="/js/qrcode.js"></script>


</head>

<body>
<?php
   $level = $this->session->userdata("level");
?>
<div class="br-logo"><a href="/app/coin"><span>[</span>CONUN <i>Coin</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
	    <?$lang = get_cookie('lang');?>
		<? if ($lang == "us") { ?>
		<label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
	  	<ul class="br-sideleft-menu">
        	<li class="br-menu-item">
				<a href="/app/coin" class="br-menu-link">
					<i class="menu-item-icon icon ion-monitor tx-20 navle"></i>
					<span class="menu-item-label">Dashboard</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/profile" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-person-stalker tx-18 navle"></i>
		  			<span class="menu-item-label">Privacy</span>
          		</a>
		  	</li>
		  <!--	<li class="br-menu-item">
		  		<a href="/app/send" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
		  			<span class="menu-item-label">Send</span>
          		</a>
		  	</li>-->
		  	<li class="br-menu-item">
		  		<a href="/app/lists" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-list-outline tx-20 navle"></i>
		  			<span class="menu-item-label">Transmission history</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/userqna" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-paper-airplane tx-20 navle"></i>
		  			<span class="menu-item-label">Contact us</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/login/out" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-android-exit tx-22 navle"></i>
		  			<span class="menu-item-label">Logout</span>
          		</a>
		  	</li>
            <? if($level=="10"  || $level=="9" ){?>
                <li class="br-menu-item">
                    <a href="/admin" class="br-menu-link">
                        <i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
                        <span class="menu-item-label">admin</span>
                    </a>
                </li>
            <?}?>
		  	<li class="br-menu-item">
				<? if ($lang == "us" ) { ?>
				<a href="/app/lang/" class="br-menu-link">
		  			<i class="menu-item-icon tx-22 navle"></i>
					<img src="<?=SKIN_DIR?>/img/lang/us.png" width="22">&nbsp;
                    <span class="menu-item-label">United States</span>
				</a>
				<? } ?>
		  	</li>
      	</ul>
	  	<?}else if ($lang == "kr" or  $lang == "") { ?>
		<label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
	  	<ul class="br-sideleft-menu">
        	<li class="br-menu-item">
				<a href="/app/coin" class="br-menu-link">
					<i class="menu-item-icon icon ion-monitor tx-20 navle"></i>
					<span class="menu-item-label">대시보드</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/profile" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-person-stalker tx-18 navle"></i>
		  			<span class="menu-item-label">개인정보수정하기</span>
          		</a>
		  	</li>


		  	<li class="br-menu-item">
		  		<a href="/app/lists" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-list-outline tx-20 navle"></i>
		  			<span class="menu-item-label">전송내역</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/userqna" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-paper-airplane tx-20 navle"></i>
		  			<span class="menu-item-label">문의하기</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/login/out" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-android-exit tx-22 navle"></i>
		  			<span class="menu-item-label">로그아웃</span>
          		</a>
		  	</li>
            <? if($level=="10"  || $level=="9" ){?>
                <li class="br-menu-item">
                    <a href="/admin" class="br-menu-link">
                        <i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
                        <span class="menu-item-label">admin</span>
                    </a>
                </li>
            <?}?>
		  	<li class="br-menu-item">
				<? if ($lang == "kr"  or $lang == "") { ?>
				<a href="/app/lang/" class="br-menu-link">
		  			<i class="menu-item-icon tx-22 navle"></i>
					<img src="<?=SKIN_DIR?>/img/lang/kor.png" width="22">&nbsp;
                    <span class="menu-item-label">Korea</span>
				</a>
				<? } ?>
		  	</li>
      	</ul>



	  	<?}else if ($lang == "jp") { ?>
		<label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
	  	<ul class="br-sideleft-menu">
        	<li class="br-menu-item">
				<a href="/app/coin" class="br-menu-link">
					<i class="menu-item-icon icon ion-monitor tx-20 navle"></i>
					<span class="menu-item-label">ダッシュボード</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/profile" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-person-stalker tx-18 navle"></i>
		  			<span class="menu-item-label">個人情報を変更する</span>
          		</a>
		  	</li>
            <!--
		  	<li class="br-menu-item">
		  		<a href="/app/send" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
		  			<span class="menu-item-label">コイン送信</span>
          		</a>
		  	</li>-->
		  	<li class="br-menu-item">
		  		<a href="/app/lists" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-list-outline tx-20 navle"></i>
		  			<span class="menu-item-label">送信の履歴</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/userqna" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-paper-airplane tx-20 navle"></i>
		  			<span class="menu-item-label">お問い合わせ</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/login/out" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-android-exit tx-22 navle"></i>
		  			<span class="menu-item-label">ログアウト</span>
          		</a>
		  	</li>
            <? if($level=="10"  || $level=="9" ){?>
                <li class="br-menu-item">
                    <a href="/admin" class="br-menu-link">
                        <i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
                        <span class="menu-item-label">admin</span>
                    </a>
                </li>
            <?}?>
		  	<li class="br-menu-item">
				<? if ($lang == "jp") { ?>
				<a href="/app/lang/" class="br-menu-link">
		  			<i class="menu-item-icon tx-22 navle"></i>
					<img src="<?=SKIN_DIR?>/img/lang/jp.png" width="22">&nbsp;
                    <span class="menu-item-label">Japan</span>
				</a>
				<? } ?>
		  	</li>
      	</ul>


	  	<?}else if ($lang == "cn") { ?>
		<label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
	  	<ul class="br-sideleft-menu">
        	<li class="br-menu-item">
				<a href="/app/coin" class="br-menu-link">
					<i class="menu-item-icon icon ion-monitor tx-20 navle"></i>
					<span class="menu-item-label">仪表板</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/profile" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-person-stalker tx-18 navle"></i>
		  			<span class="menu-item-label">个人情报修正</span>
          		</a>
		  	</li>
            <!--
		  	<li class="br-menu-item">
		  		<a href="/app/send" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
		  			<span class="menu-item-label">货币转送</span>
          		</a>
		  	</li>-->
		  	<li class="br-menu-item">
		  		<a href="/app/lists" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-ios-list-outline tx-20 navle"></i>
		  			<span class="menu-item-label">转送内容</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/userqna" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-paper-airplane tx-20 navle"></i>
		  			<span class="menu-item-label">咨询</span>
          		</a>
		  	</li>
		  	<li class="br-menu-item">
		  		<a href="/app/login/out" class="br-menu-link">
		  			<i class="menu-item-icon icon ion-android-exit tx-22 navle"></i>
		  			<span class="menu-item-label">注销</span>
          		</a>
		  	</li>
            <? if($level=="10"  || $level=="9" ){?>
                <li class="br-menu-item">
                    <a href="/admin" class="br-menu-link">
                        <i class="menu-item-icon icon ion-ios-refresh-outline tx-20 navle"></i>
                        <span class="menu-item-label">admin</span>
                    </a>
                </li>
            <?}?>
		  	<li class="br-menu-item">
				<? if ($lang == "cn") { ?>
				<a href="/app/lang/" class="br-menu-link">
		  			<i class="menu-item-icon tx-22 navle"></i>
					<img src="<?=SKIN_DIR?>/img/lang/cn.png" width="22">&nbsp;
                    <span class="menu-item-label">Chinese</span>
				</a>
				<? } ?>
		  	</li>

      	</ul>
	  	<? } ?>
	  	<br>
    </div><!-- br-sideleft -->

    <div class="br-header">
      	<div class="br-header-left">
        	<div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
			<div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>

      	</div><!-- br-header-left -->
	  	<div class="br-header-right">
			<a class="c-cell" href="/app/coin" > <h4><img src="/views/web/app/img/mir_app_logo_b.png" > </h4></span></a>



      	</div><!-- br-header-right -->
         

    </div><!-- br-header -->



    <div class="br-mainpanel">

      	<div class="br-pagetitle" style="height:50px;text-align: center">
            <? if ($lang == "kr") { ?>
        	<span class="icon" style="font-size:24px; font-weight:bold">리움월렛</span>
        	
           <? }else{?>
                <span class="icon">CONUN Coin Wallet</span>
            <?}?>

        <div>
    </div>
	 
</div>
