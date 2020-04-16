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
	 <script type="text/javascript" src="<?=SKIN_DIR?>/js/member.js"></script>
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
							<!-- <div class="header text-center" style="background-image: url(<?php echo base_url('views/web/app/img/bg_effect21.png'); ?>);background-size: cover; background-position: top center;">
								<img src="<?=SKIN_DIR?>/img/star.png" width="80">
								<p style='width:80px;'></p>
							</div> -->
							<p class="text-divider">欢迎回来</p>
							<div class="content">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">电子邮件</i>
									</span>
									<input name="member_id" type="text" class="form-control" placeholder="会员 Email" required />
								</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">密码</i>
									</span>
									<input name="password" type="password" placeholder="密码" class="form-control" required />
								</div>
							</div>
							<div class="footer text-center">
							<input type="submit" class="btn btn-success" style="background-image: url(<?php echo base_url('views/web/app/img/bg_ft.png'); ?>);background-size: cover; background-position: top center;" value="登录">
							</div>
							<div class="input-group">
								<span class="input-group-addon">
								<h6><a href="/app/register" style="color: #000000"> 成为会员<a/><h6>
                                <h6 style="margin:0; padding:0; lineheight:0"><a href="/app/seed/recovery" style="color:#0d88c0;">钱包恢复<a/></h6>
								</span>
							</div>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

			