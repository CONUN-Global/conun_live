<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>
<? if ($lang == "us" or $lang == "") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                    <h4 class="title">Transaction </h4>
	                    <p class="category">Transaction history</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
	                        <th>Type</th>
	                        <th>Amount</th>
	                        <th>Address</th>
							<th>Day</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									Send
									<? } else { ?>
					                Receive
									<? } ?>
								</td>
	                            <td>
	                                <?=number_format($acc['amount'], 2, '.', '')?> STAR
	                            </td>
	                            <td><?=$acc['address']?></td>
								<td><?=date("Y-m-d h:i:s",$acc['time'])?></td>
							</tr>
							<? } ?>
	                    </tbody>
	                    </table>
                            
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">Send</button></a>
						<div class="clearfix"></div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<? } ?>
  

<? if ($lang == "kr") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                    <h4 class="title">거래 내역</h4>
	                    <p class="category">최근의 거래 내역을 나타냅니다</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
	                        <th>타입</th>
	                        <th>코인수량</th>
	                        <th>전송주소</th>
							<th>시간(과거순)</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									보내기
									<? } else { ?>
					                받기
									<? } ?>
								</td>
	                            <td>
	                                <?=number_format($acc['amount'])?> STAR
	                            </td>
	                            <td><?=$acc['address']?></td>
								<td><?=date("Y-m-d h:i:s",$acc['time'])?></td>
							</tr>
							<? } ?>
						</tbody>
						</table>
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">코인보내기</button></a>
						<div class="clearfix"></div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<? } ?>



<? if ($lang == "cn") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                    <h4 class="title">交易</h4>
	                    <p class="category">Transaction history</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
		                    <th>师</th>
	                        <th>的金额</th>
	                        <th>地址</th>
							<th>日期</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									发送
									<? } else { ?>
					                修身
									<? } ?>
								</td>
	                            <td>
	                                <?=number_format($acc['amount'])?> STAR
	                            </td>
	                            <td><?=$acc['address']?></td>
								<td><?=date("Y-m-d h:i:s",$acc['time'])?></td>
							</tr>
							<? } ?>
	                    </tbody>
	                    </table>
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">发送</button></a>
						<div class="clearfix"></div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<? } ?>

<? if ($lang == "jp") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                    <h4 class="title">トランザクション </h4>
	                    <p class="category">取引履歴</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
	                        <th>タイプ</th>
	                        <th>量</th>
	                        <th>住所</th>
							<th>送信</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									Send
									<? } else { ?>
					                Receive
									<? } ?>
								</td>
	                            <td>
	                                <?=number_format($acc['amount'])?> STAR
	                            </td>
	                            <td><?=$acc['address']?></td>
								<td><?=date("Y-m-d h:i:s",$acc['time'])?></td>
							</tr>
							<? } ?>
	                    </tbody>
	                    </table>
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">送信</button></a>
						<div class="clearfix"></div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<? } ?>