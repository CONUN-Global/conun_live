<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>
<? if ($lang == "us" ) { ?>
    <div class="content">
        <div class="container-fluid" style=" margin-top: 20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="line-height:12px; padding-top:30px; background:#5cb360; color:#fff">
                            <h4 class="title" style="font-size:18px; font-weight:bold">WithDraw Change password</h4>
                            <p class="category" style="font-size:14px">Please be careful with exposure of your password</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title" style="font-size:19px; margin:3% 0 3% 3%; border:1px solid #e1e1e1; background:#f1f1f1; text-align:center; padding: 10px 0;
    width: 93%;">Email : <?=$this->session->userdata('member_id')?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Old password</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">New password</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Verify new password</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">Edit</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">View personal informatio</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">Notice</h4>
                            <p class="card-content noti_bo">
                                Please change your password  frequently to protect your personal information.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script language="javascript">
        function formCheck(frm) {


            if (frm.password.value == frm.new_password.value) {
                alert("The old password and the new password are the same.");
                frm.new_password_confirm.focus();
                return false;
            }

            if (frm.new_password.value != frm.new_password_confirm.value) {
                alert("The new password verification is incorrect.");
                frm.new_password_confirm.focus();
                return false;
            }
            return true;
        }
    </script>

<?}else if ($lang == "kr" or $lang == "") { ?>
    <div class="content">
        <div class="container-fluid" style=" margin-top: 20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="line-height:12px; padding-top:30px; background:#5cb360; color:#fff">
                            <h4 class="title" style="font-size:18px; font-weight:bold">?????? ???????????? ????????????</h4>
                            <p class="category" style="font-size:14px">???????????? ????????? ???????????????</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title" style="font-size:19px; margin:3% 0 3% 3%; border:1px solid #e1e1e1; background:#f1f1f1; text-align:center; padding: 10px 0;
    width: 93%;">Email : <?=$this->session->userdata('member_id')?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????? ????????????</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??? ????????????</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??? ???????????? ??????</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">????????????</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">??????????????????</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">?????????</h4>
                            <p class="card-content noti_bo">
                                ?????? ????????? ???????????? ?????? ?????? ??????????????? ??????????????????.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <script language="javascript">
        function formCheck(frm) {
            if (frm.password.value == frm.new_password.value) {
                alert("????????????????????? ?????????????????? ????????????.");
                frm.new_password_confirm.focus();
                return false;
            }

            if (frm.new_password.value != frm.new_password_confirm.value) {
                alert("??? ???????????? ????????? ????????????.");
                frm.new_password_confirm.focus();
                return false;
            }
            return true;
        }
    </script>

<?}else if ($lang == "jp") { ?>
    <div class="content">
        <div class="container-fluid" style=" margin-top: 20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="line-height:12px; padding-top:30px; background:#5cb360; color:#fff">
                            <h4 class="title" style="font-size:18px; font-weight:bold">?????? ?????????????????????????????????</h4>
                            <p class="category" style="font-size:14px">????????????????????????????????????????????????</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title" style="font-size:19px; margin:3% 0 3% 3%; border:1px solid #e1e1e1; background:#f1f1f1; text-align:center; padding: 10px 0;
    width: 93%;">Email : <?=$this->session->userdata('member_id')?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????????????????????</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">????????????????????????</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">???????????????????????????</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">????????????</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">?????????????????????</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">??????</h4>
                            <p class="card-content noti_bo">
                                ??????????????????????????????????????????????????????????????????????????????????????????
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script language="javascript">
        function formCheck(frm) {

            if (frm.password.value == frm.new_password.value) {
                alert("The old password and the new password are the same.");
                frm.new_password_confirm.focus();
                return false;
            }

            if (frm.new_password.value != frm.new_password_confirm.value) {
                alert("The new password verification is incorrect.");
                frm.new_password_confirm.focus();
                return false;
            }
            return true;
        }
    </script>

<?}else if ($lang == "cn") { ?>
    <div class="content">
        <div class="container-fluid" style=" margin-top: 20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="line-height:12px; padding-top:30px; background:#5cb360; color:#fff">
                            <h4 class="title" style="font-size:18px; font-weight:bold">?????? ????????????</h4>
                            <p class="category" style="font-size:14px">?????????????????????</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title" style="font-size:19px; margin:3% 0 3% 3%; border:1px solid #e1e1e1; background:#f1f1f1; text-align:center; padding: 10px 0;
    width: 93%;">Email : <?=$this->session->userdata('member_id')?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">????????????????????????</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">????????????</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????????????????</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">??????</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">??????????????????</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">????????????</h4>
                            <p class="card-content noti_bo">
                                ??????????????????????????????????????????????????????
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script language="javascript">
        function formCheck(frm) {

            if (frm.password.value == frm.new_password.value) {
                alert("The old password and the new password are the same.");
                frm.new_password_confirm.focus();
                return false;
            }

            if (frm.new_password.value != frm.new_password_confirm.value) {
                alert("The new password verification is incorrect.");
                frm.new_password_confirm.focus();
                return false;
            }
            return true;
        }
    </script>
<?}?>