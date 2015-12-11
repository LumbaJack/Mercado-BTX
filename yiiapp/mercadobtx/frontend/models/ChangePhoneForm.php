<?php
/**
 * Model class for change password at frontend
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class ChangePhoneForm extends CFormModel {
	/**
	 * $currentPassword
	 *
	 * @var string
	 */
	public $phone;
	
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
						'phone',
						'required' 
				),
		);
	}
	
	/**
	 * Returns attribute labels
	 *
	 * @see CModel::attributeLabels()
	 *
	 * @return array
	 */
	public function attributeLabels() {
		return array (
				'phone' => Yii::t ( 'translation', 'Phone Number' )
		);
	}
}
