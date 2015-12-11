<?php
/**
 * @var FronendSiteController $this

 */
?>
<style>
.bs-callout-info {
	background-color: #f4f8fa;
	border-color: #bce8f1;
}

.bs-callout {
	margin: 20px 0;
	padding: 20px;
	border-left: 3px solid #eee;
}

.deposit {
	background-image: url('/images/icon-deposit.png');
	width: 24px;
	height: 24px;
	display: inline-block;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
	vertical-align: middle;
	margin-top: -6px;
	margin-right: 15px;
	margin-left: -5px;
}

.withdrawal {
	background-image: url('/images/icon-withdrawal.png');
	width: 24px;
	height: 24px;
	display: inline-block;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
	vertical-align: middle;
	margin-top: -6px;
	margin-right: 15px;
	margin-left: -5px;
}

.button a:hover {
	color: #FFF;
}

.button a:hover,.button a:focus {
	color: #FFF;
	text-decoration: none;
}

.button a:active,.button a:hover {
	outline: 0;
}

.button {
	height: 40px;
	line-height: 40px;
}

.balance_buttons .button {
	margin-right: 10px;
	min-width: 100px;
	margin-bottom: 10px;
}

.button {
	display: inline-block;
	height: 48px;
	line-height: 48px;
	color: #fff;
	font-size: 1em;
	min-width: 180px;
	text-align: center;
	cursor: default;
	border: 1px solid #8EC919;
	font-weight: 600;
	text-transform: uppercase;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding-left: 30px;
	padding-right: 30px;
	background-color: #8EC919;
	-webkit-box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0
		rgba(255, 255, 255, 0.05);
	-moz-box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0
		rgba(255, 255, 255, 0.05);
	box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0
		rgba(255, 255, 255, 0.05);
	-webkit-transition: all 0.05s linear;
	-moz-transition: all 0.05s linear;
	transition: all 0.05s linear;
}
/*a {
color: #75B103;
text-decoration: none;
}*/
user agent stylesheeta:-webkit-any-link {
	color: -webkit-link;
	text-decoration: underline;
	cursor: auto;
}
</style>



<!--				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="index.php">Inicio</a></li>
									<li class="active">Transacciones </li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Historial de Transacciones</h2>
							</div>
						</div>
					</div>
				</section>
-->
<div>
	<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'home_top_title'); ?></h4>
	<p><?php echo Yii::t('translation', 'home_top_title_2'); ?></p>

	<div class="highlight ">
		<pre>
					<ul class="balance_currency_list">
						<li style="line-height: 0px; list-style: none;"><span
					style="font-weight: 700; font-size: 2em; color: #666;"><?php Yii::t('translation', 'BTC Balance:'); ?></span><span
					style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.8n', count($balance) > 0 ? $balance[0]->btc : 0) ?> BTC</span></li>
						<li style="line-height: 0px; list-style: none;"><span
					style="font-weight: 700; font-size: 2em; color: #666;"><?php Yii::t('translation', 'USD Balance:'); ?></span><span
					style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', count($balance) > 0 ? $balance[0]->usd : 0) ?> USD</span></li>
						<li style="line-height: 0px; list-style: none;"><span
					style="font-weight: 700; font-size: 2em; color: #666;"><?php Yii::t('translation', 'MNX PESOS Balance:'); ?></span><span
					style="color: #8EC919; font-weight: 700; font-size: 2em;"><?php echo money_format('%.2n', count($balance) > 0 ? $balance[0]->local : 0) ?> MXN</span></li>
						<li style="line-height: 0px; list-style: none;"><a
					href="<?php echo $this->createUrl('/' . Yii::t('urls', 'deposit')); ?>" class="button"
					style="font-size: 1em; color: #FFF; text-decoration: none; font-weight: 600; text-transform: uppercase;"><span
						class="deposit"></span><?php echo Yii::t('translation', 'depositar_buton'); ?></a>&nbsp;&nbsp;&nbsp;<a
					href="<?php echo $this->createUrl('/' . Yii::t('urls', 'withdraw')); ?>" class="button"
					style="font-size: 1em; color: #FFF; text-decoration: none; font-weight: 600; text-transform: uppercase;"><span
						class="withdrawal"></span><?php echo Yii::t('translation', 'enviar_buton'); ?></a></li>
					</ul>
				</pre>
	</div>
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo Yii::t('translation', 'mid_title_home'); ?></div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th><?php echo Yii::t('translation', 'section_home_1'); ?></th>
					<th><?php echo Yii::t('translation', 'section_home_2'); ?></th>
					<th><?php echo Yii::t('translation', 'section_home_3'); ?></th>
					<th><?php echo Yii::t('translation', 'section_home_4'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			//$StatusDescr = array('Pendiente', 'Completo', 'Cancelada');
			foreach ( $transactions as $trans ): ?>
				<tr>
					<td><?php echo Yii::t('translation', $trans->descr); ?></td>
					<td><?php echo gmdate("d/m/Y H:i:s", $trans->create_time); ?></td>
					<td><span class="label <?php echo  Yii::t('translation', $trans->get_label()) ?>"><?php echo Yii::t('translation', $trans->get_status()); ?></span></td>
					<?php if ( $trans->currency == "BTC") {
						$amount = money_format('%.8n', $trans->amount);
					      } else {
						$amount = money_format('%.2n', $trans->amount);
					      }
					?>
					<td style="color: #4EB17B; font-weight: bold;"><?php echo $amount." ".$trans->currency ?></td>
				</tr>
			<?php endforeach ; ?>
			</tbody>
		</table>
	</div>
</div>
<!--End body -->
</div>
</div>
