<?php

/**
 * This is the model class for table "{{wallet}}".
 *
 * The followings are the available columns in table '{{wallet}}':
 * @property string $id
 * @property integer $id_user
 * @property integer $status
 * @property double $btc_amount
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $delete_time
 * @property string $wallet_address
 * @property string $privatekey
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Wallet extends AutoRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{wallet}}';
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
						'id_user, status',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'btc_amount',
						'numerical' 
				),
				array (
						'wallet_address, privatekey',
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
						'id, id_user, status, btc_amount, create_time, update_time, wallet_address, privatekey',
						'safe',
						'on' => 'search' 
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
				'status' => 'Status',
				'btc_amount' => 'Btc Amount',
				'privatekey' => 'Private Key',
				'create_time' => 'Created At',
				'update_time' => 'Updated At',
				'wallet_address' => 'Wallet Address' 
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
		$criteria->compare ( 'id_user', $this->id_user );
		$criteria->compare ( 'status', $this->status );
		$criteria->compare ( 'btc_amount', $this->btc_amount );
		$criteria->compare ( 'create_time', $this->create_time, true );
		$criteria->compare ( 'update_time', $this->update_time, true );
		$criteria->compare ( 'wallet_address', $this->wallet_address, true );
		
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
		$tblname = CActiveRecord::model ( 'Wallet' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_user` int(11) DEFAULT NULL,
		`status` tinyint(1) DEFAULT '0',
		`btc_amount` float DEFAULT '0',
		`privatekey` varchar(255) DEFAULT '',
		`wallet_address` varchar(255) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `wallet_address` (`wallet_address`),
		KEY `FK_confirms_5` (`id_user`),
		CONSTRAINT `FK_confirms_5` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
}
