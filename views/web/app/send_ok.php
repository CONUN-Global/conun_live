<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
// 한국어만 있음
?>
<? if ($lang == "us") { ?>
	<div class="content">
	    <div class="container-fluid">
            <div class="row">
    			<div class="col-md-8 col-md-offset-2">
                    <div class="card">
	                    <div class="card-header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                            <h4 class="title"><i class="fa fa-check text-success"> </i> Transfer complete</h3>
                            <p class="category">Your coin was sent to your wallet.</p>
                        </div>
						
						<div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <th>Receiver</th>
                                    <th class="text-center"><?=$this->input->post('send_id')?></th>
									<th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Count</td>
                                        <td class="text-center"><?=number_format($this->input->post('count'), 2, '.', '')?> <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>Fee</td>
                                        <td class="text-center">0.01 <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>Expected Compete Time</td>
                                        <td class="text-center">About 10 minutes</td>
                                        <td class="text-center"></td>
                                    </tr>
									<tr>
                                        <td>Successful transmission</td>
        								<td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
        								<td class="text-center"></td>
        								<td class="text-center"></td>
        								<td class="text-center">
        									<a href="/app/send" class="btn btn-round btn-fill btn-info">Continue transfer</a>
        								</td>
        							</tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
	
<?}else if ($lang == "kr"  or $lang == "") { ?>
	<div class="content">
	    <div class="container-fluid">
            <div class="row">
    			<div class="col-md-8 col-md-offset-2">
                    <div class="card">
	                    <div class="card-header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                            <h4 class="title"><i class="fa fa-check text-success"> </i> 이체 완료</h3>
                            <p class="category">상대방의 지갑으로 코인이 전송 되었습니다.</p>
                        </div>
						
						<div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <th>받으시는분</th>
                                    <th class="text-center"><?=$this->input->post('send_id')?></th>
									<th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>전송코인</td>
                                        <td class="text-center"><?=$this->input->post('amount')?> <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>이체 수수료</td>
                                        <td class="text-center">0.01 <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>예상 컴펌 시간</td>
                                        <td class="text-center">약 10분</td>
                                        <td class="text-center"></td>
                                    </tr>
									<tr>
                                        <td>전송 성공 여부</td>
        								<td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
        								<td class="text-center"></td>
        								<td class="text-center"></td>
        								<td class="text-center">
        									<a href="/app/send" class="btn btn-round btn-fill btn-info">이체 계속</a>
        								</td>
        							</tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
	
<?}else if ($lang == "cn") { ?>
	<div class="content">
	    <div class="container-fluid">
            <div class="row">
    			<div class="col-md-8 col-md-offset-2">
                    <div class="card">
	                    <div class="card-header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                            <h4 class="title"><i class="fa fa-check text-success"> </i> 转移完成</h3>
                            <p class="category">你的钱币被发送到你的钱包。</p>
                        </div>
						
						<div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <th>那些收到</th>
                                    <th class="text-center"><?=$this->input->post('send_id')?></th>
									<th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>转账硬币</td>
                                        <td class="text-center"><?=$this->input->post('amount')?> <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>转让费</td>
                                        <td class="text-center">0.01 <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>预期竞争时间</td>
                                        <td class="text-center">大约10分钟</td>
                                        <td class="text-center"></td>
                                    </tr>
									<tr>
                                        <td>成功的传输</td>
        								<td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
        								<td class="text-center"></td>
        								<td class="text-center"></td>
        								<td class="text-center">
        									<a href="/app/send" class="btn btn-round btn-fill btn-info">继续转移</a>
        								</td>
        							</tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>

<?}else if ($lang == "jp") { ?>
	<div class="content">
	    <div class="container-fluid">
            <div class="row">
    			<div class="col-md-8 col-md-offset-2">
                    <div class="card">
	                    <div class="card-header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                            <h4 class="title"><i class="fa fa-check text-success"> </i> 変形完了</h3>
                            <p class="category">相手の財布にコインが送信されました。</p>
                        </div>
						
						<div class="card-content">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <th>受ける方</th>
                                    <th class="text-center"><?=$this->input->post('send_id')?></th>
									<th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>送信コイン</td>
                                        <td class="text-center"><?=$this->input->post('amount')?> <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>送信料</td>
                                        <td class="text-center">0.01 <?=$conf['coinSymbol']?></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td>予想コムポム時間</td>
                                        <td class="text-center">約10分</td>
                                        <td class="text-center"></td>
                                    </tr>
									<tr>
                                        <td>送信に成功するかどうか</td>
        								<td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
        								<td class="text-center"></td>
        								<td class="text-center"></td>
        								<td class="text-center">
        									<a href="/app/send" class="btn btn-round btn-fill btn-info">変形継続</a>
        								</td>
        							</tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
<? } ?>