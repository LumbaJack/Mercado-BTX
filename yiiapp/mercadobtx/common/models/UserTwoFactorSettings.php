<?php

/**
 * This is the model class for table "{{user_detail}}".
 *
 * The followings are the available columns in table '{{user_detail}}':
 * @property integer $id
 * @property integer $id_user
 * @property integer $deliveras
 * @property string $smsphone
 * @property string $smscode
 * @property string $googleauth_secret
 * @property string $googleauth_url
 * 
 */
class UserTwoFactorSettings extends AutoRecord {
	const NONE = 0;
	const SMS = 1;
	const GOOGLE_AUTH = 2;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{user_twofactor_settings}}';
	}
	public function behaviors() {
		return array (
				'CCompare' 
		); // <-- and other behaviors your model may have
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$results = array ();
		$results [] = array (
				'id, id_user, deliveras',
				'numerical',
				'integerOnly' => true 
		);
		
		$results [] = array (
				'deliveras',
				'in',
				'range' => array (
						UserTwoFactorSettings::NONE,
						UserTwoFactorSettings::SMS,
						UserTwoFactorSettings::GOOGLE_AUTH 
				),
				'allowEmpty' => false 
		);
		
		if ($this->deliveras == UserTwoFactorSettings::SMS) {
			$results [] = array (
					'smsphone',
					'required' 
			);
		}
		$results [] = array (
				'deliveras, smsphone, smscode',
				'safe' 
		);
		
		return $results;
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'idUser' => array (
						self::BELONGS_TO,
						'User',
						'id_user' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'id' => 'ID',
				'id_user' => 'Id User',
				'deliveras' => Yii::t ( 'translation', 'Method' ),
				`smsphone` => Yii::t ( 'translation', 'Phone Number' ),
				'smscode' => Yii::t ( 'translation', 'Verification code' ) 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'id_user', $this->id_user );
		$criteria->compare ( 'deliveras', $this->deliveras );
		$criteria->compare ( 'smsphone', $this->smsphone );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return Address the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'UserTwoFactorSettings' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_user` int(11) DEFAULT NULL,
        `enabled` int(1) NOT NULL DEFAULT 0,
        `deliveras` int(1) NOT NULL DEFAULT 0,
        `smsphone` varchar(255) DEFAULT NULL,
        `smscode` varchar(6) DEFAULT NULL,
        `googleauth_secret` varchar(255) DEFAULT NULL,
        `googleauth_url` varchar(255) DEFAULT NULL,
		`create_id` int(11) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_id` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_id` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		KEY `FK_user_two_factor_settings` (`id_user`),
		CONSTRAINT `FK_user_two_factor_settings` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
	
	/**
	 * Generates a new validation key (additional security for cookie)
	 */
	public function regenerateSmsCode() {
		$length = 6;
		$characters = '0123456789'; // abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, strlen ( $characters ) - 1 )];
		}
		
		$smscode = $randomString;
		$this->saveAttributes ( compact ( 'smscode' ) );
	}
}
