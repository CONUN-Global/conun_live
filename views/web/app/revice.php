<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>


    <div class="br-pagebody">
        <div class="row row-sm">


            <?foreach ($bal_list as $item2){
                if($_GET['coinindex']==$item2['COIN']){
                if($item2['CODE']=="0000"){
                    $wallet=$item2['WALLET'];
                    ?>
                    <div class="col-sm-12 col-xl-12 mt-2 mb-2 coin_list" style="cursor: pointer"    coin_fee="<?=number_format($item2['FEE'],4);?>"   coin_type="<?=$item2['COIN'];?>" coin_name="<?=$item2['COIN_NAME'];?>" balance="<?=$item2['BALANCE']?>"    >
                        <div class="bg-danger rounded overflow-hidden coin_bg">
                            <div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                                <i class="ion ion-social-buffer-outline tx-60 lh-0 tx-white op-7"></i>
                                <div class="mg-l-20">
                    <? if ($lang == "us") { ?>
                                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> Ballance</p>
                    <? }else if ($lang == "kr"  or $lang == "" ) { ?>
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> 잔고</p>
                    <? }else if ($lang == "cn" ) { ?>
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> 货币 余额</p>
                    <? }else if ($lang == "jp" ) { ?>
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"><?=$item2['COIN_NAME'];?> レヴコインの残高</p>

                    <?}?>

                                    <span class="tx-9 tx-roboto tx-white-8 two"><?=$item2['WALLET'];?></span>
                                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><span><?=number_format($item2['BALANCE'], 4)?> </span> <?=$item2['COIN'];?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-3 -->

                <? }}}?>

            <div class="col-sm-12 col-xl-12 mg-t-20 mg-sm-t-0">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20_r_2 d-flex align-items-center">
                        <div class="mg-l-20  text-center">


                                <input type="hidden" name="real_bal" id="real_bal" class="form-control" >
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div id="qrcode_div" class="text-center" style="margin-bottom: 20px;margin-top: 20px"></div>


                                    </div>
                                </div>

                            <? if ($lang == "us") { ?>
                                <button type="button"  onclick="history.back();" class="btn btn-primary pull-right w_m_100" >Confirm</button>
                            <? }else if ($lang == "kr"  or $lang == "") { ?>
                                <button type="button"  onclick="history.back();" class="btn btn-primary pull-right w_m_100" >확인</button>
                            <? }else if ($lang == "cn" ) { ?>
                                <button type="button"  onclick="history.back();" class="btn btn-primary pull-right w_m_100" >确认</button>
                            <? }else if ($lang == "jp" ) { ?>
                                <button type="button" onclick="history.back();" class="btn btn-primary pull-right w_m_100" >確認</button>

                            <?}?>


                                <div class="clearfix"></div>


                        </div>
                    </div>
                 
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
        </div>
    </div>



<script>

$(document).ready(function () {
    var qrcode = new QRCode(document.getElementById('qrcode_div'), {
        text: '<?=$wallet;?>',
     

        correctLevel : QRCode.CorrectLevel.H
    });

});




</script>