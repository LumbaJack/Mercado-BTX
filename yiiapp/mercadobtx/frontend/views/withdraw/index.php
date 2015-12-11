<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);

$country_opts = array (
		'' => array (
				'style' => 'display: none' 
		) 
);

if ($user_country_code) {
	$country_opts [$user_country_code] = array (
			'selected' => true 
	);
}

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array (
		'action' => Yii::app ()->createUrl ( "/withdraw" ) 
) );

Yii::app()->clientScript->registerScriptFile($this->get_libpath() . "/jsqrcode/html5-qrcode.min.js", CClientScript::POS_END);
?>
<div class="row">
	<ul class="nav nav-tabs">
		<li><a
			href="<?php echo $this->createUrl('/'. Yii::t('urls','deposit')); ?>"><?php echo Yii::t('translation', 'mid_title_dr_1'); ?></a></li>
		<li class="active"><a
			href="<?php echo $this->createUrl('/'. Yii::t('urls','withdraw')); ?>"><?php echo Yii::t('translation', 'mid_title_dr_2'); ?></a></li>
	</ul>
</div>
<br>
<br>
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'withdrawal_top_title'); ?></h4>

<div class="row">
	<div class="panel panel-default" style="padding: 30px">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo Yii::t('translation', 'withdrawal_disclaimer_mid_2'); ?>	
		</div>

	<div>
		<center>
			<h4><?php echo Yii::t('translation', 'withdrawal_method_choice'); ?> </h4>
		</center>
	</div>
	<div class="controls">
		<center>
			<select class="form-control" style="width: 300px;" id='withselect'><option
					value='opt_btc'><?php echo Yii::t('translation', 'withdrawal_method_1'); ?></option>
				<option value='opt_wire'><?php echo Yii::t('translation', 'withdrawal_method_2'); ?></option>
				<option value='opt_paypal'><?php echo Yii::t('translation', 'withdrawal_method_3'); ?></option></select>
		</center>
	</div>
	<br>

	<div id="opt_btc" class="payopt">
		<div class="panel panel-default" style="padding: 10px 60px 60px 60px">
				<?php
				if ($model_btc->hasErrors ()) {
					echo TbHtml::alert ( TbHtml::ALERT_COLOR_DANGER, Yii::t ( 'translation', 'Unable to create transaction' ) . $form->errorSummary ( $model_btc ) );
				}
				?>
			
				<div class="row">
					<div style="padding: 0 10px 0 10px">
						<center>
							<h4><?php echo Yii::t('translation', 'withdrawal_paypal_row_1'); ?></h4>
						<?php Yii::t('translation', 'BTC Balance:'); ?></span><span
								style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.8n', $balance->btc); ?> BTC</span>
						</center>
					</div>
				</div>
				<div class="row">
					<div class="center-block">
						<div class="col-sm-10" style="float: none">
							<?php echo $form->textFieldControlGroup($model_btc, 'address', array('class' => 'form-control', 'placeholder' => 'BTC Address')); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="center-block">
						<div class="col-sm-8" ">
							<?php echo $form->textFieldControlGroup($model_btc, 'privatekey', array('class' => 'form-control', 'placeholder' => 'Private Key')); ?>
							<img src="/images/Barcode-Scanner-Icon.png" width='40px' id="btoqrsc">
						</div>
					</div>
				</div>
				<div class="row">
					<center>
						<div class="col-sm-4" style="float: none">
						<?php
						$this->widget ( 'common.widgets.currencyinput.CurrencyInput', array (
								'form' => $form,
								'model' => $model_btc,
								'currency' => 'BTC',
								'attribute' => 'transfer_amount',
								'htmlOptions' => array (
										'class' => 'form-control',
										'placeholder' => '0.00' 
								) 
						) );
						?>
					</center>
				</div>
				<div class="row">
					<div class="col-sm-10" style="float: none">
							<?php echo $form->textAreaControlGroup($model_btc, 'notes', array('class' => 'form-control')); ?>
						</div>
				</div>
				<div class="row">
					<div class="" style="padding-top: 20px; margin-left: -10px;">
							<?php
							$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
									'form' => $form,
									'name' => 'btc_submit',
									'label' => Yii::t ( 'translation', 'withdrawal_bank_button' ),
									'deliveras' => $deliveras,
									'icon' => 'ok' 
							) );
							?>
					</div>
				</div>
			</div>
	</div>

	<div id="opt_wire" class="payopt" style='display: none;'>
		<div class="bs-callout bs-callout-info"
			style="background-color: #f4f8fa; border-color: #5bc0de; margin: 20px 0; padding: 20px; border-left: 3px solid #5bc0de;">
			<p><?php echo Yii::t('translation', 'withdrawal_disclaimer_mid_1'); ?> </p>
		</div>
		<div class="panel panel-default" style="padding: 10px 60px 60px 60px">

				<?php
				if ($model_bank->hasErrors ()) {
					echo TbHtml::alert ( TbHtml::ALERT_COLOR_DANGER, Yii::t ( 'translation', 'Unable to create transaction' ) . $form->errorSummary ( $model_bank ) );
				}
				?>
			<div class="row">
				<center>
					<div style="padding: 0 10px 0 10px">
						<h4><?php echo Yii::t('translation', 'withdrawal_paypal_row_1'); ?></h4>
						<div>
				<?php Yii::t('translation', 'USD Balance:'); ?></span><span
								style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', $balance->usd); ?> USD</span>
						</div>
						<div>
				<?php Yii::t('translation', 'MXN Balance:'); ?></span><span
								style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', $balance->local); ?> MXN</span>
						</div>

					</div>
				</center>
			</div>
			<div class="row">
				<div>
					<center>
						<div class="col-sm-4" style="float: none">
						<?php
							$this->widget ( 'common.widgets.currencyinput.CurrencyInput', array (
									'form' => $form,
									'model' => $model_bank,
									'currency' => 'USD',
									'supported_currencies' => array (
											'USD',
											'MXN' 
									),
									'attribute' => 'transfer_amount',
									'htmlOptions' => array (
											'class' => 'form-control',
											'placeholder' => '0.00' 
									) 
							) );
						?>
						
						</div>
					</center>
				</div>
				<div>
					<hr>
					<h4>
				<?php echo Yii::t('translation', 'withdrawal_bank_sub_title_1');?>
					</h4>

					<div class="col-md-6">

	
						<?php
						echo $form->textFieldControlGroup ( $model_bank, 'account_name', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_bank, 'line1', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_bank, 'swift_number', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_bank, 'comments', array (
								'class' => 'form-control' 
						) );
						?>
	

					</div>


					<div class="col-md-6">
	
				<?php
				echo $form->dropDownListControlGroup ( $model_bank, 'countrycode', array_merge ( array (
						'' => 'Select Country' 
				), MbtxData::countries () ), array (
						'class' => 'form-control',
						'multiple' => false,
						'options' => $country_opts 
				) );
				?>

				<?php
				echo $form->textFieldControlGroup ( $model_bank, 'city', array (
						'class' => 'form-control' 
				) );
				?>
				
				<?php
				echo $form->textFieldControlGroup ( $model_bank, 'postcode', array (
						'class' => 'form-control' 
				) );
				?>
	
				<?php
				echo $form->textFieldControlGroup ( $model_bank, 'bank_name', array (
						'class' => 'form-control' 
				) );
				?>
				
				<?php
				echo $form->textFieldControlGroup ( $model_bank, 'account_number', array (
						'class' => 'form-control' 
				) );
				?>
						
					</div>


				</div>

				<div>
					<h4>
				<?php echo Yii::t('translation', 'withdrawal_bank_sub_title_2'); ?>
				</h4>


					<div class="col-md-6">

	
						<?php
						echo $form->textFieldControlGroup ( $model_intermediate, 'account_name', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_intermediate, 'line1', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_intermediate, 'swift_number', array (
								'class' => 'form-control' 
						) );
						?>
						
						<?php
						echo $form->textFieldControlGroup ( $model_intermediate, 'comments', array (
								'class' => 'form-control' 
						) );
						?>
	

				</div>


					<div class="col-md-6">
	
				<?php
				echo $form->dropDownListControlGroup ( $model_intermediate, 'countrycode', array_merge ( array (
						'' => 'Select Country' 
				), MbtxData::countries () ), array (
						'class' => 'form-control',
						'multiple' => false,
						'options' => $country_opts 
				) );
				?>
	
				
				<?php
				echo $form->textFieldControlGroup ( $model_intermediate, 'comments', array (
						'class' => 'form-control' 
				) );
				?>
	
				<?php
				echo $form->textFieldControlGroup ( $model_intermediate, 'bank_name', array (
						'class' => 'form-control' 
				) );
				?>
				
				<?php
				
				echo $form->textFieldControlGroup ( $model_intermediate, 'account_number', array (
						'class' => 'form-control' 
				) );
				?>
						

			</div>
				</div>
			</div>
			<div class="row">
				<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
						'form' => $form,
						'name' => 'wire_submit',
						'label' => Yii::t ( 'translation', 'withdrawal_bank_button' ),
						'deliveras' => $deliveras,
						'icon' => 'ok' 
				) );
				?>
		</div>
			</div>
		</div>
	</div>
