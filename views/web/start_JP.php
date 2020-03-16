<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="opera_slider">
        	
	<div class="jumbotron jumbotron-main height100">
		<div id="particles-js"></div>
		<div class="opera_welcome">
    		<div class="opera_welcome_inner">
        	    <h4><b>
                    <div class="opera_21_1">21世紀の最先端ブロックチェーン電子財布</div>
                    <div class="opera_21_2">実体経済とcryptocurrency完璧な調和</div>
                </b></h4>
            <div class="animat_slider">
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
            </div>
			<p>本ウォレットはミルコインとミルランドとグローバル取引所の初期事業公開をするためのページであり、<br />
参加者のための補償ウォレットです。
</p>
			<div class="view-all more-about text-center">
				<? if ($this->session->userdata('is_login') == 0) { ?>
				<a class="" href="/member/register" style="background-color: #2494c8 !important;">会員登録</a>
				<? } else { ?>
				<a class="" href="/token" style="background-color: #2494c8 !important;">My Token</a>
				<? } ?>
        	</div>
		</div>
	</div>
	<!-- Javascript Files -->
	<script type="text/javascript" src="/assets/js/particles.min.js"></script>
	<script type="text/javascript" src="/assets/js/particlesRun.js"></script>
</section>

<div class="clearfix"></div>

<!-- Start all features website -->
<section id="why" class="web-featuers section-wrapper opera_wcu">
    <div class="container">
        <div class="col-lg-12 heding-wrapper text-center scale-less animate-in animated">
            <h3><b>初期事業公開</b></h3>
                <span class="spliter" style="background: #8b8b8b"></span>
                <span class="spliter" style="background: #8b8b8b"></span>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <span class="opera_wcu_des">様々なコンテンツと連携ビジネスプランを合わせた統合<font color="#4dba7a"> プラットフォーム</font></span>
                </div>
            </div>
        </div>

        <div class="strat_img" style="text-align:center"><img src="/assets/img/graph_jp.png" style="width:63%"></div>
    </div>
</section>
<!-- End all features website here -->
<div class="clearfix"></div>

<!-- Start responsive banner here -->
<section class="section-wrapper features_opera">
    <div class="container">
        <div class="heding-wrapper text-left scale-less animate-in animated pdb0 text-center">
            <h3>私たちの特徴</h3>
            <span class="spliter" style="background: #8b8b8b"></span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>セキュリティ</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_security.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>セキュリティ</h5>
								<div class="ifb-desc-back">
									<p>Mircoinネットワークは攻撃から保護されます.POWシステムはMircoinネットワークを保護し、分散された状態に維持するのに最適な方法を提供しています。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>グローバル</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_instant_transaction.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>グローバル</h5>
								<div class="ifb-desc-back">
									<p>すべてのプラットフォームは、世界に飛躍するグローバル化システム</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>ウォレット暗号化</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_wallet_encryption.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>ウォレット暗号化</h5>
								<div class="ifb-desc-back">
									<p>ウォレット暗号化を使用すると、ウォレットを安全に使用できるが、トランザクション、およびアカウントの残高を見る為にはミルトークンを使用する前に、パスワードを入力する必要があります。これは、ウォレットを盗むウイルスやトロイの木馬と送信前サニティチェックからの支払いを保護します。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>統合システム</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_open_source.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>統合システム</h5>
								<div class="ifb-desc-back">
									<p>ミルランドの統合ポイントプログラムは、獲得と決済を進行する革新的なエコシステムを生み出します。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- responsive banner END -->
<div class="clearfix"></div>

<!-- TEAM SECTION START -->
<section class="opera_slider">
	<video loop muted autoplay style="height: 50% !important; width: 100% !important;">
    	<source src="/assets/img/custom-video.mp4" type="video/mp4">
	</video>
	<div class="opera_welcome">
    	<div class="opera_welcome_inner">
            <h3 style="color: #FFFFFF">Mir</h3>
            <div class="animat_slider">
				<img src="/assets/img/mir_bar.png">
            </div>
            <div class="move_font" style="color: #fff">最善と最上に向かって跳躍するミルコインを<br />新たに会ってみてください。</div>
    	</div>
	</div>
</section>
<!-- TEAM SECTION END -->
<div class="clearfix"></div>
    <!-- mail START -->
    <!-- <section class="wahtwedo-tabs-bg subscribe_opera" style="margin-top: 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 newsletter_title_oper">
                    <h3>subscribe to <strong>newsletter</strong></h3>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                    <div class="input-group input-group-pc">
                        <input type="text" id="txtEmail" class="form-control" placeholder="ENTER YOUR EMAIL...">
                        <span class="input-group-btn">
                            <button id="btnEmail" class="btn pc_btn" type="button" onclick="sendSubMail();">SUBSCRIBE</button>
                            <button id="btnEmail01" class="btn m_btn" type="button" onclick="sendSubMail();"><i class="fa fa-envelope-o"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- mail END -->