<link rel="stylesheet" type="text/css" href="http://cereipay.com/views/web/admin/css/form.css?2016022205">
<div  style="background-color: #fff; width: 1000px; height: 700px;">
<div id="layer" style="padding-top: 30px;"><h2>환경 설정</h2></div>
	
	
<form name="reg_form" action="<?current_url()?>" method="post">
<input type="hidden" name="cfg_no" required value="<?=@$item->cfg_no?>">
<input type="hidden" name="b_address" required value="<?=@$item->change_name?>">

<table id="write" style="width: 98%; margin-left: 10px;">
<tbody>
<tr>
	<td class="tit" style="width: 100%;">
		<table id="write">
		<tbody>
		<tr class="on">
			<td class="tit" style="width: 25%;">코인1 이름</td>
			<td class="tit" style="width: 25%;">심볼약자</td>
			<td class="tit" style="width: 30%;">총발행수량</td>
			<td class="tit" style="width: 20%;">토큰가격</td>
		</tr>
		<tr>
			<td class="tit" style="width: 25%;"><input type="text" name="coin1_name" value="<?=@$item->coin1_name?>" style="width: 90%;" ></td>
			<td class="tit" style="width: 25%;"><input type="text" name="coin1_symbol" value="<?=@$item->coin1_symbol?>" style="width: 90%;" ></td>
			<td class="tit" style="width: 30%;"><input type="text" name="coin1_total"  value="<?=@$item->coin1_total?>" style="width: 90%;" ></td>
			<td class="tit" style="width: 20%;"><input type="text" name="coin1_volume" value="<?=@$item->coin1_volume?>" style="width: 90%;" ></td>
		</tr>
		<tr><td colspan="4" class="line">&nbsp;</td></tr>
		</tbody>
		</table>		
	</td>
</tr>

<tr>
	<td class="tit" style="width: 100%;">
		<table id="write">
		<tbody>
		<tr class="on">
			<td class="tit" style="width: 40%;">이더리움가격</td>
			<td class="tit" style="width: 30%;">이더리움주소</td>
			<td class="tit" style="width: 20%; text-align: left">추가인센티브</td>
		</tr>
		<tr>
			<td class="tit" style="width: 40%;">
				<input type="text" name="coin1_state" value="<?=@$item->coin1_state?>" style="width: 36%;" >
				=>
				<input type="text" name="coin1_unit" value="<?=@$item->coin1_unit?>" style="width: 49%;" >
			</td>
			<td class="tit" style="width: 30%;"><input type="text" name="change_name" value="<?=@$item->change_name?>" style="width: 70%;" ></td>
			<td class="tit" style="width: 20%; text-align: left"><input type="text" name="coin1_flgs" value="<?=@$item->coin1_flgs?>" style="width: 70%;" ></td>
		</tr>
		<tr><td colspan="4" class="line">&nbsp;</td></tr>
		</tbody>
		</table>		
	</td>
</tr>
</tbody>
</table>


<table id="write" style="width: 100%">
<tbody>
<tr><td colspan="4" class="line"></td></tr>
<tr><td colspan="4" class="line">* 총 발행수량이 0이면 무한대 발행으로 설정됩니다. 상대가격을 기준으로 코인이 거래됩니다 <br>* 추가 인센티브에 99이하의 숫자를 넣으시면 레븐코인 토큰을 추가로 % 지급이 됩니다. </td></tr>
</tbody>
</table>

<div style="padding-left: 30px; padding-top: 30px;">
	<input type="submit" class="btn_01" value="코인설정하기" id="btn_submit">
	<!--<a href="/admin/config/su"><input type="button" class="btn_01" value="인센티브설정하기"></a>-->
</div>

</form>
</div>
