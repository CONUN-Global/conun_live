<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang'); 
?>
<? if ($lang == "us" ) { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
		<div class="col-md-12" style="margin:20px 0 20px 0;">
			<div class="card" style="box-shadow: 2px 2px 3px #3c3c3c;">
				<div class="card-header" style="background:#3c3c3c; line-height:13px; padding-top:31px">
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Q&A</h4>
					<p class="category" style="color:#fff; font-size:14px">One-to-one inquiry</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
					<col width="70%" />
					<col width="30%" />
					<thead class="text-primary">	                            
					<tr>
						<th style="text-align: left !important;">Title</th>
						<th>Date</th>
					</tr>
					</thead>
					<tbody>
					<? 
					$i=0; 
					foreach($item as $acc) {
						$i += 1; 
						$regdate=date("y-m-d",strtotime($acc->regdate));
					?>
					<tr>						
						<td><a href="/app/userqna/views/<?=$acc->memo_no?>"><font color="#000"><?=$acc->title?></font></a></td>
						<td align="center"><?=$regdate?></td>						
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
                    <div class="clearfix"></div>
	                <a href="/app/userqna"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Upload inquiry</button></a>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<?}else if ($lang == "kr" or $lang == "") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
		<div class="col-md-12" style="margin:20px 0 20px 0;">
			<div class="card" style="box-shadow: 2px 2px 3px #3c3c3c;">
				<div class="card-header" style="background:#3c3c3c; line-height:13px; padding-top:31px">
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Q&A</h4>
					<p class="category" style="color:#fff; font-size:14px">일대일 문의하기</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
					<col width="70%" />
					<col width="30%" />
					<thead class="text-primary">	                            
					<tr>
						<th style="text-align: left !important;">Title</th>
						<th>Date</th>
					</tr>
					</thead>
					<tbody>
					<? 
					$i=0; 
					foreach($item as $acc) {
						$i += 1; 
						$regdate=date("y-m-d",strtotime($acc->regdate));
					?>
					<tr>						
						<td><a href="/app/userqna/views/<?=$acc->memo_no?>"><font color="#000"><?=$acc->title?></font></a></td>
						<td align="center"><?=$regdate?></td>						
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
                    <div class="clearfix"></div>
	                <a href="/app/userqna"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">문의글쓰기</button></a>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?}else if ($lang == "jp") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
		<div class="col-md-12" style="margin:20px 0 20px 0;">
			<div class="card" style="box-shadow: 2px 2px 3px #3c3c3c;">
				<div class="card-header" style="background:#3c3c3c; line-height:13px; padding-top:31px">
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Q&A</h4>
					<p class="category" style="color:#fff; font-size:14px">１：１お問合わせ</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
					<col width="70%" />
					<col width="30%" />
					<thead class="text-primary">	                            
					<tr>
						<th style="text-align: left !important;">タイトル</th>
						<th>日付</th>
					</tr>
					</thead>
					<tbody>
					<? 
					$i=0; 
					foreach($item as $acc) {
						$i += 1; 
						$regdate=date("y-m-d",strtotime($acc->regdate));
					?>
					<tr>						
						<td><a href="/app/userqna/views/<?=$acc->memo_no?>"><font color="#000"><?=$acc->title?></font></a></td>
						<td align="center"><?=$regdate?></td>						
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
                    <div class="clearfix"></div>
	                <a href="/app/userqna"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">お問合わせフォームからのお申し出</button></a>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<?}else if ($lang == "cn") { ?>
<div class="content">
	<div class="container-fluid">
	    <div class="row">
		<div class="col-md-12" style="margin:20px 0 20px 0;">
			<div class="card" style="box-shadow: 2px 2px 3px #3c3c3c;">
				<div class="card-header" style="background:#3c3c3c; line-height:13px; padding-top:31px">
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Q&A</h4>
					<p class="category" style="color:#fff; font-size:14px">1:1咨询</p>
				</div>
				<div class="card-content table-responsive">
					<table class="table">
					<col width="70%" />
					<col width="30%" />
					<thead class="text-primary">	                            
					<tr>
						<th style="text-align: left !important;">题目</th>
						<th>日期</th>
					</tr>
					</thead>
					<tbody>
					<? 
					$i=0; 
					foreach($item as $acc) {
						$i += 1; 
						$regdate=date("y-m-d",strtotime($acc->regdate));
					?>
					<tr>						
						<td><a href="/app/userqna/views/<?=$acc->memo_no?>"><font color="#000"><?=$acc->title?></font></a></td>
						<td align="center"><?=$regdate?></td>						
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
                    <div class="clearfix"></div>
	                <a href="/app/userqna"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">登录咨询内容</button></a>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<? } ?>