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
    <col width="50px" />
    <col width="70px" />
    <col width="100px" />
    <col width="*" />
    <col width="100px" />
    <col width="100px" />
    <col width="180px" />
    <col width="70px" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">코인이름</th>
        <th scope="col">받은회원</th>
        <th scope="col">받은주소</th>
        <th scope="col">받은수량</th>
        <th scope="col">보낸사람</th>
        <th scope="col">날짜</th>
		<th scope="col">삭제</th>
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
        <td><?=@$row->coin_name?></td>
        <td><span class="bold"><?=@$row->account_id?></span></td>
        <td><?=@$row->account_address?></td>
        <td><?=@$row->point?></td>
        <td><span class="bold"><?=@$row-> event_id?></span></td>
        <td><?=@$row->regdate?></td>
        <td><a href="javascript:Delete('/admin/coin/del', '<?=@$row->coin_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
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
