<?php
/**
 * @var UserController $this
 * @var CActiveDataProvider $dataProvider
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
.button a:hover, .button a:focus {
color: #FFF;
text-decoration: none;
}
.button a:active, .button a:hover {
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
-webkit-box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0 rgba(255, 255, 255, 0.05);
-moz-box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0 rgba(255, 255, 255, 0.05);
box-shadow: 0 0 0 rgba(255, 255, 255, 0), inset 0 1px 0 rgba(255, 255, 255, 0.05);
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
	
<body>

		<div class="body">
		<div role="main" class="main" style="border-top: 5px solid #384045;">

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
				<div class="container" style="padding-top:40px">
					<!-- LEFT MENU -->
						<div class="col-md-9" style="margin:0px;">

							<h4 class="" style="text-transform:uppercase;font-size: 1.8em;">Balance de Mi Cuenta</h4>
							<p>Saldo actual que se encuentra en tu cuenta MercadoBTX.</p>

							<div class="highlight "><pre>
								<ul class="balance_currency_list">
									<li style="line-height: 0px;list-style: none;"><span style="font-weight: 700; font-size: 2em;color:#666;">BTC Balance:</span><span  style="color: #8EC919; font-weight: 700; font-size: 2em; " >0.00000000 BTC</span></li>
									<li style="line-height: 0px; list-style: none;"><span style="font-weight: 700; font-size: 2em;color:#666;">USD Balance:</span><span  style="color: #8EC919; font-weight: 700; font-size: 2em; " >0.00000000 BTC</span></li>
									<li style="line-height: 0px; list-style: none;"><span style="font-weight: 700; font-size: 2em;color:#666;">MNX PESOS Balance:</span><span  style="color: #8EC919; font-weight: 700; font-size: 2em; " >0.00000000 BTC</span></li>
									<li style="line-height: 0px; list-style: none;"><a href="/users/deposit.php" class="button" style="font-size: 1em; color: #FFF; text-decoration: none;font-weight: 600; text-transform: uppercase;"><span class="deposit"></span>Depositar</a>&nbsp;&nbsp;&nbsp;<a href="/users/send.php" class="button" style="font-size: 1em; color: #FFF; text-decoration: none;font-weight: 600; text-transform: uppercase;"><span class="withdrawal"></span>Enviar</a></li>
								</ul>
							</pre>
							</div>
							<div class="panel panel-default">
							  <!-- Default panel contents -->
							    <div class="panel-heading">Ultimas Transacciones</div>

							      <!-- Table -->
								<table class="table">
								  <thead>
								    <tr>
								      <th>Transacci&oacute;n</th>
								      <th>Fecha</th>
								      <th>Estatus</th>
								      <th>Cantidad</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>Recibiste bitcoin de MercadoBTX </td>
								      <td>Enero 24,2014</td>
								      <td><span class="label label-success">Recibiste</span></td>
								      <td style="color: #4EB17B; font-weight: bold;">+3.2</td>
								    </tr>
								    <tr>
								      <td>Enviaste bitcoin a M&eacute;xico </td>
								      <td>Enero 2,2014</td>
								      <td><span class="label label-danger">Enviaste</span></td>
								      <td style="color: #d9534f; font-weight: bold;">-0.2</td>
								    </tr>
  <tr>
								      <td>Recibiste bitcoin de MercadoBTX </td>
								      <td>Enero 24,2014</td>
								      <td><span class="label label-success">Recibiste</span></td>
								      <td style="color: #4EB17B; font-weight: bold;">+3.2</td>
								    </tr>
  <tr>
								      <td>Compraste bitcoin en MercadoBTX </td>
								      <td>Enero 24,2014</td>
								      <td><span class="label label-info">Compraste</span></td>
								      <td style="color: #4EB17B; font-weight: bold;">+5.2</td>
								    </tr>

								   </tbody>
								</table>
														</div>
						</div> <!--End body -->
					</div>


				</div>

			</div>

				</div>
			</div>
		</div>


