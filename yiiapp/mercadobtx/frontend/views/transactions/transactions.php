<?php
/* @var $this TransactionsController */

$this->breadcrumbs=array(
	'Transactions',
);
?>

<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'historial_title'); ?></h4>


	<?php if ( count($transactions) <= 0 ) :?>
		<div class="alert alert-danger"><?php echo Yii::t('translation', 'transaction_none_text'); ?></div>
	<?php else :?>
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading"><?php echo Yii::t('translation', 'Ultimas Transacciones'); ?></div>
	
	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th><?php echo Yii::t('translation', 'Status'); ?></th>
				<th><?php echo Yii::t('translation', 'Type'); ?></th>
				<th><?php echo Yii::t('translation', 'Amount'); ?></th>
				<th><?php echo Yii::t('translation', 'Create Time'); ?></th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $transactions as $tran ) :?>
				<tr>
					<td><span class="label <?php echo Yii::t('translation', $tran->get_label());  ?>"><?php echo Yii::t('translation', $tran->get_status()); ?></span></td>
					<td><?php echo Yii::t('translation', $tran->get_type()); ?></td>
					<?php if ( $tran->currency == "BTC") {
                                                $amount = money_format('%.8n', $tran->amount);
                                              } else {
                                                $amount = money_format('%.2n', $tran->amount);
                                              }
                                        ?>
					<td align="right"><?php echo $amount ?></td>
					<td><?php echo gmdate("d/m/Y H:i:s", $tran->create_time); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<div class="pagination">
		<?php
			$this->widget('CLinkPager', array(
				'pages' => $pages,
				'header' => '',
				'nextPageLabel' => 'Next',
				'prevPageLabel' => 'Prev',
				'selectedPageCssClass' => 'active',
				'hiddenPageCssClass' => 'disabled',
				'htmlOptions' => array(
					'class' => 'pagination',
					)
			 )) ?>
		</div>
		<?php endif ?>
	</div>
</div>
