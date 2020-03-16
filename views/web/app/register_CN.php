<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="<?=SKIN_DIR?>/js/register_CN.js"></script>
<script language="javascript">
    document.onkeydown = function()
    {
        var iTemp;
        if (event.keyCode == 13)
            close_divpop('divpop_frm', 'divpop');
    }

    function close_divpop(frm, div){
        document.getElementById(div).style.display='none';
    }
</script>

<script language="javascript">
    document.onkeydown = function()
    {
        var iTemp;
        if (event.keyCode == 13)
            close_divpop('divpop_frm01', 'divpop01');
    }

    function close_divpop(frm, div){
        document.getElementById(div).style.display='none';
    }
    function show_divpop(){
        document.getElementById('divpop').style.display='block';
    }
</script>


<style type="text/css">
    #divpop{position:fixed; left:0px;top:15%;width:100%;height:100%; z-index:10; line-height:20px;vertical-align:middle;text-align:center;display:none;background-image:url(back_top.jpg)}
    #divpop {z-index:100 !important}
    #divpop table {z-index:1000000000; position:relative;}
    #divpop .dim {width:100%; height:100%; position:fixed; background:#000; opacity:0.8; top:0; z-index:1000000}
    #divpop form {text-align:center; padding-right:20px}
    #divpop font {}

