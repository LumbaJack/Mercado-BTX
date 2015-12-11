<?php
/**
 * @var UserController $this
 * @var User $data
 */
$status_str = array ();
if ($data->isActive())
	array_push ( $status_str, CHtml::encode('Active') );
if ($data->isActivated())
	array_push ( $status_str, CHtml::encode('Activated') );
if ($data->isVerified())
	array_push ( $status_str, CHtml::encode('Verified') );
if ($data->isAdmin())
	array_push ( $status_str, CHtml::encode('Admin') );

?>
<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('update', 'id'=>$data->id)); ?></td>
	<td><?php echo implode('<br/>', $status_str);?></td>
	<td><?php echo ( $data->email == $data->username ) ? CHtml::encode($data->email) :  CHtml::encode($data->username) . " / " . CHtml::encode($data->email); ?></td>
	<td><?php echo CHtml::encode($data->login_time);?></td>
</tr>
<!-- 
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('requires_new_password')); ?>:</b>
	<?php echo CHtml::encode($data->requires_new_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php 
/*
	       * <b><?php echo CHtml::encode($data->getAttributeLabel('login_attempts')); ?>:</b> <?php echo CHtml::encode($data->login_attempts); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('login_time')); ?>:</b> <?php echo CHtml::encode($data->login_time); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('login_ip')); ?>:</b> <?php echo CHtml::encode($data->login_ip); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('validation_key')); ?>:</b> <?php echo CHtml::encode($data->validation_key); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('create_id')); ?>:</b> <?php echo CHtml::encode($data->create_id); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b> <?php echo CHtml::encode($data->create_time); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('update_id')); ?>:</b> <?php echo CHtml::encode($data->update_id); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b> <?php echo CHtml::encode($data->update_time); ?> <br />
	       */
	?>

</div>
 -->