<?php

/**
 * This is the model class for table "{{wallet}}".
 *
 * The followings are the available columns in table '{{wallet}}':
 * @property string $id
 * @property integer $id_user
 * @property integer $type
 * @property double $btc_amount
 * @property integer $create_id
 * @property integer $create_time
 * @property integer $update_id
 * @property integer $update_time
 * @property integer $delete_id
 * @property integer $delete_time
 * @property string $wallet_address
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class SecureWallet extends SecureAutoRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{secure_wallet}}';
	}
	
	public function getDbConnection()
	{
		return self::getSecureDbConnection();
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
						'type',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'btc_amount',
						'numerical' 
				),
				array (
						'wallet_address',
						'length',
						'max' => 255 
				),
				array (
						'private_key',
						'length',
						'max' => 255
				),
				array (
						'create_time, update_time',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_wallet, type, btc_amount, create_time, update_time, wallet_address',
						'safe',
						'on' => 'search' 
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
				'id_wallet' => 'Id Wallet',
				'type' => 'Type',
				'btc_amount' => 'Btc Amount',
				'create_time' => 'Created At',
				'update_time' => 'Updated At',
				'wallet_address' => 'Wallet Address',
				'private_key' => 'Private Key' 
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
		
		$criteria->compare ( 'id', $this->id, true );
		$criteria->compare ( 'type', $this->type );
		$criteria->compare ( 'btc_amount', $this->btc_amount );
		$criteria->compare ( 'create_time', $this->create_time, true );
		$criteria->compare ( 'update_time', $this->update_time, true );
		$criteria->compare ( 'wallet_address', $this->wallet_address, true );
		$criteria->compare ( 'private_key', $this->private_key, true );
		
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
	 * @return Wallet the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'SecureWallet' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_wallet` int(11) NOT NULL,
		`type` tinyint(1) DEFAULT '0',
		`btc_amount` float DEFAULT '0',
		`wallet_address` varchar(255) DEFAULT NULL,
		`private_key` varchar(255) DEFAULT NULL,
		`create_id` int(11) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_id` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_id` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `wallet_address` (`wallet_address`),
		UNIQUE KEY `private_key` (`private_key`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->dbsecure->createcommand ( $sql )->execute ();
	}
}
