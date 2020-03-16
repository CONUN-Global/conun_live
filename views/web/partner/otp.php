<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?=SKIN_DIR?>/js/register_KR.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.6.0/clipboard.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#btnCopyClip").click(function () {
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
        } catch (e) {
        }

        if (clipboardSupport) {
            $("#btnCopyClip").show();
            $("#txtCopyClip").hide();
        } else {
            $("#btnCopyClip").hide();
            $("#txtCopyClip").show();
        }

        var clipboard = new Clipboard('#btnCopyClip');
        clipboard.on('success', function (e) {
            alert("Seed copied.");
        });

    });
</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>


    <div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                            <input type="hidden" name="secretKey" value="<?=$otp['secretKey'];?>">
                            <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                                <h3 >OTP 등록</h3>


                            </div>



                            <div class="content">

                                <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Qr</i>
									</span>
                                    <img src="<?=$otp['qrCode'];?>">


                                </div>
                                <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">인증코드</i>
									</span>
                                    <input name="otp_password" type="otp_password" placeholder="OTP 코드를 입력..." class="form-control" required />
                                </div>
                            </div>


                            <div class="footer text-center">
                                <input type="submit"  id="btn_submit"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="otp 등록">
                            </div>
                            <div class="input-group">
								<span class="input-group-addon">
									<h6><a href="/app" style="color: #000000"> 메인으로 가기<a/><h6>
								</span>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function formCheck()
        {
            var f = document.reg_form;

            // 회원아이디 검사

            if (f.otp_password.value == "") {
                alert("otp 코드 를 입력하세요");
                f.otp_password.focus();
                return false;
            }



            document.getElementById("btn_submit").disabled = true;

        }
    </script>
