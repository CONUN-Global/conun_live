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
                        <h4 class="title">?????? ?????????</h4>
						<p class="category">????????? ?????? ????????? ?????? ?????????.</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">?????? : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">??????????????? ?????? ??????</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">????????? ??????</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">?????? ?????????</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>?????????</label>
									<div class="form-group label-floating">
										<label class="control-label"> ????????? ?????? ????????? ?????? ????????? ????????? ??? ????????? ????????????.</label>
						    		</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">?????? ??????</button>
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
   						<h6 class="category text-gray">?????? ?????????</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							?????? ????????? ??????,??????,????????? ???????????? ??????, ?????? ??????????????? ????????? ?????? ?????????.
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
        alert("????????? ?????? ?????? ????????? ???????????????");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("?????? ?????? ????????? ???????????????");
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
                        <h4 class="title">??????</h4>
						<p class="category">Send Coin</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">?????? : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">????????????</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">??????</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">??????</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                       	</div>
                       	<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>???</label>
									<div class="form-group label-floating">
								    	<label class="control-label"> ??????.</label>
							    	</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">??????</button>
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
   						<h6 class="category text-gray">??????</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							???????????????????????????????????????????????????????????????????????????????????????
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
        alert("????????????");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("?????????");
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
                        <h4 class="title">?????????????????????</h4>
						<p class="category">????????????????????????????????????????????????</p>
                    </div>
	                    
                    <div class="card-content">
                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                        <div class="row">
							<div class="col-md-12">
								<h4 class="title">???????????? : <?=$bal?><small> <?=$conf['coinSymbol']?></small></h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label">??????????????????????????????</label>
									<input type="text" name="send_id" class="form-control" value="" >
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">???????????????</label>
									<input type="text" name="count" class="form-control" >
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">?????????????????????</label>
									<input type="text" class="form-control " disabled value="0.01 <?=$conf['coinSymbol']?>">
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>?????????</label>
									<div class="form-group label-floating">
										<label class="control-label"> ???????????????????????????????????????????????????????????????????????????????????????????????????</label>
						    		</div>
                                </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">????????????</button>
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
   						<h6 class="category text-gray">??????</h6>
   						<h4 class="card-title">Notice</h4>
   						<p class="card-content">
   							????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
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
        alert("?????????????????????????????????????????????????????????");
        frm.send_id.focus();
        return false;
    }
    if (frm.count.value == "") {
        alert("??????????????????????????????????????????????????????");
        frm.count.focus();
        return false;
    }
    return true;
}
</script>
<? } ?>
 