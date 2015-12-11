<?php
/**
 * @var UserController $this
 * @var User $model
 * @var CActiveForm $form
 */
?>

<div class="form">

<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array (
		'id' => 'user-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false 
) );
?>

	<div class="row buttons breadcrumb">
		<h4>Actions</h4>
		<table>
			<tr>
				<td>
					<?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('name' => CHtml::activeName($model, 'save'), 'color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
				</td>
				<td>
					<?php echo TbHtml::submitButton($model->isVerified() ? 'Un-verify' : 'Verify', array('name' => CHtml::activeName($model, 'verify'), 'color' => TbHtml::BUTTON_COLOR_DEFAULT)); ?>
				</td>
				<td>
					<?php echo TbHtml::submitButton($model->isActivated() ? 'Deactivate' : 'Activate', array('name' => CHtml::activeName($model, 'activate'), 'color' => TbHtml::BUTTON_COLOR_DEFAULT)); ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><a href="<?php echo $s3url;?>" target="_blank" >s3</a></td>
				<td></td>
			</tr>
		</table>
	</div>
	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'form-control', 'size'=>45, 'maxlength'=>45)); ?>
	<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'form-control', 'size'=>60, 'maxlength'=>255)); ?>
	<?php echo $form->checkBoxControlGroup($model, 'requires_new_password', array('class' => '')); ?>


	<?php echo $form->textFieldControlGroup($model, 'login_attempts', array('class' => 'form-control', 'size'=>4, 'maxlength'=>4)); ?>
	<?php echo $form->textFieldControlGroup($model, 'login_time', array('class' => 'form-control', 'size'=>45, 'maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model, 'login_ip', array('class' => 'form-control', 'size'=>45, 'maxlength'=>45)); ?>
	<?php echo $form->textFieldControlGroup($model, 'validation_key', array('class' => 'form-control', 'size'=>60, 'maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model, 'create_time', array('class' => 'form-control', 'size'=>45, 'maxlength'=>45)); ?>
	<?php echo $form->textFieldControlGroup($model, 'update_time', array('class' => 'form-control', 'size'=>45, 'maxlength'=>45)); ?>
	
	


<?php $this->endWidget(); ?>

</div>
<!-- form -->