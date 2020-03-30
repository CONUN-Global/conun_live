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
    <!--
        <link rel="stylesheet" href="/css/media.css"/>
        <script src="/js/common.js"></script>
        -->
    <!--

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  -->


    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.2.0/dist/jsQR.min.js"></script>
    <script src="/js/jquery-3.4.1.min.js" ></script>


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
<body id="<?=$body;?>"   class="<?=$body_class;?>">
<?}else{?>
<body id="default"   class="<?=$body_class;?>">

<?}?>
<div id="frame">