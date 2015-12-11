<?php
/**
 * @var BackendController $this
 * @var BackendLoginForm $model
 */
$this->pageTitle = Yii::app ()->name . ' - Login';
$this->breadcrumbs = [ 
		'Login' 
];
?>

<p>Please fill out the following form with your login credentials:</p>

<!-- Login Form BEGIN -->
<div class="form">

<?php
/**
 *
 * @var TbActiveForm $form
 */

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array (
		'id' => 'login-form',
		'enableClientValidation' => true,
		'htmlOptions' => [ 
				'class' => 'well' 
		],
		'clientOptions' => array (
				'validateOnSubmit' => true 
		) 
) );

echo CHtml::errorSummary ( $model, null, null, array (
		'class' => 'alert alert-error' 
) );
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->textFieldControlGroup($model, 'username', array('class'=>'span3')); ?>
	<?php echo $form->passwordFieldControlGroup($model, 'password', array('class'=>'span3', 'autocomplete' => 'off'));?>
	<?php echo $form->checkBoxControlGroup($model, 'rememberMe');?>

	<?php if ($model->isCaptchaRequired()): ?>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textFieldControlGroup($model, 'verifyCode'); ?>
	<?php endif; ?>

	<div class="form-actions">
			<?php
			$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
					'form' => $form,
					'label' => Yii::t ( 'translation', 'Submit' ),
					'deliveras' => UserTwoFactorSettings::GOOGLE_AUTH,
					'icon' => 'ok' 
			) );
			?>
			
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- Login Form END -->
