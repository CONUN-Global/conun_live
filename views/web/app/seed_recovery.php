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

<? if ($lang == "us") { ?>
<div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                        <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                            <h3 >Wallet recovery</h3>


                        </div>
                        <p class="text-divider"><?=$conf['coinName']?></p>
                        <div class="content">
                            <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Seed</i>
									</span>
                                <textarea class="form-control "  name="seed" id="seed"  style="height: 100px;color: red" placeholder="Enter seed"></textarea>


                            </div>



                        </div>
                        <div class="footer text-center">
                            <input type="submit"  id="btn_submit"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="Wallet recovery">
                        </div>
                        <div class="input-group">
								<span class="input-group-addon">
									<h6><a href="/app" style="color: #000000">Back to main<a/><h6>
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

        if (f.seed.value == "") {
            alert("Enter seed");
            f.seed.focus();
            return false;
        }



        document.getElementById("btn_submit").disabled = true;

    }
</script>
<?}else if ($lang == "kr"  or $lang == "") { ?>

    <div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                            <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                                <h3 >지갑복구</h3>


                            </div>
                            <p class="text-divider"><?=$conf['coinName']?></p>
                            <div class="content">
                                <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Seed</i>
									</span>
                                    <textarea class="form-control "  name="seed" id="seed"  style="height: 100px;color: red" placeholder="시드을 입력 하세요"></textarea>


                                </div>



                            </div>
                            <div class="footer text-center">
                                <input type="submit"  id="btn_submit"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="지갑 복구">
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

            if (f.seed.value == "") {
                alert("Seed 를 입력하세요");
                f.seed.focus();
                return false;
            }



            document.getElementById("btn_submit").disabled = true;

        }
    </script>
<?}else if ($lang == "jp") { ?>
    <div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                            <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                                <h3 >財布の回復</h3>


                            </div>
                            <p class="text-divider"><?=$conf['coinName']?></p>
                            <div class="content">
                                <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Seed</i>
									</span>
                                    <textarea class="form-control "  name="seed" id="seed"  style="height: 100px;color: red" placeholder="Seedを入力してください"></textarea>


                                </div>



                            </div>
                            <div class="footer text-center">
                                <input type="submit"  id="btn_submit"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="財布の回復">
                            </div>
                            <div class="input-group">
								<span class="input-group-addon">
									<h6><a href="/app" style="color: #000000"> メインに行く<a/><h6>
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

            if (f.seed.value == "") {
                alert("Seedを入力してください");
                f.seed.focus();
                return false;
            }



            document.getElementById("btn_submit").disabled = true;

        }
    </script>
<?}else if ($lang == "cn") { ?>



    <div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_kr.jpg'); ?>); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                            <input type="hidden" name="type" value="1">
                            <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                            <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                                <h3 >钱包恢复</h3>


                            </div>
                            <p class="text-divider"><?=$conf['coinName']?></p>
                            <div class="content">
                                <div class="input-group  " style="text-align: center">
                                <span class="input-group-addon">
										<i class="material-icons">Seed</i>
									</span>
                                    <textarea class="form-control "  name="seed" id="seed"  style="height: 100px;color: red" placeholder="输入种子"></textarea>


                                </div>



                            </div>
                            <div class="footer text-center">
                                <input type="submit"  id="btn_submit"  style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="钱包恢复">
                            </div>
                            <div class="input-group">
								<span class="input-group-addon">
									<h6><a href="/app" style="color: #000000"> 回到主要<a/><h6>
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

            if (f.seed.value == "") {
                alert("输入种子");
                f.seed.focus();
                return false;
            }



            document.getElementById("btn_submit").disabled = true;

        }
    </script>

<? } ?>
