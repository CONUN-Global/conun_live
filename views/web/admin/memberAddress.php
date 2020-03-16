<?=$this->load->view('admin/layout/windowHead')?>

<!--<div style="height:30px; margin-top:20px; margin-left:10px"> <span class="bold"><?=$this->uri->segment(4);?></span></div>-->

<table id="his">
	<colgroup>
	<col width="200px" />
        <col width="*" />
    <col width="100px" />

	</colgroup>
<thead>
    <tr>
        <th>코인종류</th>
        <th>지갑주소</th>

        <th>등록일</th>
    </tr>
    <tr><td colspan="3" class="line"></td></tr>
</thead>
<tbody>

<? foreach($item as $itemlist){?>
	<?

     $regdate	=  date("y-m-d",strtotime($itemlist->regdate));
	?>
	<tr>
        <td class="txt"><?=$itemlist->type?></td>
		<td class="txt"><?=$itemlist->wallet?></td>
		<td class="txt"><?=$regdate;?></td>

	</tr>
    <tr><td colspan="3" class="txt" align="left">잔고:<?=number_format($itemlist->quntity,4) ?>  <a href="/admin/member/coinsend/<?=$this->uri->segment(4);?>/<?=$itemlist->type?>">코인전송</a></td></tr>
	<tr><td colspan="3" class="line"></td></tr>
<?}?>
</tbody>
</table>