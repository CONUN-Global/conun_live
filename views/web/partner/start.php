
	
		


<div id="boxwrap">
	<div class="box">
		<div class="stats">
			<h2> 코인  정보 </h2>
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

 


