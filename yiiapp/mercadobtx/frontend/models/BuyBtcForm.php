<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class BuyBtcForm extends CFormModel {
	
	/**
	 * Transfer Amount
	 *
	 * @var string
	 */
	public $amount_btc;
	public $amount_fiat;
	public $type_trans;
	
	public function rules() {
		return array(
			array (
				'amount_btc',
				'required'
			),
			array (
				'amount_btc',
			 	'numerical',
				'max' => '50',
			 	'min' => '0'

			),
			array (
				'amount_btc',
				'type',
			 	'type' => 'float'
			),
			array (
				'amount_btc',
				'safe' 
			),
			array (
				'amount_fiat',
				'required'
			),
			array (
				'amount_fiat',
			 	'numerical',
				'max' => '50',
			 	'min' => '0'

			),
			array (
				'amount_fiat',
				'type',
			 	'type' => 'float'
			),
			array (
				'amount_fiat',
				'safe' 
			),
			array (
				'type_trans',
				'required'
			),
		

		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'amount_btc' =>  Yii::t('translation', 'buysell_table_2_option_1'),
				'amount_fiat' =>  Yii::t('translation', 'buysell_table_3_option_1'),
		);
	}
}
