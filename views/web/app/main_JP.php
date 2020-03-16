<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#btnCopyClip").click(function(){
            $("#clipURL").css("display", "block");
        });

        var clipboardSupport = true;
        try {
            $.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
            var version = $.browser.version;
            version = new Number(version.substring(0, version.indexOf(".")));

            //모바일 접속인지 확인
            if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))) {
                //클립보드 복사기능이 될경우 (크롬 42+)
                if ($.browser.chrome == true && version >= 42) {
                    clipboardSupport = true;
                } else {
                    clipboardSupport = false;
                }
            }
        } catch(e) {
        }

        if (clipboardSupport) {
            $("#btnCopyClip").show();
            $("#txtCopyClip").hide();
        } else {
            $("#btnCopyClip").hide();
            $("#txtCopyClip").show();
        }

        var clipboard = new Clipboard('#btnCopyClip');
        clipboard.on('success', function(e) {
            alert("Token Address copied.");
        });
        var clipboard = new Clipboard('#btnCopyClip');
        clipboard.on('success', function(e) {
            alert("Token Address copied.");
        });
        <?
        $i=1;
        foreach ($bal_list as $item2){
        ?>

        var clipboard = new Clipboard('#btnEtcCopyClip<?=$i;?>');
        clipboard.on('success', function(e) {
            alert("Coin Address copied.");
        });
        <? $i++; }?>

        clipboard.on('error', function(e) {
            alert("Click the Copy button.");

            setTimeout(function() {
                $("#etc_clipURL").css("display", "none");
            }, 10000);	// 최하 1000 임 1초

        });

    });
</script>

