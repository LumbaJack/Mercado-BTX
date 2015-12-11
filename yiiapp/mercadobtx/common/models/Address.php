<?php

/**
 * This is the model class for table "{{address}}".
 *
 * The followings are the available columns in table '{{address}}':
 * @property integer $id
 * @property integer $id_user
 * @property string $line1
 * @property string $line2
 * @property string $city
 * @property string $region
 * @property string $postcode
 * @property string $countrycode
 */
class Address extends AutoRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{address}}';
	}
	
	public function behaviors()  {
		return array( 'CCompare'); // <-- and other behaviors your model may have
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
						'id, id_user',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'line1, line2, city',
						'length',
						'max' => 255 
				),
				array (
						'region, postcode',
						'length',
						'max' => 45 
				),
				array (
						'countrycode',
						'length',
						'max' => 3 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, line1, line2, city, region, postcode, countrycode, id_user',
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
				'line1' => Yii::t('translation', 'Dirección'),
				'line2' => Yii::t('translation', 'Dirección'),
				'city' => Yii::t('translation', 'Ciudad'),
				'region' => Yii::t('translation', 'Dirección'),
				'postcode' => Yii::t('translation', 'Codigo Postal'),
				'countrycode' => Yii::t('translation', 'País'),
				'id_user' => 'Id User' 
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
		$criteria->compare ( 'line1', $this->line1, true );
		$criteria->compare ( 'line2', $this->line2, true );
		$criteria->compare ( 'city', $this->city, true );
		$criteria->compare ( 'region', $this->region, true );
		$criteria->compare ( 'postcode', $this->postcode, true );
		$criteria->compare ( 'countrycode', $this->countrycode, true );
		$criteria->compare ( 'id_user', $this->id_user );
		
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
		$tblname = CActiveRecord::model ( 'Address' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_user` int(11) DEFAULT NULL,
		`line1` varchar(255) DEFAULT NULL,
		`line2` varchar(255) DEFAULT NULL,
		`city` varchar(255) DEFAULT NULL,
		`region` varchar(255) DEFAULT NULL,
		`postcode` varchar(255) DEFAULT NULL,
		`countrycode` varchar(3) DEFAULT NULL,
		`create_id` int(11) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_id` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_id` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		KEY `FK_confirms_6` (`id_user`),
		CONSTRAINT `FK_confirms_6` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
	
	
}
