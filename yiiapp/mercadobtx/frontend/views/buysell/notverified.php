<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Deposit' 
);
?>

<div class="row">
	<div>
		<center>
			<h4><?php echo Yii::t('translation', 'Account not verified'); ?> </h4>
		</center>
	</div>
	<center>
	<div class="alert alert-danger">
		<div><?php echo Yii::t('translation', 'Your accout is not verified, you cannot make depositos or withdrawls until your account is verified');?></div>
		<div><strong><?php echo Yii::t('translation', "Click <a href='{url}' >here</a> to begin the verification process", array("{url}" => $this->createUrl('/verify'))); ?></strong></div>
	</div>
</div>

