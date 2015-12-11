<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);


$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'Cambiar Contrase&ntilde;a '); ?></h4>
	</div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h3><?php echo Yii::t('translation', 'Your password reset request has been canceled'); ?></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h3><?php echo Yii::t('translation', 'If you would like to report this to an administrator, click the button below'); ?></h3>
	</div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::linkButton ( Yii::t ( 'translation', 'Home' ), array (
						'size' => TbHtml::BUTTON_SIZE_LARGE,
						'url' => $this->createAbsoluteUrl('/') 
				) );
				?>
		</div>
	</div>
	<div class="col-md-2">

		<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				echo TbHtml::submitButton ( Yii::t ( 'translation', 'Report to admin' ), array (
						'color' => TbHtml::BUTTON_COLOR_PRIMARY,
						'size' => TbHtml::BUTTON_SIZE_LARGE 
				) );
				?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>



