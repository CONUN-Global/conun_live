<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>

<? if ($lang == "us") { ?>
	<div class="content">
	    <div class="container-fluid">
		    <div class="row">
	            <div class="col-md-8" style="margin-top:20px">
	                <div class="card">
	                    <div class="card-header" style="line-height:12px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:16px; font-weight:bold">Title : <?=$item->title?></p>
	                        <div style="margin-bottom: 15px; border-top: 1px solid rgba(0, 0, 0, 0.1);"></div>
							<p class="category" style="color:#fff; font-size:12px; margin-bottom: 0px !important;">Date : <?=$item->regdate?></p>
	                    </div>
	                    
	                    <div class="card-content">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label"><?=nl2br($item->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
	                        <!--answer -->
							<?
							$i=0;
							foreach($ans as $row) {
								$i += 1; 
							?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating" style="margin-left: 30px;">Answer <?=$i?> : 
										<label class="control-label"><?=nl2br($row->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
							<? } ?>	
	                        
                            <a href="/app/userqna/modify/<?=$item->memo_no?>"><button type="button" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Edit</button></a>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">List</button></a>
                            <div class="clearfix"></div>
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
	            <div class="col-md-8" style="margin-top:20px">
	                <div class="card">
	                    <div class="card-header" style="line-height:12px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:16px; font-weight:bold">제목 : <?=$item->title?></p>
	                        <div style="margin-bottom: 15px; border-top: 1px solid rgba(0, 0, 0, 0.1);"></div>
							<p class="category" style="color:#fff; font-size:12px; margin-bottom: 0px !important;">등록일 : <?=$item->regdate?></p>
	                    </div>
	                    
	                    <div class="card-content">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label"><?=nl2br($item->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
	                        <!--answer -->
							<?
							$i=0;
							foreach($ans as $row) {
								$i += 1; 
							?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating" style="margin-left: 30px;">답변글 <?=$i?> : 
										<label class="control-label"><?=nl2br($row->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
							<? } ?>	
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">리스트</button></a>
                            <div class="clearfix"></div>
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
	            <div class="col-md-8" style="margin-top:20px">
	                <div class="card">
	                    <div class="card-header" style="line-height:12px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:16px; font-weight:bold">Title : <?=$item->title?></p>
	                        <div style="margin-bottom: 15px; border-top: 1px solid rgba(0, 0, 0, 0.1);"></div>
							<p class="category" style="color:#fff; font-size:12px; margin-bottom: 0px !important;">Date : <?=$item->regdate?></p>
	                    </div>
	                    
	                    <div class="card-content">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label"><?=nl2br($item->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
	                        <!--answer -->
							<?
							$i=0;
							foreach($ans as $row) {
								$i += 1; 
							?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating" style="margin-left: 30px;">Answer <?=$i?> : 
										<label class="control-label"><?=nl2br($row->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
							<? } ?>	
                            <a href="/app/userqna/modify/<?=$item->memo_no?>"><button type="button" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Edit</button></a>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">List</button></a>
                            <div class="clearfix"></div>
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
	            <div class="col-md-8" style="margin-top:20px">
	                <div class="card">
	                    <div class="card-header" style="line-height:12px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:16px; font-weight:bold">Title : <?=$item->title?></p>
	                        <div style="margin-bottom: 15px; border-top: 1px solid rgba(0, 0, 0, 0.1);"></div>
							<p class="category" style="color:#fff; font-size:12px; margin-bottom: 0px !important;">Date : <?=$item->regdate?></p>
	                    </div>
	                    
	                    <div class="card-content">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label"><?=nl2br($item->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
	                        <!--answer -->
							<?
							$i=0;
							foreach($ans as $row) {
								$i += 1; 
							?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating" style="margin-left: 30px;">Answer <?=$i?> : 
										<label class="control-label"><?=nl2br($row->memo);?></label>
									</div>
	                            </div>
	                        </div>
	                        <hr>
							<? } ?>	
                            <a href="/app/userqna/modify/<?=$item->memo_no?>"><button type="button" class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Edit</button></a>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">List</button></a>
                            <div class="clearfix"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<? } ?>