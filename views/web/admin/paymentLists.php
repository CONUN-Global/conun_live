<script>
    $(function() {
        //input을 datepicker로 선언
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd' //Input Display Format 변경
            ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
            ,showMonthAfterYear:true //년도 먼저 나오고, 뒤에 월 표시
            ,changeYear: true //콤보박스에서 년 선택 가능
            ,changeMonth: true //콤보박스에서 월 선택 가능

            ,buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" //버튼 이미지 경로
            ,buttonImageOnly: true //기본 버튼의 회색 부분을 없애고, 이미지만 보이게 함
            ,buttonText: "선택" //버튼에 마우스 갖다 댔을 때 표시되는 텍스트
            ,yearSuffix: "년" //달력의 년도 부분 뒤에 붙는 텍스트
            ,monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'] //달력의 월 부분 텍스트
            ,monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 Tooltip 텍스트
            ,dayNamesMin: ['일','월','화','수','목','금','토'] //달력의 요일 부분 텍스트
            ,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 부분 Tooltip 텍스트
            ,minDate: "-1M" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
            ,maxDate: "+1M" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)
        });

        //초기값을 오늘 날짜로 설정
        $('#datepicker').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
    });
</script>
<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총결제건수  <?=$total_count?>건 </div>

<div id="util">


    <li style="display:inline"><a href="javascript:multi_del();"><img src="<?=$skin_dir?>/images/icon/del.png"></a></ii>


</div>
<div  style="width: 100%;height: 70px">
    <form name='fsearch' method='post' action="<?=SEARCH_URL?>">
        <div>
        <select class="input-find" id='st' name='st'>
            <option value='member_id'>보낸아이디</option>
            <option value='member_address'>보낸주소</option>

        </select>
        <input class="input-find" type="text" name="sc" value="<?=$search?>">
            <input type="submit" class="btn_find" value="검색">
        </div>
        <!--<div>

            <lable>결제시작일</lable><input class=" datepicker" style="width: 100px"  autocomplete=”off” type="text" name="from_date"  value=""> ~ <lable>결제종료일</lable><input class="datepicker" autocomplete=”off” style="width: 100px"  type="text" name="to_date" value="">

        </div>
        <div>
            <input type="submit" class="btn_find" value="검색">
        </div>-->
    </form>
</div>

<div id="table">
    <table id="lists" summary="회원 리스트">
       <!-- <colgroup>
            <col width="50" />
            <col width="100" />
            <col width="100" />


            <col width="*" />
            <col width="*" />
            <col width="*" />
            <col width="80" />
            <col width="80" />
            <col width="40" />
            <col width="80" />
            <col width="100" />
            <col width="200" />
        </colgroup> -->
        <thead>
        <tr>
            <th scope="col"><input type="checkbox" name="all" id="select-all" >번호</th>
            <th scope="col">보낸아이디</th>
            <th scope="col">코인종류</th>

            <th scope="col">보낸이름</th>
            <th scope="col">결제당시 시세</th>
            <th scope="col">MOCP 적립 포인트</th>
            <th scope="col">결제 가맹점</th>
            <th scope="col">정산 상태</th>
            <th scope="col">정산 일</th>

            <!--
            <th scope="col">시세</th>
            <th scope="col">보낸주소</th>
            -->
            <th scope="col">결제코인</th>
            <th scope="col">결제금액</th>
            <th scope="col">구분</th>
            <th scope="col">이더스캔</th>
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
                <input type="checkbox" name="coin_no" value="<?=$row->coin_no?>" payment_price="<?=$row->payment_price*$row->payment_amount;?>"> <?=$i?></td>
            <td><span class="bold"><?=$row->member_id?></span></td>
            <td><span class="bold" ><?=$row->type?></span></td>
        <!--
            <td><span class="bold" ><?=$row->payment_type?></span></td>
            -->
            <td><span class="bold"  ><?=$row->name?></span> </td>
            <td>
                <? if($row->type =="CON"){?>
                <span class="bold"  ><?=$row->payment_amount?>원</span>
                <?}else{?>

                <?}?>
            </td>
            <td><span class="bold"  ><?=$row->bonuns_point?></span> </td>
            <td><span class="bold"  ><?=$row->partner_name?></span> </td>

            <td>
                <? if($row->payment_recipt=="N"){?>

                    <span class="bold"  style="color: crimson;" >정산전</span>
                <?}else{?>
                    <span class="bold"  style="color: blue;">정산완료</span>
                <?}?>

            </td>
            <td><span class="bold"  ><?=$row->payment_recipt_date?></span> </td>

           <!--
            <td><span class="bold" style="font-size: 10px"> <?=$row->wallet?></span> </td>
            <td><span class="bold" style="font-size: 10px"><?=$row->event_id?>(<?=$row->event_address?>)</span> </td>
           -->
            <td><span class="bold"><?=number_format($row->point,4)?></span><?=$row->type?></td>

            <? if($row->type =="CON"){?>
            <td><span class="bold"><?=number_format(round($row->payment_price*$row->payment_amount))?>원</span></td>
        <?}else{?>
            <td><span class="bold"><?=number_format(round($row->payment_price))?>원</span></td>
        <?}?>
            <td><?=$row->tx_status?></td>

            <td>
            <? if($row->tx_id){?>
            <a href="https://etherscan.io/tx/<?=$row->tx_id;?>" target="_blank">확인</a></td>
        <?}?>
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