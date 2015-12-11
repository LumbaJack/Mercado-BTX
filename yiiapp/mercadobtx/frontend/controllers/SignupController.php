<?php
/**
 * Basic "kitchen sink" controller for frontend.
 * It was configured to be accessible by `/site` route, not the `/frontendSite` one!
 *
 * @package YiiBoilerplate\Signup
 */
class SignupController extends FrontendController {
	public $layout = '//layouts/secondary';
	public $textActivationSubject = 'Please activate your account for {username}';
	public $textActivationBody = 'Hello, {username}. Please activate your account with this url: {activation_url}';
	public function actions() {
		return array (
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF,
						'foreColor' => 0x0099CC 
				),
				'error' => array (
						'class' => 'SimpleErrorAction' 
				) 
		);
	}
	
	// Only allow the registration if the user is not already logged in
	/*
	 * public function beforeAction($action) { if(!Yii::app()->user->isGuest) { $this->redirect('/'); } }
	 */

	/**
	 * Actions attached to this controller
	 *
	 * @return array
	 */
	public function actionIndex() {
		$user = Yii::app ()->user;
		$this->redirectAwayAlreadyAuthenticatedUsers ( $user );
		
		$model = new SignupForm ();
		
		$request = Yii::app ()->request;
		
		$this->respondIfAjaxRequest ( $request, $model );
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData) {
			$model->attributes = $formData;
			if (! $model->hasErrors () && $model->validate ( array (
					'email',
					'passwordConfirm',
					'verifyCode' 
			) )) {
				if ($model->signup ()) {
					if (! Yii::app ()->user->isGuest) {
						$user = $model->getUser ();
						$user->regenerateActivationKey ();
						$this->sendRegistrationEmail ( $user );
					}
				}
				$this->redirect ( '/' );
			}
		}
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}

	/**
	 * Actions attached to this controller
	 *
	 * @return array
	 */
	public function actionResend() {
		$user = Yii::app ()->user;
		Yii::log("actionResend", 'error');
		if ( $user->isGuest) {
			# resend is only for logged in users
			$this->redirect ( '/' );
		}

		$userdata = $user->data();
		$userdata->regenerateActivationKey ();
		$this->sendRegistrationEmail ( $userdata );
		$this->redirect ( '/' );
	}
	

	/**
	 *
	 * @param CHttpRequest $request        	
	 * @param User $model        	
	 */
	private function respondIfAjaxRequest($request, $model) {
		$ajaxRequest = $request->getPost ( 'ajax', false );
		if (! $ajaxRequest or $ajaxRequest !== 'signup-form') {
			return;
		}
		echo CActiveForm::validate ( $model, array (
				'email',
				'password',
				'verifyCode' 
		) );
		Yii::app ()->end ();
	}

	public function actionActivate($key) {
		$user = User::model ()->findByAttributes ( array (
				'activation_key' => $key 
		) );

		if ( $user ) {
			$user->activation_time = new CDbExpression('UNIX_TIMESTAMP(NOW())');
			// regenerate key to prevent it from being reused
			$user->regenerateActivationKey();
			$user->save();	
		}
		
		$this->render ( 'activate', array (
				'user' => $user 
		) );
	}
	
	/**
	 *
	 * @param
	 *        	$user
	 */
	private function redirectAwayAlreadyAuthenticatedUsers($user) {
		if (! $user->isGuest)
			$this->redirect ( '/' );
	}
	
	// Send the Email to the given user object.
	// $user->profile->email needs to be set.
	private function sendRegistrationEmail($user) {
		if (! isset ( $user->email ))
			throw new CException ( Yii::t ( 'translations', 'Email is not set when trying to send Registration Email' ) );
		
		$activation_url = $user->getActivationUrl ();
		
		$mail = Emailer::activateUserEmail ( array (
				'to' => $user->email,
				'from' => Yii::app ()->params ['mbtx'] ['registrationEmail'],
				'subject' => Yii::t ( 'translation', $this->textActivationSubject, array('{username}' => $user->email)),
				'body' => Yii::t('translation', $this->textActivationBody, array('activation_url' => $activation_url)),
				'activation_url' => $activation_url,
				'view' => 'signup'
		) );
		
		$sent = $mail->send ();
		if ($sent ['status']) {
			Yii::app ()->user->setFlash ( 'contact', Yii::t ( 'translation', 'Confirmation email sent to {email}.', array (
			'{email}' => $user->email
			) ) );
			
			$adminmail = Emailer::newSignupEmail();
			$sent = $adminmail->send ();
			
		} else {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error while sending email: ' . $sent ['error'] ) );
		}
	}
}
