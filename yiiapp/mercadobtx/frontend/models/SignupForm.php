<?php
/**
 * Model class for login form at frontend
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class SignupForm extends User
{
    /**
     * Captcha code
     *
     * @var string
     */
    public $verifyCode;

    /** @var CUserIdentity */
    private $_identity;

    /** @var User */
    private $_user = null;
	public function getUser()
	{
		return $this->_user;
	}


      /**
     * Validation rules
     *
     * @see CModel::rules()
     *
     * @return array
     */
    public function rules()
    {
    	$rules = parent::rules();
		$rules[] = array('username', 'email');
		$rules[] = array('verifyCode', 'validateCaptcha', 'message' => Yii::t('translation', "Captcha does not match"));
		return $rules;
    }


    /**
     * Inline validator for password field.
     *
     * @param string
     * @param array
     */
    public function authenticate($attribute, $params)
    {
        if ($this->hasErrors())
            return;

        $this->_identity = new UserIdentity($this->email, $this->password);
        if ($this->_identity->authenticate())
            return;

        if ($this->user !== null and $this->user->login_attempts < 100)
            $this->user->saveAttributes(array('login_attempts' => $this->user->login_attempts + 1));

        $this->addError('username', Yii::t('errors', 'Incorrect username and/or password.'));
        $this->addError('password', Yii::t('errors', 'Incorrect username and/or password.'));
    }

    /**
     * Inline validator for captcha code
     *
     * @param string
     * @param array
     */
    public function validateCaptcha($attribute, $params)
    {
        if ($this->isCaptchaRequired())
            CValidator::createValidator('captcha', $this, $attribute, $params)->validate($this);
    }

    /**
     * Login
     *
     * @return bool
     */
    public function signup()
    {
        if ($this->hasErrors())
            return false;

  		try {
    		$this->_user = new User();
			$this->_user->username = $this->email;
			$this->_user->email = $this->email;
			$this->_user->password = $this->passwordConfirm;
			$this->_user->password_strategy = 'bcrypt';
			$this->_user->login_ip = $_SERVER['REMOTE_ADDR'];
			//$_user->regenerateValidationKey();
			$this->_user->save();
		}
		catch(Exception $e) {
			Yii::log($e);
			return false;
		}

	    if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->passwordConfirm);
            $this->_identity->authenticate();
        }
		
        if ($this->_identity->isAuthenticated)
        {
            $duration = 0;
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }

		return true;
    }
	

    /**
     * Returns whether it requires captcha or not
     * @return bool
     */
    public function isCaptchaRequired()
    {
        return true;
    }
}
