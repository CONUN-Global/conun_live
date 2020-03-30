<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$lang = get_cookie('lang'); 
?>
<? if ($lang == "us" ) { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
					<img class="tx-60 lh-0 tx-white op-7" style="width:30px" src="http://mircoin.net/views/web/app/img/eth.png">
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Etherium Classic</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($etc_balance, 2)?></span> ETC</span>
                	</div>
                	
					<div class="mg-l-20" style="margin-left: 20px; margin-right: 20px;"><img src="http://mircoin.net/views/web/app/img/arrow.png" /></div>
                	<i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Mir Token</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($token_balance, 6)?></span> Token</span>
                	</div>
            	</div>
				<div class="con_ib w03">
					<div class="ib_left">If you click on the Join button, your ETC will be converted to a Mir token.</div>
					<div class="ib_right w03"><a href="/app/change/change_ok">Confirm participation</a></div>
				</div>
				<div id="ch2" class="ht-50 tr-y-1"></div>
        	</div>
        </div><!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<?}else if ($lang == "kr" or $lang == "") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
					<img class="tx-60 lh-0 tx-white op-7" style="width:30px" src="http://mircoin.net/views/web/app/img/eth.png">
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">이더리움클래식</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($etc_balance, 2)?></span> ETC</span>
                	</div>
                	
					<div class="mg-l-20" style="margin-left: 20px; margin-right: 20px;"><img src="http://mircoin.net/views/web/app/img/arrow.png" /></div>
                	<i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">미르토큰</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($token_balance, 6)?></span> Token</span>
                	</div>
            	</div>
				<div class="con_ib w03">
					<div class="ib_left">참여확인 버튼을 누르시면 보유하신 ETC가 미르토큰으로 변환합니다.</div>
					<div class="ib_right w03"><a href="/app/change/change_ok">참여확인</a></div>
				</div>
				<div id="ch2" class="ht-50 tr-y-1"></div>
        	</div>
        </div><!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<?}else if ($lang == "jp") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
					<img class="tx-60 lh-0 tx-white op-7" style="width:30px" src="http://mircoin.net/views/web/app/img/eth.png">
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Etherium Classic</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($etc_balance, 2)?></span> ETC</span>
                	</div>
                	
					<div class="mg-l-20" style="margin-left: 20px; margin-right: 20px;"><img src="http://mircoin.net/views/web/app/img/arrow.png" /></div>
                	<i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Mir Token</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($token_balance, 6)?></span> Token</span>
                	</div>
            	</div>
				<div class="con_ib w03">
					<div class="ib_left">If you click on the Join button, your ETC will be converted to a Mir token.</div>
					<div class="ib_right w03"><a href="/app/change/change_ok">Confirm participation</a></div>
				</div>
				<div id="ch2" class="ht-50 tr-y-1"></div>
        	</div>
        </div><!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

<?}else if ($lang == "cn") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
					<img class="tx-60 lh-0 tx-white op-7" style="width:30px" src="http://mircoin.net/views/web/app/img/eth.png">
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Etherium Classic</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($etc_balance, 2)?></span> ETC</span>
                	</div>
                	
					<div class="mg-l-20" style="margin-left: 20px; margin-right: 20px;"><img src="http://mircoin.net/views/web/app/img/arrow.png" /></div>
                	<i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Mir Token</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><span><?=number_format($token_balance, 6)?></span> Token</span>
                	</div>
            	</div>
				<div class="con_ib w03">
					<div class="ib_left">If you click on the Join button, your ETC will be converted to a Mir token.</div>
					<div class="ib_right w03"><a href="/app/change/change_ok">Confirm participation</a></div>
				</div>
				<div id="ch2" class="ht-50 tr-y-1"></div>
        	</div>
        </div><!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<? } ?>