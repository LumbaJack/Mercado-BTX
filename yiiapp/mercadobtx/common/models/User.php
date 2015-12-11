<?php
/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $username
 * @property string $login_ip
 * @property integer $login_attempts
 * @property integer $login_time
 * @property string $validation_key
 * @property string $activation_key
 * @property string $recovery_key
 * @property string $password_strategy
 * @property boolean $requires_new_password
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 * @property string $type_person
 * @property integer activation_time
 *
 * @method bool verifyPassword
 *
 * @package YiiBoilerplate\Models
 */
class User extends AutoRecord
{
    const STATUS_BANNED = -2; // Removed by Admin
    const STATUS_REMOVED = -1; // Removed by User (self)
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const REALLY_DELETE = false; // just mark users as delete

    const OFFLINE_INDICATION_TIMEOUT = 300; // 5 Minutes

    public function init()
    {
    	parent::init();
    	$this->account_id = hash('sha256', mt_rand() .uniqid(mt_rand(), true) . uniqid(mt_rand(), true) . mt_rand(), false);
    }


    /** @var string Field to hold a new password when user updates it. */
    public $newPassword;

    /** @var string Password confirmation. Is used only in validation on login. */
    public $passwordConfirm;

    /**
     * Name of the database table associated with this ActiveRecord
     *
     * @return string
     */
    public function tableName()
    {
        return '{{user}}';
    }

    /**
     * Behaviors associated with this ActiveRecord.
     *
     * We are using the APasswordBehavior because it allows neat things
     * like changing the password hashing methods without rebuilding the whole user database.
     *
     * @see https://github.com/phpnode/YiiPassword
     *
     * @return array Configuration for the behavior classes.
     */
    public function behaviors()
    {
        Yii::import('common.extensions.behaviors.password.*');
        return array_merge(
            parent::behaviors(),
            array(
                // Password behavior strategy
                "APasswordBehavior" => array(
                    "class" => "APasswordBehavior",
                    "defaultStrategyName" => "bcrypt",
                    "strategies" => array(
                        "bcrypt" => array(
                            "class" => "ABcryptPasswordStrategy",
                            "workFactor" => 14,
                            "minLength" => 8
                        )
                    ),
                )
            )
        );
    }

    /**
     * Validation rules for model attributes.
     *
     * @see http://www.yiiframework.com/wiki/56/
     * @return array
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'email'),
            array('username, email, account_id', 'unique'),
            array('passwordConfirm', 'compare', 'compareAttribute' => 'newPassword', 'message' => Yii::t('validation', "Passwords don't match")),
            array('newPassword ', 'length', 'max' => 50, 'min' => 8),
            array('email, password, salt', 'length', 'max' => 255),
            array('requires_new_password, login_attempts', 'numerical', 'integerOnly' => true),
            array('superuser', 'in', 'range' => array(0, 1)),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, email', 'safe', 'on' => 'search'),
        	array('activation_time', 'safe'),
        );
    }

    public function relations()
    {
    	return array(
    			'transactions'=>array(self::HAS_MANY, 'Transaction', 'id_user'),
    			'wallets' => array(self::HAS_ONE, 'Wallet', 'id_user'),
    			'addresses' => array(self::HAS_MANY, 'Address', 'id_user'),
    			'details' => array(self::HAS_ONE, 'UserDetail', 'id_user'),
    			'tickets' => array(self::HAS_MANY, 'SupportTicket', 'id_user'),
    			'recovery_request' => array(self::HAS_ONE, 'RecoveryRequest', 'id_user'),
    			'twofactor_settings' => array(self::HAS_ONE, 'UserTwoFactorSettings', 'id_user'),
    			'balance' => array(self::HAS_ONE, 'Balance', 'id_user'),
    			'verify' => array(self::HAS_ONE, 'UserVerify', 'id_user'),
    	);
    }

    /**
     * Customized attribute labels (attr=>label)
     *
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => Yii::t('labels', 'Username'),
            'password' => Yii::t('labels', 'Password'),
            'newPassword' => Yii::t('labels', 'Password'),
            'passwordConfirm' => Yii::t('labels', 'Confirm password'),
            'email' => Yii::t('labels', 'Email'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $PARTIAL = true;

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, $PARTIAL);
        $criteria->compare('email', $this->email, $PARTIAL);

        return new CActiveDataProvider(get_class($this), compact('criteria'));
    }

    /**
     * Generates a new validation key (additional security for cookie)
     */
    public function regenerateValidationKey()
    {
        $validation_key = md5(mt_rand() . $this->username . mt_rand() . $this->email . mt_rand());
        $this->saveAttributes(compact('validation_key'));
    }

