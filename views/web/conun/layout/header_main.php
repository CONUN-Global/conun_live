<!DOCTYPE html>
<html>
  <head>
    <!-- meta -->
    <meta charset="utf-8" name="viewport" content="width=device-width, height=device-height, user-scalable=yes">
    <!-- semantic meta -->
    <meta name="keywords" content="CONUN, WALLET">
    <meta name="title" content="New Pay Experience, CONUN WALLET">
    <meta name="description" content="CONUN WALLET is a criptocurrency wallet only for CONUN Members. You can Pay with CON and ETH at any of CONUN member store.">
    <meta name="author" content="LIUM Corporation">
    <!-- open graph -->
    <meta property="og:title" content="New Pay Experience, CONUN WALLET">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://wallet.conun.io/app">
    <meta property="og:site_name" content="CONUN WALLET">
    <meta property="og:description" content="CONUN WALLET is a criptocurrency wallet only for CONUN Members. You can Pay with CON and ETH at any of CONUN member store.">
    <meta property="og:image" content="">
    <!-- css & js -->
    <link rel="stylesheet" href="/css/common.css?version=<?php echo time()?>"/>
    <script src="/js/common.js"></script>
<!--
    <link rel="stylesheet" href="/css/media.css"/>

    -->
      <script src="/js/jquery-3.4.1.min.js" ></script>

      <link href="/css/cuppa-datepicker-styles.css" rel="stylesheet">
      <script type="text/javascript" src="/js/moment.js"></script>
      <script type="text/javascript" src="/js/cuppa-calendar.js"></script>

      <script type="text/javascript"  src="/js/qr.js"></script>
    <!-- title -->
    <title>CONUN  WALLET</title>
      <script src='https://cdn.bootcss.com/socket.io/2.0.3/socket.io.js'></script>
      <script type="module"  src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.8.0/polyfill.js"></script>
      <script>
          var uid = "<?=$this->session->userdata('member_id');?>";
          $(document).ready(function () {


              var socket = io('https://socket.conunkorea.io');

              socket.on('connect', function(){
                  socket.emit('login', uid);
              });

              socket.on('new_msg', function(msg){
                  console.log(msg);

                  alert(msg);
              });

              socket.on('payment', function(msg){

                  $("#qr_payment").val(msg);
                  $("#payment_form").submit();


              });
              socket.on('noti', function(msg){


                      location.href='/conun/coin?coin_no='+msg
                 

              });
              socket.on('update_online_count', function(online_stat){

              });
          });

      </script>
  </head>

  <? if($body){?>
  <body id="<?=$body;?>"  class="<?=$body_class;?>">
  <?}else{?>
  <body id="default"   class="<?=$body_class;?>">

  <?}?>



  <?
    if($coin_no!=""){
        $tax_display ="block";
    }else{
        $tax_display ="none";
    }


    if($tran_info->payment_type=="send"){
          if($tran_info->type == "CON") {

              $won_price = bcmul($tran_info->saved_point, $sise['TICK']['CLOSING_PRICE'], 2);
          }else{
              $won_price=  number_format($tran_info->saved_point,2) ;
          }
    }
  if($tran_info->payment_type=="PAYMENT"){

      if($tran_info->type == "CON"){
      $won_price=  bcmul($tran_info->saved_point , $tran_info->payment_amount,2);
      }
      else{
          $won_price=  number_format($tran_info->saved_point,2) ;
      }


  }


  if($tran_info->payment_type=="EXCHANGE"){

      if($tran_info->type == "CON"){
          $won_price=  bcmul($tran_info->saved_point , $tran_info->exchange_price,3);

      }else{
          $won_price=  number_format($tran_info->saved_point,3) ;
      }


  }

  if($tran_info->bonuns_point==""){
      $bonus_point=0;
  }else{
      $bonus_point=$tran_info->bonuns_point;
  }


  if($partner_info->partner_company){
      $recive_name=$partner_info->partner_company;
  }else{
      if($tran_info->event_id !="out"){
          $recive_name=$tran_info->event_id;
      }else{
          $recive_name=$tran_info->event_address;
      }

  }


  ?>


  <div id="receipt" style="display:<?=$tax_display;?>;">
      <div class="inner flex col">
          <div id="header">
              <p class="title"><?=strtoupper($tran_info->payment_type);?><BR><?=$this->lang->line('FINISHED');?></p>
              <p class="title_nano"><?=$this->lang->line('Payment has been finished');?>.</p>
          </div>
          <div id="mid" class="flex row">
              <div style="background-image:url(/img/bg_receipt_left.png)"></div>
              <div style="background-image:url(/img/bg_receipt_center.png)"></div>
              <div style="background-image:url(/img/bg_receipt_right.png)"></div>
          </div>
          <div id="cont">
              <p class="title_min dark"><?=$this->lang->line('DETAILS');?></p>
              <div id="trans_detail" class="orderinfo">
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('Target');?></span>
                      <div>
                          <!-- 결제 대상의 상호명과 지갑주소 정보 -->
                          <p id="orderfrom" class="mab5"><?=$recive_name;?></p>
                          <p id="orderfromdetail" class="title_nano" style="word-break:break-all;"><?=$tran_info->event_address;?></p>
                      </div>
                  </div>
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('Price');?></span>
                      <div>
                          <!-- 결제 가격 혹은 전환결과 혹은 전송량 -->
                          <p id="ordercon" class="point"><span><?=$won_price;?></span> W</p>

                      </div>
                  </div>
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('Time');?></span>
                      <div>
                          <?=$tran_info->regdate;?>
                      </div>
                  </div>
              </div>
              <div id="payinfo" class="orderinfo" style="padding-top:0;">
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('METHOD');?></span>
                      <div>
                          <!-- 결제 수단 -->
                          <p id="paymethod"><?=$tran_info->type;?></p>
                      </div>
                  </div>
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('AMOUNT');?></span>
                      <div>
                          <!-- 결제 양 -->
                          <p id="payamount" class="point"><?=number_format($tran_info->saved_point,6);?></p>
                      </div>
                  </div>
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('GAS');?></span>
                      <div>
                          <p id="paygas"><?=number_format( $tran_history->gasfee,7);?> ETH</p>
                      </div>
                  </div>
                  <div class="flex row">
                      <span class="title_min"><?=$this->lang->line('MOCP');?></span>
                      <div>
                          <p id="addedmocp">+ <?=$bonus_point;?></p>
                      </div>
                  </div>
              </div>
          </div>
          <a href="/"><button type="button" name="button" class="default active"><?=$this->lang->line('BACK TO MAIN');?></button></a>
      </div>
  </div>
  <form  id="payment_form" method="post" action="/conun/send" style="height: 0px">
      <input type="hidden" name="qr_value" id="qr_payment">
  </form>
    <div id="frame">