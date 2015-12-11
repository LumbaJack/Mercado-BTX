<?php
/* @var $this WalletsController */
$this->breadcrumbs = array (
		'Wallets' 
);
?>
<div class="row">
	<ul class="nav nav-tabs">
		<li><a href="<?php echo Yii::t('urls', '/account'); ?>"><?php echo Yii::t('translation', 'account_top_tab_1'); ?></a></li>
		<li class="active"><a href="#"><?php echo Yii::t('translation', 'account_top_tab_2'); ?></a></li>
		<li><a href="/<?php echo Yii::t('translation', 'security'); ?>"><?php echo Yii::t('translation', 'account_top_tab_3'); ?></a></li>
	</ul>
</div>
<br>


<div class="row">
<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading"><?php echo Yii::t('translation', 'wallet_nuevo_monedero_title'); ?></div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th colspan=2><?php echo Yii::t('translation', 'wallet_table_entry_1'); ?></th>
					<th><?php echo Yii::t('translation', 'wallet_table_entry_2'); ?></th>
					<th><?php echo Yii::t('translation', 'wallet_table_entry_3'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><img src="/images/qr_generate.png" class="btoqr"  data="<?php echo $wallet->wallet_address; ?>"></td>
					<td><?php echo $wallet->wallet_address; ?></td>
					<td><?php echo $wallet->btc_amount; ?></td>
					<td><?php echo date('Y.m.d H:i:s', $wallet->create_time); ?></td>
				</tr>
		</table>
	</div>
</div>

<div id="wallet_modal" class="modal fade" tabindex="-1" role="dialog"
	data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="text-align: center">
				<h3><?php echo Yii::t('translation', 'wallet_creating_message'); ?></h3>
			</div>
			<div class="modal-body">
				<div style="height: 200px">
					<span id="searching_spinner_center"
						style="position: absolute; display: block; top: 50%; left: 50%;"></span>
				</div>
			</div>
			<div class="modal-footer" style="text-align: center"></div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
var opts = {
  lines: 13, // The number of lines to draw
  length: 20, // The length of each line
  width: 10, // The line thickness
  radius: 30, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb or array of colors
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: 'auto', // Top position relative to parent in px
  left:'auto' // Left position relative to parent in px
};
var target = document.getElementById('searching_spinner_center');
var spinner = new Spinner(opts).spin(target);
    });
$( ".btoqr" ).click(function() {
    //bootbox.alert("<div id='addqr'></div><div><span id='btcadd'></span></div>");
    bootbox.alert('<div id="addqr" style="width: 200px; float: left; "></div><div style="padding: 60px; "><span id="btcadd"></span></div></div>');
    $('#btcadd').html($(this).attr("data"));
    $('#addqr').qrcode({text:$(this).attr("data"),width:150,height:150});
});
</script>
