<?php
/**
 * Landing page view file
 *
 * @var FrontendSiteController $this
 */
?>

			<div role="main" class="main">
				<div id="content" class="content full">

					<div class="slider-container">
						<div class="slider" id="revolutionSlider">
							<ul>
								<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >

									<img src="#" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

									<div class="tp-caption sft stb visible-lg"
										 data-x="72"
										 data-y="180"
										 data-speed="300"
										 data-start="1000"
										 data-easing="easeOutExpo"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/slides/slide-title-border.png" alt=""></div>

									<div class="tp-caption top-label lfl stl"
										 data-x="135"
										 data-y="180"
										 data-speed="300"
										 data-start="500"
										 data-easing="easeOutExpo" id=promoText"><?php echo Yii::t('translation', 'promo_home_text_1'); ?></div>

									<div class="tp-caption sft stb visible-lg"
										 data-x="372"
										 data-y="180"
										 data-speed="300"
										 data-start="1000"
										 data-easing="easeOutExpo"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/slides/slide-title-border.png" alt=""></div>

									<div class="tp-caption main-label sft stb"
										 data-x="30"
										 data-y="210"
										 data-speed="300"
										 data-start="1500"
										 data-easing="easeOutExpo" id="promoText2"><?php echo Yii::t('translation', 'promo_home_text_2'); ?></div>

									<div class="tp-caption bottom-label sft stb"
										 data-x="80"
										 data-y="280"
										 data-speed="500"
										 data-start="2000"
										 data-easing="easeOutExpo" id="promoText3"><?php echo Yii::t('translation', 'promo_home_text_3'); ?></div>

									
								</li>
								<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >
									<div class="tp-caption customin customout"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="0"
										data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
										data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
										data-speed="800"
										data-start="700"
										data-easing="Power4.easeOut"
										data-endspeed="500"
										data-endeasing="Power4.easeIn"
										style="z-index: 3"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/slides/slide-concept-draft.png" alt="">
									</div>

									<div class="tp-caption customin customout"
										data-x="center" data-hoffset="0"
										data-y="center" data-voffset="-6"
										data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
										data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
										data-speed="600"
										data-start="100"
										data-easing="Power4.easeOut"
										data-endspeed="500"
										data-endeasing="Power4.easeOut"
										data-autoplay="false"
										data-autoplayonlyfirsttime="false"
										style="z-index: 8"><iframe frameborder='no' src='http://www.youtube.com/embed/3fggrYQF3Fs' width='640' height='360' style='width:640px;height:360px;'></iframe>
									</div>

								</li>
							</ul>
						</div>
					</div>

					<div class="home-intro">
						<div class="container">

							<div class="row">
								<div class="col-md-8" id="midBannerText">
									<p><?php echo Yii::t('translation', 'top_title_main'); ?></p>
								</div>
								<div class="col-md-4">
									<div class="get-started">
										<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','register'); ?>" class="btn btn-lg btn-primary"><span id ="registerButton"><?php echo Yii::t('translation', 'top_side_main_text'); ?></a>
										<div class="learn-more"><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','preguntas_frecuentes'); ?>"><span id="moreInformationButton"><?php echo Yii::t('translation', 'top_side_main_text2'); ?></span></a></div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="container">

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-group"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_1'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_1_text'); ?></p>
											</div>
										</div>
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-file"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_2'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_2_text'); ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-film"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_3'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_3_text'); ?></p>
											</div>
										</div>
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-check"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_4'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_4_text'); ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-bars"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_5'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_5_text'); ?></p>
											</div>
										</div>
										<div class="feature-box secundary">
											<div class="feature-box-icon">
												<i class="icon icon-desktop"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter"><?php echo Yii::t('translation', 'menu_section_6'); ?></h4>
												<p class="tall"><?php echo Yii::t('translation', 'menu_section_6_text'); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<section class="featured highlight footer">
						<div class="container">
							<div class="row center counters">
								<div class="col-md-3">
									<strong data-to="437">0</strong>
									<label><?php echo Yii::t('translation', 'stats_1'); ?></label>
								</div>
								<div class="col-md-3">
									<strong data-to="3">0</strong>
									<label><?php echo Yii::t('translation', 'stats_2'); ?></label>
								</div>
								<div class="col-md-3">
									<strong data-to="152">0</strong>
									<label><?php echo Yii::t('translation', 'stats_3'); ?></label>
								</div>
								<div class="col-md-3">
									<strong data-to="79">0</strong>
									<label><?php echo Yii::t('translation', 'stats_4'); ?></label>
								</div>
							</div>
						</div>
					</section>

					<section class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo Yii::app()->baseUrl . '/images' ?>/parallax-transparent.jpg);">
						<div class="container">
							<div class="row center">
								<div class="col-md-12">

									<div class="row">
										<div class="flexslider unstyled" data-plugin-options='{"directionNav":false, "animation":"slide"}'>
											<ul class="slides">
												<li>
													<div class="col-md-12">
														<blockquote>
															<p><i class="icon icon-quote-left"></i><?php echo Yii::t('translation', 'testimonial_1'); ?></p>
															<span><?php echo Yii::t('translation', 'testimonial_1_person'); ?></span>
														</blockquote>
													</div>
												</li>
												<li>
													<div class="col-md-12">
														<blockquote>
															<p><i class="icon icon-quote-left"></i><?php echo Yii::t('translation', 'testimonial_2'); ?></p>
															<span><?php echo Yii::t('translation', 'testimonial_2_person'); ?></span>
														</blockquote>
													</div>
												</li>
												<li>
													<div class="col-md-12">
														<blockquote>
															<p><i class="icon icon-quote-left"></i><?php echo Yii::t('translation', 'testimonial_3'); ?></p>
															<span><?php echo Yii::t('translation', 'testimonial_3_person'); ?></span>
														</blockquote>
													</div>
												</li>
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
					</section>
					
					<section class="call-to-action featured footer">
						<div class="container">
							<div class="row">
								<div class="center">
									<h3><?php echo Yii::t('translation', 'bottom_main_text_bottom'); ?><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','register'); ?>" class="btn btn-lg btn-primary" data-appear-animation="bounceIn"><?php echo Yii::t('translation', 'bottom_main_button'); ?></a> <span class="arrow hlb" data-appear-animation="rotateInUpLeft" style="top: -22px;"></span></h3>
								</div>
							</div>
						</div>
					</section>

				</div>
			</div>

<?php
Yii::app()->clientScript->registerScriptFile($this->get_libpath() . "/crivos/js/views/view.home.js", CClientScript::POS_END);

?>
