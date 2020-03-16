<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>

<script type="text/javascript"  src="<?=$skin_dir?>/js/instascan.min.js"></script>
<script language="javascript">
	function onlyNumber(obj) {
		$(obj).keyup(function(){
			 $(this).val($(this).val().replace(/[^0-9\.]/g,""));

			var cnt = parseFloat($("#count").val());
			var fee = parseFloat($("#fee").val());
			var bal = parseFloat($("#bal").val());

			if (bal < cnt)
			{
				$("#alerts").text("보유코인보다 보낼수량이 많습니다");
				return false;
			}
			else
			{
				$("#alerts").text("");
                $("#realCount").val(cnt);
				$("#real_bal").val(cnt);
			}
		});
	}

</script>
    <script>
        <? if($_GET['coin_index']){?>
        var coin_index ="<?=$_GET['coin_index'];?>";
        <?}else{?>
        var coin_index ="<?=$bal_list[0]['COIN'];?>";
        <?}?>


        function coin_select(coin) {

            $(".coin_list").each(function () {

                if($(this).attr("coin_type") == coin){



                    //$("#send_id").val('');
                    $("#count").val('');
                    $("#bal").val($(this).attr("balance"));
                    $("#fee").val($(this).attr("coin_fee"));
                    $("#coin").val($(this).attr("coin_type"));
                    $("#send_coin_name").html($(this).attr("coin_name"));
                    $("#fee_text").val("<?=$FEE;?> ETH");


                }
            });

        }

        $(document).ready(function () {

            coin_select(coin_index);

            $(".coin_list").click(function () {
                coin_select($(this).attr("coin_type"));

            });


        });


    </script>