</style>
<div class="header header-filter" style="background-image: url(<?php echo base_url('views/web/app/img/bg_us.jpg'); ?>); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form name="reg_form" action="<?=current_url()?>" method="post" onsubmit="return formCheck();">
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="member_id_enabled" id="member_id_enabled" value="" >
                        <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;">
                            <h3>成为会员</h3>
                            <br>在下面注册一个免费钱包
                        </div>
                        <p class="text-divider"><?=$conf['coinName']?></p>
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">名</i>
                                </span>
                                <input name="member_name" type="text" placeholder="名" class="form-control" required />
                            </div>

                            <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">电子邮件</i>
								</span>
                                <input id="member_id" name="member_id" type="text" class="form-control" placeholder="会员 Email"  onblur='idcheck();' required>
                                <span class="input-group-btn">
                                     <button class="btn btn-info    tx-11 tx-spacing-2 btn-sm" style="margin-top: 20px" onclick="emaiAuth(); return false;" >转发</button>
                                </span>

                            </div>
                            <div class="reg-error" id='msg_member_id' class="msg"></div>

                            <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">邮件验证</i>
									</span>
                                <input id="mail_code" name="mail_code" type="text" class="form-control" placeholder="电子邮件验证码"   required>
                                <span class="input-group-btn">
                                     <button class="btn btn-info    tx-11 tx-spacing-2 btn-sm" style="margin-top: 20px" onclick="mailcheck(); return false;" >确认</button>
                                    </span>

                            </div>
                            <div class="reg-error" id='msg_email' class="msg"></div>
                            <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">新密码</i>
								</span>
                                <input name="password" type="password" placeholder="新密码" class="form-control"  required/>
                            </div>
                            <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">确认密码</i>
								</span>
                                <input name="password2" type="password" placeholder="确认密码" class="form-control"  required/>
                            </div>

                            <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons"> 取款 新密码</i>
								</span>
                                <input name="wallet_password" type="password" placeholder="取款 新密码" class="form-control"  required/>
                            </div>
                            <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">取款 确认密码</i>
								</span>
                                <input name="wallet_password2" type="password" placeholder="取款 确认密码" class="form-control"  required/>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" required />
                                    我已阅读并且同意 服务条款.
                                    <button class="btn btn-info    tx-11 tx-spacing-2 btn-sm" style="margin-top: 10px" onclick="show_divpop(); return false;" >看</button>
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" id="btn_submit" onclick=”this.disabled=true” class="btn btn-success" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="继续">
                        </div>
                        <div class="input-group">
								<span class="input-group-addon">
								<h6><a href="/app" style="color: #000000"> 登录<a/><h6>
								</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="divpop"  >
    <center>
        <table   cellpadding="0" cellspacing="0" style="margin: 20px;">
            <tr>
                <td width="500" height="30" valign="center" align="middle" bgcolor=#ffffff>

                    <div style="color: #222; margin-bottom: 25px; "><p style=" background-color: #7f7f7f;line-height: 40px;color: #fff;font-weight: bold;">이용약관</p><br/>
                        <div style="padding: 0px 20px; font-size: 13px;position: relative;clear: both;height: 400px;overflow-y: scroll;overflow-x: hidden; text-align:left; font-family: "Malgun Gothic", 돋움, Dotum, sans-serif; padding: 20px; background: rgb(245, 247, 250);">

                        <p><b>이용 약관의 주요 내용 고지</b><br /> 본 이용 약관의 주요 내용은 CONUN(이하 &ldquo;회사&rdquo;)가 제공하는 CONUN 월렛 서비스(이하 &ldquo;서비스&rdquo;)의 이용에 관한 회사와 회원의 권리&middot;의무를 정함을 목적으로 합니다. 그러므로 회원은 본 이용 약관의 주요 내용을 반드시 확인하고, 본 이용 약관의 주요 내용을 이해할 수 없거나 의문이 발생하는 경우에는 이용 약관 전체를 숙독하여 주시기 바랍니다.<br /> 본 약관은 회원과 회사 사이의 기본적인 사항을 규정하기 위한 것입니다.<br /> 회원이 회사의 서비스를 이용하기 위하여 회원의 계정, 비밀번호 기타 회원이 회사에게 제공한 로그인 정보와 일치하는 정보를 기입하여 회사의 모바일 및 웹 페이지에 접속할 경우, 해당 접속 기간 중 이루어지는 모든 행위는 해당 회원의 진정한 의사에 기한 것으로 간주됩니다. 그러므로 회원은 계정, 비밀번호 기타 정보에 대한 보안을 유지하여야 하고, 스스로 범죄로 인한 피해를 주의하여야 합니다.</p>
                        <p>회사가 제공하는 서비스는 블록체인을 이용한 암호화폐의 송금과 조회 기능, 기타 CONUN 월렛 사이트가 정하는 업무입니다.<br /> 회원의 불법행위로 인하여 타 회원과 회사에게 손해가 발생할 경우, 회사는 회원에게 법률상 손해배상청구권을 행사할 수 있습니다. 그러므로 반드시 법령을 준수하여 회사의 서비스를 이용하여 주시기 바랍니다.</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p><br /> 제1장 총칙</p>
                        <p>제1조 목적</p>
                        <p>이 약관은 회사가 제공하는 CONUN 월렛 플랫폼(이하 &ldquo;플랫폼&rdquo;) 및 관련 제반 서비스의 이용조건 및 절차 등에 관한 회사와 회원 간의 권리 의무 및 책임사항, 기타 필요한 사항을 규정함을 목적으로 합니다.</p>
                        <p>제2조 정의</p>
                        <p>이 약관에서 사용하는 용어의 정의는 다음과 같습니다.</p>
                        <p>&ldquo;서비스&rdquo;라 함은 단말기(PC, 휴대용 단말기 등의 각종 유&middot;무선 장치를 포함)에 상관없이, 이용자가 이용할 수 있는 회사의 암호화폐 송금과 조회, 기타 CONUN 월렛서비스 및 이와 관련된 제반 서비스를 의미합니다.</p>
                        <p>&ldquo;이용자&rdquo;라 함은 CONUN 월렛 사이트에 접속하여 이 약관에 따라 CONUN 월렛이 제공하는 서비스를 받는 회원을 의미합니다.</p>
                        <p>&ldquo;회원&rdquo;이라 함은 서비스에 접속하여 이 약관에 따라 회원가입을 하여 회사와 이용계약을 체결하고, 회사가 제공하는 서비스를 이용하는 개인 및 법인을 의미합니다.</p>
                        <p>&ldquo;아이디(&ldquo;ID&rdquo; 또는 &ldquo;계정&rdquo;을 총칭)라 함은 회원이 본 약관 및 개인정보처리방침에 동의한 후 회사가 회원을 식별하고 서비스를 제공하기 위해 회원에게 부여한 문자 또는 숫자의 조합을 의미합니다.<br /> 제3조 약관의 명시, 효력 및 변경<br /> 이 약관의 내용은 회사의 서비스 회원가입 관련 사이트에 게시하거나 기타의 회원이 쉽게 확인할 수 있는 방법으로 회원에게 공지하고, 회원이 회원 가입 시 이 약관에 동의함으로써 효력이 발생합니다.<br /> 회사는 &ldquo;약관의 규제에 관한 법률&rdquo;, &ldquo;정보통신망이용촉진 및 정보보호 등에 관한 법률&rdquo;, &ldquo;전자상거래 등에서의 소비자보호에 관한 법률&rdquo;, &ldquo;전자문서 및 전자거래기본법&rdquo;, &ldquo;전자금융거래법&rdquo;, &ldquo;전자서명법&rdquo;, &ldquo;소비자기본법&rdquo; 등 관련 법률을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다.<br /> 회사가 약관을 개정할 경우 적용일자 및 개정 사유를 명시하여 현행약관과 함께 개정 약관을 회사 사이트의 초기화면이나 팝업화면 또는 공지사항 게시판 등 회원이 쉽게 확인할 수 있는 방법으로 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다.<br /> 회사가 전항에 따라 개정약관을 공지하면서 회원에게 7일 내에 의사 표시를 하지 않으면 개정약관에 동의한다는 것으로 본다는 뜻을 명확하게 고지 또는 통지하였음에도 불구하고, 회원이 명시적으로 거부의 의사표시를 하지 아니한 경우 회원이 개정약관에 동의한 것으로 간주합니다.<br /> 회원이 개정약관에 동의하지 않을 경우, 회원은 이용계약을 해지할 수 있고, 회사는 회원을 탈퇴 처리할 수 있습니다.</p>
                        <p><br /> 제4조 약관 외 준칙<br /> 이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 대한민국의 관련 법령 또는 회사 가 정한 서비스의 개별 이용약관(이하 &ldquo;세부지침&rdquo;), 운영정책 및 규칙 등의 규정에 따릅니다. 또한 본 약관과 세부지침의 내용이 충돌할 경우 세부지침에 따릅니다.</p>
                        <p>제2장 서비스 이용 신청 및 승낙(회원가입 및 탈퇴)</p>
                        <p>제5조 이용계약의 성립</p>
                        <p>회원은 회사가 정한 가입 양식에 따라 회원정보를 기입한 후 이 약관에 동의한다는 의사표시를 하여 회원가입을 신청합니다.<br /> 회원가입은 회사의 승낙이 회원에게 도달한 시점으로 합니다.<br /> 이용 계약은 회원ID 단위로 체결합니다. 이용계약이 성립되면, 이용신청자는 회원으로 등록됩니다.</p>
                        <p>&nbsp;</p>
                        <p>제6조 이용 신청<br /> 이용신청은 온라인으로 회사 소정의 가입신청 양식에서 요구하는 사항을 기록하여 신청합니다<br /> 온라인 가입신청 양식에 기재하는 모든 회원 정보는 실제 데이터인 것으로 간주하며 실명이나 실제 정보를 입력하지 않은 회원은 법적인 보호를 받을 수 없습니다.<br /> 회사는 회원에게 회사의 관련서비스에 대한 정보를 E-mail 등을 통하여 제공할 수 있습니다.</p>
                        <p><br /> 제7조 아이디 생성 거절 및 유보<br /> ① 회원이 다른 사람의 명의나 이메일 주소 등 다른 사람의 개인정보를 이용하여 계정을 생성하려 하는 경우<br /> ② 회원의 신청에 따른 계정이 생성되었음에도 불구하고 탈퇴를 신청하거나, 탈퇴 처리가 완료되었음에도 동일한 계정을 신청하는 등의 경우<br /> ③ 회원이 서비스를 이용하는 과정에서 발생한 회원의 불법행위로 인하여 회사에게 손해가 발생한 경우<br /> ④ 회원이 해킹 등의 법령을 위반하여 서비스를 이용한 것이 확인된 경우<br /> 회원이 위 각 호의 어느 하나에 위반하여 계정을 생성, 이용한 것으로 판명된 때에는 회사는 즉시 회원의 서비스 이용을 중단하는 등의 제한을 할 수 있습니다.</p>
                        <p>회사는 아래와 같은 경우 회원의 계정 신청에도 불구하고 회원의 계정 생성을 유보할 수 있습니다.<br /> ① 제공 서비스 설비용량에 현실적인 여유가 없는 경우<br /> ② 서비스 제공을 위한 기술적인 부분에 문제가 있다고 판단되는 경우<br /> ③ 기타 회사가 재정적, 기술적으로 유보가 필요하다고 판단되는 경우</p>
                        <p>제8조 이용계약의 중지 및 해지<br /> 회원이 이용계약을 해지하고자 할 때에는 회원 본인이 해지 신청을 하여야 합니다.</p>
                        <p>회사는 이용제한을 하고자 하는 경우에는 그 사유, 일시 및 기간을 정하여 이메일 등의 방법을 이용하여 해당 회원에게 통지합니다. 다만, 회사가 긴급하게 이용을 중지해야 할 필요가 있다고 인정하는 경우에는 위 과정 없이 서비스 이용을 제한할 수 있습니다.(이하 &ldquo;긴급제한&rdquo;)</p>
                        <p>서비스 이용중지를 통지 받은 회원은 이용중지에 대하여 이의가 있을 경우 이의 신청을 할 수 있습니다.</p>
                        <p>회원이 서비스를 이용하는 데에 있어서 불법적인 계정 취득, 해킹 활동, 타인을 사칭하는 행위, 임의의 금전적인 목적을 이용하여 추천인을 매수하는 행위 등에 대하여 해당 회원의 계정은 정지 처리를 하고 해당 계정의 자산을 동결할 수 있습니다.</p>
                        <p><br /> 제9조 회원 정보의 변경<br /> 회원은 회원가입 신청 시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 이메일 등의 방법으로 회사에 대하여 그 변경사항을 알려야 합니다.</p>
                        <p>제1항의 변경사항을 회사에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</p>
                        <p>제3장 회원의 의무</p>
                        <p>제10조 회원 아이디와 비밀번호 관리에 대한 회원의 의무<br /> 아이디와 비밀번호에 관한 모든 관리 책임은 회원에게 있습니다. 회원에게 부여된 아이디와 비밀번호의 관리소홀, 부정사용에 의하여 발생하는 모든 결과에 대한 책임은 회원에게 있습니다. 단 회사의 고의 또는 과실로 인한 경우에는 그러하지 않습니다<br /> 회원은 자신의 아이디가 부정하게 사용된 사실을 알게 될 경우 반드시 회사에 그 사실을 통지하고 회사의 안내에 따라야 합니다.<br /> 회사는 소셜 계정의 해킹을 통한 피해를 방지하기 위하여 소셜 계정의 2중보안 설정을 권장합니다.<br /> 제2항의 경우에 해당 회원이 회사에 그 사실을 통지하지 않거나, 통지한 경우에도 해당 회원이 회사의 안내에 따르지 않아 발생한 손해에 대하여 회사는 책임지지 않습니다.<br /> 제3항과 제4항의 경우에 회사가 권장한 내용을 준수하지 않고 일어난 제3자에 따른 피해에 대하여 회사는 책임지지 않습니다</p>
                        <p>제11조 계정의 관리<br /> 계정은 회원 본인만 이용할 수 있고, 어떠한 경우에도 다른 사람이 회원의 계정을 이용하도록 허 락할 수 없습니다. 그리고 회원은 다른 사람이 회원의 계정을 무단으로 사용할 수 없도록 직접 비밀번호 등을 관리하여야 합니다. 회원이 무단 사용을 발견하는 즉시, 회원은 고객센터를 통하여 회사에게 이를 통지하여야 하고, 회사는 즉시 계정의 이용중단 등의 조치를 취할 수 있습니다.<br /> 회원이 서비스 내 정보를 수정하지 아니하여 발생하는 손해 및 회원이 비밀번호 등을 도용 당하여 제3자가 회원의 계정을 무단으로 사용함으로 인하여 발생한 손해에 대하여 회사는 책임을 부담하지 아니합니다. 이 경우 회원은 전자금융사기에 의한 피해자 등 제3자에 대하여 손해배상의무를 부담할 수 있고, 회사의 고의 또는 과실로 인한 개인정보 유출사실이 입증되지 아니하는 한 회사는 회원의 제3자에 대한 배상의무 등에 대하여 어떠한 책임도 부담하지 아니합니다.<br /> 회사가 회원이 서비스 내 정보에 기재한 전자우편, 전화번호 등에게 이용계약에 따른 중요한 내용을 통지하였음에도 불구하고, 회원이 제2항에 따른 의무를 이행하지 아니함으로 인하여 발생하는 불이익은 회원이 부담하여야 합니다.</p>
                        <p>제12조 정보의 제공<br /> 회사는 회원의 사전동의를 받아 서비스 이용 중 필요가 있다고 인정되는 다음과 같은 서비스 정보에 대하여 전자우편 등의 방법으로 회원에게 제공할 수 있으며, 회원은 원치 않을 경우 정보수신동의를 철회 할 수 있습니다. 단, 정보의 성질상 반드시 회원에게 통지하여야 하는 정보는 회원의 정보수신동의 및 철회 여부에 무관하게 제공됩니다.<br /> 가입 정보 관련 서비스<br /> 개인 정보 관련 서비스<br /> 기타 회사가 수시로 결정하여 회원에게 제공하는 서비스</p>
                        <p>&nbsp;</p>
                        <p>제4장 서비스의 이용</p>
                        <p>제13조 서비스의 종류<br /> 회사에서 제공하는 서비스에는 암호화폐 예치 및 전송 서비스, 블록체인 트랜잭션 서비스 등이 있습니다.<br /> 회사가 제공하는 서비스의 종류는 회사의 사정에 의하여 수시로 변경될 수 있으며, 제공되는 서비스에 대한 저작권 및 지적재산권은 &ldquo;회사&rdquo;에 귀속됩니다<br /> 회사는 서비스와 관련하여 회원에게 회사가 정한 이용조건에 따라 계정, 아이디, 서비스 등을 이용할 수 있는 이용권한만을 부여하며, 회원은 이를 활용한 유사 서비스 제공 및 상업적 활동을 할 수 없습니다.</p>
                        <p>제14조 서비스 내용의 공지 및 변경<br /> 회사는 서비스의 종류에 따라 각 서비스의 특성, 절차 및 방법에 대한 사항을 서비스 화면을 통하여 공지하며, 회원은 회사가 공지한 각 서비스에 관한 사항을 이해하고 서비스를 이용해야 합니다.<br /> 회사는 서비스 내용이 변경되는 경우, 변경 7일 이전에 변경되는 내용을 약관 변경 공지 방법에 준하여 공지하여야 하며, 회원이 공지 내용을 조회하지 않아 입은 손해에 대하여는 책임지지 않습니다.</p>
                        <p><br /> 제15조 서비스의 유지 및 중지<br /> 서비스의 이용은 회사의 업무상 또는 기술상 특별한 지장이 없는 한 평일 9시부터 21시까지 운영됩니다. 다만 정기 점검 등의 필요로 회사가 정한 날이나 시간은 그러하지 않습니다.<br /> 회사는 서비스를 일정범위로 분할하여 각 범위 별로 이용가능 시간을 별도로 정할 수 있습니다. 이 경우 그 내용을 사전에 공지합니다.<br /> 회사는 다음 각 호에 해당하는 경우 서비스 제공을 중지할 수 있습니다.<br /> 1 서비스용 설비의 보수 등 공사로 부득이한 경우<br /> 2 전기통신사업법에 규정된 기간통신사업자가 전기통신 서비스를 중지했을 경우<br /> 3 기타 불가항력적 사유가 있는 경우<br /> 회사는 국가비상사태, 정전, 서비스 설비의 장애 또는 서비스 이용의 폭주 등으로 정상적인 서비스 이용에 지장이 있는 때에는 서비스의 전부 또는 일부를 제한하거나 정지할 수 있습니다.<br /> 회사는 새로운 서비스로 교체 또는 기타 회사가 서비스를 제공할 수 없는 사유 발생 시 제공되는 서비스를 중단할 수 있습니다</p>
                        <p>제5장 개인 정보 보호</p>
                        <p>제16조 회원정보 사용에 대한 동의<br /> 회사는 회원의 개인정보를 본 이용계약의 이행과 본 이용계약 상의 서비스 제공을 위한 목적으로 이용합니다. 회원의 개인 정보에 대해서는 회사의 개인정보 보호정책이 적용됩니다. 회원정보의 관리 책임자는 회사가 정하는 운영자입니다.<br /> 회원이 이용신청서에 회원정보를 기재하고, 회사에 본 약관에 따라 이용 신청을 하는 것은 회사가 본 약관에 따라 이용신청서에 기재된 회원정보를 수집, 이용 및 제공하는 것에 동의하는 것으로 간주됩니다.<br /> 회원이 제공한 개인정보는 회원의 동의 없이 목적 외의 이용으로 제공할 수 없습니다.<br /> 회원은 회원정보 수정을 통해 언제든지 개인 정보에 대한 열람 및 수정을 할 수 있습니다.<br /> 이용 신청자 또는 회원이 이용 신청 시 기재한 신상정보가 변경 되었을 경우에는 즉시 운영자 또는 회원정보 변경 창을 통해서 관련사항을 수정하여야 합니다.<br /> 전항의 경우, 수정하지 않은 정보로 인한 각종 손해는 당해 회원이 부담하며, 회사는 이에 대하여 아무런 책임을 지지 않습니다.<br /> 회원이 회사의 개인정보 취급에 대해서 불만을 가질 경우 서면상으로 회사에 관련 내용을 제출하여야 하며 이 경우 회사는 적법한 절차에 따라 회원의 불만을 처리해야 합니다.<br /> 회원의 이용 계약 해지는 제9조에 따르며, 이용계약이 해지된 경우 회원의 신상정보는 전자상거래 등에서의 소비자 보호에 관한 법률 등 관계법령에서 명시한 자료를 보관하며 이후에는 삭제합니다.<br /> 회사는 파기하여야 할 개인정보라도 상법 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우에는 관계법령에서 정한 기간 동안 회원의 개인정보를 보관합니다.<br /> 특정 서비스 사용을 위해 개인정보를 수집하거나 전송할 필요가 있을 경우, 회사는 반드시 회원에게 이와 같은 사실을 사전 공지하고 회원의 동의를 구해야 합니다.</p>
                        <p>제6장 손해배상 및 면책조항</p>
                        <p>제17조 손해배상<br /> 회사는 본 약관을 벗어난 일체의 사고에 대하여 책임을 지지 않으며, 회원의 과실로 인해 발생한 분쟁에 대해서 책임을 지지 않습니다.</p>
                        <p>제18조 면책조항<br /> 회사는 다음 각 호에 해당하는 경우에는 책임을 지지 않습니다.<br /> 전시, 사변, 천재지변 또는 이에 준하는 국가 비상 사태 등 불가항력적인 경우<br /> 회원의 고의 또는 과실로 인하여 손해가 발생한 경우<br /> 전기통신사업법에 의한 타 기간 통신사업자가 제공하는 전기통신서비스 장애로 인한 경우<br /> 기타 플랫폼의 고의 또는 과실이 없는 사유로 손해가 발생한 경우</p>
                        <p>제19조 관할법원 및 준거법<br /> 회사의 서비스 이용 등과 관련하여 분쟁이 발생될 경우, 민사소송법상 관할 법원으로 하여 이를 해결합니다.<br /> 서비스 이용과 관련하여 회사와 회원 간의 소송에는 서비스를 제공하는 국가의 법을 적용합니다<br /> 회원의 고의 또는 과실로 인하여 손해가 발생한 경우<br /> 전기통신사업법에 의한 타 기간 통신사업자가 제공하는 전기통신서비스 장애로 인한 경우<br /> 기타 플랫폼의 고의 또는 과실이 없는 사유로 손해가 발생한 경우</p>

                    </div>
