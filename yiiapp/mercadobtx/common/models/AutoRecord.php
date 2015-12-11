<?php
class AutoRecord extends CActiveRecord
{
    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
            	'setUpdateOnCreate'=> true,
            )
        );
    }
}
?>
