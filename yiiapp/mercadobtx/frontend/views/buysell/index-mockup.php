<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
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
?>
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'buysell_user_title'); ?></h4>

<div class="page page-dashboard" style="float:left;">

              <div class="panel panel-default panel-charts">
                <div class="panel-heading"> 
                  <span class="glyphicon glyphicon-market-charts"></span><?php echo Yii::t('translation', 'buysell_table_1_title'); ?><span style="float:right; font-size:12px;"><strong><?php echo Yii::t('translation', 'buysell_graph_1_corner'); ?></strong>&nbsp;[<a href='javascript:$("#depthchart").hide();$("#tradechart").show();void(0);'><?php echo Yii::t('translation', 'buysell_graph_1_corner_1'); ?></a>]&nbsp;&nbsp;[<a href='javascript:$("#depthchart").show();$("#tradechart").hide();void(0);'><?php echo Yii::t('translation', 'buysell_graph_1_corner_2'); ?></a>]</span>
                </div>
                <div class="panel-body">


			<div id="container" style="height:450px; width:767px "></div>
<script>
var data = [[1365867000000,3905.1,3943.7,3903.6,3903.9],[1365868800000,3903.8,3940.0,3804.0,3804.0],[1365870600000,3879.8,3879.8,3806.0,3860.0],[1365872400000,3920.0,3920.0,3859.0,3870.0],[1365874200000,3900.0,3900.0,3615.8,3852.0],[1365876000000,3702.1,3702.1,3502.0,3554.9],[1365906600000,3411.19,3472.54,3324.8,3400.0],[1365908400000,3460.0,3462.9,3400.0,3462.9],[1365910200000,3472.54,3498.58,3401.0,3498.0],[1365912000000,3420.0,3469.9,3400.0,3429.9],[1365913800000,3455.0,3467.0,3402.0,3466.0]];
    $('#container').highcharts('StockChart', {


        rangeSelector : {
            selected : 1
        },

        title : {
            text : "<?php echo Yii::t('translation', 'buysell_table_1_sub_title'); ?>"
        },
	credits: {
	      enabled: false
	},
        series : [{
            type : 'candlestick',
            name : 'Prcio BTC',
            data : data,
            dataGrouping : {
                enabled: false
            }
        }]
});
</script>

                </div>
              </div><!--/panel charts-->
              
              


                <!-- row start -->
                <div class="row small-market-list">
                  <!-- start cell -->
                  <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span><b> <?php echo Yii::t('translation', 'buysell_table_2_title'); ?></b></div>




<form action="/buysell/buy" class="middle-forms" name="tradebuy" id="TradeBuyViewForm" onsubmit="event.returnValue = false; return false;" method="post" accept-charset="utf-8"><div style="display:none;"></div>      				<fieldset>
      					<ol>

