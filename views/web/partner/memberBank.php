<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
<input type="hidden" name="coin1_volume" id="coin1_volume" value="<?=$cfg->coin1_volume?>">
<input type="hidden" name="coin1_flgs" id="coin1_volume" value="<?=$cfg->coin1_flgs?>">
<input type="hidden" name="coin1_unit" id="coin1_unit" value="<?=$cfg->coin1_unit?>">
<input type="hidden" name="member_id" id="coin1_unit" value="<?=$member_id?>">


<table id="write">
<colgroup></colgroup>
<tbody>

<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">회원 아이디</td>
	<td class="txt"><?=$member_id?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">이더리움 단가</td>
	<td class="txt"><?=$cfg->coin1_unit?>원</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">토큰 단가</td>
	<td class="txt"><?=$cfg->coin1_volume?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">인센티브</td>
	<td class="txt"><?=$cfg->coin1_flgs?>%</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">토큰수량</td>
	<td class="txt">
		<input type="text" name="amount" required itemname="amount" value="">
	</td>
</tr>

<tr><td colspan="3" class="line"></td></tr>
</table>
<div class="btn"><input type="submit" class="btn_01" value="토큰 즉시 지급하기" id="btn_submit"></div>
</form>


<?=$this->load->view('admin/layout/windowFoot')?>