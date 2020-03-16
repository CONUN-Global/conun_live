<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>
<style>
	.form-control, .dataTables_filter input{margin:0 15px !important;width:calc(100% - 30px) !important;}
</style>
<? if ($lang == "us") { ?>
<div class="content">
	    <div class="container-fluid">
		    <div class="row">
	            <div class="col-md-8" style="margin-top:20px">
	                <div class="card">
	                    <div class="card-header" style="line-height:15px; padding-top:30px; background:#3c3c3c; color:#fff;background: #333333;background: -webkit-linear-gradient(to left, #dd1818, #333333);background: linear-gradient(to left, #dd1818, #333333);">
	                        <h4 class="title" style="font-size:18px; font-weight:bold">Contact us</h4>
							<p class="category" style="font-size:14px">If you have any question, Please feel free to contact us.</p>
	                    </div>
	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Title</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Content</label>
										<textarea class="form-control" rows="4" name="memo" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:15px">Upload inquiry</button>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:15px;background: #333333;background: -webkit-linear-gradient(to left, #dd1818, #333333);background: linear-gradient(to left, #dd1818, #333333);">View the list</button></a>
                            <div class="clearfix" style='margin-bottom:20px;'></div>
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
	                    <div class="card-header" style="line-height:15px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:18px; font-weight:bold">문의하기</h4>
							<p class="category" style="font-size:14px">궁금하신 점이 있으시면 언제든지 문의하여 주세요</p>
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
										<textarea class="form-control" rows="4" name="memo" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">문의글등록</button>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">리스트보기</button></a>
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
	                    <div class="card-header" style="line-height:15px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:18px; font-weight:bold">お問い合わせ</h4>
							<p class="category" style="font-size:14px">お気になる点がございましたら、いつでも気軽にお問い合わせしてください。</p>
	                    </div>
	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">タイトル</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">内容</label>
										<textarea class="form-control" rows="4" name="memo" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">お問合わせフォームからのお申し出</button>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">リスト表示</button></a>
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
	                    <div class="card-header" style="line-height:15px; padding-top:30px; background:#3c3c3c; color:#fff">
	                        <h4 class="title" style="font-size:18px; font-weight:bold">咨询</h4>
							<p class="category" style="font-size:14px">若有疑问，请随时咨询。</p>
	                    </div>
	                    
	                    <div class="card-content">
	                        <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formChkec(this);">
							<input type="hidden" name="email" class="form-control" value="<?=$email?>"  readonly required>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">题目</label>
										<input type="text" name="title" class="form-control" value="" required>
									</div>
	                            </div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">内容</label>
										<textarea class="form-control" rows="4" name="memo" required></textarea>
									</div>
	                            </div>
	                        </div>	      
                            <button type="submit" onclick=”this.disabled=true” class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">登录咨询内容</button>
	                        <a href="/app/userqna/lists"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">查询列表</button></a>
                            <div class="clearfix"></div>
                            </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


<? } ?>