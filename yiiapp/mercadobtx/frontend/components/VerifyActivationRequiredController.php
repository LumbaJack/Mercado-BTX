<?php
/**
 * Base class for controllers at frontend that require the user be logged in.
 *
 */
class VerifyActivationRequiredController extends ActivationRequiredController 
{
    public function beforeRender($view)
    {
        $result = parent::beforeRender($view);
        $this->registerAssets();
        return $result;
    }

    /*
     * Check that the user is logged in, and if not redirect to /login URL
     */
    protected function beforeAction($action)
    {
    	// check that LoginRequired is satified first
    	$parentcheck = parent::beforeAction($action);
    	if ( $parentcheck ) {
    		// then check if user is activated
	    	if ( ! Yii::app()->user->data()->isActivated() ) {
	    		$this->redirect(Yii::t('urls', '/'));
	    	}
    	}
    	return $parentcheck;
    }

    private function registerAssets()
    {
        $publisher = Yii::app()->assetManager;
        $libraries = $publisher->publish(ROOT_DIR.'/common/packages');

        Yii::app()->yiistrap->register();
        $registry = Yii::app()->clientScript;
        $registry
            ->registerCssFile("{$libraries}/jquery-plugins/jquery.fileupload.css");
            //->registerCssFile("{$libraries}/html5boilerplate/main.css");

        //Yii::app()->yiistrap->register();

        $registry
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.ui.widget.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.iframe-transport.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.fileupload.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.fileupload-process.js", CClientScript::POS_END)
            ->registerScriptFile("{$libraries}/jquery-plugins/jquery.fileupload-validate.js", CClientScript::POS_END);

    }
}
