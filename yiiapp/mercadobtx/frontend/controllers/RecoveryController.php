<?php
class RecoveryController extends FrontendController {
	public $layout = '//layouts/landing';
	public $textRecoverySubject;
	public function actionIndex() {
		$model = new ForgotPasswordForm ();
		
		$request = Yii::app ()->request;
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData) {
			$model->attributes = $formData;
			if ($model->validate ( array (
					'email' 
			) )) {
				
				$user = User::model ()->findByAttributes ( array (
						'email' => $model->email 
				) );
				if ($user) {
					$result = RecoveryRequest::generateRequest ( $user );
					if ($result == RecoveryRequest::GENERATE_WAIT) {
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'A recovery request was already submitted, please check your email.' ) );
					} elseif ($result == RecoveryRequest::GENERATE_ERR) {
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Unable to complete recovery step please contact support' ) );
					} else {
						$this->sendPasswordRecoveryEmail ( $user );
						Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'The email address "{email}" you entered does not appear to be valid.', array (
								'{email}' => $model->email 
						) ) );
					}
				}
			}
		}
		
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	public function actionReset() {
		$request = Yii::app ()->request;
		$key = $request->getParam ( 'key', null );
		$redirect = true;
		if (! $key) {
			$this->redirect ( $this->createAbsoluteUrl ( '/' ) );
		}
		
		$found = RecoveryRequest::model ()->findByAttributes ( array (
				'reqkey' => $key 
		) );
		if (! $found) {
			$this->redirect ( $this->createAbsoluteUrl ( '/' ) );
		}
		
		$user = User::model ()->findByPk ( $found->id_user );
		if (! $user) {
			$this->redirect ( $this->createAbsoluteUrl ( '/' ) );
		}
		
		$request = Yii::app ()->request;
		$model = new ResetPasswordForm ();
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData) {
			$model->attributes = $formData;
			if ($model->validate ( array (
					'newPassword' 
			) )) {
				$user->password = $model->newPassword;
				if (! $user->save ()) {
					Yii::log ( $this->dump_to_string ( $newdetail->errors ), 'error' );
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ) );
				} else {
					Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Password Changed' ) );
				}
				$user->save ();
				// prevent any further attempts
				$found->delete ();
				$this->redirect ( $this->createAbsoluteUrl ( Yii::t ( 'urls', '/login' ) ) );
			}
		} else {
			$user = Yii::app ()->user->data ();
			$model->reqkey = $key;
		}
		$this->render ( 'reset', array (
				'model' => $model 
		) );
	}
	public function actionCancel() {
		$request = Yii::app ()->request;
		$key = $request->getParam ( 'key', null );
		if ($key) {
			$found = RecoveryRequest::model ()->findByAttributes ( array (
					'reqkey' => $key 
			) );
			if ($found) {
				// prevent any further attempts
				$found->delete ();
			}
		}
		
		$this->render ( 'cancel' );
	}
	
	/**
	 * Rules for CAccessControlFilter.
	 *
	 * We enable the registration and other basic pages for guest users.
	 *
	 * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
	 *
	 * @return array Rules for the "accessControl" filter.
	 */
	public function accessRules() {
		return array_merge ( [ 
				[ 
						'allow',
						'actions' => [ 
								'index',
								'error' 
						] 
				] 
		], parent::accessRules () );
	}
	private function sendPasswordRecoveryEmail($user) {
		if (! isset ( $user->email ))
			throw new CException ( Yii::t ( 'translations', 'Email is not set when trying to send Registration Email' ) );
		
		$recovery_url = $user->recovery_request->getRecoveryUrl ();
		$cancel_recovery_url = $user->recovery_request->getRecoveryCancelUrl ();
		$mail = Emailer::recoverPasswordEmail ( array (
				'to' => $user->email,
				'from' => Yii::app ()->params ['mbtx'] ['registrationEmail'],
				'subject' => Yii::t ( 'urls', 'Password reset request recieved' ),
				'reset_link' => $recovery_url,
				'cancel_link' => $cancel_recovery_url,
				'view' => 'recovery' 
		) );

		$sent = $mail->send ();
		if ($sent ['status']) {
			Yii::app ()->user->setFlash ( 'contact', Yii::t ( 'translation', 'Recovery instructions sent to {email}.', array (
					'{email}' => $user->email 
			) ) );
		} else {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error while sending email: ' . $sent ['error'] ) );
		}
		
		return $sent;
	}
}
