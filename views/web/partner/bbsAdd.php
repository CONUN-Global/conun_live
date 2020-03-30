<?=$this->load->view('admin/layout/windowHead')?>


<form name="reg_form" action="<?current_url()?>" method="post" onsubmit="return formCheck();">
<input type="hidden" name="country" id="country" value="KOR" >
	   
<table id="write">
<colgroup></colgroup>
<tbody>

<tr>
	<td class="tit">회원 아이디</td>
	<td class="txt">
		<input class="form-control input-lg" type="text" name="member_id" id='member_id' value="<?=$member_id?>" itemname="아이디"  required >
    </td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<!--
<tr>
	<td class="tit">회원 암호</td>
	<td class="txt"><input type="text" name="password" required itemname="암호" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
-->

<tr>
	<td class="tit">글 작성자</td>
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
	<td class="txt"><input type="text" name="subject" STYLE="ime-mode:active;" required itemname="제목" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">내용</td>
	<td class="txt" style="padding-top: 10px;">
		<textarea rows="10" cols="60" name="contents"></textarea>		
	</td>
</tr>

<tr><td colspan="3" class="line"></td></tr>

</tbody>
</table>


<div class="btn"><input type="submit" class="btn_01" value="등록하기" id="btn_submit"></div>

</form>

<iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

<script language="javascript" src="http://www.Ctccoin.net/views/web/admin/js/wrest.js"></script>


<?=$this->load->view('admin/layout/windowFoot')?>