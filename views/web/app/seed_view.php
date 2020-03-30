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

<div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                        <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                            <h3 >Seed 확인</h3>
                            <br>Seed 는 지갑을 복구 할때 필요합니다.
                            <BR>타인에게 공유하지 말아주세요.
                        </div>
                        <p class="text-divider"><?=$conf['coinName']?></p>
                        <div class="content">
                            <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Seed</i>
									</span>
                                  <textarea class="form-control " id="etc_clipURL" style="height: 100px;color: red"><?=$seed;?></textarea>


                            </div>



                        </div>
                        <div class="footer text-center">
                            <input type="button" id="btnCopyClip" data-clipboard-action="copy" data-clipboard-target="#etc_clipURL"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="시드 복사">
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

        idcheck();

        if (document.getElementById('member_id_enabled').value != '000') {
            alert('아이디를 입력하세요');
            document.getElementById('member_id').select();
            return false;
        }

        if (f.password.value == "") {
            alert("새 암호를 입력하세요");
            f.password.focus();
            return false;
        }

        if (f.password2.value == "") {
            alert("확인 암호를 입력하세요");
            f.password2.focus();
            return false;
        }

        document.getElementById("btn_submit").disabled = true;

    }
</script>