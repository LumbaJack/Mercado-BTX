<?php
/**
 * Base class for controllers at frontend.
 *
 * Includes all assets required for frontend and also registers Google Analytics widget if there's code specified.
 *
 * @package YiiBoilerplate\Frontend
 */
class FrontendController extends CommonController
{
	function init()
	{
		parent::init();
		$app = Yii::app();
		$app->sourceLanguage = 'xx';
		if (isset($_POST['_lang']))
		{
			$app->language = $_POST['_lang'];
			$app->session['_lang'] = $app->language;
		}
		if (isset($_GET['_lang']))
		{
			$app->language = $_GET['_lang'];
			$app->session['_lang'] = $app->language;
		}
		else if (isset($app->session['_lang']))
		{
			$app->language = $app->session['_lang'];
		}
		else {
			$app->language = 'es_mx';  // default to spanish / mexico
		}
	}

    /**
     * What to do before rendering the view file.
     *
     * We include Google Analytics code if ID was specified and register the frontend assets.
     *
     * @param string $view
     * @return bool
     */
    public function beforeRender($view)
    {
        $result = parent::beforeRender($view);
        $this->addGoogleAnalyticsCode();
        $this->registerAssets();
        return $result;
    }

    private function addGoogleAnalyticsCode()
    {
        $gaid = @Yii::app()->params['google.analytics.id'];
        if ($gaid)
            $this->widget('frontend.widgets.GoogleAnalytics.GoogleAnalyticsWidget', compact('gaid'));
    }

    private $libpath = '';
    protected function get_libpath()
    {
        return $this->libpath;
    }

    private function registerAssets()
    {
        $publisher = Yii::app()->assetManager;
        $libraries = $publisher->publish(ROOT_DIR.'/common/packages');
        $this->libpath = $libraries;

        Yii::app()->yiistrap->register();
        $registry = Yii::app()->clientScript;
        $registry
            ->registerCssFile("{$libraries}/html5boilerplate/normalize.css")
            ->registerCssFile("{$libraries}/html5boilerplate/main.css");

        Yii::app()->yiistrap->register();

        $registry
            ->registerCssFile("{$libraries}/bootstrap/css/bootstrap.min.css")
            ->registerCssFile("{$libraries}/bootstrap/css/authenty.css")
            ->registerCssFile("{$libraries}/bootstrap/css/bootstrap-theme.min.css")
            ->registerCssFile("{$libraries}/font-awesome/css/font-awesome.min.css")
            ->registerCssFile("{$libraries}/flexslider/flexslider.css")
            ->registerCssFile("{$libraries}/magnific-popup/magnific-popup.css")
            ->registerCssFile("{$libraries}/pnotify/jquery.pnotify.default.css")
            
            ->registerCssFile("{$libraries}/mbtx/css/theme.css")
            ->registerCssFile("{$libraries}/mbtx/css/theme-elements.css")
            ->registerCssFile("{$libraries}/mbtx/css/theme-animate.css")
            ->registerCssFile("{$libraries}/mbtx/css/mbtx.css")
           /*
            * still needed?  ->registerCssFile("{$libraries}/mbtx/css/theme-responsive.css")
            */
            ->registerCssFile("{$libraries}/rs-plugin/css/settings.css")
            ->registerCssFile("{$libraries}/circle-flip-slideshow/css/component.css")
            ->registerCssFile("{$libraries}/mbtx/css/skins/blue.css")

            ->registerScriptFile("{$libraries}/modernizrjs/modernizr-2.6.2.min.js", CClientScript::POS_HEAD)
            ->registerScriptFile("{$libraries}/html5boilerplate/plugins.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery/jquery-1.11.0.min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/underscorejs/underscore-min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/backbonejs/backbone-min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/bootstrap/js/bootstrap.min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/bootstrap/js/bootbox.min.js", CClientScript::POS_END)

            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.imagesloaded.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.knob.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.mousewheel.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.stellar.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.gmap.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.qrcode.min.js", CClientScript::POS_END)

            ->registerScriptFile("{$libraries}/crivos/js/plugins.js", CClientScript::POS_END)

            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.easing.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.appear.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.cookie.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/chart/highcharts.js", CClientScript::POS_HEAD)
            ->registerScriptFile("{$libraries}/flot/jquery.flot.js", CClientScript::POS_HEAD)
            ->registerScriptFile("{$libraries}/twitterjs/twitter.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/rs-plugin/js/jquery.themepunch.plugins.min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/rs-plugin/js/jquery.themepunch.revolution.min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/flexslider/jquery.flexslider.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/magnific-popup/jquery.magnific-popup.min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/spinjs/spin.min.js", CClientScript::POS_END)

            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.validate.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/pnotify/jquery.pnotify.min.js", CClientScript::POS_END)
            
            ->registerScriptFile("{$libraries}/crivos/js/theme.js", CClientScript::POS_END);


        $frontend = $publisher->publish(ROOT_DIR.'/frontend/packages');
        $registry
            ->registerCssFile("{$frontend}/main-ui/main.css")
            ->registerScriptFile("{$frontend}/main-ui/main.js", CClientScript::POS_END);
    }
}
