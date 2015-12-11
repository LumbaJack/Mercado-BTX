<?php
/**
 * @property integer $id
 * @property integer $id_trans
 * @property integer $intermediate
 * @property string $account_number
 * @property string $account_name
 * @property string $bank_name
 * @property string $swift_number
 * @property string $comments
 * 
 * @property string $line1
 * @property string $line2
 * @property string $city
 * @property string $postcode
 * @property string $countrycode
 * 
 */
class TransactionBankInfo extends AutoRecord {
	
	/*
	 * Function name
	*
	* @return string the associated database table name
	*/
	public function tableName() {
		return '{{transaction_bankinfo}}';
	}
	
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
						'account_number, account_name, bank_name, swift_number, comments, city, postcode, countrycode',
						'required' 
				),
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'account_number' => Yii::t ( 'translation', 'withdrawal_bank_entry_7' ),
				'account_name' => Yii::t ( 'translation', 'withdrawal_bank_entry_1' ),
				'bank_name' => Yii::t ( 'translation', 'withdrawal_bank_entry_6' ),
				'swift_number' => Yii::t ( 'translation', 'withdrawal_bank_entry_3' ),
				'comments' => Yii::t ( 'translation', 'withdrawal_bank_entry_4' ),
				'line1' => Yii::t ( 'translation', 'withdrawal_bank_entry_2' ),
				'city' => Yii::t ( 'translation', 'verify_contact_entry_6' ),
				'postcode' => Yii::t ( 'translation', 'verify_contact_entry_7' ),
				'countrycode' => Yii::t ( 'translation', 'withdrawal_bank_entry_5' ) 
		);
	}

	public function isIntermediate() {
		return !($this->intermediate == 0);
	}
	
	/**
	 * Used by migration command to create the table
	 */
	public function create_table() {
		$tblname = CActiveRecord::model ( 'TransactionBankInfo' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_trans` int(11) DEFAULT NULL,
		`intermediate` int(11) DEFAULT 0,
		`account_number` varchar(255) DEFAULT '',
		`account_name` varchar(255) DEFAULT '',
		`bank_name` varchar(255) DEFAULT '',
		`swift_number` varchar(255) DEFAULT '',
		`comments` varchar(255) DEFAULT '',
		`line1` varchar(255) DEFAULT NULL,
		`line2` varchar(255) DEFAULT NULL,
		`city` varchar(255) DEFAULT NULL,
		`postcode` varchar(255) DEFAULT NULL,
		`countrycode` varchar(3) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		KEY `FK_transaction_bankinfo_1` (`id_trans`),
		CONSTRAINT `FK_transaction_bankinfo_1` FOREIGN KEY (`id_trans`) REFERENCES `tbl_transaction` (`id_trans`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
	
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
}
