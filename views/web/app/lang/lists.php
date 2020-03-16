 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="header header-filter" style="background-image: url('/views/web/app/img/city1.jpg'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<? echo form_open(current_url(), array('name' => 'member_login'));?>
							<div class="header header-primary text-center">
								<h3>Select language</h3>
							</div>
							<div class="content">
								<h3>The United States </h3><a href="/app/lang/result?lang=us"> <img src="<?=SKIN_DIR?>/img/lang/us.png"> United States </a>
								<br><br>
								<h3>Asia Pacific</h3>
								
								<div class="line-width"></div>
								<a href="/app/lang/result?lang=kr"><img src="<?=SKIN_DIR?>/img/lang/kor.png"> 대한민국 </a>
								<div style="height:30px"></div>
								<a href="/app/lang/result?lang=jp"> <img src="<?=SKIN_DIR?>/img/lang/jp.png"> 日本 </a>
								<div style="height:30px"></div>
								<a href="/app/lang/result?lang=cn"> <img src="<?=SKIN_DIR?>/img/lang/cn.png"> 中国 </a>
							</div>
							<br><br><br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