</div>
<div id="opt_paypal" class="payopt" style='display: none;'>
	<div class="panel panel-default" style="padding: 10px 60px 60px 60px">

				<?php
				if ($model_paypal->hasErrors ()) {
					echo TbHtml::alert ( TbHtml::ALERT_COLOR_DANGER, Yii::t ( 'translation', 'Unable to create transaction' ) . $form->errorSummary ( $model_bank ) );
				}
				?>
			<div class="row">
			<center>
				<div style="padding: 0 10px 0 10px">
					<h4><?php echo Yii::t('translation', 'withdrawal_paypal_title'); ?></h4>
					<div>
				<?php Yii::t('translation', 'USD Balance:'); ?></span><span
							style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', $balance->usd); ?> USD</span>
					</div>
					<div>
				<?php Yii::t('translation', 'MXN Balance:'); ?></span><span
							style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', $balance->local); ?> MXN</span>
					</div>

				</div>
			</center>


			<div style="padding: 10px">
				<center>
					<div class="col-sm-4" style="float: none">
						<?php
						$this->widget ( 'common.widgets.currencyinput.CurrencyInput', array (
								'form' => $form,
								'model' => $model_paypal,
								'currency' => 'USD',
								'supported_currencies' => array (
										'USD',
										'MXN' 
								),
								'attribute' => 'transfer_amount',
								'htmlOptions' => array (
										'class' => 'form-control',
										'placeholder' => '0.00' 
								) 
						) );
						?>
						</div>
				</center>
			</div>
			<div style="padding: 10px">
				<b><?php echo Yii::t('translation', 'withdrawal_paypal_row_2'); ?></b>
				<?php
				
				echo $form->emailFieldControlGroup ( $model_paypal, 'email', array (
						'class' => 'form-control' 
				) );

				?>
			</div>
			<div class="" style="padding-top: 20px; margin-left: -10px;">
				<?php
				$this->widget ( 'common.widgets.twofactorauth.TwoFactorAuth', array (
						'form' => $form,
						'name' => 'paypal_submit',
						'label' => Yii::t ( 'translation', 'withdrawal_bank_button' ),
						'deliveras' => $deliveras,
						'icon' => 'ok' 
				) );
				?>
				</div>
		</div>

	</div>
</div>
<?php $this->endWidget(); ?>

<script> 
  $(function() {
  $( "#btoqrsc" ).click(function() {
      bootbox.alert("<span>Coloque el codigo de barras frente a su camara</span><div id='reader' style='width:300px;height:250px' ></div><span id='qrscannermsg'></span>");
      $('#reader').html5_qrcode(function(data){
      	  $("#WithdrawBtcForm_privatekey").val(data);
	  bootbox.hideAll();
      	  $("#WithdrawBtcForm_privatekey").focus();
      },
      function(error){
      	  //$("#qrscannermsg").html("Error: " + error);
      }, function(videoError){
      	  $("#qrscannermsg").html("Error: " + videoError);
      });
  });
  $( "#withselect").change(function () {
      var cv = $(this).val();
      $('.payopt').hide();
      $('#' + cv).show();
  });

  $("#withselect").val( '<?php echo $tab; ?>' );
  $("#withselect").trigger('change');
  });
</script>
