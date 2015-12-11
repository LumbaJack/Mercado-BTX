<?php

/**
 * This is the model class for table "{{transaction}}".
 *
 * The followings are the available columns in table '{{transaction}}':
 * @property string $id_trans
 * @property integer $id_user
 * @property integer $status
 * @property integer $type
 * @property double $btc_amount
 * @property double $btc_price
 * @property double $usd_amount
 * @property double $fiat_amount
 * @property double $fee_amount
 * @property integer $type_fiat
 * @property integer $cancelled
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $delete_time
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Transaction extends AutoRecord {
	const STATUS_PENDING = 0;
	const STATUS_COMPLETE = 1;
	const STATUS_CANCELLED = 2;
	
	const TYPE_NULL = 0;
	const TYPE_DEPOSIT_FIAT = 1;
	const TYPE_DEPOSIT_BTC = 2;
	const TYPE_SELL_BTC = 3;
	const TYPE_BUY_BTC = 4;
	const TYPE_WITHDRAW_FIAT = 5;
	const TYPE_WITHDRAW_BTC = 6;
	
	var $StatusDescr = array('Pendiente', 'Completo', 'Cancelada');
	var $StatusLabel = array('label-info', 'label-success', 'label-warning', 'label-warning');
	var $TypeDescr = array('Null', 'Deposito Dinero', 'Deposito Bitcoin', 'Venta Bitcoin', 'Compra Bitcoin', 'Retiro Dinero', 'Retiro Bitcoin');

	/*
	 * Function name 
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{transaction}}';
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
						'id_user, status, type',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'amount',
						'numerical' 
				),
				array (
						'descr, wallet_address, create_time, update_time',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id_trans, id_user, status, type, btc_amount, btc_price, usd_amount, fiat_amount, fee_amount, type_fiat, cancelled, create_time, update_time',
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
				'id_trans' => 'ID',
				'id_user' => 'Id User',
				'status' => 'Status',
				'type' => 'Type',
				'amount' => 'Amount',
				'currency' => 'Currency',
				'wallet_address' => 'Direccion',
				'descr' => 'Descripcion',
				'create_time' => 'Created At',
				'update_time' => 'Updated At' 
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
		
		$criteria->compare ( 'id_trans', $this->id, true );
		$criteria->compare ( 'id_user', $this->id_user );
		$criteria->compare ( 'status', $this->status );
		$criteria->compare ( 'type', $this->type );
		$criteria->compare ( 'cancelled', $this->cancelled );
		$criteria->compare ( 'create_time', $this->create_time, true );
		$criteria->compare ( 'update_time', $this->update_time, true );
		
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
	 * @return Transaction the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}

	public function get_status() {
		return $this->StatusDescr[$this->status];
	}
	public function get_label() {
		return $this->StatusLabel[$this->status];
	}
	
	public function get_type() {
		return $this->TypeDescr[$this->type];
	}
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'Transaction' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id_trans` int(11) NOT NULL AUTO_INCREMENT,
		`id_user` int(11) DEFAULT NULL,
		`status` tinyint(1) DEFAULT '0',
		`type` tinyint(1) DEFAULT '0',
		`currency` varchar(3) DEFAULT '',
		`amount` float DEFAULT '0',
		`wallet_address` varchar(255) DEFAULT '',
		`descr` varchar(255) DEFAULT '',
		`txtid` varchar(255) NOT NULL DEFAULT '',
		`curr_rate`  float NOT NULL DEFAULT 0,
		`create_time` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id_trans`),
		INDEX `IDX_txtid` (`txtid`),
		KEY `FK_transaction_1` (`id_user`),
		CONSTRAINT `FK_transaction_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";

		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
}
