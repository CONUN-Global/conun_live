<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
<input type="hidden" name="member_id" id="coin1_unit" value="<?=$member_id?>">

<table id="write">
<colgroup></colgroup>
<tbody>

 
<tr>
    <td class="tit">회원 이름</td>
    <td class="txt"><?=$name?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">회원 보유코인</td  >
	<td class="txt"><?=number_format($balance, 4)?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">관리자 보유코인</td>
	<td class="txt"><?=number_format($bal, 4)?> <?=$coin;?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">보내는 사람 회원아이디</td>
	<td class="txt"><input type="text" name="Sender" required itemname="Sender" value="admin"></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">보내실 코인수량</td>
    <?  if($coin == "LIT"){?>
	<td class="txt"><input type="text" name="amount" required class="numberformat" itemname="amount" value=""></td>
    <?}else{?>
        <td class="txt"><input type="text" name="amount" required  itemname="amount" value=""></td>
    <?}?>
</tr>
<tr><td colspan="3" class="line"></td></tr></tbody>
</table>
<div class="btn"><input type="submit" class="btn_01" value="코인지급하기" id="btn_submit"></div>
</form>





<?=$this->load->view('admin/layout/windowFoot')?>