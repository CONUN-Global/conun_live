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
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice List</p>
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
						<td><a href="/app/bbs/views/<?=$acc->bbs_no?>"><font color="#000"><?=$acc->subject?></font></a></td>
						<td align="center"><?=$regdate?></td>
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
					<?if ($level == 10  ) {?>
	                <a href="/app/bbs"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Edit</button></a>
					<?}?>
	                <a href="/app"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Dashboard</button></a>
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
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">공지사항</h4>
							<p class="category" style="font-size:14px">관리자님만이 접근 가능합니다.</p>
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
						<td><a href="/app/bbs/views/<?=$acc->bbs_no?>"><font color="#000"><?=$acc->subject?></font></a></td>
						<td align="center"><?=$regdate?></td>						
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
					<?if ($level == 10  ) {?>
	                <a href="/app/bbs"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">글쓰기</button></a>
					<?}?>
	                <a href="/app"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Dashboard</button></a>
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
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice List</p>
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
						<td><a href="/app/bbs/views/<?=$acc->bbs_no?>"><font color="#000"><?=$acc->subject?></font></a></td>
						<td align="center"><?=$regdate?></td>
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
					<?if ($level == 10  ) {?>
	                <a href="/app/bbs"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Edit</button></a>
					<?}?>
	                <a href="/app"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Dashboard</button></a>
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
					<h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Notice</h4>
							<p class="category" style="font-size:14px">Notice List</p>
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
						<td><a href="/app/bbs/views/<?=$acc->bbs_no?>"><font color="#000"><?=$acc->subject?></font></a></td>
						<td align="center"><?=$regdate?></td>
					</tr>
					<? } ?>	
					</tbody>
					</table>
					
					<?if ($level == 10  ) {?>
	                <a href="/app/bbs"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Edit</button></a>
					<?}?>
	                <a href="/app"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">Dashboard</button></a>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<? } ?>