</div>
<form name="divpop_frm" method="post" action="" style="  margin-bottom: 16px;">
    <font color=000000></font>
    <a href="javascript:;" onclick="close_divpop('divpop_frm', 'divpop')" style="    border: 1px solid #ccc;
    border-radius: 14px;
    padding: 7px 11px;
    background-color: #ccc;"><font color=000000><b>close</b></font></a>
</form>
</td>
</tr>
<tr>
    <td height="180" style="position: relative;">


    </td>


    </table>
    </center>

    <div class="dim"></div>
    </div>
<script type="text/javascript">
    function mailcheck() {


        var f = document.reg_form;
        if (document.getElementById('member_id_enabled').value != '000') {
            alert('请输入您的ID');
            document.getElementById('member_id').select();
            return false;
        }
        else if(f.mail_code.value == ""){
            alert("请输入您的电子邮件验证码");
            f.auth_number.focus();
            return false;
        }

        else if(f.auth_number.value != f.mail_code.value ){
            alert("电子邮件验证码不匹配");
            f.auth_number.focus();
            return false;
        }
        else  {
            alert("电邮已验证");

        }
    }
    function formCheck()
    {

        var f = document.reg_form;

        // 회원아이디 검사

        idcheck();

        if (document.getElementById('member_id_enabled').value != '000') {
            alert('必填项');
            document.getElementById('member_id').select();
            return false;
        }
        if(f.auth_number.value != f.mail_code.value ){
            alert("电子邮件验证码不匹配");
            return false;
        }
        if (f.password.value == "") {
            alert("必填项");
            f.password.focus();
            return false;
        }


        if (f.password2.value == "") {
            alert("不匹配");
            f.password2.focus();
            return false;
        }
        if (f.password2.value != f.password.value ) {
            alert("密码不匹配。");
            f.password.focus();
            return false;
        }

        if (f.walllet_password.value == "") {
            alert("必填项");
            f.walllet_password.focus();
            return false;
        }


        if (f.walllet_password2.value == "") {
            alert("不匹配");
            f.walllet_password2.focus();
            return false;
        }

        if (f.wallet_password.value !=f.wallet_password2.value ) {
            alert("提款密码不匹配");
            f.wallet_password.focus();
            return false;
        }
        document.getElementById("btn_submit").disabled = true;

    }
</script>




