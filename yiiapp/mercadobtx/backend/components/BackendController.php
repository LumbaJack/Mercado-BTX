<?php
/**
 * Base class for the controllers in backend entry point of application.
 *
 * In here we have the behavior common to all backend routes, such as registering assets required for UI
 * and enforcing access control policy.
 *
 * @package YiiBoilerplate\Backend
 */
abstract class BackendController extends CommonController
{
	/** @var array This will be pasted into menu widget in sidebar portlet in two-column layout */
	public $menu = array();

    /**
     * Additional behavior associated with different routes in the controller.
     *
     * This is base class for all backend controllers, so we apply CAccessControlFilter
     * and on all actions except `actionDelete` we make the YiiBooster library to be available.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#filters-detail
     * @see http://www.yiiframework.com/doc/api/1.1/CAccesControlFilter
     * @see http://yii-booster.clevertech.biz/getting-started.html#initialization
     *
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
            array('bootstrap.filters.BootstrapFilter - delete'),
        );
    }

    /**
     * Rules for CAccessControlFilter.
     *
     * We allow all actions to logged in users and disable everything for others.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
     *
     * @return array
     */
    public function accessRules()
    {
        return [
            ['allow', 'users' => ['@'] ],
			['deny'],
		];
    }

    /**
     * Before rendering anything we register all of CSS and JS assets we require for backend UI.
     *
     * @see CController::beforeRender()
     *
     * @param string $view
     * @return bool
     */
    protected function beforeRender($view)
    {
        $result = parent::beforeRender($view);
        $this->registerAssets();
        return $result;
    }

    private function registerAssetsOld()
    {
        $publisher = Yii::app()->assetManager;
        $libraries = $publisher->publish(ROOT_DIR.'/common/packages');

        // NOTE that due to limitations of CClientScript.registerPackage
        // we cannot specify the javascript files to be registered before closing </body> tag.
        // So our only option until Yii 2 is to open up the package and manually register everything in it.

        $registry = Yii::app()->clientScript;
        $registry
            ->registerCssFile("{$libraries}/html5boilerplate/normalize.css")
            ->registerCssFile("{$libraries}/html5boilerplate/main.css")
            // See the Modernizr library documentation about the description of why we have to put it into HEAD tag and not before end of BODY, as everything else.
            ->registerScriptFile("{$libraries}/modernizrjs/modernizr-2.6.2.min.js", CClientScript::POS_HEAD)
            ->registerScriptFile("{$libraries}/html5boilerplate/plugins.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/underscorejs/underscore-min.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/backbonejs/backbone-min.js", CClientScript::POS_END);

        $backend = $publisher->publish(ROOT_DIR.'/backend/packages');
        $registry
            ->registerCssFile("{$backend}/main-ui/main.css")
            ->registerScriptFile("{$backend}/main-ui/main.js", CClientScript::POS_END);
    }
    
    private function registerAssets()
    {
    	$publisher = Yii::app()->assetManager;
    	$libraries = $publisher->publish(ROOT_DIR.'/common/packages');
    
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
    	->registerScriptFile("{$libraries}/rs-plugin/js/jquery.themepunch.plugins.min.js", CClientScript::POS_END)
    	->registerScriptFile("{$libraries}/rs-plugin/js/jquery.themepunch.revolution.min.js", CClientScript::POS_END)
    	->registerScriptFile("{$libraries}/magnific-popup/jquery.magnific-popup.min.js", CClientScript::POS_END)
    	->registerScriptFile("{$libraries}/spinjs/spin.min.js", CClientScript::POS_END)
    
    	->registerScriptFile("{$libraries}/jquery-plugins/jquery.validate.js", CClientScript::POS_END)
    	->registerScriptFile("{$libraries}/pnotify/jquery.pnotify.min.js", CClientScript::POS_END)
    
    	->registerScriptFile("{$libraries}/crivos/js/theme.js", CClientScript::POS_END);
    
    	$backend = $publisher->publish(ROOT_DIR.'/backend/packages');
    	$registry
    	->registerCssFile("{$backend}/main-ui/main.css")
    	->registerScriptFile("{$backend}/main-ui/main.js", CClientScript::POS_END);
    }
}
