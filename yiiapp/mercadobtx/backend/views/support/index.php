<?php
/* @var $this SupportController */
$this->breadcrumbs = array (
		'Support' 
);
?>



<?php if ( count($model) <= 0 ) :?>
<div class="alert alert-danger"><?php echo Yii::t('translation', 'no_tickets_message'); ?></div>
<?php else :?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading"><?php echo Yii::t('translation', 'tickets_new_title'); ?></div>

	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th><?php echo Yii::t('translation', 'tickets_field_1'); ?></th>
				<th><?php echo Yii::t('translation', 'tickets_field_2'); ?></th>
				<th><?php echo Yii::t('translation', 'tickets_field_3'); ?></th>
				<th><?php echo Yii::t('translation', 'tickets_field_4'); ?></th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ( $model as $m ) :?>
				<tr>
				<td><a
					href="<?php echo $this->createUrl('support/ticket',array('id' => $m->id)); ?>"><?php echo $m->id ?><a /></td>
				<td><a
					href="<?php echo $this->createUrl('support/ticket',array('id' => $m->id)); ?>"><?php echo $m->status ?></a></td>
				<td><a
					href="<?php echo $this->createUrl('support/ticket',array('id' => $m->id)); ?>"><?php echo $m->subject ?></a></td>
				<td><a
					href="<?php echo $this->createUrl('support/ticket',array('id' => $m->id)); ?>"><?php echo $m->update_time ?></a></td>

			</tr>
			<?php endforeach; ?>
	
	
	
	
	</table>



	<div class="bs-example">

			<?php
	$data = array ();
	foreach ( $model as $m ) { // loop to get the data (this is different from the complex way)
		$data [] = $m->attributes;
	}
	
	// the pagination widget with some options to mess
	$this->widget ( 'CLinkPager', array (
			'currentPage' => $pages->getCurrentPage (),
			'itemCount' => $item_count,
			'pageSize' => $page_size,
			'maxButtonCount' => 5,
			'header' => '',
			'htmlOptions' => array (
					'class' => 'pagination' 
			),
			'firstPageLabel' => '<i class="glyphicon glyphicon-step-backward"></i>',
			'prevPageLabel' => '<i class="glyphicon glyphicon-backward"></i>',
			'nextPageLabel' => '<i class="glyphicon glyphicon-forward"></i>',
			'lastPageLabel' => '<i class="glyphicon glyphicon-step-forward"></i>' 
	) );
	
	?>
    </div>
<?php endif; ?>
</div>
</div>
