<?php
/**
 * Controller action for logging users in using the login form containing username and password.
 *
 * It is statically dependent on the LoginForm model representing the authentication form.
 *
 * @package YiiBoilerplate\Backend
 */
Yii::import ( 'common.widgets.twofactorauth.TwoFactorAuth' );
Yii::import ( 'common.widgets.twofactorauth.models.GoogleAuthForm' );
Yii::import ( 'common.widgets.twofactorauth.models.SmsAuthForm' );
require_once ('common/extensions/twilio/Services/Twilio.php');
class PasswordLoginAction extends CAction {
	/**
	 * If there were no login attempt or it failed render login form page
	 * otherwise redirect him to wherever he should return to.
	 *
	 * Also, this endpoint serves as the AJAX endpoint for client-side validation of login info.
	 */
	public function run() {
		$user = Yii::app ()->user;
		$this->redirectAwayAlreadyAuthenticatedUsers ( $user );
		
		$model = new BackendLoginForm ();
		
		$request = Yii::app ()->request;
		
		$gaform = new GoogleAuthForm ();
		$formData = $request->getPost ( get_class ( $model ), false );
		$gaFormData = $request->getPost ( get_class ( $gaform ), false );
		
		if ($formData) {
			$model->attributes = $formData;
			if ($model->validate ( array (
					'username',
					'password',
					'verifyCode' 
			) ) && $model->login ()) {
				$ga = new GoogleAuthenticator ();
				$userdata = $user->data ();
				$usersettings = $userdata->twofactor_settings;
				if (! $usersettings || $usersettings->deliveras != UserTwoFactorSettings::GOOGLE_AUTH) {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid Auth Code! ' ) );
					$this->controller->redirect ( '/site/logout' );
				}
				$authok = false;
				if ($gaFormData) {
					$gaform->attributes = $gaFormData;
					$authcode = $gaform->twofactorauthcode;
					if ($ga->verifyCode ( $usersettings->googleauth_secret, $authcode )) {
						$authok = true;
					}
				}
				if (! $authok) {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid Auth Code! ' ) );
					$this->controller->redirect ( '/site/logout' );
				} else {
					$this->controller->redirect ( $user->returnUrl );
				}
			}
		}
		
		$this->controller->render ( 'login', compact ( 'model' ) );
	}
	
	/**
	 *
	 * @param CHttpRequest $request        	
	 * @param User $model        	
	 */
	private function respondIfAjaxRequest($request, $model) {
		$ajaxRequest = $request->getPost ( 'ajax', false );
		if (! $ajaxRequest or $ajaxRequest !== 'login-form')
			return;
		
		echo CActiveForm::validate ( $model, array (
				'username',
				'password',
				'verifyCode' 
		) );
		Yii::app ()->end ();
	}
	
	/**
	 *
	 * @param
	 *        	$user
	 */
	private function redirectAwayAlreadyAuthenticatedUsers($user) {
		if (! $user->isGuest)
			$this->controller->redirect ( '/' );
	}
} 
