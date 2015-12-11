<!-- LEFT MENU -->
<?php 
	$leftmenu = '';
	if ( isset($this->leftmenu) ) {
		$leftmenu = $this->leftmenu;
	}

		
	function _isThisPage($leftmenu, $pagename) {
		if ( $leftmenu == $pagename  ) {
			return true;
		}
		return false;
	}
?>
<div class="col-md-3">
	<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
		<li class="<?php echo _isThisPage($leftmenu, '') ? 'active' : '' ?>"><a href="/"><span
				class="glyphicon glyphicon-align-justify ">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_1'); ?></a></li>
		<li class="<?php echo _isThisPage($leftmenu, Yii::t('urls', 'transactions')) ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl(Yii::t('urls', '/transactions')); ?>"><span
				class="glyphicon glyphicon-time dark">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_2'); ?></a></li>
		<li class="<?php echo _isThisPage($leftmenu, Yii::t('urls', 'deposit')) ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl(Yii::t('urls', '/deposit')); ?>"><span
				class="glyphicon glyphicon-usd ">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_3'); ?></a></li>
		<li class="<?php echo _isThisPage($leftmenu, Yii::t('urls', 'support')) ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl(Yii::t('urls', '/support')); ?>"><span
				class="glyphicon glyphicon-phone-alt ">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_4'); ?></a></li>
		<li class="<?php echo _isThisPage($leftmenu, Yii::t('urls', 'account')) ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl(Yii::t('urls', '/account')); ?>"><span
				class="glyphicon glyphicon-user ">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_5'); ?></a></li>
		<li class="<?php echo _isThisPage($leftmenu, Yii::t('urls', 'verify')) ? 'active' : '' ?>"><a href="<?php echo Yii::app()->createUrl(Yii::t('urls', '/verify')); ?>"><span
				class="glyphicon glyphicon-eye-open ">&nbsp;</span><?php echo Yii::t('translation', 'left_menu_6'); ?></a></li>
	</ul>
</div>
