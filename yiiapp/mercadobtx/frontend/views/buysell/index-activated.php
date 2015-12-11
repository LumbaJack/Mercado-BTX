
<script type="text/javascript">
$( document ).ready(function() {
// create the chart
});

</script>
<?php
/* @var $this SendController */

$this->breadcrumbs=array(
	'Send',
);
$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array (
		'action' => Yii::app ()->createUrl ( "/buysell" ),
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
<h4 class="" style="text-transform: uppercase; font-size: x-large;"><?php echo Yii::t('translation', 'buysell_user_title'); ?></h4>
<?php echo $form->hiddenField($buyform, 'type_trans'); ?>
<div class="page page-dashboard" style="float:left;width:100%;">

              <div class="panel panel-default panel-charts">
                <div class="panel-heading"> 
                  <span class="glyphicon glyphicon-market-charts"></span><?php echo Yii::t('translation', 'buysell_table_1_title'); ?>                </div>
                </div><!--/panel charts-->
              
              


                <!-- row start -->
                <div class="row small-market-list">
                  <!-- start cell -->
                  <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading" style="text-transform: uppercase;font-size:x-large;text-align:center;color: #666;"><b> <?php echo Yii::t('translation', 'buysell_table_2_title'); ?></b></div>




<div style="display:none;"></div>      				<fieldset>
      					<ol>
					 <div class="row">
       		                         <div>
	
                                        <center>
                                                <div class="col-sm-8" style="float: left">

						 <?php
                                                        $this->widget ( 'common.widgets.currencyinput.CurrencyInput', array (
                                                                        'form' => $form,
                                                                        'model' => $buyform,
                                                                        'currency' => 'BTC',
                                                     /*                   'supported_currencies' => array (
                                                                                        'USD',
                                                                                        'MXN'
                                                                        ),
						    */
                                                                        'attribute' => 'amount_btc',
                                                                        'htmlOptions' => array (
                                                                                        'class' => 'form-control',
                                                                                        'placeholder' => '0.00',
											'type' => 'number',
											'min' => '.025',
											'max' => '50',
											'step' => 'any',

                                                                        )
                                                        ) );
                                                ?>
						</div>

					</center>.	
						</div>
						</div>
						<small style="color: #428bca;"><?php echo Yii::t('translation', 'Orden minima'); ?>&nbsp;0.025 (BTC)</small>
<li class="even">
        <label class="field-title"><?php echo Yii::t('translation', 'Precio Unitario x BTC:'); ?> </label><span style="font-weight:bold;padding-left:13px;">USD $<span style=""  id="usd_2_btc"></span>&nbsp;<a href="#" onClick="update_rate();"><i class="glyphicon glyphicon-refresh">&nbsp;</i></a></span>
</li>
			
<li class="even">
        <label class="field-title"><?php echo Yii::t('translation', 'Sub Total:'); ?> </label><span style="padding-left:13px;" >$<span id="buysubtotalspan">0</span></span>
</li>
<li>
        <label class="field-title">3%<?php echo Yii::t('translation', 'Comisi&oacute;n de MercadoBTX:'); ?> </label><span style="padding-left:13px;">$<span  id="buymercadofeespan">0</span></span>
</li>
<li class="even">
        <label class="field-title">3% <?php echo Yii::t('translation', 'Comisi&oacute;n de Banco '); ?> </label><span style="padding-left:13px;">$<span  id="buybankfeespan">0</span></span>
</li>
<li  style="font-weight:bold;color:#333;" >
        <label class="field-title" style="font-weight:bold;color:#333;"><?php echo Yii::t('translation', 'buysell_table_option_tnet'); ?> </label><span style="padding-left:13px;">USD $<span  id="buynettotalspan">0</span></span>
</li>

					</ol><!-- end of form elements -->
      				</fieldset>
      				<div class="submit-holder" style="padding:20px">
      					
      				<small>	
						<span onclick="$('#BuyBtcForm_amount_btc').val(parseFloat(eval($(this).text()/parseFloat($('#usd_2_btc').text()).toFixed(2)/1.06)).toFixed(2));$('#BuyBtcForm_amount_btc').trigger('change');calculate_buy_total();" style="cursor:pointer; font-weight: bold; color: #428bca;" class="genbalance_3" id="buybalance"><?php print $avail_balance_usd;?></span><span id="fiattype"> USD</span> <?php echo Yii::t('translation', 'buysell_table_option_disp'); ?>&nbsp;&nbsp;&nbsp;
      				</small><br>
      				<?php
                                echo TbHtml::submitButton(Yii::t ( 'translation', 'buysell_table_2_button' ),
                                        array(
                                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                'size' => TbHtml::BUTTON_SIZE_LARGE,
						'onClick' => "$('#BuyBtcForm_type_trans').val('BUY');"
                                        )
                                );
				?>	
      				</div>
<div style="display:none;"></div>






                  </div><!-- end panel-list -->
                </div><!--/end cell-->
                
                <!-- start cell -->
                <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading" style="text-transform: uppercase;font-size:x-large;text-align:center;color: #666;"> <b><?php echo Yii::t('translation', 'buysell_table_3_title'); ?></b></div>



<div style="display:none;"></div>      				<fieldset>
      					<ol>
					 <div class="row">
       		                         <div>
	
                                        <center>
                                                <div class="col-sm-8" style="float: left">

						 <?php
                                                        $this->widget ( 'common.widgets.currencyinput.CurrencyInput', array (
                                                                        'form' => $form,
                                                                        'model' => $buyform,
                                                                        'currency' => 'USD',
                                                     /*                   'supported_currencies' => array (
                                                                                        'USD',
                                                                                        'MXN'
                                                                        ),
						    */
                                                                        'attribute' => 'amount_fiat',
                                                                        'htmlOptions' => array (
                                                                                        'class' => 'form-control',
                                                                                        'placeholder' => '0.00',
                                                                                        'type' => 'number',
											'min' => '20',
											'max' => '10000'
                                                                        )
                                                        ) );
                                                ?>
						</div>

					</center>	
						</div>
						</div>
						<small style="color: #428bca;"><?php echo Yii::t('translation', 'Orden minima'); ?>&nbsp;0.025 (BTC)</small>
<li class="even">
        <label class="field-title"><?php echo Yii::t('translation', 'Precio Unitario x BTC:'); ?> </label><span style="font-weight:bold;padding-left:13px;">USD $<span style=""  id="sell_usd_2_btc"></span>&nbsp;<a href="#" onClick="update_rate();"><i class="glyphicon glyphicon-refresh">&nbsp;</i></a></span>
</li>
			
<li class="even">
        <label class="field-title"><?php echo Yii::t('translation', 'Sub Total:'); ?> </label><span style="padding-left:13px;" >$<span id="sellsubtotalspan">0</span></span>
</li>
<li>
        <label class="field-title">3%<?php echo Yii::t('translation', 'Comisi&oacute;n de MercadoBTX:'); ?> </label><span style="padding-left:13px;">$<span  id="sellmercadofeespan">0</span></span>
</li>
<li class="even">
        <label class="field-title">3% <?php echo Yii::t('translation', 'Comisi&oacute;n de Banco '); ?> </label><span style="padding-left:13px;">$<span  id="sellbankfeespan">0</span></span>
</li>
<li  style="font-weight:bold;color:#333;" >
        <label class="field-title" style="font-weight:bold;color:#333;"><?php echo Yii::t('translation', 'buysell_table_option_tnet'); ?> </label><span style="padding-left:13px;">USD $<span  id="sellnettotalspan">0</span></span>
</li>

					</ol><!-- end of form elements -->
 


      	   </fieldset>
      				<div class="submit-holder" style="padding:20px">
      				
      				<small>
					<span onclick="$('#BuyBtcForm_amount_fiat').val($(this).text());$('#BuyBtcForm_amount_fiat').trigger('change');calculate_buy_total();" style="cursor:pointer; font-weight: bold; color: #428bca;" class="genbalance_3" id="buybalance"><?php print $avail_balance_btc;?></span><span id="fiattype"> BTC</span> <?php echo Yii::t('translation', 'buysell_table_option_disp'); ?>&nbsp;&nbsp;&nbsp;
					</small><br>
      				

				<?php
                                echo TbHtml::submitButton(Yii::t ( 'translation', 'buysell_table_3_button' ),
                                        array(
                                                'color' => TbHtml::BUTTON_COLOR_SUCCESS,
                                                'size' => TbHtml::BUTTON_SIZE_LARGE,
                                                'onClick' => "$('#BuyBtcForm_type_trans').val('SELL');"
                                        )
                                );
                                ?>
			</div>
				
<div style="display:none;">



                  </div><!--/end panel-list-->
                </div><!--/end cell-->

              </div><!--/end row-->
                 
</div>
</div>

<?php $this->endWidget(); ?>
<script>
function update_rate() {
        var jqxhr = $.ajax({
                url: "/api/exchangerates",
                dataType: 'json'
        }).done(function(data) {
		//alert (data['btc_to_usd']);
		$('#usd_2_btc').html(parseFloat(data['btc_to_usd']).toFixed(2));
		$('#sell_usd_2_btc').html(parseFloat(data['btc_to_usd']).toFixed(2));
		calculate_buy_total();

//                $('div.btc_to_mxn').html(parseFloat(data['btc_to_mxn']).toFixed(2));
                //$('div.btc_to_mxn').html(parseFloat(data['btc_to_usd']).toFixed(2));
//                $('div.btc_2_mxn').append("  <b>MNX = 1 BTC</b>");
        }).fail(function() {
                console.log("update_exchange_rates returned an error");
        }).always(function() {
                setTimeout(function() {update_rate(); }, 120000); // keep calling it every 10 seconds
        });

}
function calculate_buy_total() {
	var buysubtotal=eval($('#usd_2_btc').html()*$('#BuyBtcForm_amount_btc').val());
	var buymercadofee=eval(buysubtotal*0.03);
	var buybankfee=eval(buysubtotal*0.03);
	var buynettotal=eval(buysubtotal+buymercadofee+buybankfee);
//	var buynettotal=eval(buysubtotal/1.06);
	$('#buysubtotalspan').html(commaSeparateNumber(parseFloat(buysubtotal).toFixed(2))).trigger('change');
	$('#buymercadofeespan').html(commaSeparateNumber(parseFloat(buymercadofee).toFixed(2))).trigger('change');
	$('#buybankfeespan').html(commaSeparateNumber(parseFloat(buybankfee).toFixed(2))).trigger('change');
	$('#buynettotalspan').html(commaSeparateNumber(parseFloat(buynettotal).toFixed(2))).trigger('change');
	//Change fields for Sell
	var sellsubtotal=eval($('#sell_usd_2_btc').html()*$('#BuyBtcForm_amount_fiat').val());
	var sellmercadofee=eval(sellsubtotal*0.03);
	var sellbankfee=eval(sellsubtotal*0.03);
	var sellnettotal=eval(sellsubtotal-sellmercadofee-sellbankfee);
//	var buynettotal=eval(buysubtotal/1.06);
	$('#sellsubtotalspan').html(commaSeparateNumber(parseFloat(sellsubtotal).toFixed(2))).trigger('change');
	$('#sellmercadofeespan').html(commaSeparateNumber(parseFloat(sellmercadofee).toFixed(2))).trigger('change');
	$('#sellbankfeespan').html(commaSeparateNumber(parseFloat(sellbankfee).toFixed(2))).trigger('change');
	$('#sellnettotalspan').html(commaSeparateNumber(parseFloat(sellnettotal).toFixed(2))).trigger('change');




}
$(document).ready(function() {

        // setup handler that will update prices ever 2 seconds
	update_rate();
});


$("#BuyBtcForm_amount_btc").bind("change paste keyup", function() {
	calculate_buy_total();
});
$("#BuyBtcForm_amount_fiat").bind("change paste keyup", function() {
	calculate_buy_total();
});

function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}
</script>

