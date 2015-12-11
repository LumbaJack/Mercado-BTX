<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Support' 
);
?>

<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'ticket_top_title'); ?></h4>
<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<div class="row">
	<div class="col-md-2">
		<div>
			<?php echo Yii::t('translation', 'ticket_status'); ?>
		</div>
	</div>
	<div class="col-md-8">
		<div>
			<?php echo $model->status; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<div>
			<?php echo Yii::t('translation', 'ticket_subject'); ?>
		</div>
	</div>
	<div class="col-md-8">
		<div>
			<?php echo $model->subject; ?>
		</div>
	</div>
</div>

<?php foreach( $messages as $msg ):?>
<hr/>
<div class="row">
	<div class="col-md-10">
		<?php echo $msg->body; ?>
	</div>
</div>

<?php endforeach; ?>

<div class="row">
	<div class="col-md-10">
		<?php echo $form->textAreaControlGroup($updatemodel, 'body', array('class' => 'form-control', 'size' => '255', 'rows' => '11')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-10" style="padding-top: 2em;">
              <?php
					$this->widget ( 'bootstrap.widgets.TbButton', array (
							'buttonType' => 'submit',
							'type' => 'primary',
							'label' => Yii::t ( 'translation', 'ticket_button' ),
							'icon' => 'ok' 
					) );
				?>
	</div>
</div>

<?php $this->endWidget(); ?>


