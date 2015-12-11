<?php
/**
 * Base class for controllers at frontend that require the user be logged in.
 *
 */
class LoginRequiredController extends FrontendController
{
    /*
     * Check that the user is logged in, and if not redirect to /login URL
     */
    protected function beforeAction($action)
    {
    	if ( Yii::app()->user->isGuest) {
    		$this->redirect(Yii::t('urls', 'login'));
    		
    	}
    	return parent::beforeAction($action);
    }
}
