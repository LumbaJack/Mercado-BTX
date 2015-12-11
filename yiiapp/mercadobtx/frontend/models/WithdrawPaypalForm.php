<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class WithdrawPaypalForm extends CFormModel {
	
	/**
	 * Transfer Amount
	 *
	 * @var string
	 */
	public $transfer_amount;
	
	public $email;
	public $notes;
	
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
						'email, transfer_amount',
						'required' 
				),
				array (
						'transfer_amount',
						'numerical',
						'min' => '0.01',
						'max' => '1000'
				),
				array (
						'transfer_amount, email',
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
				'transfer_amount' => Yii::t ( 'translation', 'with_section_home_4' ),
				'email' => Yii::t ( 'translation', 'withdrawal_bitcoin_window_option_1' ),
				'notes' => Yii::t ( 'translation', 'withdrawal_bitcoin_window_option_3' ) 
		);
	}
}
