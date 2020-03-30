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
    <col width="150" />
    <col width="*" />
    <col width="80" />
    <col width="120" />
    <col width="120" />
    <col width="80" /> 
    
    <col width="90" />       
    <col width="150" />
    <col width="70" />
    <col width="70" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">아이디</th>
        <th scope="col">이더리움주소</th>
        <th scope="col">보낸 코인수</th>
        <th scope="col">이더리움시세</th>
        <th scope="col">예상지급토큰수</th>
        <th scope="col">인센티브</th>
        
        <th scope="col">등록일</th>
        <th scope="col">상태</th>
        <th scope="col">삭제</th>
    </tr>
	<tr class="line"></tr>
    </thead>
    <tbody>
    <?
    $i = $total_count;
    foreach ($item as $row) :
    
		$regdate	=  date("y-m-d",strtotime($row->regdate));
		$token_coin = $cfg->coin1_unit * $row->point / $cfg->coin1_volume;
    
    ?>
	<tr class="line"></tr>
	<? if ($i % 2 == 0 ) { ?>
	<tr>	
	<? } else {  ?>
	<tr class="on">
	<? } ?>

    <td>
        <?=$i?></th>
        <td><span class="bold"><?=$row->member_id?></span></td>
        <td><?=$row->member_addr?></td>
        <td><span class="bold"><?=number_format($row->point)?></span></td>
        <td><span class="bold"><?=number_format($cfg->coin1_unit)?></span></td>
        <td><span class="bold"><?=number_format($token_coin)?></span></td>
        <td><span class="bold"><?=number_format($cfg->coin1_flgs)?></span></td>
        
        <td><?=$regdate?></td>        
        <td>
	        <?
		    if($row->type == 'Request'){
		    ?>
        	<a href="javascript:Ok('/admin/point/bankOk', '<?=$row->point_no?>','0');"><font color="red"><?=$row->type?></font></a> / 
        	<a href="javascript:Ok('/admin/point/bankOk', '<?=$row->point_no?>','<?=$cfg->coin1_flgs?>');"><font color="green">Add</font></a>
        	<?}else{?>
        	<font color="blue"><?=$row->type?></font>
		    <?}?>
        </td>
		<td><a href="javascript:Delete('/admin/point/pdelete','<?=$row->point_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
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


<form name='add' method='post'>
<input type='hidden' name='idx'>
<input type='hidden' name='kind'>
</form>

<script>
function Ok(url, val, kind)
{
	var ok = document.add;

	if(confirm("입금금액을 승인하시겠습니까?")) {
		ok.idx.value 	= val;
		ok.kind.value 	= kind;
		ok.action      	= url;
		ok.submit();
	}
}
</script>
