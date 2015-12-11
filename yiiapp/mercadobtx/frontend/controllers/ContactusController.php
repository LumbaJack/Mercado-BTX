<?php
/**
 * Basic "kitchen sink" controller for frontend.
 * It was configured to be accessible by `/site` route, not the `/frontendSite` one!
 *
 * @package YiiBoilerplate\Signup
 */
class ContactusController extends FrontendController
{
    //public $layout='//layouts/secondary';
	public $mainmenu = 'contact';
    /**
    * Actions attached to this controller
    *
    * @return array
    */
    public function actionIndex()
    {
    	$this->layout = '//layouts/landing';
        $this->render('index');
    }
    function init()
    {
        parent::init();
    }
}
