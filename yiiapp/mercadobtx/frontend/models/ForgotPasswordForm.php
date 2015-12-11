<?php
/**
 * Model class for change password at frontend
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class ForgotPasswordForm extends CFormModel {
	/**
	 * $email
	 *
	 * @var string
	 */
	public $email;
	
	/**
	 * $user
	 *
	 * @var string
	 */
	public $user;
	
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
						'email',
						'required' 
				),
				array (
						'email',
						'email' 
				),
				array (
						'email',
						'checkexists' 
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
				'email' => Yii::t ( 'translation', 'Email' ) 
		);
	}

	public function checkexists($attribute, $params) {
		$user = null;
		
		// don't bother if there are other errors
		if (! $this->hasErrors ()) {
			$found = User::model ()->findByAttributes ( array (
					'email' => $this->email 
			) );
			if ($found) {
				return true;
			}
		}
		return false;
	}
}
