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
			<h4><?php echo Yii::t('translation', 'You do not have a wallet'); ?> </h4>
		</center>
	</div>
	<center>
	<div class="alert alert-danger">
		<div><?php echo Yii::t('translation', 'You do not have a wallet');?></div>
		<div><strong><?php echo Yii::t('translation', "Click <a href='{url}' >here</a> to create your wallet", array("{url}" => $this->createUrl('/wallets'))); ?></strong></div>
	</div>
</div>
