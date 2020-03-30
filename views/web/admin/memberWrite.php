<?=$this->load->view('admin/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
    <input type="hidden" name="coin_id" required itemname="이름"  value="<?=$item->coin_id?>">

    <table id="write">
        <colgroup></colgroup>
        <tbody>

        <tr>
            <td class="tit">email</td>
            <td class="txt"><?=$item->member_id?></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">회원 암호</td>
            <td class="txt"><input type="password" name="password" required itemname="암호"  value="<?=$item->password?>"></td>
        </tr>
        <tr>
            <td class="tit">회원 출금 암호</td>
            <td class="txt"><input type="password" name="wallet_password" required itemname="암호"  value="<?=$item->wallet_password?>"></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">가맹점 이름</td>
            <td class="txt"><input type="text" name="partner_company"  itemname="이름"  value="<?=$item->partner_company?>"></td>
        </tr>
        <tr>
            <td class="tit">회원 성명</td>
            <td class="txt"><input type="text" name="name" required itemname="이름"  value="<?=$item->name?>"></td>
        </tr>
        <tr>
            <td class="tit">회원권한</td>
            <td class="txt">
                <select name="level" id="level">
                    <option value="1" <?if($item->level=="1"){?>selected<?}?>>일반회원</option>
                    <option value="2" <?if($item->level=="2"){?>selected<?}?>>가맹점</option>
                </select>
            </td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>

        <tr>
            <td class="tit">모바일</td>
            <td class="txt"><input type="text" name="mobile" itemname="모바일"  value="<?=@$item->mobile?>"></td>
        </tr>

        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">LOCK</td>
            <td class="txt">

                <select name="lock" id="lock">
                    <option value="100">0%</option>
                    <option value="95">5%</option>
                    <option value="90">10%</option>
                    <option value="85">15%</option>
                    <option value="80">20%</option>
                    <option value="75">25%</option>
                    <option value="70">30%</option>
                    <option value="65">35%</option>
                    <option value="60">40%</option>
                    <option value="55">45%</option>
                    <option value="50">50%</option>
                    <option value="45">55%</option>
                    <option value="40">60%</option>
                    <option value="35">65%</option>
                    <option value="30">70%</option>
                    <option value="25">75%</option>
                    <option value="20">80%</option>
                    <option value="15">85%</option>
                    <option value="10">90%</option>
                    <option value="5">95%</option>
                    <option value="0">100%</option>
                </select>
                <script>
                    $('#lock').val('<?=$item->coin_lock;?>');

                </script>
            </td>
        </tr>

        <tr><td colspan="3" class="line"></td></tr>
        <tr>
            <td class="tit">account</td>
            <td class="txt"><?=$item->coin_id?></td>
        </tr>
        <tr><td colspan="3" class="line"></td></tr>


        </tbody>
    </table>
<? if($level=="10"){?>
    <div class="btn"><input type="submit" class="btn_01" value="수정하기" id="btn_submit"></div>
    <?}?>

    </form>

    <iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

    <script language="javascript" src="http://www.Ctccoin.net/views/web/admin/js/wrest.js"></script>


<?=$this->load->view('admin/layout/windowFoot')?>