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
	                        <h4 class="title" style="font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice Write</p>
	                    </div>	                    
	                    <div class="card-content">
	                        <form name="reg" action="" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Title</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Contents</label>
										<textarea class="form-control" rows="4" name="contents" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Send</button>
	                        <a href="/app/bbs/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">View</button></a>
                            <div class="clearfix"></div>
                            </form>
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
	                        <h4 class="title" style="font-size:18px; font-weight:bold">공지사항</h4>
							<p class="category" style="font-size:14px">관리자님만이 접근 가능합니다.</p>
	                    </div>	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">제목</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">내용</label>
										<textarea class="form-control" rows="4" name="contents" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">글등록</button>
	                        <a href="/app/bbs/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">공지사항 글보기</button></a>
                            <div class="clearfix"></div>
                            </form>
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
	                        <h4 class="title" style="font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice Write</p>
	                    </div>	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Title</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Contents</label>
										<textarea class="form-control" rows="4" name="contents" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Send</button>
	                        <a href="/app/bbs/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">View</button></a>
                            <div class="clearfix"></div>
                            </form>
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
	                        <h4 class="title" style="font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice Write</p>
	                    </div>	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Title</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Contents</label>
										<textarea class="form-control" rows="4" name="contents" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; float:left; margin-left:3%">Send</button>
	                        <a href="/app/bbs/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">View</button></a>
                            <div class="clearfix"></div>
                            </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<? } ?>