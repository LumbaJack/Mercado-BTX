<?php

/**
 * This is the model class for table "{{fiat}}".
 *
 * The followings are the available columns in table '{{fiat}}':
 * @property integer $id
 * @property integer $status
 * @property integer $type
 * @property string $name
 * @property string $short_name
 * @property double $price
 * @property string $create_time
 * @property string $update_time
 */
class Fiat extends AutoRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{fiat}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, type', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>30),
			array('short_name', 'length', 'max'=>10),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status, type, name, short_name, price, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Status',
			'type' => 'Type',
			'name' => 'Name',
			'short_name' => 'Short Name',
			'price' => 'Price',
			'create_time' => 'Created At',
			'update_time' => 'Updated At',
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
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fiat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function create_table()
	{
		$tblname = CActiveRecord::model('Fiat')->tableName();
		$sql = "CREATE TABLE `".$tblname."` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`status` tinyint(1) DEFAULT NULL,
			`type` tinyint(1) DEFAULT NULL,
			`name` varchar(30) DEFAULT NULL,
			`short_name` varchar(10) DEFAULT NULL,
			`price` float DEFAULT NULL,
                        `create_id` int(11) DEFAULT NULL,
                        `create_time` int(11) DEFAULT NULL,
                        `update_id` int(11) DEFAULT NULL,
                        `update_time` int(11) DEFAULT NULL,
			PRIMARY KEY  (`id`)
			)
			ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		Yii::app()->db->createcommand($sql)->execute();
	}
}
