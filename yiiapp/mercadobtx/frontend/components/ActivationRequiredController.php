<?php
/**
 * Base class for controllers at frontend that require the user be logged in.
 *
 */
class ActivationRequiredController extends LoginRequiredController
{
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
}
