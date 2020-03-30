<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총건수  <?=$total_count?>건 </div>

<form name='fsearch' method='post' action="<?=SEARCH_URL?>">
<div class="findbox">
    <select class="input-find" id='st' name='st'>
    	<option value='member_id'>회원아이디</option>
    </select>
    <input class="input-find" type="text" name="sc" value="<?=$search?>">
    <input type="submit" class="btn_find" value="검색">
</div>
</form>

<div id="table">
    <table id="lists" summary="회원 리스트">
    <colgroup>
    <col width="50" />
    <col width="80" />
    <col width="150" />
    <col width="150" />   
    <col width="150" />
    <col width="70" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">이름</th>
        <th scope="col">이메일</th>
        <th scope="col">내용</th>        
        <th scope="col">등록일</th>
        <th scope="col">삭제</th>
    </tr>
	<tr class="line"></tr>
    </thead>
    <tbody>
    <?
    $i = $total_count;
    foreach ($item as $row) :
    
		//$regdate	=  date("y-m-d",strtotime($row->regdate));
		$regdate	=  $row->regdate;
		if (strlen($row->memo) > 20)
			$content = substr($row->memo, 0, 30)."...";
		else
			$content = $row->memo;
    ?>
	<tr class="line"></tr>
	<? if ($i % 2 == 0 ) { ?>
	<tr>	
	<? } else {  ?>
	<tr class="on">
	<? } ?>
		<td><?=$i?></td>
        <td><span class="bold"><?=$row->name?></span></td>
        <td><?=$row->email?></td>
        <td><?=$content?></td>        
        <td><?=$regdate?></td> 
		<td><a href="javascript:Delete('/admin/bbs/mdelete','<?=$row->memo_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
    </tr>

    <?
    	$i--;
    endforeach
    ?>


    </tbody>
    </table>
</div>


<div id="pages">
    <?=PAGE_URL?>
</div>

<script>
	$(function(){
	$('#st').val('<?=$st?>');
	if ($('#st').val() == null) {
	$('#st').find('option:first').attr('selected', 'selected');
	}
	});
</script>


<form name='del' method='post'>
<input type='hidden' name='idx'>
</form>

<script>
function Delete(url, val)
{
	var del = document.del;

	if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
		del.idx.value 		= val;
		del.action         	= url;
		del.submit();
	}
}
</script>
