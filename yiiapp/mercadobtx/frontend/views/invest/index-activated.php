<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
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
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'Invierte tus Bitcoins'); ?></h4>

<div class="page page-dashboard" style="float:left;">
<div class="row">
	<div class="col-md-8">
		<div class="widget-header clearfix" >
	        </div>
		<div id="container" style="min-width: 550px; height: 400px; "></div>
		<div class="bg-color dark-grey rounded-top" style="padding-top:70px;">
		<script>
        $('#container').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Grafica de Rendimiento de Inversion'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Agosto'
                ],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Porcentaje %'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Bitcoin',
                data: [3, 4, 3, 5, 4, 10, 12]
            }, {
                name: 'Efectivo',
                data: [1, 3, 4, 3, 3, 5, 4]
            }]
        });
    

					</script>
	</div>
</div>
				<div class="col-md-4">
					<div class="widget widget-summary">
						<div class="widget-header clearfix">
						</div>
						<div class="tasks-header bg-color dark-blue rounded-top">
							<div class="box-padding narrow-horizontal clearfix" style="float:left;text-align:center;">
								<h4 class="light no-margin pull-left" style="padding:0px;">Total de Inversion</h4>
<!--								<span class="label label-inverse pull-right" style="height: 100px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; text-align: center; text-transform: uppercase; background: #2d8aeb; color: #ffffff; margin-bottom: 5px;background: #05a705; display: block; font-size: 30px; font-weight: bold; padding-top: 25px; margin-bottom: 15px;">25</span>-->
							</div>
						</div>
						<div class="bg-color dark-blue columns clearfix" style="border-radius: 10px 10px 0 0; background: #43484d; color: #fff;  text-align:center; width:260px;float:left;">
							<div style="width:125px;float:left;">
								<h1 class="normal inline"  style="color:#fff;font-weight: 400;line-height: 1.1; font-family: 'Roboto', Helvetica, sans-serif;-webkit-margin-before: 0.83em; -webkit-margin-after: 0.83em;  margin: 34px 0 0 0;">56%</h1>
								<i class="glyphicon glyphicon-chevron-up" style="color:#2ABF9E; font-size:24px;"></i>
								<span>Bitcoin</span>
							</div>
							<div style="text-align:center; width:125px;float:left;">
								<h1 class="normal inline" style="color:#fff;font-weight: 400;line-height: 1.1; font-family: 'Roboto', Helvetica, sans-serif;-webkit-margin-before: 0.83em; -webkit-margin-after: 0.83em;  margin: 34px 0 0 0;">19%</h1>
								<i class="glyphicon glyphicon-chevron-down" style="color:#F63B38; font-size:24px;"></i>
								<span> Efectivo $</span>
							</div>
						</div>
						<div class="bg-color turqoise" style="">
							<div class="box-padding aligncenter" style="float:left;width:260px;heigth:300px;border-radius:0 0 10px 10px;text-align: center;padding:30px;background: #2abf9e">
								<h5 class="no-margin normal"  style="font-size: 12.5px;color:#FFF;">Balance en Portafolio </h5>
								<h1 class="no-margin normal" style="font-size: 28.5px;color:#FFF;font-weight: 400;">4.865 BTC</h1>
								<p class="light"  style="font-size: 12.5px;color:#FFF;">56 Dias Invertidos <i class="icon-right-open"></i></p>
							</div>
						</div>
				    </div>
						</div>
					</div>
				</div>
<!--  --!>

<button class="btn btn-primary" id="yw1" type="button" onclick="$('#withdraw_modal').modal('show');" name="yt0"><i class="icon-ok"></i>Agregar Inversi&oacute;n </button>
<br>
<br>

                <!-- Table -->
                <table class="table">
                        <thead>
                                <tr>
                                        <th>Transacción</th>
                                        <th>Fecha</th>
                                        <th>Estatus</th>
                                        <th>Cantidad</th>
                                        <th>Acci&acute;n</th>
                                </tr>
                        </thead>
                        <tbody>
                                                        <tr>
                                        <td>You received bitcoin from an external account</td>
                                        <td>2014-03-10T04:03:28Z</td>
                                                                                <td><span class="label label-info">Invertiendo...</span></td>
                                                                                <td style="color: #4EB17B; font-weight: bold;">0.00000000 BTC</td>
                                                                                <td style=""><a href="#">Cancel</a></td>
                                </tr>
                                                        <tr>
                                        <td>You received bitcoin from an external account</td>
                                        <td>2014-03-10T04:03:05Z</td>
                                                                                <td><span class="label label-info">Invertiendo...</span></td>
                                                                                <td style="">0.00467700 BTC</td>
                                                                                <td style=""><a href="#">Cancel</a></td>
                                </tr>
                        </tbody>
                </table>
        </div>
<!--  --!>
		</div>
</div>
<div id="withdraw_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_text'); ?></h4>
      </div>
      <div class="modal-body " style="padding:20px">
	 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" style=" text-align: right; "><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_option_1'); ?></label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
	<div class="controls">
        <p class="help-block" style="text-align:left"><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_option_1_sub'); ?></p>
      </div>
      </div>
	

	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" ><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_option_2'); ?></label>
    <div class="col-sm-5">  
        <span style="margin-right: -41px; z-index: 10; position: absolute; top: 12px; left: 22px; background: #A7ACBB; border: 0; font-size: 10px; color: #fff; font-weight: 500; border-radius: 2px !important; padding: 2px 8px;">BTC</span>
      <input type="number" class="form-control" id="dollaramount" style="font-size: 18px; text-align:center;" placeholder="0.00">
    </div>	
    <div class="col-sm-5">
        <span style="margin-right: -41px; z-index: 10; position: absolute; top: 12px; left: 22px; background: #A7ACBB; border: 0; font-size: 10px; color: #fff; font-weight: 500; border-radius: 2px !important; padding: 2px 8px;">MNX</span>
      <input type="number" class="form-control" style="font-size: 18px; text-align:center;" id="dollaramount" placeholder="0.00">
    </div>	
      <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" style=" text-align: right; "><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_option_3'); ?></label>
    <div class="col-sm-10" style="padding-top: 10px; text-align: left;">
	<textarea  cols="69" id="transaction_notes" name="transaction[notes]" rows="4"></textarea>
    </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_button_1'); ?></button>
        <button type="button" class="btn btn-primary"><?php echo Yii::t('translation', 'withdrawal_bitcoin_window_button_2'); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
</script>
