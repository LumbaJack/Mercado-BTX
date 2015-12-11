<?php
/**
 * Delete this migration if you don't need a demo users
 *
 * @package migrations
 */
class m130721_220705_add_demo_users extends CDbMigration
{
    public function safeUp()
    {
        $admin = new User();
        $admin->username = 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = 'smart_password';
        $admin->password_strategy = 'bcrypt';
        $admin->superuser = true;
        $admin->activation_time = 1;
        if(!$admin->save()) {
            $msg = print_r($admin->getErrors(),1);
            echo $msg;
            // throw Exception(400,'data not saving: '.$msg );
        }

        $demo = new User();
        $demo->username = 'demo';
        $demo->email = 'demo@example.com';
        $demo->password = 'strong_password';
        $demo->password_strategy = 'bcrypt';
        $demo->activation_time = 1;
        if(!$demo->save()) {
            $msg = print_r($demo->getErrors(),1);
            echo $msg;
            //throw Exception(400,'data not saving: '.$msg );
        }

        $demo = new User();
        $demo->username = 'james.ayvaz@gmail.com';
        $demo->email = 'james.ayvaz@gmail.com';
        $demo->password = '12345678';
        $demo->password_strategy = 'bcrypt';
        $demo->activation_time = 1;
        if(!$demo->save()) {
            $msg = print_r($demo->getErrors(),1);
            echo $msg;
            //throw Exception(400,'data not saving: '.$msg );
        }
 
    }

    public function down()
    {
        $userTable = CActiveRecord::model('User')->tableName();
        $this->delete($userTable, 'email in ("admin@example.com", "demo@example.com")');
    }
}
