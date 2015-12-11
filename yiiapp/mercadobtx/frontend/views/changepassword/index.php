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
				<?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'form-control', 'size' => '30', 'placeholder' => Yii::t('translation', 'change_password_row_1'), 'required' => 'required', 'autocomplete' => 'off')); ?>
				
				<?php echo $form->passwordFieldControlGroup($model, 'newPassword', array('class' => 'form-control', 'size' => '30', 'placeholder' => Yii::t('translation', 'change_password_row_2'), 'required' => 'required', 'autocomplete' => 'off')); ?>

				<?php echo $form->passwordFieldControlGroup($model, 'passwordConfirm',array('class' => 'form-control', 'size' => '30', 'placeholder' => Yii::t('translation', 'change_password_row_3'), 'required' => 'required', 'autocomplete' => 'off')); ?>

	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::submitButton(Yii::t ( 'translation', 'change_password_button_1' ),
					array(
						'color' => TbHtml::BUTTON_COLOR_PRIMARY,
						'size' => TbHtml::BUTTON_SIZE_LARGE
					)
				);
				/*
				$this->widget ( 'bootstrap.widgets.TbButton', array (
						'buttonType' => 'submit',
						'type' => 'primary',
						'label' => Yii::t ( 'translation', 'Change Password' ),
						'icon' => 'ok' 
				) );
				*/
				?>
		</div>
	</div>
	<div class="col-md-2">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::linkButton(Yii::t ( 'translation', 'change_password_button_2' ),
					array(
						'size' => TbHtml::BUTTON_SIZE_LARGE,
						'url'   => Yii::app()->createUrl(Yii::t('urls', '/account')),
					)
				);
				?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>



