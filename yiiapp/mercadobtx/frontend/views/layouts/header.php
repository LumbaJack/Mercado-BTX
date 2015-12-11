<script type="text/javascript">
jQuery(document).ready(function() {
<?php
	function _flash_class($level) {
		switch($level) {
			case 'success':
				return 'success';
			case 'warn':
					return 'warning';
			case 'error':
				return 'error';
			default:
				return 'info';
		}
		return 'info';
	}
	foreach(Yii::app()->user->getFlashes() as $key => $message):
?>
	    	jQuery.pnotify({
	    		text: "<?php echo $message; ?>",
	    		icon: false,
	    		styling: 'bootstrap3',
	    		type: "<?php echo _flash_class($key); ?>"

	    	});


		
<?php endforeach; ?>

});
</script>

<header>
	<div class="container">
		<h1 class="logo">
			<a href="<?php echo Yii::app()->baseUrl . '/' ?>">
				<img alt="MeradoBTX" src="<?php echo Yii::app()->baseUrl . '/images' ?>/logo.png">
						</a>
					</h1>
					
					<nav>
						<ul class="nav nav-pills nav-top">
	
							<?php if (Yii::app()->user->isGuest): ?>
								<li>
									
									<a href="<?php echo Yii::app()->baseUrl . '/'.  Yii::t('urls','registro'); ?>"><i class="glyphicon glyphicon-user"></i><?php echo Yii::t('translation', 'registrate'); ?></a>
								</li>
								<li>
									<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','ingresar'); ?>"><i class="glyphicon glyphicon-log-in"></i><?php echo Yii::t('translation', 'ingresa'); ?></a>
								</li>
							<?php else:?>
								<li>
									<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','cerrar_sesion'); ?>"><i class="glyphicon glyphicon-log-out"></i><?php echo Yii::t('translation', 'terminar_sesion'); ?></a>
								</li>
							<?php endif ?>
								<li >
									<a  href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','preguntas_frecuentes'); ?>"> <i class="glyphicon glyphicon-question-sign"></i><?php echo Yii::t('translation', 'preguntas_frecuentes'); ?></a>
								</li>
								<li class="phone">
									<span><i class="glyphicon glyphicon-earphone"></i><?php echo Yii::t('translation', 'header_phone'); ?></span>
								</li>

				                            <li style="width:250px;"><span><i class="glyphicon glyphicon-usd"></i><?php echo Yii::t('translation', '<div class="btc_to_mxn" style="margin-left:12px; margin-top:-15px;">MNX = <b>1 BTC</b></div> '); ?></span>
				                            </li>
							    			<li>
					
				
								</li>
							</ul>
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="icon icon-bars"></i>
					</button>
				</div>
				
				<?php 
				$mainmenu = '';
				if ( isset($this->mainmenu) ) {
					$mainmenu = $this->mainmenu;
				}
				
				
				function _isThisMainPage($mainmenu, $pagename) {
					if ( $mainmenu == $pagename  ) {
						return true;
					}
					return false;
				}
				?>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
						  <div class="social-icons">
                                                        <ul class="social-icons">
                                                        		<style>
                                                        		
                                                        		</style>
                                                                <li ><a href="?_lang=en_us" title="English"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/us.png"></a></li>
                                                                <li ><a href="?_lang=es_mx" title="Espa&ntilde;ol"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/mx.png"></a></li>
                                                                <li ><a href="?_lang=pt_br" title="Portuguese"><img src="<?php echo Yii::app()->baseUrl . '/images' ?>/br.png"></a></li>
                                                        </ul>
                                                </div>

						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
								<li class="dropdown <?php echo $mainmenu ? '' : 'active'; ?>">
									<a class="dropdown-toggle" href="/">
										<?php echo Yii::t('translation', 'inicio'); ?>
							<i class="icon icon-angle-down"></i>
						</a>
					</li>

					<li class="dropdown <?php echo _isThisMainPage($mainmenu, 'whatisbitcoin') ? 'active' : '' ?> ">
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','masInformacion'); ?>">
						<?php echo Yii::t('translation', 'header_what_is'); ?>
						<i class="icon icon-angle-down"></i>
						</a>
					</li>
	
					<li class="dropdown <?php echo _isThisMainPage($mainmenu, 'buysell') ? 'active' : '' ?> mega-menu-item mega-menu-fullwidth">

						<?php if (Yii::app()->user->isGuest): ?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','compra_venta_bitcoins'); ?>">
                                                        <?php echo Yii::t('translation', 'comprar_vender'); ?>
                                                        <i class="icon icon-angle-down"></i>
                                                </a>
						 <?php else:?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','buysell'); ?>">
							<?php echo Yii::t('translation', 'comprar_vender'); ?>
							<i class="icon icon-angle-down"></i>
						</a>
						<?php endif ?>
				
					</li>
					<li class="dropdown <?php echo _isThisMainPage($mainmenu, 'invest') ? 'active' : '' ?> mega-menu-item mega-menu-fullwidth">

						<?php if (Yii::app()->user->isGuest): ?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','invertir_bitcoins'); ?>">
                                                        <?php echo Yii::t('translation', 'invertir_bitcoins'); ?>
                                                        <i class="icon icon-angle-down"></i>
                                                </a>
						 <?php else:?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','invest'); ?>">
							<?php echo Yii::t('translation', 'invertir_bitcoins'); ?>
							<i class="icon icon-angle-down"></i>
						</a>
						<?php endif ?>
				
					</li>

					<li class="dropdown <?php echo _isThisMainPage($mainmenu, 'sendreceive') ? 'active' : '' ?> ">
						<?php if (Yii::app()->user->isGuest): ?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','enviar_recibir_bitcoins'); ?>"> <?php echo Yii::t('translation', 'enviar_solicitar'); ?> <i class="icon icon-angle-down"></i>
						</a>
						<?php else:?>
						<a class="dropdown-toggle" href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','withdraw'); ?>">
                                                        <?php echo Yii::t('translation', 'enviar_solicitar'); ?>
                                                        <i class="icon icon-angle-down"></i>
                                                </a>
						<?php endif ?>
						
					</li>
								
					<li class="dropdown <?php echo _isThisMainPage($mainmenu, 'contact') ? 'active' : '' ?> ">
						<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','contactanos'); ?>">
						<?php echo Yii::t('translation', 'header_contactanos'); ?></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48281557-1', 'mercadobtx.com');
  ga('send', 'pageview');

</script>
</header>
