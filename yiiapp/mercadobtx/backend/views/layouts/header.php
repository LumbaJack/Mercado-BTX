<script type="text/javascript">
jQuery(document).ready(function() {
<?php
	function _flash_class($level) {
		switch($level) {
			case 'success':
				return 'success';
			case 'warn':
					return 'warning';
			case 'error':
				return 'error';
			default:
				return 'info';
		}
		return 'info';
	}
	foreach(Yii::app()->user->getFlashes() as $key => $message):
?>
	    	jQuery.pnotify({
	    		text: "<?php echo $message; ?>",
	    		icon: false,
	    		styling: 'bootstrap3',
	    		type: "<?php echo _flash_class($key); ?>"
	    	});


		
<?php endforeach; ?>

});
</script>

<!-- NAVIGATION BEGIN -->
<?php $this->renderPartial('//layouts/_navigation');?>
<!-- NAVIGATION END -->
