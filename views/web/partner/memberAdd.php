<?=$this->load->view('admin/layout/windowHead')?>

<script type="text/javascript" src="http://www.Ctccoin.net/views/web/admin/js/register.js"></script>
<script type="text/javascript" src="http://www.Ctccoin.net/views/web/admin/js/member.js"></script>

<form name="reg_form" action="<?current_url()?>" method="post" onsubmit="return formCheck();">
<input type="hidden" name="type" value="1">
<input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
<input type="hidden" name="sp_id_enabled" id="sp_id_enabled" value="" >
<input type="hidden" name="re_id_enabled" id="re_id_enabled" value="" >
<input type="hidden" name="country" id="country" value="KOR" >
	   
<table id="write">
<colgroup></colgroup>
<tbody>


<tr>
	<td class="tit">회원 아이디</td>
	<td class="txt">
		<input class="form-control input-lg" type="text" name="member_id" STYLE="ime-mode:disabled;" id='member_id' itemname="어카운트 아이디"  required onblur='idcheck();'>
        <div class="reg-error" id='msg_member_id' class="msg"></div>
    </td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">회원 암호</td>
	<td class="txt"><input type="text" name="password" required itemname="암호" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">회원 성명</td>
	<td class="txt"><input type="text" name="member_name" STYLE="ime-mode:active;" required itemname="이름" value=""></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">모바일</td>
	<td class="txt"><input type="text" name="mobile" itemname="모바일"  value=""></td>
</tr>



<tr><td colspan="3" class="line"></td></tr>

</tbody>
</table>


<div class="btn"><input type="submit" class="btn_01" value="등록하기" id="btn_submit"></div>

</form>

<iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

<script language="javascript" src="http://www.kcpcoin.com/views/web/admin/js/wrest.js"></script>


<script type="text/javascript">


function formCheck() 
{
	
	var f = document.reg_form;

    // 회원아이디 검사
      
    idcheck();
    if (document.getElementById('member_id_enabled').value != '000') {
            alert('플랜 어카운트 아이디를 입력하세요');
            document.getElementById('member_id').select();
            return false;
    }
     
      
    recheck();        
 
}
</script>


<?=$this->load->view('admin/layout/windowFoot')?>