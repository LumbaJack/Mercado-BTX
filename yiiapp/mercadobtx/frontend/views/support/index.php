<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Support' 
);
?>

<div class="row">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#"><?php echo Yii::t('translation', 'support_top_tab_new'); ?></a></li>
		<li><a href="<?php echo $this->createUrl('support/tickets');?>"><?php echo Yii::t('translation', 'support_top_tab_open'); ?></a></li>
	</ul>
</div>
<br>
<br>
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'support_top_title'); ?></h4>
<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<div class="row">
	<div class="col-md-10">

		<?php echo $form->textFieldControlGroup($model, 'subject', array('class' => 'form-control', 'size' => '30')); ?>						
		<?php echo $form->textAreaControlGroup($model, 'body', array('class' => 'form-control', 'size' => '255', 'rows' => '11')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-10" style="padding-top: 2em;">
              <?php
					$this->widget ( 'bootstrap.widgets.TbButton', array (
							'buttonType' => 'submit',
							'type' => 'primary',
							'label' => Yii::t ( 'translation', 'support_button' ),
							'icon' => 'ok' 
					) );
				?>
	</div>
</div>

<?php $this->endWidget(); ?>


