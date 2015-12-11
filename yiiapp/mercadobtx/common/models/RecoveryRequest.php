<?php

/**
 * This is the model class for table "{{recovery_request}}".
 *
 * The followings are the available columns in table '{{recovery_request}}':
 * @property integer $id
 * @property integer $id_user
 * @property string $reqkey
 */
class RecoveryRequest extends AutoRecord {
	private $user;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{recovery_request}}';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'id_user, reqkey',
						'required' 
				),
				array (
						'id, id_user',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'reqkey',
						'length',
						'max' => 45 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_user, reqkey',
						'safe',
						'on' => 'search' 
				),
				array (
						'create_time, update_time',
						'safe' 
				) 
		);
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
				'reqkey' => 'Key' 
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
		$criteria->compare ( 'reqkey', $this->reqkey, true );
		
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
	 * @return RecoveryRequest the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}

	
	const GENERATE_OK = 0;
	const GENERATE_ERR = 1;
	const GENERATE_WAIT = 2;

		
	public static function generateRequest($user) {
		$req = RecoveryRequest::model ()->findByAttributes ( array (
				'id_user' => $user->id 
		) );
		
		if (! $req) {
			$req = new RecoveryRequest ();
			$req->id_user = $user->id;
		}
		
		// only allow 1 request per hour
		if ( $req->create_time ) {
			if ((time() - $req->create_time) < (1 * 60 * 60)) {
				return RecoveryRequest::GENERATE_WAIT;
			}
		}

		$req->reqkey = $req->generateRecoveryKey($user);

		if (!$req->save ()) {
			Yii::log(var_dump($req->getErrors()), 'error');
			return RecoveryRequest::GENERATE_ERR;
		}
		return RecoveryRequest::GENERATE_OK;
	}
	/**
	 * Generates a new recovery key
	 */
	private function generateRecoveryKey($user) {
		return md5 ( mt_rand () . $user->username . mt_rand () . $user->email . mt_rand () );
	}

	public function getRecoveryUrl() {
		$recoveryUrl = Yii::app ()->params ['mbtx'] ['recoveryUrl'];
		$params ['key'] = urlencode ( $this->reqkey );
		return Yii::app ()->controller->createAbsoluteUrl ( $recoveryUrl, $params );
	}

	public function getRecoveryCancelUrl() {
		$recoveryUrl = Yii::app ()->params ['mbtx'] ['recoveryCancelUrl'];
		$params ['key'] = urlencode ( $this->reqkey );
		return Yii::app ()->controller->createAbsoluteUrl ( $recoveryUrl, $params );
	}
	
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'RecoveryRequest' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_user` int(11) NOT NULL,
		`reqkey` VARCHAR(45) NOT NULL,
		`create_id` int(11) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_id` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_id` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC),
		UNIQUE INDEX `reqkey_UNIQUE` (`reqkey` ASC),
		KEY `id_user_FK` (`id_user`),
		CONSTRAINT `id_user_FK` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
}
