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
	                        <h4 class="title">Receive</h4>
							<p class="category">My wallet Receive .</p>
	                    </div>
	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
	                        <div class="row">
								<div class="col-md-12">
									<h4 class="title">Balance : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">My wallet Address</label>
										<?if($wallet == 'reset'){?>
										<a href='/app/address/make'>주소 다시 생성(클릭)</a>
										<?}else{?>
										<input type="text" name="coin_addr" class="form-control" value="<?=$wallet?>" readonly >
										<?}?>
									</div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">QRCODE</label>
										<img class="img" src="<?=$coin_img?>"/><br><br>
									</div>
	                            </div>
	                        </div>		
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
    							This coin can be sent on any platform at any time, place, or country.
							</p>
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
	            <div class="col-md-8">
	                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                        <h4 class="title">코인 받기</h4>
							<p class="category">나의 지갑 주소를 나타 냅니다.</p>
	                    </div>
	                    
	                    <div class="card-content">
	                        <form name="reg" action="http://kcpcoin.com/coin/bank" method="post" onsubmit="return formCheck(this);">
							<input type="hidden" name="admount" class="form-control" value="<?=$bal?>" >
	                        <div class="row">
								<div class="col-md-12">
									<h4 class="title">잔고 : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">나의 지갑 주소</label>
										<input type="text" name="coin_addr" class="form-control" value="<?=$wallet?>" readonly >
									</div>
                                </div>
                            </div>
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">QRCODE</label>
										<img class="img" src="<?=$coin_img?>" />
									</div>
	                            </div>
	                        </div>					
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
	<? } ?>


	<? if ($lang == "cn") { ?>
	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-8">
	                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                        <h4 class="title">前台</h4>
							<p class="category">Receive Ges Coin</p>
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
										<label class="control-label">地址</label>
										<input type="text" name="coin_addr" class="form-control" value="<?=$wallet?>" readonly >
									</div>
                                </div>
                            </div>
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">QRCODE</label>
										<img class="img" src="<?=$coin_img?>" />
									</div>
	                            </div>
	                        </div>	
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
    							这枚硬币可以在任何时间，地点或国家的任何平台上发送。
							</p>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div>
	<? } ?>
	
	<? if ($lang == "jp"){?>
	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-8">
	                <div class="card">
	                <div class="card-header" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>); background-size: cover; background-position: top center;">
	                        <h4 class="title">受信</h4>
							<p class="category">私の財布を受け取る。</p>
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
										<label class="control-label">私の財布の住所</label>
										<input type="text" name="coin_addr" class="form-control" value="<?=$wallet?>" readonly >
									</div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">QRコード</label>
										<img class="img" src="<?=$coin_img?>" />
									</div>
	                            </div>
	                        </div>		
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
    						<h6 class="category text-gray">助けて</h6>
							<h4 class="card-title">通知</h4>
							<p class="card-content">
    							このコインは、任意の時間、場所、または国の任意のプラットフォームで送信することができます。
							</p>
						</div>
					</div>
		    	</div>
	        </div>
	    </div>
	</div>
	<? } ?>