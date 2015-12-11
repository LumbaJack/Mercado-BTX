			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="footer-ribon">
							<span><?php echo Yii::t('translation', 'footer_top_info'); ?></span>
						</div>
						<div class="col-md-3">
							<div class="newsletter">
								<?php echo Yii::t('translation', 'footer_newsletter'); ?>
								 <?php echo Yii::t('translation', 'newsletter_text'); ?>
								<div class="alert alert-success hidden" id="newsletterSuccess">
									<?php echo Yii::t('translation', 'newsletter_success'); ?>
								</div>

								<div class="alert alert-danger hidden" id="newsletterError"></div>

								<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
									<div class="input-group">
										<input class="form-control" placeholder=<?php echo Yii::t('translation', 'email'); ?> name="email" id="email" type="text">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><?php echo Yii::t('translation', 'inscribete'); ?></button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							 <?php echo Yii::t('translation', 'tweets_title'); ?>
							<div id="tweet" class="twitter" data-account-id="mercadobtx">
								<?php echo Yii::t('translation', 'tweets_loading_text'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<?php echo Yii::t('translation', 'footer_contactanos'); ?>
								<ul class="contact">
									<li><p><i class="glyphicon glyphicon-pushpin"></i> <?php echo Yii::t('translation', 'footer_address'); ?></li>
									<li><p><i class="glyphicon glyphicon-phone-alt"></i> <?php echo Yii::t('translation', 'footer_phone'); ?></li>
									<li>
									  <p><i class="glyphicon glyphicon-envelope"></i> <?php echo Yii::t('translation', 'footer_email'); ?> <a href="mailto:email@mercadoBTX.com">email@mercadoBTX.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<?php echo Yii::t('translation', 'redes_socials_title'); ?>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/mercadobtx" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/mercadobtx" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="googleplus"><a href="https://plus.google.com/b/113413746182900487325/" target="_blank" data-placement="bottom" rel="tooltip" title="Google+">Google+</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a class="logo" href="<?php echo Yii::app()->baseUrl . '/' ?>">
									<img alt="MeradoBTX Website Template" class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/images' ?>/logo-footer.png">
								</a>
							</div>
							<div class="col-md-5">
								<?php echo Yii::t('translation', 'full_header_copyright'); ?>
							</div>
							<div class="col-md-6">
								<nav id="sub-menu">
									<ul>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','privacidad'); ?>"><?php echo Yii::t('translation', 'landing_privacidad'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','terminos_y_condiciones'); ?>"><?php echo Yii::t('translation', 'landing_terms'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','preguntas_frecuentes'); ?>"><?php echo Yii::t('translation', 'landing_preguntas_frecuentes'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','contactanos'); ?>"><?php echo Yii::t('translation', 'landing_contactanos'); ?></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>