<li><div class="input text"><label for="TradeBuyAmount" class="field-title"><?php echo Yii::t('translation', 'buysell_table_2_option_1'); ?></label><input name="data[TradeBuy][amount]" value="0.00000000" class="txtbox-short form-control" style="width:265px" type="text" id="TradeBuyAmount"></div>&nbsp;<small style="color: #428bca;"><?php echo Yii::t('translation', 'buysell_table_2_option_1_sub'); ?></small><span class="clearFix">&nbsp;</span></li><li class="even"><div class="input text"><label for="TradeBuyPrice" class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_btcprc'); ?></label><input name="data[TradeBuy][price]" value="0" class="txtbox-short form-control" style="width:265px" type="text" id="TradeBuyPrice"></div>&nbsp;&nbsp;<b><small>(BTC)</small></b><span class="clearFix">&nbsp;</span></li><li><label class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_total'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="buytotalspan">0</span></li><li class="even"><label class="field-title">0.25% <?php echo Yii::t('translation', 'buysell_table_option_comision'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="buyfeespan">0</span></li><li><label class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_tnet'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="buynettotalspan">0</span></li>      					</ol><!-- end of form elements -->
      				</fieldset>
      				<div class="submit-holder" style="padding:20px">
      					
      				<small>	
						<span onclick="$('#TradeBuyAmount').val(($(this).text()/$('#TradeBuyPrice').val()/1.0020));$('#TradeBuyAmount').trigger('change');" style="cursor:pointer; font-weight: bold; color: #428bca;" class="genbalance_3">0.00000000</span> MXN <?php echo Yii::t('translation', 'buysell_table_option_disp'); ?>&nbsp;&nbsp;&nbsp;
      				</small>
      				
      				<a href="javascript:void(0);" class="btn btn-default btn-success" id="tradebuysubmit53003d294cb2f"><span><?php echo Yii::t('translation', 'buysell_table_2_button'); ?></span></a></div>
<div style="display:none;"></div></form>






                  </div><!-- end panel-list -->
                </div><!--/end cell-->
                
                <!-- start cell -->
                <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span> <b><?php echo Yii::t('translation', 'buysell_table_3_title'); ?></b></div>



<form action="/markets/view/146" class="middle-forms" name="tradesell" id="TradeSellViewForm" method="post" accept-charset="utf-8"><div style="display:none;"></div>      				<fieldset>
      					<ol>

<li><div class="input text"><label for="TradeSellAmount" class="field-title"><?php echo Yii::t('translation', 'buysell_table_3_option_1'); ?></label><input name="data[TradeSell][amount]" value="0.00000000" class="txtbox-short form-control" style="width:265px;" type="text" id="TradeSellAmount"></div>&nbsp;<small style="color: #428bca;"><?php echo Yii::t('translation', 'buysell_table_3_option_1_sub'); ?>&nbsp;.1000</small><span class="clearFix">&nbsp;</span></li><li class="even"><div class="input text"><label for="TradeSellPrice" class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_btcprc'); ?></label><input name="data[TradeSell][price]" value="0" class="txtbox-short form-control" style="width:265px;" type="text" id="TradeSellPrice"></div>&nbsp;&nbsp;<b><small>(BTC)</small></b><span class="clearFix">&nbsp;</span></li><li><label class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_total'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="selltotalspan">1.81177031</span></li><li class="even"><label class="field-title">0.35% <?php echo Yii::t('translation', 'buysell_table_option_comision'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="sellfeespan">0.00543531</span></li><li><label class="field-title"><?php echo Yii::t('translation', 'buysell_table_option_tnet'); ?> <small>(BTC)</small></label><span style="padding-left:13px;" id="sellnettotalspan">1.80633500</span></li>      					</ol><!-- end of form elements -->
      				</fieldset>
      				<div class="submit-holder" style="padding:20px">
      				
      				<small>
      					<span onclick="$('#TradeSellAmount').val($(this).text());$('#TradeSellAmount').trigger('change');" style="cursor:pointer; font-weight: bold; color: #428bca;" class="genbalance_105">150.91783418 BTC</span>  <?php echo Yii::t('translation', 'buysell_table_option_disp'); ?>&nbsp;&nbsp;&nbsp;
					</small>
      				
      				<a href="javascript:void(0);" class="btn btn-default btn-success" id="tradesellsubmit53003d294cb2f"><span><?php echo Yii::t('translation', 'buysell_table_3_button'); ?></span></a></div>
<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="630d1745f8cb638fba531089b6c53edb73ff3b65%3A" id="TokenFields1605384377"><input type="hidden" name="data[_Token][unlocked]" value="" id="TokenUnlocked2001330686"></div></form>



                  </div><!--/end panel-list-->
                </div><!--/end cell-->

              </div><!--/end row-->





              <div class="panel panel-default panel-trade-list">

                <div class="panel-heading"> 
                  <span class="glyphicon glyphicon-account-balances"></span> <?php echo Yii::t('translation', 'buysell_table_4_title'); ?>
                </div>

                  <div class="tablewrap" id="market-wrap">


<div id="userorderslist_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_scroll"><div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><div class="dataTables_scrollHeadInner" style="width: 749px; padding-right: 0px;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" style="margin-left: 0px; width: 749px;"><thead>
		<tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 105px;"><?php echo Yii::t('translation', 'buysell_table_4_column_1'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 70px;"><?php echo Yii::t('translation', 'buysell_table_option_prc'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 31px;"><?php echo Yii::t('translation', 'buysell_table_4_column_3'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 111px;"><?php echo Yii::t('translation', 'buysell_table_4_column_4'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 111px;"><?php echo Yii::t('translation', 'buysell_table_option_cant'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 70px;"><?php echo Yii::t('translation', 'buysell_table_4_column_6'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 40px;"><?php echo Yii::t('translation', 'buysell_table_4_column_7'); ?></th></tr>
	</thead></table></div></div><div class="dataTables_scrollBody" style="overflow: auto; height: 159px; width: 100%;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" id="userorderslist" style="margin-left: 0px; width: 100%;"><thead>
		<tr role="row" style="height: 0px;"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 105px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 70px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 31px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 111px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 111px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 70px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 40px;"></th></tr>
	</thead>
	
	

<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class="">2014-02-14 19:22:53</td><td class="">0.00000009</td><td class="">Buy</td><td class="">248945301.17542693</td><td class="">143267919.73262832</td><td class="">12.89411278</td><td class=""><a href="javascript:cancelorder(43324726);"><?php echo Yii::t('translation', 'buysell_table_4_button'); ?></a></td></tr></tbody></table></div></div></div>

                </div>
              </div><!--/panel charts-->







                <!-- row start -->
                <div class="row small-market-list">
                  <!-- start cell -->
                  <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span> <?php echo Yii::t('translation', 'buysell_table_5_title'); ?><small> </small></div>

<div id="sellorderlist_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_scroll"><div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><div class="dataTables_scrollHeadInner" style="width: 354px; padding-right: 15px;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" style="margin-left: 0px; width: 354px;"><thead>
		<tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 72px;"><?php echo Yii::t('translation', 'buysell_table_option_prc'); ?>&nbsp;<small>(BTC)</small></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 117px;"><?php echo Yii::t('translation', 'buysell_table_option_cant'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px;"><?php echo Yii::t('translation', 'buysell_table_option_total'); ?>&nbsp;<ssmall>(BTC)</ssmall></th></tr>
	</thead></table></div></div><div class="dataTables_scrollBody" style="overflow: auto; height: 300px; width: 100%;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" id="sellorderlist" style="margin-left: 0px; width: 100%;"><thead>
		<tr role="row" style="height: 0px;"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 72px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 117px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th></tr>
	</thead>
	
	

<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class="">0.00000010</td><td class="">422310575.54944860</td><td class="">42.23105755</td></tr><tr class="even"><td class="">0.00000011</td><td class="">287347500.00589293</td><td class="">31.60822500</td></tr><tr class="odd"><td class="">0.00000012</td><td class="">145823325.72210840</td><td class="">17.49879909</td></tr><tr class="even"><td class="">0.00000013</td><td class="">150874466.54126656</td><td class="">19.61368065</td></tr></tbody></table></div></div></div>

                  </div><!-- end panel-list -->
                </div><!--/end cell-->
                
                <!-- start cell -->
                <div class="col-xs-6">
                    <div class="panel panel-default panel-market-list-small">
                      <div class="panel-heading"> <span class="glyphicon glyphicon-open-orders"></span> <?php echo Yii::t('translation', 'buysell_table_6_title'); ?><small> </small></div>

<div id="buyorderlist_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_scroll"><div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><div class="dataTables_scrollHeadInner" style="width: 369px; padding-right: 0px;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" style="margin-left: 0px; width: 369px;"><thead>
		<tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px;"><?php echo Yii::t('translation', 'buysell_table_option_prc'); ?>&nbsp;<small>(BTC)</small></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 123px;"><?php echo Yii::t('translation', 'buysell_table_option_cant'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px;"><?php echo Yii::t('translation', 'buysell_table_option_total'); ?>&nbsp;<small>(BTC)</small></th></tr>
	</thead></table></div></div><div class="dataTables_scrollBody" style="overflow: auto; height: 261px; width: 100%;"><table cellpadding="0" cellspacing="0" border="0" class="table table2 table-striped dataTable" id="buyorderlist" style="margin-left: 0px; width: 100%;"><thead>
		<tr role="row" style="height: 0px;"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 123px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 81px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"></th></tr>
	</thead>
	
	

<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class="">0.00000009</td><td class="">404260647.87302166</td><td class="">36.38345831</td></tr><tr class="even"><td class="">0.00000008</td><td class="">445148138.27380073</td><td class="">35.61185106</td></tr><tr class="odd"><td class="">0.00000007</td><td class="">330934131.86226390</td><td class="">23.16538923</td></tr><tr class="even"><td class="">0.00000006</td><td class="">342921690.80221660</td><td class="">20.57530145</td></tr><tr class="odd"><td class="">0.00000005</td><td class="">166778543.94162473</td><td class="">8.33892720</td></tr></tbody></table></div></div></div>

                  </div><!--/end panel-list-->
                </div><!--/end cell-->

              </div><!--/end row-->

                  
              <div class="panel panel-default panel-trade-list">

                <div class="panel-heading"> 
                  <span class="glyphicon glyphicon-account-balances"></span> <?php echo Yii::t('translation', 'buysell_table_7_title'); ?> <small>(<?php echo Yii::t('translation', 'buysell_table_7_title_sub'); ?> 200)</small>
                </div>

                  <div class="tablewrap" id="market-wrap">

<div id="tradehistory_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_scroll"><div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;"><div class="dataTables_scrollHeadInner" style="width: 734px; padding-right: 15px;"><table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" style="margin-left: 0px; width: 734px;"><thead>
		<tr role="row"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 152px;"><?php echo Yii::t('translation', 'buysell_table_4_column_1'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 51px;"><?php echo Yii::t('translation', 'buysell_table_4_column_3'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 147px;"><?php echo Yii::t('translation', 'buysell_table_option_prc'); ?><small>(USD)</small></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 150px;"><?php echo Yii::t('translation', 'buysell_btc_name'); ?></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 94px;"><?php echo Yii::t('translation', 'buysell_table_option_total'); ?></th></tr>
	</thead></table></div></div><div class="dataTables_scrollBody" style="overflow: auto; height: 300px; width: 100%;"><table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="tradehistory" style="margin-left: 0px; width: 100%;"><thead>
		<tr role="row" style="height: 0px;"><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 152px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 51px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 147px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 150px;"></th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 94px;"></th></tr>
	</thead>
	
	

<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd"><td class="">2014-02-15 23:25:33</td><td class="">Sell</td><td class="">0.00000009</td><td class="">1775.00000000</td><td class="">0.00015975</td></tr><tr class="even"><td class="">2014-02-15 23:22:19</td><td class="">Sell</td><td class="">0.00000009</td><td class="">2183.24310000</td><td class="">0.00019649</td></tr><tr class="odd"><td class="">2014-02-15 23:10:32</td><td class="">Sell</td><td class="">0.00000009</td><td class="">115454.18162457</td><td class="">0.01039088</td></tr><tr class="even"><td class="">2014-02-15 23:06:11</td><td class="">Buy</td><td class="">0.00000010</td><td class="">1141.07117689</td><td class="">0.00011411</td></tr></tbody></table></div></div></div>
				</div>

              </div><!--/panel charts-->


      	





</div>


