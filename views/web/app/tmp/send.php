<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>
<? if ($lang == "us" or $lang == "") { ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                        <h4 class="title">Send Coin</h4>
						<p class="category">Send the coin to another address.</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
						<input type="hidden" name="bal" class="form-control" value="<?=$bal?>" >
						<input type="hidden" name="fee" class="form-control" value="0.01" >
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">Balance  : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">to <?=$conf['coinSymbol']?> address</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Amount to send</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Fee</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tip</label>
									<div class="form-group label-floating">
										<label class="control-label"> Be careful with the transfer. Once approved, the transaction can not be reversed..</label>
									</div>
                            	</div>
                        	</div>
                    	</div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">Submit</button>
                        <div class="clearfix"></div>
                       	</form>
                	</div>
            	</div>
        	</div>
			<div class="col-md-4">
				<div class="card card-profile">
   					<div class="card-avatar">
   						<a href="#pablo"><img class="img" src="<?=SKIN_DIR?>/img/faces/marc.jpg" /></a>
   					</div>
   					<div class="content">
   						<h6 class="category text-gray">Help</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							This coin can be sent on any platform, anytime, anywhere, regardless of country.
   						</p>
   					</div>
   				</div>
	    	</div>
        </div>
    </div>
</div>

<script language="javascript">
function formCheck(frm) {
	
    if (frm.send_id.value == "") {
        alert("wallet address");
        frm.send_id.focus();
        return false;
    }
    
    if (frm.count.value == "") {
        alert("Enter the amount");
        frm.count.focus();
        return false;
    }


    return true;
}
</script>
<? } ?>


<? if ($lang == "kr") { ?>
<div class="content">
    <div class="container-fluid">
	    <div class="row">
            <div class="col-md-8">
                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                        <h4 class="title">코인 보내기</h4>
						<p class="category">코인을 다른 주소로 전송 합니다.</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">잔고 : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">받으실분의 지갑 주소</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">보내실 금액</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">이체 수수료</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>도움말</label>
									<div class="form-group label-floating">
										<label class="control-label"> 이체에 주의 하세요 한번 승인된 거래는 되 돌릴수 없습니다.</label>
						    		</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">이체 승인</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
	                    
			<div class="col-md-4">
   				<div class="card card-profile">
   					<div class="card-avatar">
   						<a href="#pablo"><img class="img" src="<?=SKIN_DIR?>/img/faces/marc.jpg" /></a>
   					</div>
   					<div class="content">
   						<h6 class="category text-gray">알림 도우미</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							해당 코인은 시간,장소,국가에 상관없이 언제, 어느 플렛폼에서 전송이 가능 합니다.
   						</p>
   					</div>
   				</div>
	    	</div>
        </div>
    </div>
</div>

<script language="javascript">
function formCheck(frm) {
    if (frm.send_id.value == "") {
        alert("받으실 분의 지갑 주소를 입력하세요");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("이체 하실 금액을 입력하세요");
        frm.count.focus();
        return false;
    }
    return true;
}
</script>
<? } ?>


<? if ($lang == "cn") { ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                        <h4 class="title">发送</h4>
						<p class="category">Send Coin</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">余额 : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">钱包地址</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">汇款</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">佣金</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                       	</div>
                       	<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>尖</label>
									<div class="form-group label-floating">
								    	<label class="control-label"> 转注.</label>
							    	</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">承认</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
	                    
			<div class="col-md-4">
   				<div class="card card-profile">
   					<div class="card-avatar">
   						<a href="#pablo"><img class="img" src="<?=SKIN_DIR?>/img/faces/marc.jpg" /></a>
   					</div>
   					<div class="content">
   						<h6 class="category text-gray">幫助</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							可以在任何時候發送的硬幣，任何平台，不受時間，地點和國家。
   						</p>
   					</div>
   				</div>
	    	</div>
        </div>
    </div>
</div>

<script language="javascript">
function formCheck(frm) {
    if (frm.send_id.value == "") {
        alert("钱包地址");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("的金额");
        frm.count.focus();
        return false;
    }
    return true;
}
</script>
<? } ?>

<? if ($lang == "jp") { ?>
<div class="content">
    <div class="container-fluid">
	    <div class="row">
            <div class="col-md-8">
                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
                        <h4 class="title">コイン・データ</h4>
						<p class="category">コインを別のアドレスに転送する。</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">バランス : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">受け分の財布アドレス</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">お送り金額</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">振り込み手数料</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ヘルプ</label>
									<div class="form-group label-floating">
										<label class="control-label"> 変形に注意してください一度承認された取引は、されて回転できません。</label>
						    		</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">変形承認</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
	                    
			<div class="col-md-4">
   				<div class="card card-profile">
   					<div class="card-avatar">
   						<a href="#pablo"><img class="img" src="<?=SKIN_DIR?>/img/faces/marc.jpg" /></a>
   					</div>
   					<div class="content">
   						<h6 class="category text-gray">通知</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							このコインは、時間、場所、国家に関係なくいつでも、どのプラットフォームで転送が可能です。
   						</p>
   					</div>
   				</div>
	    	</div>
        </div>
    </div>
</div>

<script language="javascript">
function formCheck(frm) {
    if (frm.send_id.value == "") {
        alert("受け分の財布アドレスを入力してください");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("変形することが金額を入力してください");
        frm.count.focus();
        return false;
    }
    return true;
}
</script>
<? } ?>
 