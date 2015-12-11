<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Deposit' 
);
?>

<div class="row">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#"><?php echo Yii::t('translation', 'mid_title_dr_1'); ?></a></li>
		<li><a
			href="<?php echo $this->createUrl('/' . Yii::t('urls','withdraw')); ?>"><?php echo Yii::t('translation', 'mid_title_dr_2'); ?></a></li>
	</ul>
</div>
<br>
<br>
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'mid_title_large_1'); ?></h4>

<div class="row">
	<div>
		<div class="panel panel-default" style="padding: 30px">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo Yii::t('translation', 'disclaimer_mid_2'); ?>
	</div>
		<div>
			<center>
				<h4><?php echo Yii::t('translation', 'mid_title_large_2'); ?> </h4>
			</center>
		</div>
		<div class="controls">
			<center>
				<select class="form-control" style="width: 300px;" id='depselect'><option
						value='1'><?php echo Yii::t('translation', 'metodo_1_deposito'); ?></option>
					<option value='2'><?php echo Yii::t('translation', 'metodo_2_deposito'); ?></option></select>
			</center>
		</div>
		<br>
		<div id="optdep1">

			<center>
				<!-- Table -->
	        <?php if (! $wallet ):?>
				<div class="alert alert-danger"><?php echo Yii::t('translation', 'wallet_nuevo_monedero_empty');  echo Yii::t('translation', 'Click <a href="{url}">here</a> to create a new wallet', array('{url}' => $this->createUrl('/wallets'))); ?></div>
	        <?php else: ?>
                <table class="table">
					<thead>
						<tr>
							<th colspan=2><?php echo Yii::t('translation', 'wallet_table_entry_1'); ?></th>
							<th><?php echo Yii::t('translation', 'wallet_table_entry_3'); ?></th>
						</tr>
					</thead>
					<tbody>
                                <tr>
							<td><img src="/images/qr_generate.png" class="btoqr"
								data="<?php echo $wallet->wallet_address; ?>"></td>
							<td><?php echo $wallet->wallet_address; ?></td>
							<td><?php echo date('Y.m.d H:i:s', $wallet->create_time); ?></td>
						</tr>
					</tbody>
				</table>
            <?php endif; ?>
		</center>
		</div>
	</div>
	<div id="optdep2" style='display: none;'>
	<?php
	$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array(
			'action' => Yii::app ()->createUrl ( "/deposit/payredirect" ),
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'method' => 'POST',
			'clientOptions' => array (
					'validateOnSubmit' => true,
					'validateOnChange' => true,
					'validateOnType' => false 
			) 
	) );
	?>
	<div class="bs-callout bs-callout-info"
			style="background-color: #f4f8fa; border-color: #5bc0de; margin: 20px 0; padding: 20px; border-left: 3px solid #5bc0de;">
			<p><?php echo Yii::t('translation', 'disclaimer_mid_1'); ?> </p>
		</div>
		<div class="panel panel-default" style="padding: 30px">
			<center>

				<div style="width: 50%;">
				<?php
				echo TbHtml::textFieldControlGroup ( 'amount', '0.00', array (
						'id' => 'account',
						'class' => 'form-control',
						'label' => Yii::t ( 'translation', 'amount_deposit_1')));
				?>
				</div>

				<table class="table">
					<thead>
						<tr>
							<th colspan=3><?php echo Yii::t('translation', 'select_bank_1'); ?></th>
						</tr>
					</thead>
					<tbody>
                        <?php
							$banks = json_decode ( $astropay->get_banks_by_country ( 'MX', 'json' ) );
							foreach ( $banks as $bnk ) :
						?>
                                <tr>
							<td width='20px'><input type="radio" name="id_bank"
								name='id_bank' value="<?php echo $bnk->{"code"} ?>"></td>
							<td width='110px'><img width="100px"
								src="<?php echo $bnk->{"logo"} ?>"></td>
							<td><?php echo $bnk->{"name"} ?></td>
						</tr>
                        <?php endforeach; ?>
			</tbody>
				</table>
			</center>
		<?php
		echo TbHtml::submitButton(
				Yii::t ( 'translation', 'pay_button_1' ),
				array('color' => TbHtml::BUTTON_COLOR_PRIMARY)
		);
		?> 
	</div>
	<?php $this->endWidget(); ?>
	</div>
</div>
</div>
</div>
</div>
<div id="btoqr_modal" class="modal fade" tabindex="-1" role="dialog"
	data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="text-align: center">
				<h3><?php echo Yii::t('translation', 'Wallet Address'); ?></h3>
			</div>
			<div class="modal-body">
				<p><?php echo Yii::t('translation', 'Send bitcoins to this address'); ?></p>
				<div style="height: 200px">
					<center>
						<div id='addqr'></div>
						<div id='btcadd'></div>
					</center>
				</div>
			</div>
			<div class="modal-footer" style="text-align: center">
				<button onclick='javascript: $("#btoqr_modal").modal("hide");' class="btn btn-primary"  type="button">
					<?php echo Yii::t('translation', 'Close') ; ?>
				</button>
			</div>
		</div>
	</div>
</div>

<script>
  $(function() {
  $( ".btoqr" ).click(function() {
      $('#btcadd').html($(this).attr("data"));
      $('#addqr').empty();
      $('#addqr').qrcode({text:$(this).attr("data"),width:150,height:150});
	  $('#btoqr_modal').modal('show');
  });
  $( "#depselect").change(function () {
      var cv = $(this).val();
      $("#optdep1").hide();
      $("#optdep2").hide();
      if (cv==1)
         $("#optdep1").show();
      if (cv==2)
         $("#optdep2").show();
  });
  });
</script>
