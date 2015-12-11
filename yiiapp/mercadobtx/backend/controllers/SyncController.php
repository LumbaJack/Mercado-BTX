<?php
/**
 * Sync API for initiating sync from front end.
 *
 *
 * @package YiiBoilerplate\Backend
 */
Yii::import('application.packages.PHPCoinAddress.*');
require_once('PHPCoinAddress.php');

class SyncController extends CommonController
{
	private function RandomString()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring = '';
		for ($i = 0; $i < 10; $i++) {
			$randstring = $characters[rand(0, strlen($characters)-1)];
		}
		return $randstring;
	}
	
	function actionIndex()
	{
		
		$this->layout = '//layouts/none';
        //header('Content-type: application/json');
        $null_wallets = Wallet::model()->findAllByAttributes(array(
        	'wallet_address' => null
        )); 
        foreach ( $null_wallets as $null_wallet ) {
        	// CoinAddress::set_debug(true);      // optional - show debugging messages
        	// CoinAddress::set_reuse_keys(true); // optional - use same key for all addresses
        	$newcoin = CoinAddress::bitcoin();

			Yii::log("Created new address for ${newcoin['public_hex']}", "info");        	
        	$new_wallet = new SecureWallet();
        	$new_wallet->wallet_address = $newcoin['public'];
        	$new_wallet->private_key = $newcoin['private'];
        	$new_wallet->save();
        	$null_wallet->wallet_address = $new_wallet->wallet_address;
        	$null_wallet->save();
        }
        
		echo CJSON::encode(array('status' => 'ok'));  
        Yii::app()->end();
	}

    /**
     * Actions attached to this controller
     *
     * @return array
     */
/*
    public function actions()
    {
        return array(
            'error' => array(
                'class' => 'SimpleErrorAction'
            ),
        );
    }
*/
	
    /**
     * Rules for CAccessControlFilter.
     *
     * We enable the registration and other basic pages for guest users.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
     *
     * @return array Rules for the "accessControl" filter.
     */
    /*
    public function accessRules()
    {
        return array_merge(
            [
                [ 'allow', 'actions' => ['index', 'error'] ]
            ],
            parent::accessRules()
        );
    }
    */
}
