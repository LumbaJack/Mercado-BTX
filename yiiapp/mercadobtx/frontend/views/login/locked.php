<?php
/**
 * @var FrontendController $this
 * @var FrontendLoginForm $model
 */
$this->pageTitle = Yii::app ()->name . ' - Login';
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

<section id="authenty_preview">
	<section id="signin_main" class="authenty signin-main">
		<div class="section-content">
			<div class="wrap">
				<div class="container">
<?php
/**
 *
 * @var TbActiveForm $form
 */
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'login-form',
		'enableClientValidation' => true,
		'htmlOptions' => [ 
				'class' => 'well' 
		],
		'clientOptions' => array (
				'validateOnSubmit' => true 
		) 
) );

?>
<div class="form-wrap">
						<div class="row">
<?php
?>

        <div class="title animated fadeInDown"
								data-animation="fadeInDown" data-animation-delay=".8s" style="">
								<h2 class="short"><?php echo Yii::t('translation', 'title_login_top'); ?></h2>
							</div>
							<div id="form_1" data-animation="bounceIn"
								class="animated bounceIn">
								<div class="form-header">
									<i class="fa fa-user"></i>
									<p class="note"><?php echo Yii::t('translation', 'login_required_section'); ?></p>
								</div>
								<div class="form-main">
									<form>
										<div class="form-group">
			<?php
			
			Yii::app ()->user->setFlash ( 'danger', '<strong>Error!</strong> Your account is locked, try again later.' );
			$this->widget ( 'bootstrap.widgets.TbAlert', array (
					'block' => true, // display a larger alert block?
					'fade' => true, // use transitions?
					'closeText' => '&times;', // close link text - if set to false, no close link is displayed
					'alerts' => array ( // configurations per alert type
							'danger' => array (
									'block' => true,
									'fade' => true,
									'closeText' => '' 
							) 
					) 
			) );
			?>
                    </div>
									</form>
								</div>
								<div class="form-footer">
									<div class="row">
										<div class="col-xs-7"></div>
										<div class="col-xs-5"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php $this->endWidget(); ?>
<!-- Login Form END -->
				</div>
			</div>
		</div>
	</section>
</section>

<?php $this->renderPartial('application.views.layouts.landing-footer'); ?>
