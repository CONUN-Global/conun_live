<script>
    $(document).ready(function () {
        $.datepicker.regional['ko'] = {
            closeText: '닫기',
            prevText: '이전달',
            nextText: '다음달',
            currentText: '오늘',
            monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
                '7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
            monthNamesShort: ['1월','2월','3월','4월','5월','6월',
                '7월','8월','9월','10월','11월','12월'],
            dayNames: ['일','월','화','수','목','금','토'],
            dayNamesShort: ['일','월','화','수','목','금','토'],
            dayNamesMin: ['일','월','화','수','목','금','토'],
            weekHeader: 'Wk',
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: true,
            yearSuffix: '',
            showOn: 'both',
            buttonText: "달력",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: 'c-99:c+99'
        };
        $.datepicker.setDefaults($.datepicker.regional['ko']);

        var datepicker_default = {
            showOn: 'both',
            buttonText: "달력",
            currentText: "이번달",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: 'c-99:c+99',
            showOtherMonths: true,
            selectOtherMonths: true
        }

        datepicker_default.closeText = "선택";
        datepicker_default.dateFormat = "yy-mm";
        datepicker_default.onClose = function (dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker( "option", "defaultDate", new Date(year, month, 1) );
            $(this).datepicker('setDate', new Date(year, month, 1));
        }

        datepicker_default.beforeShow = function () {
            var selectDate = $("#from_date").val().split("-");
            var year = Number(selectDate[0]);
            var month = Number(selectDate[1]) - 1;
            $(this).datepicker( "option", "defaultDate", new Date(year, month, 1) );
        }


        datepicker_default2.closeText = "선택";
        datepicker_default2.dateFormat = "yy-mm";
        datepicker_default2.onClose = function (dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker2( "option", "defaultDate", new Date(year, month, 1) );
            $(this).datepicker2('setDate', new Date(year, month, 1));
        }

        datepicker_default2.beforeShow = function () {
            var selectDate = $("#sdate").val().split("-");
            var year = Number(selectDate[0]);
            var month = Number(selectDate[1]) - 1;
            $(this).datepicker( "option", "defaultDate", new Date(year, month, 1) );
        }


        $("#from_date").datepicker(datepicker_default);
    });
</script>
<style>
    table.ui-datepicker-calendar { display:none; }
</style>
<h2 class="title"><?=$title?></h2>

<div class="infobox">전체목록 | 총결제건수  <?=$total_rows?>건 </div>

<div id="util">


    <li style="display:inline"><a href="javascript:multi_del();"><img src="<?=$skin_dir?>/images/icon/del.png"></a></ii>


</div>
<div  style="width: 100%;height: 90px">
    <form name='fsearch' method='post' action="/admin/new_coin/payment_day">

        <div style="margin-bottom: 5px;">

            <lable style="margin-right: 60px">결제일</lable>  <input class="input-find datepicker" style="width: 100px"  autocomplete=”off” type="text" id="from_date" name="from_date"  value="<?=$from_date;?>"> ~ <lable> </lable><input class="input-find datepicker" autocomplete=”off” style="width: 100px"  type="text" name="to_date" value="<?=$to_date;?>">

        </div>
        <div>
            <select class="input-find" id='st' name='st'>
                <option value='m_member.member_id'>보낸아이디</option>
                <option value='member_address'>보낸주소</option>

            </select>
            <input class="input-find" type="text" name="sc" value="<?=$search?>" style="width: 210px">
            <input type="submit" class="btn_find" value="검색">
        </div>
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

            <th scope="col">코인종류</th>
            <th scope="col">가맹점</th>
            <th scope="col">총금액</th>
            <th scope="col">총포인트</th>
            <th scope="col">기준일</th>
            <th scope="col">일별현황</th>

        </tr>
        <tr class="line"></tr>
        </thead>
        <tbody>
        <?
        $i = $total_rows;
        foreach ($item as $row) :


            ?>
            <tr class="line"></tr>
            <? if ($i % 2 == 0 ) { ?>
            <tr>
        <? } else {  ?>
            <tr class="on">
        <? } ?>

            <td>
                <?=$i?></td>
            <td><span class="bold"><?=$row->type?></span></td>
            <td><span class="bold" ><?=$row->partner_company?></span></td>

            <td><span class="bold" ><?=$row->total_amount?></span></td>

            <td><span class="bold"  ><?=$row->total_point?></span> </td>

            <td><span class="bold"  ><?=$row->regdate?></span> </td>
            <td><span class="bold"  ><a href="/admin/new_coin/payment_month?sc=<?=$row->partner_company?>&st=partner_company&from_date=<?=$from_date;?>-01&to_date=<?=$to_date;?>-31"></>보기</span> </td>
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