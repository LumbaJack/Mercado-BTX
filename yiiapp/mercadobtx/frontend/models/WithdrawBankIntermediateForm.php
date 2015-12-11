<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class WithdrawBankIntermediateForm extends WithdrawBankForm {
	/**
	 * Account number
	 *
	 * @var string
	 */
	public $account_number;
	
	/**
	 * Account name
	 *
	 * @var string
	 */
	public $account_name;
	
	/**
	 * Bank name
	 *
	 * @var string
	 */
	public $bank_name;
	
	/**
	 * Swift number
	 *
	 * @var string
	 */
	public $swift_number;
	
	/**
	 * Comments
	 *
	 * @var string
	 */
	public $comments;
	
	/**
	 * Address Line1
	 *
	 * @var string
	 */
	public $line1;
	
	/**
	 * Address Line2
	 *
	 * @var string
	 */
	public $line2;
	
	/**
	 * City
	 *
	 * @var string
	 */
	public $city;
	
	/**
	 * Postal code
	 *
	 * @var string
	 */
	public $postcode;
	
	/**
	 * Country code
	 *
	 * @var string
	 */
	public $countrycode;
	
	/**
	 * Validation rules
	 *
	 * @see CModel::rules()
	 *
	 * @return array
	 */
	public function rules() {
		return array (
				array (
						'account_number, account_name, bank_name, swift_number, comments, city, postcode, countrycode',
						'required' 
				),
				array (
						'account_number, account_name, bank_name, swift_number, comments, city, postcode, countrycode',
						'safe' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'account_number' => Yii::t ( 'translation', 'withdrawal_bank_entry_7' ),
				'account_name' => Yii::t ( 'translation', 'withdrawal_bank_entry_1' ),
				'bank_name' => Yii::t ( 'translation', 'withdrawal_bank_entry_6' ),
				'swift_number' => Yii::t ( 'translation', 'withdrawal_bank_entry_3' ),
				'comments' => Yii::t ( 'translation', 'withdrawal_bank_entry_4' ),
				'line1' => Yii::t ( 'translation', 'withdrawal_bank_entry_2' ),
				'city' => Yii::t ( 'translation', 'verify_contact_entry_6' ),
				'postcode' => Yii::t ( 'translation', 'verify_contact_entry_7' ),
				'countrycode' => Yii::t ( 'translation', 'withdrawal_bank_entry_5' ) 
		);
	}
}
