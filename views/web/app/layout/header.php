<?ini_set("display_errors", 0);?>
<!doctype html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
	<link rel="icon" type="image/png" href="/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<title>CONUN Coin</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js "></script>
	  <script type="text/javascript" src="<?=SKIN_DIR?>/js/jquery.vide.js?<?=today()?>"></script>

	<!--     Fonts and icons     -->

	<!-- CSS Files -->
    <link href="<?=SKIN_DIR?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?=SKIN_DIR?>/css/bootstrap.min.css?<?=today()?>" rel="stylesheet" />
    <link href="<?=SKIN_DIR?>/css/style.css?<?=today()?>" rel="stylesheet"/>
	<link href="<?=SKIN_DIR?>/css/demo.css?<?=today()?>" rel="stylesheet" />
</head>
<body class="<?=$header['group']?>" <body class="<?=$header['group']?>" >
<!-- Navbar -->

<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="/app">
	        	<div class="logo-container">
	                <div class="brand">
	                   <img style="130px" src="<?=SKIN_DIR?>/img/mir_app_logo.png">
	                </div>
				</div>
	      	</a>

            
	    </div>


	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<? $lang = get_cookie('lang'); ?>
				<li>
					<? if ($lang == "us" ) { ?><a href="/app/lang/"><img src="<?=SKIN_DIR?>/img/lang/us.png" width="22">&nbsp; United States</a><? } ?>
					<? if ($lang == "kr" or $lang == "") { ?><a href="/app/lang/"><img src="<?=SKIN_DIR?>/img/lang/kor.png" width="22">&nbsp; Korea</a><? } ?>
					<? if ($lang == "cn") { ?><a href="/app/lang/"><img src="<?=SKIN_DIR?>/img/lang/cn.png" width="22">&nbsp; Chinese</a><? } ?>
					<? if ($lang == "jp") { ?><a href="/app/lang/"><img src="<?=SKIN_DIR?>/img/lang/jp.png" width="22">&nbsp; Japan</a><? } ?>
					</a>
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

 <div class="wrapper">