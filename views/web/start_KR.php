<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="opera_slider">
        	
	<div class="jumbotron jumbotron-main height100">
		<div id="particles-js"></div>
		<div class="opera_welcome">
    		<div class="opera_welcome_inner">
        	    <h4><b>
                    <div class="opera_21_1">21세기 최첨단 블록체인 전자지갑</div>
                    <div class="opera_21_2">실물 경제와 cryptocurrency 완벽한 조화</div>
                </b></h4>
            <div class="animat_slider">
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
            </div>
			<p>본 지갑은 미르코인과 미르랜드와 글로벌 거래소 초기사업 공개를 하기 위한 페이지이며<br>참여자들을 위한 보상 지갑입니다.</p>
			<div class="view-all more-about text-center">
				<? if ($this->session->userdata('is_login') == 0) { ?>
				<a class="" href="/member/register" style="background-color: #2494c8 !important;">회원가입하기</a>
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
            <h3><b>초기사업 공개</b></h3>
                <span class="spliter" style="background: #8b8b8b"></span>
                <span class="spliter" style="background: #8b8b8b"></span>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <span class="opera_wcu_des">다양한 컨텐츠와 제휴 비지니스 플랜을 아우르는<font color="#4dba7a"> 통합 플랫폼</font></span>
                </div>
            </div>
        </div>

        <div class="strat_img" style="text-align:center"><img src="/assets/img/graph.png" style="width:63%"></div>
    </div>
</section>
<!-- End all features website here -->
<div class="clearfix"></div>

<!-- Start responsive banner here -->
<section class="section-wrapper features_opera">
    <div class="container">
        <div class="heding-wrapper text-left scale-less animate-in animated pdb0 text-center">
            <h3>우리들의 특징</h3>
            <span class="spliter" style="background: #8b8b8b"></span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>보안</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_security.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>보안</h5>
								<div class="ifb-desc-back">
									<p>Mircoin 네트워크는 공격으로부터 보
									호됩니다.POW 시스템은 Mircoin
									네트워크를 보호하고 분산 된
									상태로 유지하는 완벽한
									방법을 제공합니다.</p>
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
								<h5>글로벌</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_instant_transaction.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>글로벌</h5>
								<div class="ifb-desc-back">
									<p>모든 플랫폼은 세계로 도약하는 글로벌화 시스템</p>
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
								<h5>월렛 암호화</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_wallet_encryption.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>월렛 암호화</h5>
								<div class="ifb-desc-back">
									<p>월렛 암호화를 사용하면 지갑을 안전하게 사용 할 수 있으며, 트랜잭션 및 계정 잔액을 보기 위해서는 미르　토큰을 사용하기 전에 비밀번호를 입력해야　합니다. 
이는 지갑을 훔치는 바이러스 및 트로이 목마 및 전송 전에 온 전송 체크로부터 지불을 보호합니다.</p>
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
								<h5>통합시스템</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_open_source.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>통합시스템</h5>
								<div class="ifb-desc-back">
									<p>미르랜드의 통합 포인트는 적립과 결제를 진행하는 혁신적인 생태계를 이룹니다.</p>
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
            <h3 style="color: #FFFFFF">MIRCOIN</h3>
            <div class="animat_slider">
				<img src="/assets/img/mir_bar.png">
            </div>
            <div class="move_font" style="color: #fff">최선과 최상을 향해 도약하는 미르코인을<br />새롭게 만나 보세요.</div>
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