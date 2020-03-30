<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>

<? if ($lang == "us" ) { ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#btnCopyClip").click(function(){
		$("#clipURL").css("display", "block");
	});

	var clipboardSupport = true;
	try {
		$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
		var version = $.browser.version;
		version = new Number(version.substring(0, version.indexOf(".")));
		
		//모바일 접속인지 확인
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {
			//클립보드 복사기능이 될경우 (크롬 42+)
			if ($.browser.chrome == true && version >= 42) {
				clipboardSupport = true;
			} else {
				clipboardSupport = false;
			}
		}
	} catch(e) {
	}

	if (clipboardSupport) {
		$("#btnCopyClip").show();
		$("#txtCopyClip").hide();
	} else {
		$("#btnCopyClip").hide();
		$("#txtCopyClip").show();
	}

	var clipboard = new Clipboard('#btnCopyClip');
		clipboard.on('success', function(e) {
		alert("Token Address copied.");
	});
	var clipboard = new Clipboard('#btnEtcCopyClip1');
		clipboard.on('success', function(e) {
		alert("ETC Address copied.");
	});
	clipboard.on('error', function(e) {
		alert("Click the Copy button.");

		setTimeout(function() {
			$("#etc_clipURL").css("display", "none");
		}, 10000);	// 최하 1000 임 1초

	});

});
</script>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Revvcoin</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"><?=$wallet?></a></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class="ib_left"></div>
					<div class="ib_right pd1"><a  id="btnCopyClip" data-clipboard-action="copy" data-clipboard-target="#clipURL" style='border:0'>Copy</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-primary_w rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Balance</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($bal,4)?></span> CTC</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class="tex_c"><img class="img" src="<?=$coin_img?>"/></div>
					<div class="ib_right pd1 mg_t15"><a href="send">Send</a></div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<?}else if ($lang == "kr" or $lang == "") { ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#btnCopyClip").click(function(){
		$("#clipURL").css("display", "block");
	});

	var clipboardSupport = true;
	try {
		$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
		var version = $.browser.version;
		version = new Number(version.substring(0, version.indexOf(".")));
		
		//모바일 접속인지 확인
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {
			//클립보드 복사기능이 될경우 (크롬 42+)
			if ($.browser.chrome == true && version >= 42) {
				clipboardSupport = true;
			} else {
				clipboardSupport = false;
			}
		}
	} catch(e) {
	}

	if (clipboardSupport) {
		$("#btnCopyClip").show();
		$("#txtCopyClip").hide();
	} else {
		$("#btnCopyClip").hide();
		$("#txtCopyClip").show();
	}

	var clipboard = new Clipboard('#btnCopyClip');
		clipboard.on('success', function(e) {
		alert("주소가 복사되었습니다.");
	});
	clipboard.on('error', function(e) {
		alert("복사버튼을 클릭해주세요.");

		setTimeout(function() {
			$("#clipURL").css("display", "none");
		}, 10000);	// 최하 1000 임 1초

	});
});
</script>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">크립토코인</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"><?=$wallet?></a></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class="ib_left"></div>
					<div class="ib_right pd1"><a  id="btnCopyClip" data-clipboard-action="copy" data-clipboard-target="#clipURL" style='border:0'>복사</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-primary_w rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">잔고</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($bal,4)?></span> CTC</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class=" tex_c"><img class="img" src="<?=$coin_img?>"/></div>
					<div class="ib_right pd1 mg_t15"><a href="send">보내기</a></div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<?}else if ($lang == "jp") { ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#btnCopyClip").click(function(){
		$("#clipURL").css("display", "block");
	});

	var clipboardSupport = true;
	try {
		$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
		var version = $.browser.version;
		version = new Number(version.substring(0, version.indexOf(".")));
		
		//모바일 접속인지 확인
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {
			//클립보드 복사기능이 될경우 (크롬 42+)
			if ($.browser.chrome == true && version >= 42) {
				clipboardSupport = true;
			} else {
				clipboardSupport = false;
			}
		}
	} catch(e) {
	}

	if (clipboardSupport) {
		$("#btnCopyClip").show();
		$("#txtCopyClip").hide();
	} else {
		$("#btnCopyClip").hide();
		$("#txtCopyClip").show();
	}

	var clipboard = new Clipboard('#btnCopyClip');
		clipboard.on('success', function(e) {
		alert("Token Address copied.");
	});
	var clipboard = new Clipboard('#btnEtcCopyClip1');
		clipboard.on('success', function(e) {
		alert("ETC Address copied.");
	});
	clipboard.on('error', function(e) {
		alert("Click the Copy button.");

		setTimeout(function() {
			$("#etc_clipURL").css("display", "none");
		}, 10000);	// 최하 1000 임 1초

	});

});
</script>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">レブコイン</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"><?=$wallet?></a></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class="ib_left"></div>
					<div class="ib_right pd1"><a  id="btnCopyClip" data-clipboard-action="copy" data-clipboard-target="#clipURL" style='border:0'>コピー</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-primary_w rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">残高</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($bal,4)?></span> CTC</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib2 ">
					<div class=" tex_c"><img class="img" src="<?=$coin_img?>"/></div>
					<div class="ib_right pd1 mg_t15"><a href="send">送信</a></div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>







<?}else if ($lang == "cn") { ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#btnCopyClip").click(function(){
		$("#clipURL").css("display", "block");
	});

	var clipboardSupport = true;
	try {
		$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
		var version = $.browser.version;
		version = new Number(version.substring(0, version.indexOf(".")));
		
		//모바일 접속인지 확인
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {
			//클립보드 복사기능이 될경우 (크롬 42+)
			if ($.browser.chrome == true && version >= 42) {
				clipboardSupport = true;
			} else {
				clipboardSupport = false;
			}
		}
	} catch(e) {
	}

	if (clipboardSupport) {
		$("#btnCopyClip").show();
		$("#txtCopyClip").hide();
	} else {
		$("#btnCopyClip").hide();
		$("#txtCopyClip").show();
	}

	var clipboard = new Clipboard('#btnCopyClip');
		clipboard.on('success', function(e) {
		alert("Token Address copied.");
	});
	var clipboard = new Clipboard('#btnEtcCopyClip1');
		clipboard.on('success', function(e) {
		alert("ETC Address copied.");
	});
	clipboard.on('error', function(e) {
		alert("Click the Copy button.");

		setTimeout(function() {
			$("#etc_clipURL").css("display", "none");
		}, 10000);	// 최하 1000 임 1초

	});

});
</script>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Revvcoin</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"><?=$wallet?></a></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left">My wallet Receive</div>
					<div class="ib_right"><a id="btnCopyClip" data-clipboard-action="copy" data-clipboard-target="#clipURL" style='border:0'>Copy</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-primary rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Balance</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($bal,4)?></span> CTC</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib1">
					<div class="ib_left"><img class="img" src="<?=$coin_img?>"/></div>
					<div class="ib_right"><a href="send">Send</a></div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<? } ?>
