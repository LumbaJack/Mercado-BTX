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
    <div class="panel-heading"><?php echo Yii::t('translation', 'wallet_nuevo_monedero_title'); ?></div>
    <table>
      <tr><td>Your Bitcoin Address</td><td><?php echo  $data->{'multiaddr'} ?></td></tr>
      <tr><td colspan=2>Las siguientes son sus llaves privadas, recuerde las tiene que guardar muy bien</td></tr>
      <tr><td>Private Key 1</td><td><?php echo $data->{'key2'} ?></td></tr>
      <tr><td>Private Key 2</td><td><?php echo $data->{'key3'} ?></td></tr>
      <tr><td colspan='2'>
           <?php
	   $form = $this->beginWidget('CActiveForm', array(
	       'id'=>'printform',
	       'action' => Yii::app()->createUrl('wallets/walletpaper'),
	       'htmlOptions'=>array('target'=>'_blank'),
	       )); ?>
	       <input type="hidden" name='addr' value='<?php echo  $data->{'multiaddr'} ?>'>
	       <input type="hidden" name='key1' value='<?php echo $data->{'key2'} ?>'>
	       <input type="hidden" name='key2' value='<?php echo $data->{'key3'} ?>'>
	        <input type="submit" value="Imprimir" class="btn btn-primary">
	   <?php $this->endWidget(); ?>
      </td></tr>
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
