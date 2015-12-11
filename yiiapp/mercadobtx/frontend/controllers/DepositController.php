<?php

class DepositController extends ActivationRequiredController
{
	public $leftmenu = 'deposit';
	public function actionIndex() {
		$user = Yii::app ()->user->data ();
		if ($user->isVerified ()) {
			$wallets = $user->wallets;
			if(count($wallets) == 0) {
				$this->render ( 'nowallet' );
			} else {
				$apd = new AstroPayDirect ();
				$this->render ( 'index', array (
						'wallet' => $wallets,
						'astropay' => $apd 
				) );
			}
		} else {
			$this->render ( 'notverified' );
		}
	}

	public function actionreturn() {
		if (! isset ( $_POST ['result'] ) || ! isset ( $_POST ['x_invoice'] ) || ! isset ( $_POST ['x_iduser'] ) || ! isset ( $_POST ['x_document'] )) {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error unexpexted' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
		$user = Yii::app ()->user->data ();
		$invo = Invoices::model ()->findByAttributes ( array (
				'id_user' => $user->id,
				'invoice_number' => $_POST ['x_invoice']
		) );
		if (! is_null ( $invo )) {
			$invo->astropay_result = $_POST ['result'];
			$invo->status = $_POST ['result'] - 5;
			$invo->id_astropay = $_POST ['x_document'];
			$invo->save ();
			$tran = Transaction::model ()->findByAttributes ( array (
					'id_trans' => $invo->id_trans
			) );
			switch ($invo->astropay_result) {
				case 6 :
					$tran->status = 2;
					break;
				case 7 :
					$tran->status = 0;
					break;
				case 8 :
					$tran->status = 2;
					break;
				case 9 :
					$tran->status = 1;
					break;
			}
			$tran->save ();
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		} else {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error unexpexted' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
	}
	
	public function actionconfirm() {
		if (! isset ( $_POST ['result'] ) || ! isset ( $_POST ['x_invoice'] ) || ! isset ( $_POST ['x_iduser'] ) || ! isset ( $_POST ['x_document'] )) {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error unexpexted' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
		$user = Yii::app ()->user->data ();
		$invo = Invoices::model ()->findByAttributes ( array (
				'id_user' => $user->id,
				'invoice_number' => $_POST ['x_invoice']
		) );
		if (! is_null ( $invo )) {
			$invo->astropay_result = $_POST ['result'];
			$invo->status = $_POST ['result'] - 5;
			$invo->id_astropay = $_POST ['x_document'];
			$invo->save ();
			$tran = Transaction::model ()->findByAttributes ( array (
					'id_trans' => $invo->id_trans
			) );
			switch ($invo->astropay_result) {
				case 6 :
					$tran->status = 2;
					break;
				case 7 :
					$tran->status = 0;
					break;
				case 8 :
					$tran->status = 2;
					break;
				case 9 :
					$tran->status = 1;
					break;
			}
			$tran->save ();
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		} else {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Error unexpexted' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
	}
	
	public function actionpayredirect() {
		if (! isset ( $_POST ['id_bank'] )) {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Please select a bank' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
		if (isset ( $_POST ['amount'] ) && ($_POST ['amount'] <= 0 or $_POST ['amount'] > 10000)) {
			Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'The amount cant be zero or more than 10000' ) );
			$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
		}
		if (isset ( $_POST ['id_bank'] ) && isset ( $_POST ['amount'] )) {
			if ($_POST ['amount'] <= 0 or $_POST ['amount'] > 10000 or $_POST ['id_bank'] == "") {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Invalid amount or bank' ) );
				$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
			}
			
			$user = Yii::app ()->user->data ();
			
			$tran = new Transaction ();
			$tran->id_user = $user->id;
			$tran->status = 0;
			$tran->type = 1;
			$tran->amount = $_POST ['amount'];
			$tran->currency = "MXN";
			$tran->descr = "Deposito de pesos en tu cuenta usando astropay";
			$tran->save ();
			
			$invo = new Invoices ();
			
			$invo->id_user = $user->id;
			$invo->invoice_number = dechex ( time () );
			$invo->amount = $_POST ['amount'];
			$invo->status = 0;
			$invo->id_bank = $_POST ['id_bank'];
			$invo->name_bank = "Bank Test";
			$invo->id_country = "MX";
			$invo->id_currency = "MXN";
			$invo->descr = "Deposit via Astropay";
			$invo->id_cpf = "";
			$invo->id_sub_code = "";
			$invo->id_trans = $tran->id_trans;
			$invo->save ();
			
			$return_url = "http://mercadobtx.com/deposit/return";
			$confirmation_url = "http://mercadobtx.com/deposit/confirm";
			
			$apd = new AstroPayDirect ();
			$jdata = $apd->create ( $invo->invoice_number, $invo->amount, $user->id, $invo->id_bank, $invo->id_country, $invo->id_currency, $invo->descr, $invo->id_cpf, $invo->id_sub_code, $return_url, $confirmation_url, $response_type = 'json' );
			$dat = json_decode ( $jdata );
			if ($dat->{"status"} == "OK") {
				$this->redirect ( $dat->{"link"} );
			} else {
				Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Returned error from Astropay' ) . " " . $dat->{"desc"} );
				$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
			}
		}
		$this->redirect ( Yii::app ()->request->baseUrl . "/deposit/" );
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
