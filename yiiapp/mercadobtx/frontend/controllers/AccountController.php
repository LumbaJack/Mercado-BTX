<?php
class AccountController extends LoginRequiredController {
	public $leftmenu = 'account';
	public function actionIndex() {
		$user = Yii::app ()->user->data ();
		$user_addresses = $user->addresses;
		$user_details = $user->details;
		
		$newaddress = null;
		$newdetail = null;
		$model = new AccountForm ();
		
		$current_address = null;
		if (count ( $user_addresses ) > 0) {
			$current_address = end ( $user_addresses );
		}
		
		if ( ! $user_details ) {
			$user_details = new UserDetail();
			$user_details->id_user = $user->id;
			$user_details->save();
		}
		
		$request = Yii::app ()->request;
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData) {
			$model->attributes = $formData;
			if ($model->hasErrors ()) {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ) );
			} else {
				$newaddress = new Address ();
				$newaddress->attributes = $formData;
				$newaddress->id_user = $user->id;
				
				$newdetail = new UserDetail ();
				$newdetail->name = $formData ['name'];
				$newdetail->fiatcode = $formData ['fiatcode'];
				$newdetail->timezone = $formData ['timezone'];
				$newdetail->company = $formData['company'];
				$newdetail->countrycode = $formData['countrycode'];
				$newdetail->id_user = $user->id;
				
				$address_update = false;
				if ($current_address) {
					if ($current_address->compare ( $newaddress, array (
							'line1',
							'line2',
							'region',
							'city',
							'postcode',
							'countrycode' 
					) ) > 0) {
						$address_update = true;
					}
				}
				
				if ($address_update || ! $current_address) {
					if (! $newaddress->save ()) {
						Yii::log ( $this->dump_to_string ( $newdetail->errors ), 'error' );
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ) );
						return;
					} else {
						$user_addresses [] = $current_address;
						Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Information updated' ) );
						$current_address = null;
						if (count ( $user_addresses ) > 0) {
							$current_address = end ( $user_addresses );
						}
					}
				}
				
				$detail_update = false;
				
				if ($user_details->compare ( $newdetail, array (
						'name',
						'fiatcode',
						'company'
				) ) > 0) {
					$detail_update = true;
				}
				if ($detail_update || ! $user_details ) {
					if (! $newdetail->save ()) {
						Yii::log ( $this->dump_to_string ( $newdetail->errors ), 'error' );
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' . $this->dump_to_string ( $newdetail->errors ) ) );
					} else {
						$user->details->name = $newdetail->name;
						$user->details->company = $newdetail->company;
						$user->details->fiatcode = $newdetail->fiatcode;
						$user->details->timezone = $newdetail->timezone;
						$user->details->save();
						Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Information updated' ) );
					}
				}
			}
			
			$user_details = $user->details;
		}
		
		$model->name = $user->name;
		$model->email = $user->email;
		
		if ($current_address) {
			$model->line1 = $current_address->line1;
			$model->line2 = $current_address->line2;
			$model->city = $current_address->city;
			$model->postcode = $current_address->postcode;
			$model->countrycode = $current_address->countrycode;
		}
		
		if ($user_details) {
			$model->name = $user_details->name;
			$model->fiatcode = $user_details->fiatcode;
			$model->timezone = $user_details->timezone;
			$model->company = $user_details->company;
		}
		
		$this->render ( 'index', array (
				'user' => $user,
				'model' => $model 
		) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}