<? if ($lang == "us") { ?>
<div class="br-pagebody">
    <div class="row row-sm">

        <?foreach ($bal_list as $item2){

            if($item2['CODE']=="0000"   && $item2['COIN']  == $_GET['coin_index']  ){
                ?>
                <div class="col-sm-6 col-xl-3 mt-2 mb-2 coin_list" style="cursor: pointer"    coin_fee="<?=number_format($item2['FEE'],4);?>"   coin_type="<?=$item2['COIN'];?>" coin_name="<?=$item2['COIN_NAME'];?>" balance="<?=$item2['BALANCE']?>"    >
                    <div class="bg-danger rounded overflow-hidden coin_bg">
                        <div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                            <i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> Ballance</p>
                                <span class="tx-11 tx-roboto tx-white-8 two"><?=$item2['WALLET'];?></span>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($item2['BALANCE'], 4)?> </span> <?=$item2['COIN'];?></p>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

            <? }}?>

        <!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r_2 d-flex align-items-center">
					<div class="mg-l-20">
						<form name="reg" action="<?=current_url()?>/send_ok" method="post" onsubmit="return formCheck(this);">
                            <input type="hidden" name="bal" id="bal" class="form-control" value="" >
                            <input type="hidden" name="fee" id="fee" class="form-control" value="0.01" >
                            <input type="hidden" name="coin" id="coin" class="form-control" value="" >
                            <input type="hidden" name="real_bal" id="real_bal" class="form-control" >
                            <input type="hidden" name="realCount" id="realCount" class="form-control" value="" >
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
                                    <label class="control-label" style="color: #222;">Recipient’s <span  id="send_coin_name" style="display: none">CTCCOIN</span> address</label>
                                    <div class="input-group">
                                        <input type="text" name="send_id" id="send_id" class="form-control " value="<?=$qr_address;?>"   >
                                        <a href="/app/qr?coin_index=<?=$coin_index;?>" class="btn btn-danger btn-icon"   >
                                            <div><i class="fa fa-camera"></i></div>
                                        </a>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">Coin quantity</label>
									<input type="text" name="count" id="count" class="form-control" onkeydown="onlyNumber(this)" maxlength="8" >
								</div>
                            </div>
                            <div class="col-md-6" style="display: none;">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">Fee</label>
									<input type="text"  id="fee_text"  class="form-control " disabled value="0.01 CTC">
								</div>
                            </div>
                        </div>
					<!--	<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">Coin quantity you will actually send</label>
									<input type="text" name="realCount" id="realCount" class="form-control" disabled value="" >
									<label id="alerts"></label>
								</div>
                            </div>
                        </div>-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: #222;">Withdraw Password</label>
                                        <input type="password"  id="wallet_password" name="wallet_password"  class="form-control " autocomplete="false" >
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right w_m_100">Send</button>
                        <div class="clearfix"></div>
                       	</form>

                	</div>
              	</div>
			  	<div class="con_ib" style="border-top:1px solid #dddedf">
					<div class="ib_middle sand_p" >Tip : Be careful about sending. You don’t get the coin you sent back.
</div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>

<?}else if ($lang == "kr"  or $lang == "") { ?>

<div class="br-pagebody">
    <div class="row row-sm">


    <?foreach ($bal_list as $item2){

        if($item2['CODE']=="0000" && $item2['COIN']  == $_GET['coin_index']){
     ?>
        <div class="col-sm-6 col-xl-3 mt-2 mb-2 coin_list" style="cursor: pointer"    coin_fee="<?=number_format($item2['FEE'],4);?>"   coin_type="<?=$item2['COIN'];?>" coin_name="<?=$item2['COIN_NAME'];?>" balance="<?=$item2['BALANCE']?>"    >
	        <div class="bg-danger rounded overflow-hidden coin_bg">
              	<div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                	<i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
					<div class="mg-l-20">
						<p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> 잔고</p>
						<span class="tx-11 tx-roboto tx-white-8 two"><?=$item2['WALLET'];?></span>
						<p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($item2['BALANCE'], 4)?> </span> <?=$item2['COIN'];?></p>
                	</div>
              	</div>
            </div>
        </div><!-- col-3 -->

     <? }}?>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r_2 d-flex align-items-center">
					<div class="mg-l-20">
						<form name="reg" action="<?=current_url()?>/send_ok" method="post" onsubmit="return formCheck(this);">
						<input type="hidden" name="bal" id="bal" class="form-control" value="" >
						<input type="hidden" name="fee" id="fee" class="form-control" value="0.01" >
                        <input type="hidden" name="coin" id="coin" class="form-control" value="" >
                        <input type="hidden" name="realCount" id="realCount" class="form-control" value="" >


						<input type="hidden" name="real_bal" id="real_bal" class="form-control" >
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating  ">
                                    <label class="control-label " style="color: #222;">보내는 <span  id="send_coin_name" style="display: none" ></span> 주소</label>

                                    <div class="input-group">
                                        <input type="text" name="send_id" id="send_id" class="form-control " value="<?=$qr_address;?>"   >
                                        <a href="/app/qr?coin_index=<?=$coin_index;?>" class="btn btn-danger btn-icon"   >
                                            <div><i class="fa fa-camera"></i></div>
                                        </a>
                                    </div>


								</div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">코인수량</label>
									<input type="text" name="count" id="count" class="form-control" onkeydown="onlyNumber(this)" maxlength="8" >
								</div>
                            </div>
                            <div class="col-md-6" style="display: none;">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">수수료</label>
									<input type="text" class="form-control " id="fee_text" disabled value="<?=$FEE;?>">
								</div>
                            </div>
                        </div>
						<!--<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">실제 보내질 코인수량</label>
									<input type="text" name="realCount" id="realCount" class="form-control" disabled value="" >
									<label id="alerts"></label>
								</div>
                            </div>
                        </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: #222;">출금 비밀번호</label>
                                        <input type="password"  id="wallet_password" name="wallet_password"  class="form-control " autocomplete="false" >
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right w_m_100">보내기</button>
                        <div class="clearfix"></div>
                       	</form>

                	</div>
              	</div>
			  	<div class="con_ib" style="border-top:1px solid #dddedf">
					<div class="ib_middle sand_p" >Tip : 전송에 신중하세요. 한번 보낸 코인은 되돌릴 수 없습니다.</div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>




<?}else if ($lang == "jp") { ?>


    <div class="br-pagebody">
        <div class="row row-sm">


        <?foreach ($bal_list as $item2){

            if($item2['CODE']=="0000" && $item2['COIN']  == $_GET['coin_index']){
                ?>
                <div class="col-sm-6 col-xl-3 mt-2 mb-2 coin_list" style="cursor: pointer"    coin_fee="<?=number_format($item2['FEE'],4);?>"   coin_type="<?=$item2['COIN'];?>" coin_name="<?=$item2['COIN_NAME'];?>" balance="<?=$item2['BALANCE']?>"    >
                    <div class="bg-danger rounded overflow-hidden coin_bg">
                        <div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                            <i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> レヴコインの残高</p>
                                <span class="tx-11 tx-roboto tx-white-8 two"><?=$item2['WALLET'];?></span>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($item2['BALANCE'], 4)?> </span> <?=$item2['COIN'];?></p>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

            <? }}?>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r_2 d-flex align-items-center">
					<div class="mg-l-20">
						<form name="reg" action="<?=current_url()?>/send_ok" method="post" onsubmit="return formCheck(this);">
						<input type="hidden" name="bal" id="bal" class="form-control" value="<?=$bal?>" >
						<input type="hidden" name="fee" id="fee" class="form-control" value="0.01" >
						<input type="hidden" name="real_bal" id="real_bal" class="form-control" >
                        <input type="hidden" name="coin" id="coin" class="form-control" value="" >
                        <input type="hidden" name="realCount" id="realCount" class="form-control" value="" >
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">送信<span  id="send_coin_name" style="display: none"></span> </label>
                                    <div class="input-group">
                                        <input type="text" name="send_id" id="send_id" class="form-control " value="<?=$qr_address;?>"   >
                                        <a href="/app/qr?coin_index=<?=$coin_index;?>" class="btn btn-danger btn-icon"   >
                                            <div><i class="fa fa-camera"></i></div>
                                        </a>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">コインの数量</label>
									<input type="text" name="count" id="count" class="form-control" onkeydown="onlyNumber(this)" maxlength="8" >
								</div>
                            </div>
                            <div class="col-md-6" style="display: none;">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">手数料</label>
									<input type="text" class="form-control  "  id="fee_text" disabled value="0.01 CTC">
								</div>
                            </div>
                        </div>
						<!--<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">実際送られるコインの数量</label>
									<input type="text" name="realCount" id="realCount" class="form-control" disabled value="" >
									<label id="alerts"></label>
								</div>
                            </div>
                        </div>-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: #222;">出金パスワード</label>
                                        <input type="password"  id="wallet_password" name="wallet_password"  class="form-control ">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right w_m_100">送信</button>
                        <div class="clearfix"></div>
                       	</form>

                	</div>
              	</div>
			  	<div class="con_ib" style="border-top:1px solid #dddedf">
					<div class="ib_middle sand_p" >Tip : 送信の際慎重にお進めてください。一度送ったコインは、元に戻せません。</div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>

<?}else if ($lang == "cn") { ?>
<div class="br-pagebody">
    <div class="row row-sm">



        <?foreach ($bal_list as $item2 ){

            if($item2['CODE']=="0000" && $item2['COIN']  == $_GET['coin_index']){
                ?>
                <div class="col-sm-6 col-xl-3 mt-2 mb-2 coin_list" style="cursor: pointer"    coin_fee="<?=number_format($item2['FEE'],4);?>"   coin_type="<?=$item2['COIN'];?>" coin_name="<?=$item2['COIN_NAME'];?>" balance="<?=$item2['BALANCE']?>"    >
                    <div class="bg-danger rounded overflow-hidden coin_bg">
                        <div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                            <i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> 货币 余额</p>
                                <span class="tx-11 tx-roboto tx-white-8 two"><?=$item2['WALLET'];?></span>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($item2['BALANCE'], 4)?> </span> <?=$item2['COIN'];?></p>
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->

            <? }}?>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
	        <div class="bg-info rounded overflow-hidden">
              	<div class="pd-x-20 pd-t-20_r_2 d-flex align-items-center">
					<div class="mg-l-20">
						<form name="reg" action="<?=current_url()?>/send_ok" method="post" onsubmit="return formCheck(this);">
						<input type="hidden" name="bal" id="bal" class="form-control" value="<?=$bal?>" >
						<input type="hidden" name="fee" id="fee" class="form-control" value="0.01" >
						<input type="hidden" name="real_bal" id="real_bal" class="form-control" >
                        <input type="hidden" name="coin" id="coin" class="form-control" value="" >
                            <input type="hidden" name="realCount" id="realCount" class="form-control" value="" >
						<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">寄出的<span  id="send_coin_name" style="display: none"></span>  地址</label>
                                    <div class="input-group">
                                        <input type="text" name="send_id" id="send_id" class="form-control " value="<?=$qr_address;?>"   >
                                        <a href="/app/qr?coin_index=<?=$coin_index;?>" class="btn btn-danger btn-icon"   >
                                            <div><i class="fa fa-camera"></i></div>
                                        </a>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">货币数量</label>
									<input type="text" name="count" id="count" class="form-control" onkeydown="onlyNumber(this)" maxlength="8" >
								</div>
                            </div>
                            <div class="col-md-6" style="display: none;">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">手续费</label>
									<input type="text" class="form-control " id="fee_text"  disabled value="0.01 CTC">
								</div>
                            </div>
                        </div>
						<!--<div class="row">
							<div class="col-md-12">
								<div class="form-group label-floating">
									<label class="control-label" style="color: #222;">实际寄送的货币数量</label>
									<input type="text" name="realCount" id="realCount" class="form-control" disabled value="" >
									<label id="alerts"></label>
								</div>
                            </div>
                        </div>-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" style="color: #222;">提款密码</label>
                                        <input type="password"  id="wallet_password" name="wallet_password"  class="form-control ">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary pull-right w_m_100">发送</button>
                        <div class="clearfix"></div>
                       	</form>

                	</div>
              	</div>
			  	<div class="con_ib" style="border-top:1px solid #dddedf">
					<div class="ib_middle sand_p" >Tip : 请慎重考虑传送. 发送过的货币无法挽回</div>
			  	</div>
			  	<div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>
<? } ?>