<style>
    .table tbody tr:hover{ color:#fff;background: linear-gradient(to left, #004e92, #000428) !important; cursor:pointer;font-weight:600;}
</style>

<div class="br-pagebody">
    <div class="row row-sm">
        <!-- col-3 -->

        <div class="col-sm-6 col-xl-4 mt-2 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden" style='box-shadow:1px 1px 4px #203152;'>
                <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background-color:#203152;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);'>
                    <i class="ion ion-planet tx-60 lh-0 tx-white op-7"></i>

                    <div class="mg-l-20">

                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="etc_clipURL1"><?=$bal_list[0]['WALLET'];?></a></p>
                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1" style="margin-top: 5px"><a  id="btnEtcCopyClip1" data-clipboard-action="copy" data-clipboard-target="#etc_clipURL1" style='cursor:pointer'><i class="fa fa-clone"></i> アドレスをコピーする</a></p>

                    </div>
                </div>
                <!--
                <div class="" style='padding:0 15px;'>
                    <div class="con_ib w02 ib_left">
                        <div class="btn-group" role="group" aria-label="Basic">
                            <a  id="btnEtcCopyClip<?=$i;?>" data-clipboard-action="copy" data-clipboard-target="#etc_clipURL<?=$i;?>" style='cursor:pointer'>주소복사</a>

                        </div>
                    </div>
                    <div class="ib_righ con_ib w04 "></div>
                </div>


                <div id="ch2" class="ht-50 tr-y-1"></div>
                -->
            </div>
        </div>

        <?
        $i=1;
        foreach ($bal_list as $item2){
            if($item2['CODE']=="0000"){
                ?>
                <div class="col-sm-6 col-xl-4 mt-2 mg-t-20 mg-xl-t-0">
                    <div class="bg-teal rounded overflow-hidden" style='box-shadow:1px 1px 4px #203152;'>
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center" style='background-color:#203152;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);'>
                            <i class="ion ion-planet tx-60 lh-0 tx-white op-7"></i>
                            <!--	<img class="tx-60 lh-0 tx-white op-7" style="width:30px" src="/views/web/app/img/eth.png"> -->
                            <div class="mg-l-20">
                                <p class="  tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10" style="color:#fff; font-size:18px; font-weight:bold"><?=$item2['COIN_NAME'];?></p>
                                <!--  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><a id="etc_clipURL<?=$i;?>"><?=$item2['WALLET'];?></a></p>-->
                                <span class="tx-11 tx-roboto tx-white-8 two"><span></span><?=number_format($item2['BALANCE'], 4)?> <?=$item2['COIN'];?></span>
                            </div>
                        </div>
                        <div class="" style='padding:0 15px;'>
                            <div class="con_ib w02 ib_left">
                                <div class="btn-group" role="group" aria-label="Basic">
                                    <!--<a  id="btnEtcCopyClip<?=$i;?>" data-clipboard-action="copy" data-clipboard-target="#etc_clipURL<?=$i;?>" style='cursor:pointer'>주소복사</a>-->
                                    <a href="/app/send?coin_index=<?=$item2['COIN'];?>">コイン送信</a>
                                    <a  href="/app/recive?coinindex=<?=$item2['COIN'];?>">入金</a>
                                </div>
                            </div>
                            <div class="ib_righ con_ib w04 "></div>
                        </div>


                        <div id="ch2" class="ht-50 tr-y-1"></div>
                    </div>
                </div>
            <?}
            $i++;
        }
        ?>

        <!--

        <div class="col-md-12" style="margin:40px 0 20px 0; ">
            <div class="card" style="box-shadow: 2px 2px 3px #3e5971;">
                <div class="card-header" style="background-size: cover; background-position: top center; line-height:13px; padding-top:20px;background: #000428;background: -webkit-linear-gradient(to left, #004e92, #000428);background: linear-gradient(to left, #004e92, #000428);">
                    <h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">Transmission history</h4>
                    <p class="category" style="color:#fff; font-size:14px">Latest history(5TH)</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <col width="10%" />
                        <col width="20%" />
                        <col width="30%" />
                        <col width="30%" />
                        <col width="20%" />
                        <thead class="text-primary">
                        <tr>
                            <th>코인</th>
                            <th>구분</th>
                            <th>주소</th>
                            <th>잔액</th>
                            <th>날짜</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?
        $i=0;
        ksort($item);
        if(!empty($item))
        {
            foreach($item as $key => $row) {
                if($row["CATEGORY"] == 'move') {
                    if($row["OTHERACCOUNT"] == 'admin')
                        continue;
                    else
                        $row["CATEGORY"] = 'send';
                }
                $i += 1;
                if($i == 6)
                {
                    break;
                }
                $regdate	=  date("y-m-d",strtotime($row["TIME"]));
                ?>
                                <tr>
                                    <td align="center"><?=$row["COIN"]?></td>
                                    <td align="center"><?=$row["CATEGORY"]?></td>
                                    <td align="center"><?=$row["ADDRESS"] == '' ? '관리자' : $row["ADDRESS"]?></td>
                                    <td align="center"><?=number_format($row["AMOUNT"],4)?> <?=$row["COIN"]?></td>
                                    <td align="center"><?=$regdate?></td>
                                </tr>
                                <?
            }
        }
        else
        {?>
                            <td align="center" colspan="5"> 데이터가 없습니다</td>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
-->
        <div class="col-md-12" style="margin:20px 0 20px 0;">
            <div class="card" style="box-shadow: 2px 2px 3px #7c7d80;">
                <div class="card-header" style="background:#7c7d80; line-height:13px; padding-top:31px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">
                    <h4 class="title" style="color:#fff; font-size:18px; font-weight:bold">お知らせ</h4>
                    <p class="category" style="color:#fff; font-size:14px">お知らせのご案内</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table" style='padding:10px;'>
                        <col width="70%" />
                        <col width="30%" />
                        <thead class="text-primary">
                        <tr>
                            <th style="text-align: left !important;">タイトル</th>
                            <th>日付</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?
                        $i=0;
                        foreach($bbs as $acc) {
                            $i += 1;
                            if($i == 6){break;}
                            $regdate	=  date("y-m-d",strtotime($acc->regdate));
                            ?>
                            <tr>
                                <style>
                                    .te1:hover{color:#fff;}
                                </style>
                                <td><a href="/app/bbs/views/<?=$acc->bbs_no?>" style='color:inherit;'><?=$acc->subject?></a></td>
                                <td align="center"><?=$regdate?></td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
                <?if ($level == 10  ) {?>
                    <a href="/app/bbs"><button type="button" class="btn btn-info pull-right"style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">글쓰기</button></a>
                    <div class="clearfix"></div>
                <?}?>
            </div>
        </div>

    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->

 