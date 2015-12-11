<?php
/**
 * @var SignupController $this
 */
?>
<style>
body {
	background-color: #eceef3;
}

.vertical-offset-100 {
	padding-top: 100px;
}
</style>
<script>
$(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"
            }
        });
  });
});
</script>




<div class="section-content">
	<div class="wrap">
		<div class="container">

			<div class="form-wrap">
				<div class="row">
					<div class="col-xs-12 col-sm-8 main animated fadeInLeft"
						data-animation="fadeInLeft" data-animation-delay=".5s" style="">
						<div >&nbsp;</div>
						<?php if ( $user ):?>
							<div class="alert alert-success">
								<h4><?php echo Yii::t('translation', 'Activation successful');?></h4>
							</div>
							<div>
								<?php if ( Yii::app()->user->isGuest ): ?>
									<h7><?php echo Yii::t('translation', 'Please Login to get started');?></h7>
									<a href="<?php echo Yii::t('urls', '/login'); ?>" class="btn btn-primary">
										<?php echo Yii::t('translation', 'Login');?>
									</a>
								<?php else: ?>
									<a href="<?php echo Yii::t('urls', '/'); ?>" class="btn btn-primary">
										<?php echo Yii::t('translation', 'Home');?>
									</a>
								<?php endif ?>
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								<strong><?php echo Yii::t('translation', 'Invalid activation code'); ?></strong>
								<?php if ( Yii::app()->user->isGuest ): ?>
										<p><?php echo Yii::t('translation', 'Please login and click the link to send a new activation code'); ?></p>
										<a href="<?php echo Yii::t('urls', '/login'); ?>" class="btn btn-primary">
											<?php echo Yii::t('translation', 'Login');?>
										</a>
									<?php else: ?>
										<p><?php echo Yii::t('translation', 'Please click the link to send a new activation code'); ?></p>
										<a href="<?php echo Yii::t('urls', '/'); ?>" class="btn btn-primary">
											<?php echo Yii::t('translation', 'Home');?>
										</a>
									<?php endif ?>
							</div>
						<?php endif ?>

        			</div>
				</div>

			</div>

			<!-- Login Form END -->

		</div>
	</div>
</div>
</section>

