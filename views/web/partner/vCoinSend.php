<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
    <input type="hidden" name="wallet_no" id="coin1_unit" value=" ">

    <table id="write">
        <colgroup></colgroup>
        <tbody>
        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">주소</td>
            <td class="txt"><b><?=$wallet;?></b></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>


        <tr>
            <td class="tit"> LIT 보유코인</td  >
            <td class="txt"><?=number_format($bal, 4)?></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit"> ETH 보유코인</td  >
            <td class="txt"><?=number_format($eth_bal, 4)?></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>

        <tr>
            <td class="tit">보내실 주소</td>
            <td class="txt"><input type="text" name="TO_ADDR" required itemname="TO_ADDR" value="" style="width: 100%"></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr></tbody>
        <tr>
            <td class="tit">보내실 코인수량</td>
            <td class="txt"><input type="text" name="amount" class="numberformat" required itemname="amount"  value=""></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr></tbody>
    </table>
    <div class="btn"><input type="submit" class="btn_01" value="코인전송" id="btn_submit"></div>
    </form>





<?=$this->load->view('admin/layout/windowFoot')?>