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
	                    <h4 class="title">?????? ??????</h4>
	                    <p class="category">????????? ?????? ????????? ???????????????</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
	                        <th>??????</th>
	                        <th>????????????</th>
	                        <th>????????????</th>
							<th>??????(?????????)</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									?????????
									<? } else { ?>
					                ??????
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
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">???????????????</button></a>
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
	                    <h4 class="title">??????</h4>
	                    <p class="category">Transaction history</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
		                    <th>???</th>
	                        <th>?????????</th>
	                        <th>??????</th>
							<th>??????</th>
	                    </thead>
	                    <tbody>
		                    <? foreach($item as $acc) { ?>
		                    <tr>
			                    <td>
	                                <? if($acc['category'] == 'send') { ?>
									??????
									<? } else { ?>
					                ??????
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
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">??????</button></a>
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
	                    <h4 class="title">???????????????????????? </h4>
	                    <p class="category">????????????</p>
	                </div>
	                <div class="card-content table-responsive">
	                    <table class="table">
	                    <thead class="text-primary">
	                        <th>?????????</th>
	                        <th>???</th>
	                        <th>??????</th>
							<th>??????</th>
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
						<a href="./send"><button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">??????</button></a>
						<div class="clearfix"></div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<? } ?>