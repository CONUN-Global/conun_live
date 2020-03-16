<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>

<? if ($lang == "us") { ?>
<div class="br-pagebody" style='padding:0 15px;'>
    <div class="row row-sm">
        <?foreach ($bal_list as $item2){
            if($item2['CODE']=="0000"){
                ?>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0 mt-2">
                    <div class="bg-purple rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);'>
                            <i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"> <?=$item2['COIN_NAME'];?> 잔고 :<?=number_format($item2['BALANCE'], 4)?> <?=$item2['COIN'];?></p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"></a></p>
                                <span style="font-size: 12px; font-weight: bold;"><span><?=$wallet?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <? }}?>
        <!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<style>
	.table tbody tr:hover{ color:#fff;background: linear-gradient(to left, #004e92, #000428) !important; cursor:pointer;font-weight:600;}
</style>
<div class="col-md-12" style="margin:20px 0 20px 0;">
	<div class="card">
		<div class="card-header" style="    background-color: #3c3c3c; background-size: cover; background-position: top center; line-height:13px; padding-top:31px;    background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);">
			<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Transmission history</h4>
			<p class="category" style="color:#fff; font-size:14px">Coin transmission history</p>
		</div>
		<div class="card-content table-responsive">
			<table class="table">
                <col width="10%" />
			<col width="20%" />
			<col width="30%" />
			<col width="30%" />
			<col width="20%" />
			<thead class="text-primary">	                            
			<tr>
                <th>Coin</th>
				<th>Division</th>
				<th>Address</th>
				<th>Price</th>
				<th>Date</th>
			</tr>
			</thead>
			<tbody>
			<?
			$i=0; 
			ksort($item);
			foreach($item as $row) {
				if($row["CATEGORY"] == 'move')
				{
					if($row["OTHERACCOUNT"] == 'admin')
						continue;
					else
						$row["CATEGORY"] = 'send';
				}
				$i += 1; 
				//if($i == 6){break;}
				$regdate	=  $row["TIME"];
			?>
			<tr>
                <td align="center"><?=$row["COIN"]?></td>
				<td align="center"><?=$row["CATEGORY"]?></td>
				<td align="center"><?=$row["ADDRESS"]?></td>
				<td align="center"><?=number_format($row["AMOUNT"],4)?>CTC</td>
				<td align="center"><?=$regdate?></td>
			</tr>
			<? } ?>						
			</tbody>
			</table>

		</div>
	</div>
</div>

<?}else if ($lang == "kr"  or $lang == "") { ?>



<div class="br-pagebody">
    <div class="row row-sm">
    <?foreach ($bal_list as $item2){
        if($item2['CODE']=="0000"){
            ?>
            <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0 mt-2">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);'>
                        <i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"> <?=$item2['COIN_NAME'];?> 잔고 :<?=number_format($item2['BALANCE'], 4)?> <?=$item2['COIN'];?></p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"></a></p>
                            <span style="font-size: 12px; font-weight: bold;"><span><?=$wallet?></span></span>
                        </div>
                    </div>
                </div>
            </div>
        <? }}?>
            <!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

    <style>
        .table tbody tr:hover{ color:#fff;background: linear-gradient(to left, #004e92, #000428) !important; cursor:pointer;font-weight:600;}
    </style>
    <div class="col-md-12" style="margin:20px 0 20px 0;">
        <div class="card">
            <div class="card-header" style="    background-color: #3c3c3c; background-size: cover; background-position: top center; line-height:13px; padding-top:31px;    background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);">
			<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">전송내역</h4>
			<p class="category" style="color:#fff; font-size:14px">코인전송내역.</p>
		</div>
		<div class="card-content table-responsive">
			<table class="table">
             <col width="10%" />
			<col width="20%" />
			<col width="30%" />
			<col width="20%" />
			<col width="20%" />
			<thead class="text-primary">	                            
			<tr>
                <th>COIN</th>
				<th>구분</th>
				<th>주소</th>
				<th>수량</th>
				<th>날짜</th>
			</tr>
			</thead>
			<tbody>
			<?
			$i=0;
			ksort($item);
			foreach($item as $row) {
				if($row["CATEGORY"] == 'move')
				{
					if($row["OTHERACCOUNT"] == 'admin')
						continue;
					else
						$row["CATEGORY"] = 'send';
				}
				$i += 1; 
				//if($i == 6){break;}
				$regdate	=  $row["TIME"];
			?>
			<tr>
                <td align="center"><?=$row["COIN"]?></td>
				<td align="center"><?=$row["CATEGORY"]?></td>
				<td align="center"><?=$row["ADDRESS"]?></td>
				<td align="center"><?=number_format($row["AMOUNT"],4)?> <?=$row["COIN"]?></td>
				<td align="center"><?=$regdate?></td>
			</tr>
			<? } ?>						
			</tbody>
			</table>

		</div>
	</div>
</div>


<?}else if ($lang == "jp") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <?foreach ($bal_list as $item2){
            if($item2['CODE']=="0000"){
                ?>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0 mt-2">
                    <div class="bg-purple rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);'>
                            <i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"> <?=$item2['COIN_NAME'];?> 잔고 :<?=number_format($item2['BALANCE'], 4)?> <?=$item2['COIN'];?></p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"></a></p>
                                <span style="font-size: 12px; font-weight: bold;"><span><?=$wallet?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <? }}?>
        <!-- col-3 --><!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

    <style>
        .table tbody tr:hover{ color:#fff;background: linear-gradient(to left, #004e92, #000428) !important; cursor:pointer;font-weight:600;}
    </style>
    <div class="col-md-12" style="margin:20px 0 20px 0;">
        <div class="card">
            <div class="card-header" style="    background-color: #3c3c3c; background-size: cover; background-position: top center; line-height:13px; padding-top:31px;    background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);">
			<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">送信の履歴</h4>
			<p class="category" style="color:#fff; font-size:14px">コイン送信の履歴</p>
		</div>
		<div class="card-content table-responsive">
			<table class="table">
                <col width="10%" />
			<col width="20%" />
			<col width="30%" />
			<col width="30%" />
			<col width="20%" />
			<thead class="text-primary">	                            
			<tr>
                <th>コイン</th>
				<th>区分</th>
				<th>アドレス</th>
				<th>金額</th>
				<th>日付</th>
			</tr>
			</thead>
			<tbody>
			<?
			$i=0; 
			ksort($item);
			foreach($item as $row) {
				if($row["CATEGORY"] == 'move')
				{
					if($row["OTHERACCOUNT"] == 'admin')
						continue;
					else
						$row["CATEGORY"] = 'send';
				}
				$i += 1; 
				//if($i == 6){break;}
				$regdate	=  $row["TIME"];
			?>
			<tr>
                <td align="center"><?=$row["COIN"]?></td>
				<td align="center"><?=$row["CATEGORY"]?></td>
				<td align="center"><?=$row["ADDRESS"]?></td>
				<td align="center"><?=number_format($row["AMOUNT"],4)?>CTC</td>
				<td align="center"><?=$regdate?></td>
			</tr>
			<? } ?>						
			</tbody>
			</table>

		</div>
	</div>
</div>
<?}else if ($lang == "cn") { ?>
<div class="br-pagebody">
    <div class="row row-sm">
        <?foreach ($bal_list as $item2){
            if($item2['CODE']=="0000"){
                ?>
                <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0 mt-2">
                    <div class="bg-purple rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);'>
                            <i class="ion ion-ios-color-filter-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"> <?=$item2['COIN_NAME'];?> 잔고 :<?=number_format($item2['BALANCE'], 4)?> <?=$item2['COIN'];?></p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="clipURL"></a></p>
                                <span style="font-size: 12px; font-weight: bold;"><span><?=$wallet?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <? }}?>
        <!-- col-3 -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

    <style>
        .table tbody tr:hover{ color:#fff;background: linear-gradient(to left, #004e92, #000428) !important; cursor:pointer;font-weight:600;}
    </style>
    <div class="col-md-12" style="margin:20px 0 20px 0;">
        <div class="card">
            <div class="card-header" style="    background-color: #3c3c3c; background-size: cover; background-position: top center; line-height:13px; padding-top:31px;    background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);">
			<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">传送内容</h4>
			<p class="category" style="color:#fff; font-size:14px">货币传送内容</p>
		</div>
		<div class="card-content table-responsive">
			<table class="table">
            <col width="10%" />
			<col width="20%" />
			<col width="30%" />
			<col width="30%" />
			<col width="20%" />
			<thead class="text-primary">	                            
			<tr>
                <th>硬币</th>
				<th>区分</th>
				<th>地址</th>
				<th>金额</th>
				<th>日期</th>
			</tr>
			</thead>
			<tbody>
			<?
			$i=0; 
			ksort($item);
			foreach($item as $row) {
				if($row["CATEGORY"] == 'move')
				{
					if($row["OTHERACCOUNT"] == 'admin')
						continue;
					else
						$row["CATEGORY"] = 'send';
				}
				$i += 1; 
				//if($i == 6){break;}
				$regdate	=  $row["TIME"];
			?>
			<tr>
                <td align="center"><?=$row["COIN"]?></td>
				<td align="center"><?=$row["CATEGORY"]?></td>
				<td align="center"><?=$row["ADDRESS"]?></td>
				<td align="center"><?=number_format($row["AMOUNT"],4)?>CTC</td>
				<td align="center"><?=$regdate?></td>
			</tr>
			<? } ?>						
			</tbody>
			</table>

		</div>
	</div>
</div>

<? } ?>