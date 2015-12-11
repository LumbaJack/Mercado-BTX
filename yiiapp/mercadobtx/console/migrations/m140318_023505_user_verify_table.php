<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140318_023505_user_verify_table extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( 'UserVerify' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( 'UserVerify' )->tableName ();
        $this->dropTable ( $tblname );
    }
}

