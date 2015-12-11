<?php
Yii::import ( 'common.widgets.twofactorauth.TwoFactorAuth' );
Yii::import ( 'common.widgets.twofactorauth.models.GoogleAuthForm' );
Yii::import ( 'common.widgets.twofactorauth.models.SmsAuthForm' );
require_once ('common/extensions/twilio/Services/Twilio.php');

class Changephonecontroller extends LoginRequiredController {
	public $leftmenu = 'account';
	public function actionIndex() {
		$user = Yii::app ()->user->data ();
		$model = new ChangePhoneForm ();
		
		$usersettings = $user->twofactor_settings;
		if (! $usersettings) {
			$usersettings = new UserTwoFactorSettings ();
			$usersettings->id_user = $user->id;
			$usersettings->googleauth_secret = $ga->createSecret ();
			$usersettings->googleauth_url = $ga->getQRCodeGoogleUrl ( 'MercadoBTX', $usersettings->googleauth_secret );
			$usersettings->save ();
		}
		
		$smsform = new SmsAuthForm ();
		
		$request = Yii::app ()->request;
		$formData = $request->getPost ( get_class ( $model ), false );
		$smsFormData = $request->getPost ( get_class ( $smsform ), false );

		if ($formData)
		{
			$authok = false;
			$model->attributes = $formData;
			if ($model->validate(array('phone'))){
				if ($smsFormData) {
					$smsform->attributes = $smsFormData;
					$authcode = $smsform->twofactorauthcode;
					if ( strcasecmp( $smsform->twofactorauthcode, $usersettings->smscode) == 0) {
						$usersettings->regenerateSmsCode(); // prevent it from being used again
						$authok = true;
						$usersettings->smsphone = $model->phone;
						if (! $usersettings->save ()) {
							Yii::log ( $this->dump_to_string ( $newdetail->errors ), 'error' );
							Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ));
						}
						else {
							Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Phone number changed' ));
						}						
					}
					else {
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid code' ));
					}
				}
				else {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Validation code not recieved' ));
				}
			}
		}
		
		$this->render ( 'index', array (
				'user' => $user,
				'model' => $model,
				'smsmodel' => $smsform
		) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}
