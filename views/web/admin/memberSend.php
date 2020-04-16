<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
<input type="hidden" name="member_id" id="coin1_unit" value="<?=$member_id?>">

<table id="write">
<colgroup></colgroup>
<tbody>

<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">회원 이름</td>
	<td class="txt"><?=$name?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">보내는 사람 회원아이디</td>
	<td class="txt"><input type="text" name="receive" required itemname="receive" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">보내실 토큰수량</td>
	<td class="txt"><input type="text" name="amount" required itemname="amount" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr></tbody>
</table>


<? if($_SESSION['level']=="10"){?>
    <div class="btn"><input type="submit" class="btn_01" value="코인지급하기" id="btn_submit"></div>
<?}?>


</form>


<?=$this->load->view('admin/layout/windowFoot')?>