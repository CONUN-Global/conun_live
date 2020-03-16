<div id="boxwrap">
	<div class="box">
		<div class="stats">
			<h2> 기본 정보 </h2>
			<div class="line-width"></div>
			<div class="tit"> 가입된 회원수 </div>
			<div class="txt"> <?=$member_total?> 명 </div>
			<div style="clear: both"></div>
		</div>
	</div>
</div>
	
		


<div id="boxwrap">
	<div class="box">
		<div class="stats">
			<h2> 마스터  정보 </h2>
			<div class="line-width"></div>			

            <? foreach($bal_list as $item){?>
			<div class="tit"> <?=$item['COIN_NAME'];?> </div>

			<div class="txt"> <?=$item['BALANCE'];?> <?=$item['COIN_SHORT'];?></div>
			<div style="clear: both"></div>
            <?}?>

		</div>
		<br><br>
	</div>
</div>

 



<div id="boxwrap">
	<div class="box">
		<div class="stats">
			<h2> 바로가기 </h2>
			<div class="line-width"></div>
			
			<div class="tit"> <a href="/admin/member/lists">회원관리</a></div>
			<div class="txt"> </div>
			<div style="clear: both"></div>
			
			<div class="tit"> <a href="/admin/coin/lists"> 토큰관리</a></div>
			<div class="txt"> </div>
			<div style="clear: both"></div>
			
			 
		</div>
	</div>
</div>