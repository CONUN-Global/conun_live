<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="opera_slider">
        	
	<div class="jumbotron jumbotron-main height100">
		<div id="particles-js"></div>
		<div class="opera_welcome">
    		<div class="opera_welcome_inner">
        	    <h4><b>
                    <div class="opera_21_1">21<sup>st</sup> Century Cutting-Edge Block Chain Electronic Wallet</div>
                    <div class="opera_21_2">The perfect balance of real economy and cryptocurrency</div>
                </b></h4>
            <div class="animat_slider">
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
				<span class="spliter" style="background: #0d7fb2"></span>
            </div>
			<h5>Change with the change is No Change</h5>
			<p>Everyone is growing fast with global revolution in 21st Century.<br> 
				Every thing is digitalize from shopping outside to going outside the country.<br>  Its just a revolution and revolution is growing fast... very fast.
			</p>
			<div class="view-all more-about text-center">
				<? if ($this->session->userdata('is_login') == 0) { ?>
				<a class="" href="/member/register" style="background-color: #2494c8 !important;">Sign Up Here!</a>
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
            <h3><b>Initial business launch</b></h3>
                <span class="spliter" style="background: #8b8b8b"></span>
                <span class="spliter" style="background: #8b8b8b"></span>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                    <span class="opera_wcu_des"><font color="#4dba7a"> A unified platform that encompasses a wide range of </font>content and partnership business plans</span>
                </div>
            </div>
        </div>
        
        <div class="strat_img" style="text-align:center"><img src="/assets/img/graph_us.png" style="width:63%"></div>
        
    </div>
</section>
<!-- End all features website here -->
<div class="clearfix"></div>

<!-- Start responsive banner here -->
<section class="section-wrapper features_opera">
    <div class="container">
        <div class="heding-wrapper text-left scale-less animate-in animated pdb0 text-center">
            <h3>Our Features</h3>
            <span class="spliter" style="background: #8b8b8b"></span>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 features_inner">
            <div class="flip-box-wrap">
				<div class="flip-box blue_bg">
					<div class="ifb-flip-box">
						<div class="ifb-face ifb-front">
							<div class="ifb-flip-box-section ">
								<h5>Security</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_security.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>Security</h5>
								<div class="ifb-desc-back">
									<p>The Mircoin network is protected from attack. The POWER system provides a perfect way to keep the Mircoin network protected and distributed.</p>
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
								<h5>global</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_instant_transaction.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>global</h5>
								<div class="ifb-desc-back">
									<p>Globalization system that leaps all the platforms to the world</p>
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
								<h5>Wallet encryption</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_wallet_encryption.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>Wallet Encryption</h5>
								<div class="ifb-desc-back">
									<p>Wallet encryption allows you to secure your wallet, so that you can view transactions and your account balance, but are required to enter your Spending password before spending mircoins.This provides protection from wallet-stealing viruses and trojans as well as a sanity check before sending payments.</p>
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
								<h5>Integrated system</h5>
								<div class="flip-box-icon">
									<img src="/assets/img/opera_open_source.png">
								</div>
							</div>
						</div>
						<div class="ifb-face ifb-back">
							<div class="ifb-flip-box-section">
								<h5>Open Source Software</h5>
								<div class="ifb-desc-back">
									<p>Milland's integration points form an innovative ecosystem of earning and paying.</p>
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
            <h3 style="color: #FFFFFF">MIR COIN</h3>
            <div class="animat_slider">
				<img src="/assets/img/mir_bar.png">
            </div>
            <div class="move_font" style="color: #fff">Mircoans leap to the best and the best<br>Meet new ones.</div>
    	</div>
	</div>
</section>
<!-- TEAM SECTION END -->
<div class="clearfix"></div>