<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class SmsAuthForm extends CFormModel {
	
	/**
	 * $subject -- ticket subject
	 *
	 * @var $subject
	 */
	public $twofactorauthcode;

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
				'twofactorauthcode',
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
			'twofactorauthcode' => Yii::t ( 'translation', 'Code' )
		);
	}
}
