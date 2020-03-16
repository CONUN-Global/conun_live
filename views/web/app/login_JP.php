<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- 팝업 쿠키설정 -->
		<script type="text/javascript">
		//<![cdata[
			function set_cookie(name, value, expiredays) {
			var todayDate = new Date();
			todayDate.setDate( todayDate.getDate() + expiredays );
			document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
			}


			function close_divpop(frm, pop) {
			var f = eval("document."+frm);
			if(f.chkbox.checked){
			set_cookie(pop, "Y", 1);
			}
			document.getElementById(pop).style.display = "none";
			} 


			cookiedata = document.cookie;
			if(cookiedata.indexOf("divpop01=Y") < 0) {
			document.getElementById('divpop01').style.display = "block";
			} else {
			document.getElementById('divpop01').style.display = "none";
			}
			//]]>
		</script>


		<!-- 팝업 엔터로 레이어 닫기 -->
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
		</script>


		 <style type="text/css">
		  #divpop{position:fixed; left:0px;top:15%;width:100%;height:100%; z-index:10; line-height:20px;vertical-align:middle;text-align:center;display:none;background-image:url(back_top.jpg)}
		  #divpop {z-index:100 !important}
		#divpop table {z-index:1000000000; position:relative;}
		#divpop .dim {width:100%; height:100%; position:fixed; background:#000; opacity:0.8; top:0; z-index:1000000}
		#divpop form {text-align:center; padding-right:20px}
		#divpop font {}

		</style>
	 <script type="text/javascript" src="<?=SKIN_DIR?>/js/member.js?<?=today()?>"></script>
<div id="video_background" style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden;  background-size: 100% auto;background-color: transparent; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;height:800px;">
    <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" style="z-index:-100;" autoplay="" muted="" loop="">
        <source src="/views/web/app/img/Chain.mp4" type="video/mp4">

    </video>
</div>

<script>
    $(window).resize(function() {
        $('#video_background').css('width', $(window).width()  );
        $('#video_background').css('height', $(window).height()   );
    });

    $(document).ready(function () {
        $('#video_background').css('width', $(window).width()  );
        $('#video_background').css('height', $(window).height()   );
    })


</script>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<? echo form_open(current_url(), array('name' => 'member_login'));?>
                        <div class="header text-center" style="padding:25px 0; font-size:23px; border-radius:10px;text-shadow:2px 2px 4px black; color:#fff;background: #000000;background: -webkit-linear-gradient(to left, #e74c3c, #000000);background: linear-gradient(to left, #e74c3c, #151111);">LOGIN</div>
							<p class="text-divider" style="margin-bottom:20px">JOIN US</p>
							<div class="content">
								<div class="input-group" style="margin-bottom:20px">
									<span class="input-group-addon">
										<i class="material-icons">メール</i>
									</span>
									<input name="member_id" type="text" class="form-control" placeholder="メール" value="<?=$userid?>" required />
								</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">パスワード</i>
									</span>
									<input name="password" type="password" placeholder="パスワードを入力する" class="form-control" required />
								</div>
							</div>
							<div class="checkbox" style="text-align:center;">
								<label>
									<input type="checkbox" name="saveID" id="saveID" <?if ($saveid == "on") { echo "checked";} ?>/>
									ID 保存
								</label>
								<label>
									<input type="checkbox" name="autoLogin" id="autoLogin"  <?if ($autologin == "on") { echo "checked";} ?>/>
									自動ログイン
								</label>
							</div>
							<div class="footer text-center">
							<input type="submit" class="btn btn-success" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center; margin-top:30px" value="ログイン">
							</div>
							<div class="input-group">
								<span class="input-group-addon">
							<h6><a href="/app/register" style="color: #000000"> 会員登録<a/><h6>
                            <h6><a href="/app/seed/recovery" style="color: #000000"> 財布の回復<a/><h6>
								</span>
							</div>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	 

	<!-- 레이어 내용 -->
<div id="divpop">
			 <center>
			 <table   cellpadding="0" cellspacing="0" style="margin: 20px;">
			  <tr>
			 <td width="500" height="30" valign="center" align="middle" bgcolor=#ffffff>
			 
			 <div style="color: #222; margin-bottom: 25px; "><p style=" background-color: #7f7f7f;
    line-height: 40px;
    color: #fff;
    font-weight: bold;">- Notice -</p><br/>
			<p style="padding: 0px 20px;">We are currently in the process of upgrading<br/> due to issues of mining fee and transfer fee.
During the upgrade period, sending coin and using Qt<br/>wallet are suspended. Please stop trading for a while.
We will do our best to help you with the<br/> best coin and the best service.<br/><br/>

<strong>* Upgrade Scheduled until 9pm, June 5, 2018</strong> <br/>
<strong>* Trading on the exchange available from noon, June 7, 2018</strong><br/>
<strong>* Qt wallet will be redistributed when starting trading</strong>
<br/><br/>
We apologize for any inconvenience due to this service interruption.</p></div>
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
<!-- 레이어 내용 끝 -->