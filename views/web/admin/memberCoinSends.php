<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string(), 'id="frm"'); ?>
    <input type="hidden" name="sender_id" value="<?=implode(",",$sender_id);?>">
    <input type="hidden" name="sender_email" value="<?=implode(",",$sender_email);?>">
    <input type="hidden" name="sender_name" value="<?=implode(",",$sender_name);?>">
    <input type="hidden" name="sender_amount"  id="sender_amount" value="">
    <table id="his">

        <thead  >
        <tr>
            <th>회원아이디</th>
            <th>회원이메일</th>
            <th>이름</th>
            <th>수량</th>
        </tr>
        <tr><td colspan="4" class="line"></td></tr>
        </thead>
        <tbody  >
       <?
       if(empty($sender_name)===false){
       foreach($sender_name as $key=>$item){?>

        <tr>
            <td class="txt" width="50"><?=$sender_id[$key];?></td>
            <td class="txt" width="50"><?=$sender_email[$key];?></td>
            <td class="txt"><?=$item;?></td>
            <td class="txt" width="100"><input type="text" name="amount" class="amount"  style="width: 80px"> </td>
        </tr>
           <tr><td colspan="4" class="line"></td></tr>
    <? }} ?>


        </tbody>
    </table>
    <table id="write">
        <colgroup></colgroup>
        <tbody>
        <tr>
            <td class="tit">관리자 보유코인</td>
            <td class="txt"><?=number_format($bal, 4)?> <?=$coin;?></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">보내는 사람 회원아이디</td>
            <td class="txt"><input type="text" name="Sender" required itemname="Sender" value="admin"></td>
        </tr>

        <tr><td colspan="3" class="line"></td></tr></tbody>
    </table>
    <div class="btn"><input type="button" class="btn_01" value="코인지급하기" id="btn_submit"></div>
    </form>

<script>
    $(document).ready(function () {


        $("#btn_submit").click(function () {
            var check =  true;
            $(".amount").each(function () {

                if($(this).val() == ""){

                    alert("수량을 입력 하세요.");
                    $(this).focus();
                      check = false;
                }

            });

            if(check==true){
                var valuesArray = $('input[name="amount"]').map(function () {
                    return this.value;
                }).get().join(",");

                $("#sender_amount").val(valuesArray);

                $("#frm").submit();
            }

        });

    });

</script>

<?=$this->load->view('admin/layout/windowFoot')?>