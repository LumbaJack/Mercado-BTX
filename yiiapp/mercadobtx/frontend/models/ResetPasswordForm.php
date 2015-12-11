<?php
/**
 * Model class for change password at frontend
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class ResetPasswordForm extends CFormModel {
	/**
	 * $newPassword
	 *
	 * @var string
	 */
	public $newPassword;
	
	/**
	 * $passwordConfirm
	 *
	 * @var string
	 */
	public $passwordConfirm;
	
	/**
	 *
	 * @var secret reqkey
	 */
	public $reqkey;
	
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
						'newPassword, passwordConfirm',
						'required' 
				),
				array (
						'passwordConfirm',
						'compare',
						'compareAttribute' => 'newPassword',
						'message' => Yii::t ( 'validation', "Passwords don't match" ) 
				),
				array (
						'newPassword ',
						'length',
						'max' => 50,
						'min' => 8 
				),
				array (
						'reqkey',
						'required',
						'message' => Yii::t ( 'validation', "Error processing form" )
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
				'newPassword' => Yii::t ( 'translation', 'New Password' ),
				'passwordConfirm' => Yii::t ( 'translation', 'Verify Password' ) 
		);
	}
}
