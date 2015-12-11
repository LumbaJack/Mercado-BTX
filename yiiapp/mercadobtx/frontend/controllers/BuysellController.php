<?php

class BuysellController extends FrontendController
{
	public $mainmenu = 'buysell';
	public function actionIndex()
	{
		
		$user = Yii::app ()->user->data ();
		if (Yii::app()->user->isGuest) {
			$this->layout = '//layouts/landing';
			$this->render('index');
		} elseif ($user->isActivated ()) {
			if ($user->isVerified ()) {			
			$buyform= new BuyBtcForm();
			// $transactions = Transaction::model ()->findAllByAttributes(array('id_user' => $user->id, 'type' => 1));
			$avail_balance_local = money_format('%.2n', count($user->balance) > 0 ? $user->balance->local : 0);
			$avail_balance_usd = money_format('%.2n', count($user->balance) > 0 ? $user->balance->usd : 0);
			$avail_balance_btc = money_format('%.2n', count($user->balance) > 0 ? $user->balance->btc : 0);

			$request = Yii::app ()->request;
			$formData = $request->getPost ( get_class ( $buyform ), false );
			if ($formData) {
				$buyform->amount_btc = $formData['amount_btc'];
				$buyform->amount_fiat = $formData['amount_fiat'];
				$buyform->type_trans = $formData['type_trans'];
				/*if ($buyform->hasErrors ()) {

				}
				
				else{
				*/		
				if ($buyform->validate ( array (
                                                        '',
                                        ) )) {
					$tran = new Transaction ();
					$tran->id_user = $user->id;
					$tran->status = 0;
					if ($buyform->type_trans == "BUY") {	
						$tran->type = 4;
						$tran->descr = "You purchased Bitcoins";
						$tran->currency = "USD";
						$tran->amount = $buyform->amount_btc;
					}
					elseif ($buyform->type_trans == "SELL"){	
						$tran->type = 3;
						$tran->descr = "You sold Bitcoins";
						$tran->currency = "BTC";
						$tran->amount = $buyform->amount_fiat;
					}
					else {
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error! Unable to create transaction' ) );
					}
					if (!  $tran->save ()) {
						Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error! Unable to create transaction' ) );

					}
			
				}
				else{
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error in the fields' ) );

				}
			}
			$this->render ( 'index-activated',
					compact('avail_balance_local', 'user','buyform','avail_balance_local','avail_balance_usd','avail_balance_btc' ));
			} else {
				$this->render ( 'notverified' );
			}
		}
		else
			$this->render ( 'index' );
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
