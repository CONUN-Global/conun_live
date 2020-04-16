<?=$this->load->view('partner/layout/windowHead')?>

<? echo form_open_multipart(uri_string()); ?>
 
 
<input type="hidden" name="qr_member" id="qr_member" value="<?=$this->session->userdata('member_id')?>" >
<input type="hidden" name="qr_no" id="qr_no" value="<?=$item->qr_no?>" >
<table id="write">
<colgroup></colgroup>
<tbody>

<tr>
	<td class="tit">작성</td>
	<td class="txt"><?=$this->session->userdata('member_id')?></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">분류</td>
	<td class="txt">
		<select class="input-find" id='qr_type' name='qr_type' style="width: 120px;">
			<option value='PAYMENT' <?if($item->qr_type=="PAYMENT"){echo "selected";}?>>CONP+CON</option>
			<option value='BONUS' <?if($item->qr_type=="BONUS"){echo "selected";}?>>MCONP</option></option>
       </select>
	</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>

<tr>
	<td class="tit">결제금액</td>
	<td class="txt"><input type="text" name="qr_amount" itemname="qr_amount"  value="<?=@$item->qr_amount?>">원</td>
</tr>
<tr>
    <td class="tit">메모</td>
    <td class="txt"><input type="text" name="qr_memo" itemname="qr_memo"  value="<?=@$item->qr_memo?>"></td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<? if($item->qr_member){?>
<tr>
	<td class="tit">이미지</td>
	<td class="txt" valign="middle">
		 <div id="qrcode"></div>
	</td>
</tr>
<tr><td colspan="3" class="line"></td></tr>
<tr>
	<td class="tit">다운로드</td>
	<td class="txt" valign="middle">
		 <input type="button" value="다운로드" onclick="download();">
	</td>
</tr>


    <tr>
        <td class="tit">프린트</td>
        <td class="txt" valign="middle">
            <input type="button" value="250" onclick="printJS('/data/qr/<?=@$item->qr_no?>_big.png', 'image');">
            <input type="button" value="120" onclick="printJS('/data/qr/<?=@$item->qr_no?>_middle.png', 'image');">
            <input type="button" value="80" onclick="printJS('/data/qr/<?=@$item->qr_no?>_small.png', 'image');">
        </td>
    </tr>


<?}?>
</tbody>
</table>
<? if($item->qr_member){?>
<div class="btn"><input type="submit" class="btn_01" value="수정하기" id="btn_submit"></div>
<?}else{?>
<div class="btn"><input type="submit" class="btn_01" value="작성하기" id="btn_submit"></div>
<?}?> 
</form>

<iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

<script language="javascript" src="/views/web/admin/js/wrest.js"></script>
<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: "<?=$item->qr_member?>^|^<?=$item->qr_type;?>^|^<?=$item->qr_amount;?>",
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
    
 function download(){
    
    var data= $("#qrcode").find('img').attr("src");
    console.log(data);
    
    downloadImage(data, "qr_code_<?=$item->qr_no?>.png");
    
 }   
 
function downloadImage(img, fileName) {
  var imgData = atob(img.split(",")[1]),
    len = imgData.length,
    buf = new ArrayBuffer(len),
    view = new Uint8Array(buf),
    blob,
    i

  for (i = 0; i < len; i++) {
    view[i] = imgData.charCodeAt(i) & 0xff // masking
  }

  blob = new Blob([view], {
    type: "application/octet-stream"
  })

  if (window.navigator.msSaveOrOpenBlob) {
    window.navigator.msSaveOrOpenBlob(blob, fileName)
  } else {
    //var url = URL.createObjectURL(blob);
    var a = document.createElement("a")
    a.style = "display: none"
    //a.href = url;
    a.href = img
    a.download = fileName
    document.body.appendChild(a)
    a.click()

    setTimeout(function() {
      document.body.removeChild(a)
      //URL.revokeObjectURL(url);
    }, 100)
  }
}
</script>

<?=$this->load->view('partner/layout/windowFoot')?>