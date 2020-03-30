<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총매출수  <?=$total_count?>개 </div>


<form name='fsearch' method='post' action="<?=SEARCH_URL?>">
<div class="findbox">
    <select class="input-find" id='st' name='st'>
	<option value='member_id'>아이디</option>
    </select>
    <input class="input-find" type="text" name="sc" value="<?=$search?>">
    <input type="submit" class="btn_find" value="검색">
</div>
</form>


<div id="table">
    <table id="lists" summary="회원 리스트">
    <colgroup>
    <col width="70px" />
    <col width="200px" />
    <col width="*" />
        <col width="200px" />
    <col width="200px" />
    <col width="200px" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">회원아이디</th>
        <th scope="col">전자지갑</th>
        <th scope="col">잔고</th>
        <th scope="col">종류</th>
        <th scope="col">날짜</th>
    </tr>
	<tr class="line"></tr>
    </thead>
    <tbody>
    <?
    $i = $total_count;
    foreach ($item as $row) :
    ?>

<? if ($i % 2 == 0 ) { ?>
<tr>	
<? } else {  ?>
<tr class="on">
<? } ?>

    	<td><?=$i?></td>
        <td><span class="bold"><?=@$row->member_id?></span></td>
        <td><span class="bold"><?=@$row->wallet?></span></td>
        <td><span class="bold"><?=@$row->quntity?></span></td>
        <td><?=@$row->type?></td>
        <td><?=@$row->regdate?></td>
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
		del.idx.value = val;
		del.action         = url;
		del.submit();
	}
}
</script>
