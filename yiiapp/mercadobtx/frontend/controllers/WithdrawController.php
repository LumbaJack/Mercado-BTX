<?php
Yii::import ( 'common.widgets.twofactorauth.TwoFactorAuth' );
Yii::import ( 'common.widgets.twofactorauth.models.GoogleAuthForm' );
Yii::import ( 'common.widgets.twofactorauth.models.SmsAuthForm' );
require_once ('common/extensions/twilio/Services/Twilio.php');
class WithdrawController extends ActivationRequiredController {
	public $leftmenu = 'deposit';
	public function actionIndex() {
		$user = Yii::app ()->user->data ();
		if (! $user->isVerified ()) {
			$this->render ( 'notverified' );
			return;
		}
		
		// verified only beyond this point
		
		// $transactions = Transaction::model ()->findAllByAttributes(array('id_user' => $user->id, 'type' => 1));
		$balance = count ( $user->balance ) > 0 ? $user->balance : new Balance ();
		
		$model_btc = new WithdrawBtcForm ();
		$model_bank = new WithdrawBankForm ();
		$model_intermediate = new WithdrawBankIntermediateForm ();
		$model_paypal = new WithdrawPaypalForm();
		
		$user_country_code = '';
		if ($user->addresses && count ( $user->addresses ) > 0) {
			$current_address = $user->addresses [count ( $user->addresses ) - 1];
			$user_country_code = $current_address->countrycode;
		}
		
		$ga = new GoogleAuthenticator ();
		$usersettings = $user->twofactor_settings;
		if (! $usersettings) {
			$usersettings = new UserTwoFactorSettings ();
			$usersettings->id_user = $user->id;
			$usersettings->googleauth_secret = $ga->createSecret ();
			$usersettings->googleauth_url = $ga->getQRCodeGoogleUrl ( 'MercadoBTX', $usersettings->googleauth_secret );
			$usersettings->save ();
		}
		$deliveras = $usersettings->deliveras;
		
		$request = Yii::app ()->request;
		
		$btc_submit = array_key_exists ( 'btc_submit', $_POST );
		$wire_submit = array_key_exists ( 'wire_submit', $_POST );
		$paypal_submit = array_key_exists ( 'paypal_submit', $_POST );
		print_r($wire_submit);
		$tab = 'opt_btc';
		if ( $wire_submit ) {
			$tab = 'opt_wire';
		}
		elseif ($paypal_submit ) {
			$tab = 'opt_paypal';
		}

		$btcFormData = $request->getPost ( get_class ( $model_btc ), false );
		$bankFormData = $request->getPost ( get_class ( $model_bank ), false );
		$intermediateFormData = $request->getPost(get_class ($model_intermediate), false);
		$paypalFormData = $request->getPost ( get_class ( $model_paypal ), false );
		$intermediate_ok = FALSE;
		$primary_ok = FALSE;
		
		if ($btcFormData || $bankFormData || $paypalFormData ) {
			if (! $this->checkAuthCode ( $request, $usersettings, $ga )) {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid auth code' ) );
			} else {
				if ($btc_submit && $btcFormData) {
					$model_btc->attributes = $btcFormData;
	
					if ($model_btc->validate ( array (
							'transfer_amount',
							'address' 
					) )) {
						
						$btc_trans = new Transaction ();
						$btc_trans->amount = $model_btc->transfer_amount;
						$btc_trans->currency = 'BTC';
						$btc_trans->wallet_address = $model_btc->address;
						$btc_trans->id_user = $user->id;
						$btc_trans->type = Transaction::TYPE_WITHDRAW_BTC;
						$btc_trans->status = Transaction::STATUS_PENDING;
						if (! $btc_trans->save ()) {
							$model_btc->addError ( 'dummy', 'Save failed' );
							Yii::log ( 'Unable to submit transaction, save failed' );
						}
					}
				}
				
				if ($wire_submit && $bankFormData) {

					$model_bank->attributes = $bankFormData;
					

					if ( $intermediateFormData ) {
						$model_intermediate->attributes = $intermediateFormData;
						if ( $intermediateFormData && $model_intermediate->validate ( array (
									'account_number',
									'account_name',
									'bank_name',
									'swift_number',
									'comments',
									'city',
									'postcode',
									'countrycode'
							)) ) {
								$intermediate_ok = TRUE;
							}
						}
					}

					if ($model_bank->validate ( array (
							'transfer_amount',
							'account_number',
							'account_name',
							'bank_name',
							'swift_number',
							'comments',
							'city',
							'postcode',
							'countrycode' 
					) )) {
						$primary_ok = TRUE;
					}
					
					if ( $primary_ok == TRUE) {
						$bank_trans = new Transaction ();
						$bank_trans->amount = $model_bank->transfer_amount;
						$bank_trans->currency = '';
						$bank_trans->wallet_address = $model_bank->account_number;
						$bank_trans->id_user = $user->id;
						$bank_trans->type = Transaction::TYPE_WITHDRAW_FIAT;
						$bank_trans->status = Transaction::STATUS_PENDING;
						$bank_trans->descr = var_dump ( $model_bank );

						$bank_info = new TransactionBankInfo();
						$bank_info->account_number = $model_bank->account_number;
						$bank_info->account_name = $model_bank->account_name;
						$bank_info->bank_name = $model_bank->bank_name;
						$bank_info->swift_number = $model_bank->swift_number;
						$bank_info->comments = $model_bank->comments;
						$bank_info->line1 = $model_bank->line1;
						$bank_info->line2 = $model_bank->line2;
						$bank_info->city = $model_bank->city;
						$bank_info->postcode = $model_bank->postcode;
						$bank_info->countrycode = $model_bank->countrycode;
						
						if (! $bank_trans->save ()) {
							$model_bank->addError ( 'dummy', 'Save failed' );
							Yii::log ( 'Unable to submit transaction, save failed' );
						}

						$bank_info->id_trans = $bank_trans->id_trans;
						if (! $bank_info->save ()) {
							$model_bank->addError ( 'dummy', 'Save failed' );
							Yii::log ( 'Unable to submit transaction, save failed' );
							$bank_trans->delete();
						}

						if ( $intermediate_ok == TRUE ) {
							$inter_info = new TransactionBankInfo();
							$inter_info->account_number = $model_intermediate->account_number;
							$inter_info->account_name = $model_intermediate->account_name;
							$inter_info->bank_name = $model_intermediate->bank_name;
							$inter_info->swift_number = $model_intermediate->swift_number;
							$inter_info->comments = $model_intermediate->comments;
							$inter_info->line1 = $model_intermediate->line1;
							$inter_info->line2 = $model_intermediate->line2;
							$inter_info->city = $model_intermediate->city;
							$inter_info->postcode = $model_intermediate->postcode;
							$inter_info->countrycode = $model_intermediate->countrycode;
							$inter_info->intermediate = 1;
							$inter_info->id_trans = $bank_trans->id_trans;
							if (! $inter_info->save ()) {
								$model_intermediate->addError ( 'dummy', 'Save failed' );
								Yii::log ( 'Unable to submit transaction, save failed' );
								$bank_trans->delete();
								$bank_info->delete();
							}
					}
					

				}
				
				if ($paypal_submit && $paypalFormData) {
					$model_paypal->attributes = $paypalFormData;
					if ($model_paypal->validate ( array (
							'transfer_amount',
							'email',
					) )) {
						$paypal_trans = new Transaction ();
						$paypal_trans->amount = $model_bank->transfer_amount;
						$paypal_trans->wallet_address = $model_bank->email;
						$paypal_trans->currency = 'MXN';
						$paypal_trans->id_user = $user->id;
						$paypal_trans->type = Transaction::TYPE_WITHDRAW_FIAT;
						$paypal_trans->status = Transaction::STATUS_PENDING;
						$paypal_trans->descr = $model_paypal->notes;
						if (! $paypal_trans->save ()) {
							$model_paypal->addError ( 'dummy', 'Save failed' );
							Yii::log ( 'Unable to submit transaction, save failed' );
						}
					}
				}
			}
		}

		
$this->render ( 'index', compact ( 'balance', 'user', 'tab', 'model_btc', 'model_bank', 'model_paypal', 'model_intermediate', 'user_country_code', 'deliveras' ) );
	}
	function checkAuthCode($request, $usersettings, $ga) {
		$authok = false;
		
		if ($usersettings->deliveras == UserTwoFactorSettings::GOOGLE_AUTH) {
			$gaform = new GoogleAuthForm ();
			$gaFormData = $request->getPost ( get_class ( $gaform ), false );
			
			if ($gaFormData) {
				$gaform->attributes = $gaFormData;
				$authcode = $gaform->twofactorauthcode;
				if ($ga->verifyCode ( $usersettings->googleauth_secret, $authcode )) {
					$authok = true;
				}
			}
		} elseif ($usersettings->deliveras == UserTwoFactorSettings::SMS) {
			$smsform = new SmsAuthForm ();
			$smsFormData = $request->getPost ( get_class ( $smsform ), false );
			if ($smsFormData) {
				$smsform->attributes = $smsFormData;
				$authcode = $smsform->twofactorauthcode;
				if (strcasecmp ( $smsform->twofactorauthcode, $usersettings->smscode ) == 0) {
					$usersettings->regenerateSmsCode (); // prevent it from being used again
					$authok = true;
				}
			}
		} elseif ($usersettings->deliveras == UserTwoFactorSettings::NONE) {
			$authok = true;
		}
		return $authok;
	}
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}
