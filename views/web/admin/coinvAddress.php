<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총지갑수  <?=$total_count?>개 </div>
<div id="util" style="width: 200px">


        <? if($level=="10"){?>
            <li style="display:inline"><a href="javascript:multi_send2();">전송  </a></ii>
            <li style="display:inline"><a href="javascript:multi_send();">LIT  </a></ii>
            <li style="display:inline"><a href="javascript:multi_send_ETH();">ETH  </a></ii>
        <?}?>


</div>

<form name='fsearch' method='post' action="/admin/coin/make_vaddr">
    <div class="findbox">
        지갑생성:
        <input class="input-find" type="number" name="wallet_count" placeholder="최대 500개 가능" value="" style="width: 120px">
        <input type="submit" class="btn_find" value="생성">
    </div>
</form>
<form name="fsearch2" method="post" action="/admin/coin/vaddr">
    <div class="findbox">
        <label>수량 체크</label>

        <input type="hidden" name="st" id="st" value="v_coin">
        <select class="input-find" id="sc" name="sc">
            <option value="" >전체</option>
            <option value="Y"  <?if($v_coin=="Y"){?>selected<?}?>  >사용</option>
            <option value="N"  <?if($v_coin=="N"){?>selected<?}?>>미사용</option>
        </select>

        <input type="submit" class="btn_find" value="검색">
    </div>
</form>



<div id="table">
    <table id="lists" summary="회원 리스트">
        <colgroup>
            <col width="70px" />
            <col width="200px" />
            <col width="*" />
            <col width="100px" />
            <col width="200px" />
            <col width="100px" />
            <col width="100px" />
        </colgroup>
        <thead>
        <tr>
            <th scope="col"><input type="checkbox" name="all" id="select-all" >번호</th>


            <th scope="col">전자지갑</th>
            <th scope="col">LIT 잔고</th>
            <th scope="col">ETH 잔고</th>
            <th scope="col">날짜</th>
            <th scope="col">관리도구</th>
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

            <? if ($i % 2 == 0 ) { ?>
            <tr>
        <? } else {  ?>
            <tr class="on">
        <? } ?>
            <td><input type="checkbox" name="coin_ids" id="coin_ids"  value="<?=$row->wallet_no?>|<?=$row->wallet?>"> <?=$i?></td>


            <td><span class="bold" style="font-size: 10px;"><?=@$row->wallet?></span></td>
            <td><span class="bold" style="font-size: 9px;"><?=number_format($row->quntity, 4)?></span></td>
            <td><span class="bold" style="font-size: 9px;"><?=number_format($row->eth_quntity, 4)?></span></td>
            <td><?=@$row->regdate?></td>
            <td><a href="#" onclick="openLayer('write-<?=$i?>',{top:50,right:0});return false;"><img src="<?=$skin_dir?>/images/icon/his.png" width="20"></a></td>
            <? if($level=="10"){?>

            <td><a href="javascript:Delete('/admin/coin/delete', '<?=$row->wallet_no?>');"><img src="<?=$skin_dir?>/images/icon/del.png" width="20"></a></td>
            <?}?>

            </tr>
          

            <div id="write-<?=$i?>" class="layer-popup">
                <a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
                <div id="layer">
                    <h2>관리도구</h2>
                    <iframe src="/admin/coin/vcoinsend/<?=$row->wallet_no?>" name="is_layer-<?=$i?>" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
                </div>
            </div>

            <?
            $i--;
        endforeach
        ?>
        <tr>
           <Td colspan="7">
               <div id="pages">
                   <?=PAGE_URL?>
               </div>

           </Td>
        </tr>

        </tbody>
    </table>
</div>



<!-- 레이어 -->
<script>
    function  multi_send(){
        var valuesArray = $('input[name="coin_ids"]:checked').map(function () {
            return this.value;
        }).get().join(",");
        if(valuesArray!=""){
            $("#users").val(valuesArray);
            $("#coin").val("LIT");
            $("#coin_send").show();

            $("#frmmulti").submit();
        }else{
            alert("선택한 내용이 없습니다.");
        }
    }
    function  multi_send2(){
        var valuesArray = $('input[name="coin_ids"]:checked').map(function () {
            return this.value;
        }).get().join(",");
        if(valuesArray!=""){
            $("#users2").val(valuesArray);
            $("#coin2").val("LIT");
            $("#coin_send").show();

            $("#frmmulti2").submit();
        }else{
            alert("선택한 내용이 없습니다.");
        }
    }
    function  multi_send_ETH(){
        var valuesArray = $('input[name="coin_ids"]:checked').map(function () {
            return this.value;
        }).get().join(",");
        if(valuesArray!=""){

            $("#users").val(valuesArray);
            $("#coin").val("ETH");
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

<? if($level=="10"){?>

    <div id="coin_send" class="layer-popup" style="height: 600px">
        <a href="#" class="close"><img src="<?=$skin_dir?>/images/close.png"></a>
        <div id="layer">
            <h2>코인보내기</h2>
            <iframe src="/admin/coin/vmulticoinsend" name="multi_sender" id="multi_sender" width="550" height="600" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
        </div>
    </div>


<?}?>

<script>
    $(function(){
        $('#st').val('<?=$st?>');
        if ($('#st').val() == null) {
            $('#st').find('option:first').attr('selected', 'selected');
        }
    });
</script>
<form action="/admin/coin/vmulticoinsend2" id="frmmulti2" method="post" target="multi_sender">
    <input type="hidden" name="users" id="users2" value="">
    <input type="hidden" name="coin" id="coin2" value="">
    <!-- input elements here -->
</form>
<form action="/admin/coin/vmulticoinsend" id="frmmulti" method="post" target="multi_sender">
    <input type="hidden" name="users" id="users" value="">
    <input type="hidden" name="coin" id="coin" value="">
    <!-- input elements here -->
</form>
<form name='del' method='post'>
    <input type='hidden' name='idx'>
</form>

<script>
    function Delete(url, val)
    {
        var del = document.del;

        if(confirm("한번 삭제한 주소는 복구할 방법이 없습니다.\n\n 정말 삭제하시겠습니까?")) {
            del.idx.value = val;
            del.action         = url;
            del.submit();
        }
    }
</script>
