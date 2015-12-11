<?php
/**
 * Main layout for frontend entry point.
 *
 * It's just raw HTML5Boilerplate, nothing else.
 *
 * @var FrontendController $this
 * @var string $content
 */
$this->setPageTitle ( Yii::t ( 'translation', 'MercadoBTX' ) );

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-FRAME-OPTIONS" content="DENY">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php include('header.php'); ?>
<div class="container">
		<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php if ( Yii::app()->user->data()->isActivated() ): ?>
		<div class="container" style="padding-top: 40px">
			<div class="row">
			<?php $this->renderPartial('application.views.layouts.leftmenu'); ?>
				<div class="container">
							<div class="row">
								<div class="col-md-9" style="margin: 0px;">
					
					<?php echo $content?>
								</div>
							</div>
				</div>
			</div>
		</div>

    <?php else: ?>
        <div class="col-md-6 col-md-offset-3" >&nbsp;</div>
        <div class="col-md-6 col-md-offset-3" style="min-height: 400px">
        <div class="alert alert-danger">
            <?php echo Yii::t('urls', 'Your account has not been activated, please click the link in your email to activate your account.'); ?>
            <p><a href="<?php echo Yii::t('urls', $this->createUrl('/signup/resend')); ?>"><?php echo Yii::t('translation', 'Resend code'); ?></a></p>
	</div>
	</div>
    <?php endif ?> 
<?php include('footer.php'); ?>


</body>
</html>
