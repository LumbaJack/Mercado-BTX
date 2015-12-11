<?php

/**
 * This is the model class for table "{{support_ticket_message}}".
 *
 * The followings are the available columns in table '{{support_ticket_message}}':
 * @property integer $id
 * @property int $id_ticket
 * @property int $id_user
 * @property string $body
 * 
 */
class SupportTicketMessage extends AutoRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{support_ticket_message}}';
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
						'id, id_ticket, id_user',
						'numerical',
						'integerOnly' => true 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'id, id_ticket, id_user, body',
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
						'SupportTicket',
						'id_ticket' 
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
				'body' => Yii::t('translation', 'Body'),
				'id_ticket' => 'Ticket Id',
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
		$criteria->compare ( 'id_ticket', $this->id_ticket, true );
		$criteria->compare ( 'body', $this->body, true );
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
		$tblname = CActiveRecord::model ( 'SupportTicketMessage' )->tableName ();
		$sql = "CREATE TABLE `${tblname}` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`id_ticket` int(11) NOT NULL,
		`id_user` int(11) DEFAULT NULL,
		`body` varchar(255) DEFAULT NULL,
		`create_id` int(11) DEFAULT NULL,
		`create_time` int(11) DEFAULT NULL,
		`update_id` int(11) DEFAULT NULL,
		`update_time` int(11) DEFAULT NULL,
		`delete_id` int(11) DEFAULT NULL,
		`delete_time` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`),
		KEY `support_ticket_message_id_ticket` (`id_ticket`),
		CONSTRAINT `support_ticket_message_id_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `tbl_support_ticket` (`id`),
		KEY `support_ticket_message_id_user` (`id_user`),
		CONSTRAINT `support_ticket_message_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
		
		Yii::app ()->db->createcommand ( $sql )->execute ();
	}
	
	
}
