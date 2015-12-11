<?php
Yii::import ( 'common.widgets.twofactorauth.TwoFactorAuth' );
Yii::import ( 'common.widgets.twofactorauth.models.GoogleAuthForm' );
Yii::import ( 'common.widgets.twofactorauth.models.SmsAuthForm' );
require_once ('common/extensions/twilio/Services/Twilio.php');
class SecurityController extends ActivationRequiredController {
	public $leftmenu = 'account';
	public function actionIndex() {
		// $this->leftmenu = 'account';
		$user = Yii::app ()->user->data ();
		$ga = new GoogleAuthenticator ();
		
		$usersettings = $user->twofactor_settings;
		if (! $usersettings) {
			$usersettings = new UserTwoFactorSettings ();
			$usersettings->id_user = $user->id;
			$usersettings->googleauth_secret = $ga->createSecret ();
			$usersettings->googleauth_url = $ga->getQRCodeGoogleUrl ( 'MercadoBTX', $usersettings->googleauth_secret );
			$usersettings->save ();
		}
		
		$model = new SecurityForm ();
		$gaform = new GoogleAuthForm ();
		$smsform = new SmsAuthForm ();
		
		$request = Yii::app ()->request;
		$formData = $request->getPost ( get_class ( $model ), false );
		$gaFormData = $request->getPost ( get_class ( $gaform ), false );
		$smsFormData = $request->getPost ( get_class ( $smsform ), false );
		
		if ($formData) {
			$authok = false;
			if ($usersettings->deliveras == UserTwoFactorSettings::GOOGLE_AUTH) {
				if ($gaFormData) {
					$gaform->attributes = $gaFormData;
					$authcode = $gaform->twofactorauthcode;
					if ($ga->verifyCode ( $usersettings->googleauth_secret, $authcode )) {
						$authok = true;
					}
				}
			} elseif ($usersettings->deliveras == UserTwoFactorSettings::SMS) {
				if ($smsFormData) {
					$smsform->attributes = $smsFormData;
					$authcode = $smsform->twofactorauthcode;
					if ( strcasecmp( $smsform->twofactorauthcode, $usersettings->smscode) == 0) {
						$usersettings->regenerateSmsCode(); // prevent it from being used again
						$authok = true;
					}
				}
			} elseif ($usersettings->deliveras == UserTwoFactorSettings::NONE) {
				$authok = true;
			} else {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid setting' ) );
			}
			
			if (! $authok) {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid Auth Code! ' ) );
			} else {
				$model->attributes = $formData;
				if ($model->hasErrors ()) {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ) );
				} else {
					$usersettings->smsphone = $model->smsphone;
					$usersettings->deliveras = $model->deliveras;
					if (! $usersettings->save ()) {
						Yii::log ( var_dump ( $usersettings->getErrors () ), 'error' );
						
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed! ' ) );
					} else {
						Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Information updated' ) );
					}
				}
			}
		}
		
		$model->deliveras = $usersettings->deliveras;
		$model->smsphone = $usersettings->smsphone;
		
		$this->render ( 'index', array (
				'model' => $model,
				'deliveras' => $model->deliveras,
				'qrCodeUrl' => $usersettings->googleauth_url 
		) );
	}
	public function actionSmscode() {
		$this->layout = '//layouts/none';
		header ( 'Content-type: application/json' );
		$status = 'error';
		if (! Yii::app ()->user->isGuest) {
			$user = Yii::app ()->user->data ();
			$usersettings = $user->twofactor_settings;
			if ($usersettings) {
				$smsphone = $usersettings->smsphone;
				if ( Yii::app()->request->getPost('smsphone') ) {
					$smsphone = Yii::app()->request->getPost('smsphone');
				}
				if ($smsphone) {
					$usersettings->regenerateSmsCode();
					$sid = Yii::app ()->params ['twilio'] ['sid'];
					$token = Yii::app ()->params ['twilio'] ['auth'];
					$client = new Services_Twilio ( $sid, $token );
					$message = $client->account->sms_messages->create (
						Yii::app ()->params ['twilio'] ['from_phone'], // From a valid Twilio number
						$smsphone, 					// Text this number
						Yii::t(
							'translation', 
							'Your MercadoBTX verification code is {verifycode}',
							array('{verifycode}' => $usersettings->smscode)
						)
					)
					;
					$status = 'ok';
				}
				else {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid number' ));
				}
			}
		}
		echo CJSON::encode ( array (
				'status' => $status 
		) );
		Yii::app ()->end ();
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}
