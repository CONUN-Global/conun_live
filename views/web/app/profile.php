<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = get_cookie('lang');
?>
<? if ($lang == "us") { ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" style="margin-top:20px">
                    <div class="card" style='box-shadow:1px 1px 4px #2b2854;'>
                        <div class="card-header" style="line-height:15px; padding-top:30px; background:#5cb360; color:#fff;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">
                            <h4 class="title" style="font-size:18px; font-weight:bold;">Edit personal information</h4>
                            <p class="category" style="font-size:14px">You can edit your name and phone number</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <input type="hidden" name="member_name" class="form-control" value="<?=$name?>"  readonly required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">E-mail</label>
                                            <input type="text" name="member_id" class="form-control" value="<?=$member_id?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?=$name?>"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style='margin-bottom:10px;'>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone number</label>
                                            <input type="text" name="mobile" class="form-control" value="<?=$mobile?>"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Registration date</label>
                                            <input type="text" name="regdate" class="form-control" value="<?=$regdate?>"  readonly required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left;margin-left:15px; padding:7px;">Edit personal information</button>
                                <a href="/app/profile/wallet_password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">Change  WithDraw your password</button></a>
                                <a href="/app/profile/password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">Change your password</button></a>


                                <div class="clearfix" style='margin-bottom:20px;'></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">Notice</h4>
                            <p class="card-content noti_bo">
                                Please change password frequently to protect your personal information.<br>
                                You are responsible for managing your personal information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?}else if ($lang == "kr"  or $lang == "") { ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" style="margin-top:20px">
                    <div class="card" style='box-shadow:1px 1px 4px #2b2854;'>
                        <div class="card-header" style="line-height:15px; padding-top:30px; background:#5cb360; color:#fff;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">
                            <h4 class="title" style="font-size:18px; font-weight:bold">???????????? ????????????</h4>
                            <p class="category" style="font-size:14px">????????? ??????????????? ???????????? ??? ????????????.</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <input type="hidden" name="member_name" class="form-control" value="<?=$name?>"  readonly required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????????</label>
                                            <input type="text" name="member_id" class="form-control" value="<?=$member_id?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????</label>
                                            <input type="text" name="name" class="form-control" value="<?=$name?>"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">???????????????</label>
                                            <input type="text" name="mobile" class="form-control" value="<?=$mobile?>"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????????</label>
                                            <input type="text" name="regdate" class="form-control" value="<?=$regdate?>"  readonly required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left;margin-left:10px; padding:7px;">??????????????????</button>
                                <a href="/app/profile/wallet_password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">?????? ??????????????????</button></a>
                                <a href="/app/profile/password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">????????? ??????????????????</button></a>


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
                                ?????? ????????? ??????????????? ????????? ?????? ??????????????????.<br>
                                ?????? ????????? ???????????? ?????? ????????? ???????????????
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?}else if ($lang == "jp") { ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" style="margin-top:20px">
                    <div class="card" style='box-shadow:1px 1px 4px #2b2854;'>
                        <div class="card-header" style="line-height:15px; padding-top:30px; background:#5cb360; color:#fff;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">
                            <h4 class="title" style="font-size:18px; font-weight:bold">??????????????????????????????</h4>
                            <p class="category" style="font-size:14px">???????????????????????????????????????????????????</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <input type="hidden" name="member_name" class="form-control" value="<?=$name?>"  readonly required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????????</label>
                                            <input type="text" name="member_id" class="form-control" value="<?=$member_id?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????</label>
                                            <input type="text" name="name" class="form-control" value="<?=$name?>"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????????????????</label>
                                            <input type="text" name="mobile" class="form-control" value="<?=$mobile?>"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">?????????</label>
                                            <input type="text" name="regdate" class="form-control" value="<?=$regdate?>"  readonly required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left;margin-left:10px; padding:7px;">?????????????????????</button>
                                <a href="/app/profile/wallet_password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">??????   ????????????????????????</button></a>
                                <a href="/app/profile/password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">????????????????????????</button></a>
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
                                ???????????????????????????????????????????????????????????????????????????????????????<br>
                                ???????????????????????????????????????????????????????????????????????????
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?}else if ($lang == "cn") { ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8" style="margin-top:20px">
                    <div class="card" style='box-shadow:1px 1px 4px #2b2854;'>
                        <div class="card-header" style="line-height:15px; padding-top:30px; background:#5cb360; color:#fff;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">
                            <h4 class="title" style="font-size:18px; font-weight:bold">??????????????????</h4>
                            <p class="category" style="font-size:14px">?????????????????????????????????</p>
                        </div>

                        <div class="card-content">
                            <form name="reg" action="<?=current_url()?>" method="post" onsubmit="return formCheck(this);">
                                <input type="hidden" name="member_name" class="form-control" value="<?=$name?>"  readonly required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????</label>
                                            <input type="text" name="member_id" class="form-control" value="<?=$member_id?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">??????</label>
                                            <input type="text" name="name" class="form-control" value="<?=$name?>"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">????????????</label>
                                            <input type="text" name="mobile" class="form-control" value="<?=$mobile?>"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">????????????</label>
                                            <input type="text" name="regdate" class="form-control" value="<?=$regdate?>"  readonly required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left;margin-left:10px; padding:7px;">??????????????????</button>
                                <a href="/app/profile/wallet_password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">??????  ????????????</button></a>
                                <a href="/app/profile/password"><button type="button" class="btn btn-info pull-right" style="margin-right:15px; padding:7px;background: #0f0c29;background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);background: linear-gradient(to left, #24243e, #302b63, #0f0c29);">????????????</button></a>
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
                                ??????????????????????????????????????????????????????<br>
                                ?????????????????????????????????
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? } ?>