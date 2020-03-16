<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총건수  <?=$total_count?>건 </div>


<div id="util">
	<li><a href="#" onclick="openLayer('add',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/add.png"></a></ii>
</div>


<form name='fsearch' method='post' action="<?=SEARCH_URL?>">
<div class="findbox">
    <select class="input-find" id='st' name='st'>
    	<option value='member_id'>작성자아이디</option>
    </select>
    <input class="input-find" type="text" name="sc" value="<?=$search?>">
    <input type="submit" class="btn_find" value="검색">
</div>
</form>

<!--//ADD 레이어 -->
<div id="add" class="layer-popup">
	<a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
	<div id="layer">
		<h2>공지사항 등록하기</h2>
		<div class="line-width"></div>
		<iframe src="/admin/bbs/add" name="is_layer" width="500" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
	</div>
</div>
<!--//ADD 레이어 -->

<div id="table">
    <table id="lists" summary="회원 리스트">
    <colgroup>
    <col width="50" />
    <col width="80" />
    <col width="*" />   
    <col width="150" />
    <col width="70" />
    <col width="70" />
    <col width="70" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col">번호</th>
        <th scope="col">이름</th>
        <th scope="col">제목</th>  
        <th scope="col">조회수</th>       
        <th scope="col">등록일</th>
		<th scope="col">관리도구</th>
        <th scope="col">삭제</th>
    </tr>
	<tr class="line"></tr>
    </thead>
    <tbody>
    <?
    $i = $total_count;
    foreach ($item as $row) :
    
		$regdate	=  date("y-m-d",strtotime($row->regdate));
    
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
        <td><?=$row->subject?></td>  
        <td><?=$row->hit?></td>       
        <td><?=$regdate?></td> 
        <td><a href="#" onclick="openLayer('write-<?=$i?>',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/his.png" width="20"></a></td>
		<td><a href="javascript:Delete('/admin/bbs/noticedelete','<?=$row->bbs_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
    </tr>

<!-- 레이어 -->
<script>
$(function(){
	//On Click Event
	$("#write-<?=$i?> .menu li").click(function() {
		$("#write-<?=$i?> .menu li").removeClass("on"); //Remove any "active" class
		$(this).addClass("on"); //Add "active" class to selected tab

	});

});
</script>
<div id="write-<?=$i?>" class="layer-popup">
	<a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
	<div id="layer">
		<h2>관리도구</h2>
		<ul class="menu">
			<li class="on"><a href="/admin/bbs/noticeWrite/<?=$row->bbs_no?>" target="is_layer-<?=$i?>">공지사항 내용수정</a></li>
		</ul>
		
		<iframe src="/admin/bbs/noticeWrite/<?=$row->bbs_no?>" name="is_layer-<?=$i?>" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
	</div>
</div>
<!--//레이어 -->
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
