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
                            <h4 class="title" style="font-size:18px; font-weight:bold">출금 비밀번호 수정하기</h4>
                            <p class="category" style="font-size:14px">비밀번호 노출에 주의하세요</p>
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
                                            <label class="control-label">이전 비밀번호</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">새 비밀번호</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">새 비밀번호 확인</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">수정하기</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">개인정보보기</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">안내글</h4>
                            <p class="card-content noti_bo">
                                개인 정보를 보호하기 위해 자주 비밀번호를 변경하십시오.
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
                alert("이전비밀번호와 새비밀번호가 같습니다.");
                frm.new_password_confirm.focus();
                return false;
            }

            if (frm.new_password.value != frm.new_password_confirm.value) {
                alert("새 비밀번호 확인이 틀립니다.");
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
                            <h4 class="title" style="font-size:18px; font-weight:bold">出金 パスワードを変更する。</h4>
                            <p class="category" style="font-size:14px">パスワードの露出にご注意ください</p>
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
                                            <label class="control-label">古いパスワード</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">新しいパスワード</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">パスワードの再確認</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">変更する</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">個人情報の表示</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">通知</h4>
                            <p class="card-content noti_bo">
                                個人情報を保護するためには頻繁にパスワードを変更して下さい。
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
                            <h4 class="title" style="font-size:18px; font-weight:bold">提款 修改密码</h4>
                            <p class="category" style="font-size:14px">请注意密码泄露</p>
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
                                            <label class="control-label">之前使用过的密码</label>
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">新的密码</label>
                                            <input type="password" name="new_password" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">新的密码确认</label>
                                            <input type="password" name="new_password_confirm" class="form-control" value=""  required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right" style="background-size: cover; background-position: top center; float:left; margin-left:3%">修正</button>
                                <a href="/app/profile"><button type="button" class="btn btn-info pull-right" style="margin-right:3%">查看个人信息</button></a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content" style="margin:8% 3%">
                            <h4 class="card-title">信息指南</h4>
                            <p class="card-content noti_bo">
                                为了保护个人信息，请隔期修改您的密码
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