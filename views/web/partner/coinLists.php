<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총전송건수  <?=$total_count?>건 </div>

<div id="util">


    <li style="display:inline"><a href="javascript:multi_del();"><img src="<?=$skin_dir?>/images/icon/del.png"></a></ii>


</div>
<div class="findbox">
<form name='fsearch' method='post' action="/partner/coin/lists">
    <select class="input-find" id='st' name='st'>
    	<option value='event_id'>보낸아이디</option>
    	 
    </select>
    <input class="input-find" type="text" name="sc" value="<?=$search?>">
    <input type="submit" class="btn_find" value="검색">
</form>
</div>

<div id="table">
    <table id="lists" summary="회원 리스트">
        
        <thead>
        <tr>
            <th scope="col"><input type="checkbox" name="all" id="select-all" >번호</th>
            
            <th scope="col">보낸아이디</th>
            <th scope="col">코인종류</th>
            <th scope="col">보낸이름</th>
            <th scope="col">발송주소</th>
            <th scope="col">코인수</th>
            <th scope="col">구분</th>
            
            <th scope="col">전송일</th>

            <? if($level=="10"){?>
                <th scope="col">삭제</th>
            <?}?>
        </tr>
        <tr class="line"></tr>
        </thead>
        <tbody>
        <?
        $i = $total_count;
        foreach ($item as $row) :
            ?>
            <tr class="line"></tr>
            <? if ($i % 2 == 0 ) { ?>
            <tr>
        <? } else {  ?>
            <tr class="on">
        <? } ?>

            <td>
           <input type="checkbox" name="coin_no" value="<?=$row->coin_no?>"> <?=$i?></td>
            <td><span class="bold"><?=$row->member_id?></span></td>
            <td><span class="bold" ><?=$row->type?></span></td>
            <td><span class="bold"  ><?=$row->mem_name?></span> </td>
            <td><span class="bold" style="font-size: 10px"> <?=$row->wallet?></span> </td>
            <td><span class="bold"><?=number_format($row->point,4)?></span></td>


            <td><?=$row->tx_status?></td>
          
            <td><?=$row->regdate?></td>

            <? if($level=="10"){?>
            <td><a href="javascript:Delete('/admin/coin/del', '<?=$row->coin_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
             <?}?>
            </tr>

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



<script>
    function  multi_del(){

        var valuesArray = $('input[name="coin_no"]:checked').map(function () {
            return this.value;
        }).get().join(",");

        if(valuesArray!=""){
            if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                var del = document.del;
                del.idx.value = valuesArray;
                del.action = "/admin/coin/dels";
                del.submit();
            }
        }else{
            alert("선택한 내용이 없습니다.");
        }

    }
	$(function(){
	$('#st').val('<?=$st?>');
	if ($('#st').val() == null) {
	$('#st').find('option:first').attr('selected', 'selected');
	}

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