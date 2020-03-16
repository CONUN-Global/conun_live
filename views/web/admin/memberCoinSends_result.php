<?=$this->load->view('admin/layout/windowHead')?>

    <table id="his">

        <thead  >
        <tr>
            <th>회원아이디</th>
            <th>회원이메일</th>
            <th>이름</th>
            <th>결과</th>
        </tr>
        <tr><td colspan="4" class="line"></td></tr>
        </thead>
        <tbody  >
        <?

        foreach($sender_name as $key=>$item){
            if($sucess[$key] =="0000"){
                $result="성공";
            }else{
                $result="실패";
            }

            ?>

            <tr>
                <td class="txt"><?=$sender_id[$key];?></td>
                <td class="txt"><?=$sender_email[$key];?></td>
                <td class="txt"><?=$item;?></td>

                <td class="txt"><?=$result;?></td>
            </tr>
            <tr><td colspan="4" class="line"></td></tr>
        <? } ?>


        </tbody>
    </table>





<?=$this->load->view('admin/layout/windowFoot')?>