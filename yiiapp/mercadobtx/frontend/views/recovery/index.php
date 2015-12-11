<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);
?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'recovery_main_title'); ?></h4>
	</div>
</div>
<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
				<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'form-control', 'size' => '30', 'placeholder' => Yii::t('translation', 'recovery_email_entry'), 'required' => 'required')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::submitButton ( Yii::t ( 'translation', 'recovery_submit_button' ), array (
						'color' => TbHtml::BUTTON_COLOR_PRIMARY,
						'size' => TbHtml::BUTTON_SIZE_LARGE 
				) );
				?>
		</div>
	</div>
	<div class="col-md-2">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::linkButton ( Yii::t ( 'translation', 'recovery_cancel_button' ), array (
						'size' => TbHtml::BUTTON_SIZE_LARGE,
						'url' => $this->createAbsoluteUrl('/') 
				) );
				?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>



