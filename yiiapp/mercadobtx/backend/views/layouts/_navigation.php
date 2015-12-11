<?php
/**
 * Top menu definition.
 *
 * @var BackendController $this
 */
?>
<header>
	<div class="container">
		<h1 class="logo">
			<a href="<?php echo Yii::app()->baseUrl . '/' ?>"> <img
				alt="MeradoBTX"
				src="<?php echo Yii::app()->baseUrl . '/images' ?>/logo.png">
			</a>
		</h1>

		<nav>
			<ul class="nav nav-pills nav-top">
				<li><a href="/site/index"><i class="glyphicon glyphicon-user"></i><?php echo Yii::t('translation', 'Home'); ?></a>
				</li>

<?php if (Yii::app()->user->isGuest): ?>
	<li><a href="/site/login"><i class="glyphicon glyphicon-user"></i><?php echo Yii::t('translation', 'Login'); ?></a>
				</li>
<?php else:?>
	<li><a href="/site/logout"><i class="glyphicon glyphicon-user"></i><?php echo Yii::t('translation', 'Logout ({username})', array('{username}' => Yii::app()->user->name)); ?></a>
				</li>

<?php endif; ?>

	</ul>
		</nav>
	</div>
</header>