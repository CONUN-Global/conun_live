<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$lang = get_cookie('lang'); 
?>

<? if ($lang == "us") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">API</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1">&nbsp;<?=$mb_apikey?></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left">You can Create your personal API Key.</div>
					<div class="ib_right"><a href="/app/profile/password">Create API Key</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div>
    </div>
</div>
<?}else if ($lang == "kr"  or $lang == "") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">API</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">&nbsp;<?=$mb_apikey?></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left">API키 발급</div>
					<div class="ib_right"><a href="/app/api/apikey">API키 발급</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div>
    </div>
</div>
<?}else if ($lang == "jp") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">API</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1">&nbsp;<?=$mb_apikey?></p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left">API キー発行</div>
					<div class="ib_right"><a href="/app/profile/password">API キー発行</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div>
    </div>
</div>
<?}else if ($lang == "cn") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Edit personal information</p>
						<p class="tx-10 tx-white tx-lato tx-bold mg-b-0 lh-1">You can edit your personal information.</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left"><?=$mb_apikey?></div>
					<div class="ib_right"><a href="/app/profile/password">Edit your password</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div>
    </div>
</div>
<? } ?>