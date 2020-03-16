<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>


<div class="br-pagebody">
    <div class="row row-sm">


                    <div class="col-sm-12 col-xl-12 mt-2 mb-2 coin_list" style="cursor: pointer"   >
                        <div class="bg-danger rounded overflow-hidden coin_bg">
                            <div class="pd-x-20 pd-t-20_r d-flex align-items-center">
                                <i class="ion ion-document tx-60 lh-0 tx-white op-7"></i>


                                <div class="mg-l-20">

                                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Address</p>


                                    <span class="tx-11 tx-roboto tx-white-8 two" id="address">Scanning</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-3 -->


        <div class="col-sm-12 col-xl-12 mg-t-20 mg-sm-t-0">
            <div class="bg-info rounded overflow-hidden">
                <div class=" align-items-center">
                    <div class=" text-center">


                        <input type="hidden" name="real_bal" id="real_bal" class="form-control" >

                            <div class="col-md-12 text-center" style="padding-top:3%;padding-bottom: 3%">

                                    <video id="preview" style="min-height:94%;  width: 98%"></video>

                                </div>









                    </div>
                </div>

                <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
        </div><!-- col-3 -->
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>






<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
         $("#address").html(content);
         location.href="/app/send?coin_index=<?=$coin_index;?>&qr_address="+content;
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {


            scanner.start(cameras[cameras.length -1]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>
</body>
</html>