    /**
     * Generates a new activation key (additional security for cookie)
     */
    public function regenerateActivationKey()
    {
    	$activation_key = md5(mt_rand() . $this->username . mt_rand() . $this->email . mt_rand());
    	$this->saveAttributes(compact('activation_key'));
    }


    /**
     * Returns the static model of the specified AR class.
     * Mandatory method for ActiveRecord descendants.
     *
     * @param string $className
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function create_table()
    {
        $tblname = CActiveRecord::model('User')->tableName();
        $sql = "CREATE TABLE `${tblname}` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `account_id` varchar(255) DEFAULT NULL,
            `username` varchar(45) DEFAULT NULL,
            `password` varchar(255) DEFAULT NULL,
            `salt` varchar(255) DEFAULT NULL,
            `password_strategy` varchar(50) DEFAULT NULL,
            `requires_new_password` tinyint(1) NOT NULL DEFAULT 0,
            `email` varchar(255) DEFAULT NULL,
            `name` varchar(255) DEFAULT NULL,
            `superuser` int(1) NOT NULL DEFAULT 0,
            `status` int(1) NOT NULL DEFAULT 0,
            `login_attempts` int(11) NOT NULL DEFAULT 0,
            `login_time` int(11) DEFAULT NULL,
            `login_ip` varchar(32) DEFAULT NULL,
            `validation_key` varchar(255) DEFAULT NULL,
            `activation_key` varchar(255) DEFAULT NULL,
            `last_visit` int(11) DEFAULT NULL,
            `last_action` int(11) DEFAULT NULL,
            `create_time` int(11) DEFAULT NULL,
            `update_time` int(11) DEFAULT NULL,
            `activation_time` int(11) DEFAULT NULL,
            `type_person` varchar(1) NOT NULL DEFAULT 'F',
            PRIMARY KEY (`id`),
            UNIQUE KEY `username` (`username`),
            UNIQUE KEY `email` (`email`),
            UNIQUE KEY `account_id` (`account_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
            
        Yii::app()->db->createcommand($sql)->execute();
    }

    public function delete()
    {
        if ( self::REALLY_DELETE ) {
            if ( $this-profile !== null) {
                $this->profile->delete();
            }
            return parent::delete();
        }
        else {
            $this->status = self::STATUS_REMOVED;
            return $this->save(false, array('status'));
        }
    }

    public function isOnline()
    {
        return $this->last_action > time() - self::OFFLINE_INDICATION_TIMEOUT;
    }

    public function setLastAction()
    {
        if (!Yii::app()->user->isGuest && !$this->isNewRecord) {
            $this->last_action = time();
            return $this->save(false, array('last_action'));
        }
    }

    public function logout()
    {
        if (!Yii::app()->user->isGuest) {
            $this->last_action = 0;
            $this->save(false, array('last_action'));
        }
    }

    public function isActive()
    {
        return $this->status == User::STATUS_ACTIVE;
    }

    public function isActivated()
    {
    	return !( is_null($this->activation_time ) || $this->activation_time == 0 );
    }

    public function isVerified()
    {
    	return !( is_null($this->verify ) || is_null($this->verify->create_time) || $this->verify->create_time == 0 );
    }

    public function isAdmin()
    {
        return $this->superuser;
    }
	
	public function getActivationUrl()
	{
		$activationUrl = Yii::app()->params['mbtx']['activationUrl' ];
		$params['key'] = urlencode($this->activation_key);
		return Yii::app()->controller->createAbsoluteUrl($activationUrl, $params);
	}
}
	
