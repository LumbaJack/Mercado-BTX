<?php
/**
 * @var BackendSiteController $this
 */
$this->pageTitle = Yii::app ()->name;
?>

<h1>
	<i><?php echo CHtml::encode($this->getPageTitle()); ?></i>
</h1>



<?php if ( !Yii::app()->user->isGuest ):?>
<div class="container">
	<div class="col-md-6">
		<ul>
			<li>
				<p>
					<a
						href="<?php echo Yii::app()->controller->createUrl('support/index'); ?>">Support
						Tickets</a>
				</p>
			</li>
			<li>
				<p>
					<a
						href="<?php echo Yii::app()->controller->createUrl('funds/index'); ?>">Add
						funds</a>
				</p>
			</li>
		</ul>
	</div>
	<div class="col-md-6">
		<ul>
			<li>
				<p>
					<a
						href="<?php echo Yii::app()->controller->createUrl('user/index'); ?>">Users</a>
				</p>
			</li>
	
	</div>
</div>

<?php else: ?>
<div class="jumbotron">
	<h1>Administrator access only</h1>
</div>
<div class="alert alert-danger">This is a restricted system.
	Unauthorized access may be hazardous to your health.</div>
<?php endif; ?>




