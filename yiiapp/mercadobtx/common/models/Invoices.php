<?php

/**
 * This is the model class for table "{{invoices}}".
 *
 * The followings are the available columns in table '{{invoices}}':
 * @property string $id
 * @property integer $id_user
 * @property integer $status
 * @property double $amount
 * @property string $id_bank
 * @property string $name_bank
 * @property string $id_country
 * @property string $id_currency
 * @property string $descr
 * @property string $id_cpf
 * @property string $id_sub_code
 * @property integer $id_astropay
 * @property integer $astropay_result
 * @property integer $create_date
 * @property string $invoice_number
 *
 * The followings are the available model relations:
 * @property User $idUser
 * @property User $idTrans
 */
class Invoices extends AutoRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{invoices}}';
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
						'id_user, status, astropay_result',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'amount',
						'numerical' 
				),
				array (
						'id_bank, name_bank, id_country, id_currency, descr, id_cpf, id_sub_code, create_date,invoice_number, id_astropay',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_user, status, invoice_number',
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
				) ,
                                'idTrans' => array (
                                                self::BELONGS_TO,
                                                'Transaction',
                                                'id_trans'
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
				'amount' => 'Amount',
				'id_bank' => 'ID Bank',
				'name_bank' => 'Bank Name',
				'id_country' => 'ID Country',
				'id_currency' => 'ID Currency',
				'descr' => 'Descripcion',
				'id_cpf' => 'CPF',
				'id_sub_code' => 'Sub Code',
				'astropay_result' => 'Transaction Result',
				'id_astropay' => 'Unique Astropay ID',
				'create_date' => 'Created at' ,
				'invoice_number' => 'Invoice Number' 
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
		$criteria->compare ( 'invoice_number', $this->invoice_number );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}

	/*
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return Invoices the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
	
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'Invoices' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id_invo` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`id_user` int(11) DEFAULT NULL,
		`invoice_number` varchar(50) NOT NULL DEFAULT '',
		`status` tinyint(1) DEFAULT 0,
		`amount` float DEFAULT '0',
		`id_bank` varchar(5) DEFAULT '',
		`name_bank` varchar(255) DEFAULT '',
		`id_country` varchar(3) DEFAULT 'MX',
		`id_currency` varchar(3) DEFAULT 'MXN',
		`descr` varchar(500) DEFAULT '',
  		`id_cpf` varchar(255) DEFAULT '',
		`id_sub_code` varchar(255) DEFAULT '',
		`astropay_result` tinyint(1) DEFAULT 0,
		`id_astropay` tinyint(1) DEFAULT 0,
		`id_trans` int(11) DEFAULT 0,
		`create_time` int(11) DEFAULT 0,
		`update_time` int(11) DEFAULT 0,
		PRIMARY KEY (`id_invo`),
		UNIQUE INDEX IDX_invoices_1 (invoice_number),
		KEY `FK_invoices_1` (`id_user`),
		CONSTRAINT `FK_invoices_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`),
		KEY `FK_invoices_2` (`id_trans`),
		CONSTRAINT `FK_invoices_2` FOREIGN KEY (`id_trans`) REFERENCES `tbl_transaction` (`id_trans`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
}
