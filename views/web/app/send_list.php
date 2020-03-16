<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$lang = get_cookie('lang'); 
?>
<? if ($lang == "us" ) { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Mircoin transaction</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span>transaction history</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left"></div>
					<div class="ib_right"><a href="send">Send</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
	              	<table class="table">
	                <thead class="text-primary">
	                    <th style="color: #fff !important;">Type</th>
	                    <th style="color: #fff !important;">Amount</th>
	                    <th style="color: #fff !important;">Address</th>
						<th style="color: #fff !important;">Day</th>
	                </thead>
	                <tbody>
		            <? foreach($item as $acc) { ?>
		                <tr>
			                <td style="color: #fff !important;">
	                            <? if($acc['category'] == 'send') { ?>
								Send
								<? } else { ?>
					            Receive
								<? } ?>
							</td>
	                        <td style="color: #fff !important;">
	                            <?=number_format($acc['amount'], 2, '.', '')?> Mir
	                        </td>
	                        <td style="color: #fff !important;"><?=$acc['address']?></td>
							<td style="color: #fff !important;"><?=date("Y-m-d h:i:s",$acc['time'])?></td>
						</tr>
					<? } ?>
	                </tbody>
	                </table>
              	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<?}else if ($lang == "kr" or $lang == "") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
                	<i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">미르코인 전송내역</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span>최근 보낸 내역</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left"></div>
					<div class="ib_right"><a href="send">보내기</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
	              	<table class="table">
	                <thead class="text-primary">
	                    <th style="color: #fff !important;">구분</th>
	                    <th style="color: #fff !important;">수량</th>
	                    <th style="color: #fff !important;">주소</th>
						<th style="color: #fff !important;">날짜</th>
	                </thead>
	                <tbody>
		            <? foreach($item as $acc) { ?>
		                <tr>
			                <td style="color: #fff !important;">
	                            <? if($acc['category'] == 'send') { ?>
								Send
								<? } else { ?>
					            Receive
								<? } ?>
							</td>
	                        <td style="color: #fff !important;">
	                            <?=number_format($acc['amount'], 2, '.', '')?> Mir
	                        </td>
	                        <td style="color: #fff !important;"><?=$acc['address']?></td>
							<td style="color: #fff !important;"><?=date("Y-m-d h:i:s",$acc['time'])?></td>
						</tr>
					<? } ?>
	                </tbody>
	                </table>
              	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
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
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">ミルコインの送信履歴</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span>最近送信内訳</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left"></div>
					<div class="ib_right"><a href="send">送信</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
	              	<table class="table">
	                <thead class="text-primary">
	                    <th style="color: #fff !important;">区分</th>
	                    <th style="color: #fff !important;">数量</th>
	                    <th style="color: #fff !important;">アドレス</th>
						<th style="color: #fff !important;">日付</th>
	                </thead>
	                <tbody>
		            <? foreach($item as $acc) { ?>
		                <tr>
			                <td style="color: #fff !important;">
	                            <? if($acc['category'] == 'send') { ?>
								Send
								<? } else { ?>
					            Receive
								<? } ?>
							</td>
	                        <td style="color: #fff !important;">
	                            <?=number_format($acc['amount'], 2, '.', '')?> Mir
	                        </td>
	                        <td style="color: #fff !important;"><?=$acc['address']?></td>
							<td style="color: #fff !important;"><?=date("Y-m-d h:i:s",$acc['time'])?></td>
						</tr>
					<? } ?>
	                </tbody>
	                </table>
              	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
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
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Mircoin transaction</p>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span>1transaction history</p>
						<span class="tx-11 tx-roboto tx-white-8 two"></span>
                	</div>
              	</div>
			  	<div class="con_ib">
					<div class="ib_left"></div>
					<div class="ib_right"><a href="send">Send</a></div>
			  	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20 d-flex align-items-center">
	              	<table class="table">
	                <thead class="text-primary">
	                    <th style="color: #fff !important;">Type</th>
	                    <th style="color: #fff !important;">Amount</th>
	                    <th style="color: #fff !important;">Address</th>
						<th style="color: #fff !important;">Day</th>
	                </thead>
	                <tbody>
		            <? foreach($item as $acc) { ?>
		                <tr>
			                <td style="color: #fff !important;">
	                            <? if($acc['category'] == 'send') { ?>
								Send
								<? } else { ?>
					            Receive
								<? } ?>
							</td>
	                        <td style="color: #fff !important;">
	                            <?=number_format($acc['amount'], 2, '.', '')?> Mir
	                        </td>
	                        <td style="color: #fff !important;"><?=$acc['address']?></td>
							<td style="color: #fff !important;"><?=date("Y-m-d h:i:s",$acc['time'])?></td>
						</tr>
					<? } ?>
	                </tbody>
	                </table>
              	</div>
			  	<div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<? } ?>
