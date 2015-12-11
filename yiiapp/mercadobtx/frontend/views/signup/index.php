<?php
/**
 * @var SignupController $this
 * @var SignupForm $model
 */
?>
<style>

body{
    background-color: #eceef3;
}

.vertical-offset-100{
    padding-top:100px;
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


    
<section id="password_recovery" class="authenty password-recovery" style="height: 643px;">
<div class="section-content">
<div class="wrap">
<div class="container">
<?php
/** @var TbActiveForm $form */
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'signup-form',
        'enableClientValidation' => true,
        'htmlOptions' => ['class' => 'well'],
        'clientOptions' => array(
            'validateOnSubmit'=>true,
        ),
    )
);
?>

<div class="form-wrap">
    <div class="row">
        <div class="col-xs-12 col-sm-8 main animated fadeInLeft" data-animation="fadeInLeft" data-animation-delay=".5s" style="">
            <h2><?php echo Yii::t('translation', 'top_title_signup'); ?></h2>
            <form>
              <div class="form-group">
                <?= $form->emailFieldRow($model, 'email', array('class'=>'form-control', 'required' => 'required'));?>
                <?= $form->passwordFieldRow($model, 'newPassword', array('class'=>'form-control', 'required' => 'required'));?>
                <?= $form->passwordFieldRow($model, 'passwordConfirm', array('class'=>'form-control', 'required' => 'required'));?>

                <?php if ($model->isCaptchaRequired()): ?>
                	<div style="padding:10px;">
                    	<div class="col-6"><?php $this->widget('CCaptcha'); ?></div>
                    	<div class="col-6" style="padding:10px;">
                    	<?= $form->textFieldRow($model, 'verifyCode', array('required' => 'required')); ?>
                		</div>
                	</div>
                <?php endif; ?>

              </div>
              <div class="row">
                  <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('translation', 'register_signup_button'), 'icon'=>'ok'));?>
                  </div>
              </div>
            </form>    
            <?php echo Yii::t('translation', 'signup_go_login'); ?>
	    <a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','ingresar'); ?>"><?php echo Yii::t('translation', 'ingresa_bottom'); ?></a>
        </div>
    </div>
        
</div>
<?php $this->endWidget(); ?>
<!-- Login Form END -->

</div>
</div>
</div>
</section>
<?php $this->renderPartial('application.views.layouts.landing-footer'); ?>
