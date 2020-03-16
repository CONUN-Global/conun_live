<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>

<input type="hidden" name="bbs_no" id="bbs_no" value="<?=$item->bbs_no?>" >
<input type="hidden" name="password" id="password" value="<?=$item->password?>" >
<input type="hidden" name="email" id="email" value="<?=$item->email?>" >
<input type="hidden" name="member_id" id="member_id" value="<?=$item->member_id?>" >
<table id="write">
<colgroup></colgroup>
<tbody>

<tr>
	<td class="tit">글 작성자</td>
	<td class="txt"><?=$item->member_id?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">분류</td>
	<td class="txt">
		<select class="input-find" id='category' name='category'>
			<option value='공지사항'>공지사항</option>
			<option value='뉴스'>뉴스</option>
    </select>
	</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">제목</td>
	<td class="txt"><input type="text" name="subject" itemname="subject"  value="<?=@$item->subject?>"></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">내용</td>
	<td class="txt">
		<textarea rows="10" cols="60" name="contents"><?=@$item->contents?></textarea>
	</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>


</tbody>
</table>

<div class="btn"><input type="submit" class="btn_01" value="수정하기" id="btn_submit"></div>

</form>

<iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

<script language="javascript" src="http://www.Ctccoin.net/views/web/admin/js/wrest.js"></script>


<?=$this->load->view('admin/layout/windowFoot')?>