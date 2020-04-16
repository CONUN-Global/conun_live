<ul class="topbox">
	<li class="homes"><a href="/">메인지갑 </a></</li>
	<li><a href="/member/login/out">로그아웃</a></li>
</ul>

<div class="line-width"></div>

<? if ($group == "회원관리" ) { ?>
<div id="side_tit">
	<h3 style="margin-left:10px">회원관리</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>

<div id="side_menu">
	<ul class="side_menu">
		<li><a href="<?=MEMBER_LIST?>">회원 현황</a></li>
	</ul>
</div>

<? } else if ($group == "코인관리" ) { ?>
<div id="side_tit">
	<h3 style="margin-left:10px">계정 관리</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>

	<div id="side_menu">
	<ul class="side_menu">
        <!--<li><a href="/admin/coin/vaddr">관리자전자지갑</a></li>-->
		<li><a href="/admin/coin/addr">전자지갑주소록</a></li>
		<li><a href="/admin/coin/lists">코인전송현황</a></li>
        <li><a href="/admin/new_coin/payment_list">결제현황</a></li>
        <li><a href="/admin/new_coin/exchange_list">전환현황</a></li>
        <li><a href="/admin/new_coin/payment_day">일별결제현황</a></li>
        <li><a href="/admin/new_coin/payment_month">월별결제현황</a></li>
        <li><a href="/admin/new_coin/payment_year">연별결제현황</a></li>
	</ul>
</div>

<? } else if ($group == "마감관리" ) { ?>
<div id="side_tit">
	<h3 style="margin-left:10px">마감 관리</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>

<div id="side_menu">
	<ul class="side_menu">
		
	</ul>
</div>

<? } else if ($group == "포인트관리" ) { ?>
	<!--
<div id="side_tit">
	<h3 style="margin-left:10px">이더리움관리</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>
-->
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/point/lists">입금관리</a></li>
		<li><a href="/admin/coin/lists">코인이체관리</a></li>
	</ul>
</div>


<? } else if ($group == "환경설정" ) { ?>
<div id="side_tit">
	<h3 style="margin-left:10px">대시보드</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>
<!--
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/config">환경설정</a></li>
	</ul>
</div>

<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/bbs/memoLists">메일문의</a></li>
	</ul>
</div>
-->
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/bbs/noticeLists">공지사항</a></li>
	</ul>
</div>

<?}else{?>
<div id="side_tit">
	<h3 style="margin-left:10px">대시보드</h3>
	<img src="<?=$skin_dir?>/images/side_tit_line.gif">
</div>
<!--
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/config">환경설정</a></li>
	</ul>
</div>-->
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/bbs/memoLists">메일문의</a></li>
	</ul>
</div>
<div id="side_menu">
	<ul class="side_menu">
		<li><a href="/admin/bbs/noticeLists">공지사항</a></li>
	</ul>
</div>

<? } ?>
