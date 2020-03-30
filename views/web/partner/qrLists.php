<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총건수  <?=$total_count?>건 </div>


<div id="util">


    <li><a href="#" onclick="selectPrint('big');return false;"> 프린트</a></ii>
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
		<h2>등록하기</h2>
		<div class="line-width"></div>
		<iframe src="/partner/qr/add" name="is_layer" width="500" height="650" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
	</div>
</div>
<!--//ADD 레이어 -->

<div id="table">
    <table id="lists" summary="회원 리스트">
    <colgroup>
    <col width="50" />
    <col width="80" />
    <col width="100" />
    <col width="*" />
    <col width="70" />
    <col width="70" />
    <col width="70" />
    </colgroup>
    <thead>
    <tr>
        <th scope="col"><input type="checkbox" name="all" id="select-all" >번호</th>
        <th scope="col">결제금액</th>
        <th scope="col">결제종류</th>  
        <th scope="col">메모</th>
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

    <td> <input type="checkbox" name="qr_no" value="<?=$row->qr_no?>"> <?=$i?></td>
        <td><span class="bold"><?=$row->qr_amount?></span></td>
        <td><?=$row->qr_type?></td>  
        <td><?=$row->qr_memo?></td>
        <td><?=$regdate?></td> 
        <td><a href="#" onclick="openLayer('write-<?=$i?>',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/his.png" width="20"></a></td>
		<td><a href="javascript:Delete('/partner/qr/qrdelete','<?=$row->qr_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
    </tr>

<!-- 레이어 -->
<script>
$(function(){
	//On Click Event
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
			<li class="on"><a href="/partner/qr/qrWrite/<?=$row->qr_no?>" target="is_layer-<?=$i?>">QR 상세보기</a></li>
		</ul>
		
		<iframe src="/partner/qr/qrWrite/<?=$row->qr_no?>" name="is_layer-<?=$i?>" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
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


<form name='del' method='post' >
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

function  selectPrint(mode) {
    var print_img="";

        $('input:checkbox[name="qr_no"]').each(function() {



            if(this.checked){//checked 처리된 항목의 값

                 if(print_img==""){

                     print_img = "https://wallet.conun.io/data/qr/"+this.value+"_"+mode+".png";
                 }else{
                     print_img = print_img+",https://wallet.conun.io/data/qr/"+this.value+"_"+mode+".png";
                 }



            }

        });

    var jbSplit = print_img.split(',');

    printJS({
        printable: jbSplit,
        type: 'image',
        header: 'QR 리스트',
        imageStyle:  'float: left;padding: 0 0 10px;'
    })




}
</script>
