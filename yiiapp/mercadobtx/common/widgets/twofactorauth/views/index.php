<script type="text/javascript">
	function <?php echo $this->getId() ?>_resend_code() {
		var data = {};
		<?php if ( $sms_input_id ):?>
			var node = $("#<?php echo $sms_input_id; ?>");
			if ( node ) {
				data['smsphone'] = node.val();
			}
		<?php endif ?>

		$.post( "<?php echo Yii::app()->createUrl('security/smscode'); ?>", data, function( data ) {

		});
	}

	function <?php echo $this->getId() ?>_show_modal() {
		<?php echo $this->getId() ?>_resend_code();
		$('#verifyModal').modal('show');
	}
	
</script>
<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo Yii::t('translation', 'Enter Authorization code');?></h4>
			</div>
			<div class="modal-body">
			<?php
			
			if ($deliveras == UserTwoFactorSettings::GOOGLE_AUTH) {
				echo $form->textFieldControlGroup ( $gamodel, 'twofactorauthcode', array (
						'class' => 'form-control',
						'style' => 'font-size: 30pt; padding: 4pt; height: 64px',
						'size' => '6',
						'maxsize' => '6' 
				) );
			} else if ($deliveras == UserTwoFactorSettings::SMS) {
				echo $form->textFieldControlGroup ( $smsmodel, 'twofactorauthcode', array (
						'class' => 'form-control',
						'style' => 'font-size: 30pt; padding: 4pt; height: 64px',
						'size' => '6',
						'maxsize' => '6' 
				) );
			}
			?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left"
					data-dismiss="modal"><?php echo Yii::t('translation', 'Cancel'); ?></button>
					
				<?php if ($deliveras == UserTwoFactorSettings::SMS): ?>
					<button onclick="resend_code();" type="button"
					class="btn btn-default "><?php echo Yii::t('translation', 'Resend'); ?></button>
				<?php endif ?>
			
					<?php
					$this->widget ( 'bootstrap.widgets.TbButton', array (
							'buttonType' => 'submit',
							'type' => 'primary',
							'label' => Yii::t ( 'translation', 'Continue' ),
							'htmlOptions' => array (
									'name' => $name 
							) 
					) );
					?>
			</div>
		</div>
	</div>
</div>
<div class="" style="padding-top: 20px; margin-left: -10px;">
<?php
if ($deliveras == UserTwoFactorSettings::GOOGLE_AUTH || $deliveras == UserTwoFactorSettings::SMS) {
	
	$this->widget ( 'bootstrap.widgets.TbButton', array (
			'buttonType' => 'button',
			'type' => 'primary',
			'label' => $label,
			'icon' => $icon,
			'htmlOptions' => array (
					'onclick' => 'javascript: ' . $this->getId () . '_show_modal();',
					'name' => $name 
			) 
	) );
} elseif ($deliveras == UserTwoFactorSettings::NONE) {
	// no auth settings set, so just use a submit button
	$this->widget ( 'bootstrap.widgets.TbButton', array (
			'htmlOptions' => array (
					'name' => $name 
			),
			'buttonType' => 'submit',
			'type' => 'primary',
			'label' => $label 
	) );
}
?>
</div>

