<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총회원수  <?=$total_count?>명 </div>


<div id="util">

	<li style="display:inline"><a href="/admin/member/excel"><img src="<?=$skin_dir?>/images/icon/excel.png"></a></ii>
        <? if($level=="10"){?>
    <li style="display:inline"><a href="javascript:multi_send();"><img src="<?=$skin_dir?>/images/icon/cmd.png"></a></ii>
    <?}?>


</div>


<form name='fsearch' method='post' action="<?=SEARCH_URL?>">
<div class="findbox">
    <select class="input-find" id='st' name='st'>
	<option value='name'>성명</option>
	<option value='member_id'>아이디</option>
	<option value='recommend_id'>추천인아이디</option>
    </select>
    <input class="input-find" type="text" name="sc" value="<?=$search?>">
    <input type="submit" class="btn_find" value="검색">
</div>
</form>



<div id="table">
    <table id="lists" summary="회원 리스트">
    <colgroup>
    <col width="50px" />
    <col width="200px" />
    <col width="100px" />
    <col width="100px" />
    <col width="*" />
    <col width="150px" />
    <col width="100px" />
    <col width="70px" />
    <col width="70px" />
    <col width="70px" />
    <col width="70px" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col"><input type="checkbox" name="all" id="select-all" >번호</th>
        <th scope="col">email</th>
        <th scope="col">account</th>
        <th scope="col">회원이름</th>
        <th scope="col">Lock</th>
        <th scope="col">전자지갑주소</th>
        <th scope="col">가입일</th>

		<th scope="col">코인수</th>
		<th scope="col">관리도구</th>
        <? if($level=="10"){?>
        <th scope="col">코인보내기</th>
		<th scope="col">삭제</th>
        <?}?>
    </tr>
	<tr class="line"></tr>
    </thead>
    <tbody>
    <?
    $i = $total_count;
    foreach ($item as $row) :
		$regdate	=  date("y-m-d",strtotime($row->regdate));
    ?>

	<? if ($i % 2 == 0 ) { ?>
	<tr>	
	<? } else {  ?>
	<tr class="on">
	<? } ?>
    	<td><input type="checkbox" name="coin_ids" value="<?=$row->coin_id?>|<?=$row->member_id?>|<?=$row->name?>"> <?=$i?></td>
        <td><span class="bold"><?=$row->member_id?></span></td>
        <td><span class="bold"><?=$row->coin_id?></span></td>
        <td><?=$row->name?></td>
        <td><span class="bold"><?=100-$row->coin_lock?>%</span></td>
        <td><?=$row->coin_addr?></td>
        <td><?=$regdate?></td>

        <td><?=number_format($row->bal, 4)?></td>

        <td><a href="#" onclick="openLayer('write-<?=$i?>',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/his.png" width="20"></a></td>
        <? if($level=="10"){?>
            <td><a href="#" onclick="openLayer('write2-<?=$i?>',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/bank.png" width="20"></a></td>
        <td><a href="javascript:Delete('/admin/member/delete', '<?=$row->member_id?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
        <?}?>
    </tr>

<!-- 레이어 -->
<script>
        function  multi_send(){
            var valuesArray = $('input[name="coin_ids"]:checked').map(function () {
                return this.value;
            }).get().join(",");
            if(valuesArray!=""){
            $("#users").val(valuesArray);
            $("#coin_send").show();
            $("#frmmulti").submit();
            }else{
                alert("선택한 내용이 없습니다.");
            }
        }

$(function(){
	//On Click Event

  $("#coin_send .close").click(function () {

      $("#coin_send").hide();

  });

  $("#write-<?=$i?> .menu li").click(function() {
		$("#write-<?=$i?> .menu li").removeClass("on"); //Remove any "active" class
		$(this).addClass("on"); //Add "active" class to selected tab

 });

    $('#select-all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });


});



</script>
<div id="write-<?=$i?>" class="layer-popup">
	<a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
	<div id="layer">
		<h2>관리도구</h2>
		<ul class="menu">
			<li class="on"><a href="/admin/member/write/<?=$row->coin_id?>" target="is_layer-<?=$i?>">회원정보</a></li>
			<li><a href="/admin/member/addressList/<?=$row->coin_id?>" target="is_layer-<?=$i?>">지갑주소</a></li>
			<!--<li><a href="/admin/member/exchange/<?=$row->coin_id?>" target="is_layer-<?=$i?>">토큰전송현황</a></li>
			<li><a href="/admin/member/bank/<?=$row->coin_id?>" target="is_layer-<?=$i?>">토큰지급하기</a></li>-->
			<li><a href="/admin/member/coinsend/<?=$row->coin_id?>" target="is_layer-<?=$i?>">코인보내기</a></li>
		</ul>
		
		<iframe src="/admin/member/write/<?=$row->coin_id?>" name="is_layer-<?=$i?>" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
	</div>
</div>
        <div id="write2-<?=$i?>" class="layer-popup">
            <a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
            <div id="layer">
                <h2>관리도구</h2>
                <ul class="menu">
                    <li ><a href="/admin/member/write/<?=$row->coin_id?>" target="is_layer-<?=$i?>">회원정보</a></li>
                    <li><a href="/admin/member/addressList/<?=$row->coin_id?>" target="is_layer-<?=$i?>">지갑주소</a></li>
                    <!--<li><a href="/admin/member/exchange/<?=$row->coin_id?>" target="is_layer-<?=$i?>">토큰전송현황</a></li>
			<li><a href="/admin/member/bank/<?=$row->coin_id?>" target="is_layer-<?=$i?>">토큰지급하기</a></li>-->
                    <li class="on"><a href="/admin/member/coinsend/<?=$row->coin_id?>" target="is_layer-<?=$i?>">코인보내기</a></li>
                </ul>

                <iframe src="/admin/member/coinsend/<?=$row->coin_id?>" name="is_layer-<?=$i?>" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
            </div>
        </div>


    <? if($level=="10"){?>

        <div id="coin_send" class="layer-popup" style="height: 600px">
            <a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
            <div id="layer">
                <h2>코인보내기</h2>
                <iframe src="/admin/member/multicoinsend" name="multi_sender" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
            </div>
        </div>
    <?}?>
<!--//레이어 -->

    <?
    $i--;
    endforeach
    ?>

    </tbody>
    </table>
    <div id="pages">
        <?=PAGE_URL?>
    </div>
</div>




<form action="/admin/member/multicoinsend" id="frmmulti" method="post" target="multi_sender">
    <input type="hidden" name="users" id="users" value="">
    <!-- input elements here -->
</form>
<script>
	$(function(){
	$('#st').val('<?=$st?>');
	if ($('#st').val() == null) {
	$('#st').find('option:first').attr('selected', 'selected');
	}
	});
</script>


<form name='del' method='post'><input type='hidden' name='idx'></form>

<script>
function Delete(url, val)
{
	var del = document.del;

	if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
		del.idx.value 	= val;
		del.action      = url;
		del.submit();
	}
}
</script>
