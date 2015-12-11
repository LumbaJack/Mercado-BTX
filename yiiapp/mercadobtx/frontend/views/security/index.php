<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);
?>

<div class="row">
	<ul class="nav nav-tabs">
		<li><a href="<?php echo Yii::t('urls', '/account'); ?>"><?php echo Yii::t('translation', 'account_top_tab_1'); ?></a></li>
		<li><a href="<?php echo Yii::t('translation', '/wallets'); ?>"><?php echo Yii::t('translation', 'account_top_tab_2'); ?></a></li>
		<li class="active"><a href="#"><?php echo Yii::t('translation', 'account_top_tab_3'); ?></a></li>
	</ul>
</div>
<br>
<br>



<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'account_submenu_title_1'); ?></h4>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-8">
			<div class="col-md-4">
						<div class="control-group">
					<label class="control-label" for="user_password"><?php echo Yii::t('translation', 'account_submenu_title_1'); ?></label>
					<div class="controls">
						<p class="text">
							<a href="<?php echo Yii::t('urls', '/changepassword'); ?>" data-toggle="modal"><?php echo Yii::t('translation', 'account_submenu_content_1'); ?></a>
							<br> <a href="<?php echo Yii::t('urls', '/recovery'); ?>"><?php echo Yii::t('translation', 'account_submenu_content_2'); ?></a>
						</p>
					</div>
				</div>
		</div>
	</div>

</div>

<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'security_title'); ?></h4>

<div class="row">	
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div>

			<?php
			echo $form->radioButtonListControlGroup ( $model, 'deliveras', array (
					Yii::t ( 'translation', 'security_menu_1' ),
					Yii::t ( 'translation', 'security_menu_2' ),
					Yii::t ( 'translation', 'security_menu_3' ) 
			), array (
					'onclick' => 'radio_click(this);' 
			) );
			?>
			<div class="smsonly">
				<div>
					<?php echo CHtml::link(Yii::t('translation', 'Change'), array('/changephone')); ?>
				</div>
				<?php echo $form->textFieldControlGroup($model, 'smsphone', array('class' => 'form-control', 'size' => '30', 'readonly' => 'readonly')); ?>
				</div>
			<div class="gaonly">
				<div id="qrCodeUrl" >
					<img src="<?php echo $qrCodeUrl; ?>"></img>
				</div>
			</div>
			<script type="text/javascript">
				function radio_click(radio) {
					var id = "#<?php echo CHtml::activeId($model, 'smsphone'); ?>";
					$('.smsonly').hide();
					$('.gaonly').hide();
					
					if ( jQuery(radio).val() == '<?php echo UserTwoFactorSettings::SMS; ?>' ) {
						$('.smsonly').show();
					}
					else if ( jQuery(radio).val() == '<?php echo UserTwoFactorSettings::GOOGLE_AUTH; ?>' ) {
						$('.gaonly').show();
					}
				}

				jQuery(document).ready(function() {
					radio_click(jQuery("input[name='<?php echo CHtml::activeName($model, 'deliveras')?>']:checked"));
				});
			</script>
		</div>
		<div class="" style="padding-top: 20px; margin-left: -10px;">
			<?php
			$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
					'form' => $form,
					'label' => Yii::t ( 'translation', 'security_menu_button' ),
					'deliveras' => $deliveras,
					'icon' => 'ok' 
			) );
			?>

    	</div>

		<div class="col-md-4"></div>
	</div>
</div>

<?php $this->endWidget(); ?>
</div>
</div>
</div>


