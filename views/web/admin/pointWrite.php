<?=$this->load->view('admin/layout/windowHead')?>
<? echo form_open_multipart(uri_string()); ?>
<input type="hidden" name="hidden" value="1">
<input type="hidden" name="point_no" value="<?=$item->point_no?>">
<style>
	.line {color: #333}
</style>

<table id="write">
<colgroup>
</colgroup>
<tbody>
<tr>
	<td class="tit">주문코드</td>
	<td class="txt"><input type="text" name="order_code" required itemname="order_code"  value="<?=$item->order_code?>"></td>
</tr>
<tr>
	<td class="tit">회원 아이디</td>
	<td class="txt"><input type="text" name="member_id" required itemname="회원아이디"  value="<?=$item->member_id?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">이벤트 아이디</td>
	<td class="txt"><input type="text" name="event_id" required itemname="회원아이디"  value="<?=$item->event_id?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">지급포인트</td>
	<td class="txt"><input type="text" name="point" required itemname="지급포인트"  value="<?=$item->point?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">수수료(차감)</td>
	<td class="txt"><input type="text" name="fee" required itemname="수수료(차감)"  value="<?=$item->fee?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">합계</td>
	<td class="txt"><input type="text" name="saved_point" required itemname="합계"  value="<?=$item->saved_point?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">수당구분</td>
	<td class="txt">
		<select name="kind" id="kind" class="form-control input-lg" required itemname="지급상태">
            <option value='first' <?if($item->kind == 'first'){?>selected<?}?>>첫번째 기부금</option>
            <option value='second'  <?if($item->kind == 'second'){?>selected<?}?>>두번째 기부금</option>
            <option value='lv1'  <?if($item->kind == 'lv1'){?>selected<?}?>>특약점</option>
            <option value='lv2'  <?if($item->kind == 'lv2'){?>selected<?}?>>대리점</option>
            <option value='lv3'  <?if($item->kind == 'lv3'){?>selected<?}?>>총판</option>
            <option value='lv4'  <?if($item->kind == 'lv4'){?>selected<?}?>>조합장</option>
            <option value='center'  <?if($item->kind == 'center'){?>selected<?}?>>센터비</option>
            <option value='recommend'  <?if($item->kind == 'recommend'){?>selected<?}?>>추천비</option>
        </select>
	</td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">지급상태</td>
	<td class="txt">
		<select name="type" id="type" class="form-control input-lg" required itemname="지급상태">
            <option value='payment' <?if($item->type == 'payment'){?>selected<?}?>>지급</option>
            <option value='hold'  <?if($item->type == 'hold'){?>selected<?}?>>보류</option>
            <option value='complete'  <?if($item->type == 'complete'){?>selected<?}?>>완료</option>
        </select>
	</td>
</tr>
<tr><td colspan="2" class="line"></td></tr>

<tr>
	<td class="tit">메시지</td>
	<td class="txt"><input type="text" name="msg" required itemname="메시지"  value="<?=$item->msg?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">날짜</td>
	<td class="txt"><input type="text" name="regdate" required itemname="합계"  value="<?=$item->regdate?>"></td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
<tr>
	<td class="tit">지급구분</td>
	<td class="txt">
		<?if($item->fee > 0){
			echo "차감";
		}
		else{
			echo "지급";			
		}?>
	</td>
</tr>
<tr><td colspan="2" class="line"></td></tr>
</tbody>
</table>

<div class="btn"><input type="submit" class="btn_01" value="저장하기" tabindex="3"></div>

</form>

<?=$this->load->view('admin/layout/windowFoot')?>
