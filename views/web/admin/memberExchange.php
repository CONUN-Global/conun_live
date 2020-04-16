<?=$this->load->view('admin/layout/windowHead')?>


<div style="height:30px; margin-top:20px; margin-left:10px"> <span class="bold"><?=$this->uri->segment(4);?></span> 총 이체수량 : <span class="red"><?=$exchange_total?></span></div>

<table id="his">

	<colgroup>
    <col width="80px" />
    <col width="*" />
    <col width="80px" />
	</colgroup>

    <thead>
    <tr>
        <th>이체수량</th>
        <th>이체주소</th>
        <th>날짜</th>
    </tr>
    <tr><td colspan="5" class="line"></td></tr>
    </thead>

	<tbody>
		<?
		$i=0; 
		foreach ($list as $row) {
		?>
		<tr>
			<td class="txt"><?=$row->event_address?></td>
			<td class="txt"><?=$row->saved_point?></td>			
			<td class="txt"><? echo  date("Y-m-d", strtotime(date($row->regdate))); ?></td>
		</tr>
		<tr><td colspan="5" class="line"></td></tr>
		<? } ?>
	</tbody>
</table>

<?=$this->load->view('admin/layout/windowFoot')?>
