<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);
?>

<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'change_password_title'); ?></h4>
<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-11">
				<?php echo $form->textFieldControlGroup($model, 'phone', array('class' => 'form-control', 'size' => '30', 'placeholder' => Yii::t('translation', 'change_phone_row_1'), 'required' => 'required')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
			<?php
			$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
					'form' => $form,
					'label' => Yii::t ( 'translation', 'security_menu_button' ),
					'deliveras' => UserTwoFactorSettings::SMS,
					'sms_input_id' => CHtml::activeId($model, 'phone'),
					'icon' => 'ok' 
			) );
			?>
		</div>
	</div>

</div>

<?php $this->endWidget(); ?>



