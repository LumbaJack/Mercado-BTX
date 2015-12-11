<?php

/**
 * This is the model class for table "{{balance}}".
 *
 * The followings are the available columns in table '{{balance}}':
 * @property integer $id
 * @property integer $id_user
 * @property double $btc
 * @property double $local
 * @property double $usd
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $delete_time
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Balance extends AutoRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{balance}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_user, create_time, update_time, delete_time', 'numerical', 'integerOnly'=>true),
            array('btc, local, usd', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_user, btc, local, usd, create_time, update_time, delete_time', 'safe', 'on'=>'search'),
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
            'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_user' => 'Id User',
            'btc' => 'Btc',
            'local' => 'Local',
            'usd' => 'Usd',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'delete_time' => 'Delete Time',
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
        $criteria->compare('id_user',$this->id_user);
        $criteria->compare('btc',$this->btc);
        $criteria->compare('local',$this->local);
        $criteria->compare('usd',$this->usd);
        $criteria->compare('create_time',$this->create_time);
        $criteria->compare('update_time',$this->update_time);
        $criteria->compare('delete_time',$this->delete_time);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Balance the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    
    /**
     * Used by migration command to create the table
     */
    public function create_table() {
        $tblname = CActiveRecord::model ( 'Balance' )->tableName ();
        $sql = "CREATE TABLE `${tblname}` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_user` int(11) DEFAULT NULL,
            `btc` float DEFAULT '0',
            `local` float DEFAULT '0',
            `usd` float DEFAULT '0',
            `create_time` int(11) DEFAULT NULL,
            `update_time` int(11) DEFAULT NULL,
            `delete_time` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `FK_balance_1` (`id_user`),
            UNIQUE INDEX IDX_balance_1 (id_user),
            CONSTRAINT `FK_balance_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";
        
        Yii::app ()->db->createcommand ( $sql )->execute ();
    }

}
