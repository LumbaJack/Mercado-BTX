			<footer id="footer">
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a class="logo" href="<?php echo Yii::app()->baseUrl . '/' ?>">
									<img alt="MeradoBTX Website Template" class="img-responsive" src="<?php echo Yii::app()->baseUrl . '/images' ?>/logo-footer.png">
								</a>
							</div>
							<div class="col-md-5">
								<?php echo Yii::t('translation', 'copyright_text'); ?>
							</div>
							<div class="col-md-6">
								<nav id="sub-menu">
									<ul>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','privacidad'); ?>"><?php echo Yii::t('translation', 'landing_privacidad'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','terminos_y_condiciones'); ?>"><?php echo Yii::t('translation', 'landing_terms'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','preguntas_frecuentes'); ?>"><?php echo Yii::t('translation', 'preguntas_frecuentes'); ?></a></li>
										<li><a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','contactanos'); ?>"><?php echo Yii::t('translation', 'contactanos'); ?></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>

