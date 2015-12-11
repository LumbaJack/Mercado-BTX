<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class SecurityForm extends CFormModel {
	
	/**
	 * $deliveras -- 2 factor authentication settings
	 *
	 * @var $deliveras
	 */
	public $deliveras;

	/**
	 * $smsphone -- phone number for sms
	 *
	 * @var $smsphone
	 */
	public $smsphone;
	
	/**
	 * Validation rules
	 *
	 * @see CModel::rules()
	 *
	 * @return array
	 */
	public function rules() {
		return array(
			array (
					'deliveras',
					'numerical',
					'integerOnly' => true 
			),
			array (
				'deliveras, smsphone',
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
			'deliveras' => Yii::t ( 'translation', 'Two Factor Authentication' ),
			'smsphone' => Yii::t('translation', 'Phone number'),
		);
	}
}
