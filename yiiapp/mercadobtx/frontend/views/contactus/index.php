<?php
/**
 * Landing page view file
 *
 * @var SignupController $this
 */
 $dynamic = false;
?>
    <div role="main" class="main">
<!--        <div id="content" class="content full">
	<?php echo Yii::t('translation', 'Hello'); ?> here

        </div> 
-->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo Yii::app()->baseUrl . '/'?>"><span id="containerId"><?php echo Yii::t('translation', 'inicio');?></span></a></li>
					<li class="active" id="titleId"><?php echo Yii::t('translation', 'contact_section');?></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="rowId">
				<?php echo Yii::t('translation', 'top_title');?>
			</div>
		</div>
	</div>
</section>

<?php if ( $dynamic ): ?>
<!-- Google Maps -->
<div id="googlemaps" class="google-map hidden-xs" ></div>
<?php else: ?>
<style>
div.google-map {
    background-image: url(/images/contactmap.png);
    background-repeat: no-repeat;
    background-position: -120px -300px;
}
</style>
<div id="googlemaps" class="google-map hidden-xs" ></div>
<?php endif  ?>
<div class="container">

	<div class="row">
		<div class="col-md-6">

			<div class="alert alert-success hidden" id="contactSuccess">
				<?php echo Yii::t('translation', 'message_sent');?>
			</div>

			<div class="alert alert-error hidden" id="contactError">
				<?php echo Yii::t('translation', 'message_failed');?>
			</div>

			<h2 class="short" id="short"><?php echo Yii::t('translation', 'middle_title');?></h2>
			<form action="" id="contactForm" type="post">
				<div class="row">
					<div class="form-group">
						<div class="col-md-6">
							<label id=label1"><?php echo Yii::t('translation', 'name_field');?></label>
							<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
						</div>
						<div class="col-md-6">
							<label id="label2"><?php echo Yii::t('translation', 'email_field');?></label>
							<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<label id="label3"><?php echo Yii::t('translation', 'tema_field');?></label>
							<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<label id="label4"><?php echo Yii::t('translation', 'message_field');?></label>
							<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" value="<?php echo Yii::t('translation', 'message_send_button');?>" class="btn btn-primary btn-lg" data-loading-text="Loading...">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">

			<h4 class="pull-top" id="colmd-6"><?php echo Yii::t('translation', 'right_small_title');?></h4>
			<p id="pull-top"><?php echo Yii::t('translation', 'contact_text');?></strong></p>

			<hr />

			<h4 id="officeText"><?php echo Yii::t('translation', 'office_title');?></h4>
			<ul class="list-unstyled">
				<li><i class="icon icon-map-marker"></i> <?php echo Yii::t('translation', 'address_contact');?></li>
				<li><i class="icon icon-phone"></i> <?php echo Yii::t('translation', 'main_phone');?></li>
				<li><i class="icon icon-envelope"></i> <?php echo Yii::t('translation', 'email_contact');?></strong> <a href="mailto:mail@example.com"><?php echo Yii::t('translation', 'support_email');?></a></li>
			</ul>

			<hr />

			<h4 id="supportHours"><?php echo Yii::t('translation', 'hours_of_operations_title');?></h4>
			<ul class="list-unstyled">
				<li id="icon-icon-time1"><i class="icon icon-time"></i> <?php echo Yii::t('translation', 'time_1');?></li>
				<li id="icon-icon-time2"><i class="icon icon-time"></i> <?php echo Yii::t('translation', 'time_2');?></li>
				<li id="icon-icon-time3"><i class="icon icon-time"></i> <?php echo Yii::t('translation', 'time_3');?></li>
			</ul>

		</div>

	</div>

</div>

</div>

<section class="call-to-action featured footer">
		<div class="container">
			<div class="row">
				<div class="center">
					<h3><?php echo Yii::t('translation', 'bottom_main_text');?> 
					<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','registro'); ?>" class="btn btn-lg btn-primary" data-appear-animation="bounceIn"><?php echo Yii::t('translation', 'bottom_main_button');?></a> <span class="" data-appear-animation="rotateInUpLeft" style="top: -22px;"></span></h3>
				</div>
			</div>
		</div>
	</section>


    </div>
   <!-- Libs -->
		"<?php echo Yii::app()->baseUrl . '/images' ?>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script>window.jQuery || document.write('<script src="vendor/jquery.js"><\/script>')</script>
                <script src="<?php echo Yii::app()->baseUrl . '/js' ?>/plugins.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jquery.easing.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jquery.appear.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jquery.cookie.js"></script>
                <!-- <script src="master/style-switcher/style.switcher.js"></script> Style Switcher -->
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/bootstrap.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/twitterjs/twitter.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/flexslider/jquery.flexslider.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jflickrfeed/jflickrfeed.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/magnific-popup/magnific-popup.js"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jquery.validate.js"></script>

                <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <script src="<?php echo Yii::app()->baseUrl . '/vendor' ?>/jquery.gmap.js"></script>

<script>

<?php if ( $dynamic ): ?>
/*
Map Settings

	Find the Latitude and Longitude of your address:
		- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
		- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

*/

// Map Markers
var mapMarkers = [
/*{
	address: "Houston, TX 77007",
	html: "<strong>Houston Office</strong><br>Houston, TX 77070<br><br><a href='#' onclick='mapCenterAt({latitude: 40.75198, longitude: -73.96978, zoom: 16}, event)'>[+] zoom here</a>",
	icon: {
		image: "<?php echo Yii::app()->baseUrl . '/images' ?>/pin.png",
		iconsize: [26, 46],
		iconanchor: [12, 46]
	}
},
*/
{
	address: "Mexico City, 04230",
	html: "<strong>Mexico City</strong><br>Mexico City 04230<br><br><a href='#' onclick='mapCenterAt({latitude: 40.75198, longitude: -73.96978, zoom: 16}, event)'>[+] zoom here</a>",
	icon: {
		image: "<?php echo Yii::app()->baseUrl . '/images' ?>/pin.png",
		iconsize: [26, 46],
		iconanchor: [12, 46]
	}
}
];

// Map Initial Location
var initLatitude = 25.20756;
var initLongitude = -99.46484;

// Map Extended Settings
var mapSettings = {
	controls: {
		panControl: true,
		zoomControl: true,
		mapTypeControl: true,
		scaleControl: true,
		streetViewControl: true,
		overviewMapControl: true
	},
	scrollwheel: false,
	markers: mapMarkers,
	latitude: initLatitude,
	longitude: initLongitude,
	zoom: 5
};

var map = $("#googlemaps").gMap(mapSettings);

// Map Center At
var mapCenterAt = function(options, e) {
	e.preventDefault();
	$("#googlemaps").gMap("centerAt", options);
}

</script>

<?php endif; ?>

<?php
Yii::app()->clientScript->registerScriptFile($this->get_libpath() . "/crivos/js/views/view.home.js", CClientScript::POS_END);

?>

