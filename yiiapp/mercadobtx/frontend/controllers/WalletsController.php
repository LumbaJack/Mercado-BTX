<?php
// Yii::import('common.extensions.bitcoinphp.src.*');
//require_once ('bitcoin.inc');

class WalletsController extends ActivationRequiredController
{
	public $leftmenu = 'account';

	public function actionIndex()
	{
		//$this->leftmenu = 'account';
		$user = Yii::app()->user->data();
		$wallets = $user->wallets;
		if (!$wallets) {
			$this->render('create');
		} else {
			$this->render('index', array('wallet' => $wallets));
		}
	}

	public function actionCreate()
	{

		$sock = stream_socket_client('unix:///tmp/addr_server_socket', $errno, $errstr);
		fwrite($sock, "request_addr\n");
		$data = fread($sock, 4096)."\n";
		fclose($sock);

		if ($data != "") {
			$data = json_decode($data);
		} else {
			$this->redirect(Yii::t('urls', '/wallets'));
		}

		$user = Yii::app()->user->data();
		$wallets = $user->wallets;
		$new_wallet = new Wallet();
		$new_wallet->id_user = $user->id;
		$new_wallet->wallet_address = $data->{'multiaddr'};
		$new_wallet->privatekey = $data->{'key1'};
		$new_wallet->save();
		$this->render('created', array('wallets' => $wallets,
					       'data' => $data));
	}

	public function actionWalletPaper()
	{
		$request = Yii::app ()->request;
		$publisher = Yii::app()->assetManager;
	        $libraries = $publisher->publish(ROOT_DIR.'/common/packages');
		#$this->layout='';
		#$this->render('walletpaper', array('request' => $request));
		Yii::app()->controller->renderPartial('walletpaper',
		    array('request' => $request,
		          'libraries' => $libraries)
		);
	}
}
