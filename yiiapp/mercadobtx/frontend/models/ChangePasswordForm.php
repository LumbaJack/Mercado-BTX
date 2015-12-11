<?php
/**
 * Model class for change password at frontend
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class ChangePasswordForm extends CFormModel {
	/**
	 * $currentPassword
	 *
	 * @var string
	 */
	public $password;
	
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
	 * @var CUserIdentity
	 */
	private $_identity;
	
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
						'password, newPassword, passwordConfirm',
						'required' 
				),
				array (
						'password',
						'authenticate' 
				),
				array (
						'passwordConfirm',
						'compare',
						'compareAttribute' => 'newPassword',
						'message' => Yii::t ( 'validation', "Passwords don't match" ) 
				),
				array (
						'password',
						'compare',
						'operator' => '!=',
						'compareAttribute' => 'newPassword',
						'message' => Yii::t ( 'validation', "Passwords are the same" )
				),
				array (
						'newPassword ',
						'length',
						'max' => 50,
						'min' => 8 
				) 
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
				'password' => Yii::t ( 'translation', 'Current Password' ),
				'newPassword' => Yii::t ( 'translation', 'New Password' ),
				'passwordConfirm' => Yii::t ( 'translation', 'Verify Password' ) 
		);
	}
	
	/**
	 * Inline validator for password field.
	 *
	 * @param
	 *        	string
	 * @param
	 *        	array
	 */
	public function authenticate($attribute, $params) {
		if ($this->hasErrors ())
			return;
		
		$user = Yii::app ()->user->data ();
		$this->_identity = new UserIdentity ( $user->username, $this->password );
		if ($this->_identity->authenticate ())
			return;
		
		$this->addError ( 'password', Yii::t ( 'errors', 'Incorrect password.' ) );
	}
}
